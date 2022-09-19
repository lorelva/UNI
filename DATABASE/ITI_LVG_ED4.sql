CREATE DATABASE NICE;
USE NICE;
CREATE TABLE ARTICULO
(
    SERIE      INT PRIMARY KEY,
    CONCEPTO   VARCHAR(100),
    CATEGORIA  VARCHAR(100),
    PRECIO     FLOAT,
    EXISTENCIA INT
);

CREATE TABLE AGENTE
(
    ID_AGE   INT PRIMARY KEY,
    NOMBRE   VARCHAR(100),
    APELLIDO VARCHAR(100),
    PRESTAMO FLOAT,
    ESTIMULO INT,
    ZONA     VARCHAR(100)
);

CREATE TABLE PEDIDO
(
    CLAVE     INT PRIMARY KEY AUTO_INCREMENT,
    FECHA     DATE,
    CANTIDAD  INT,
    DESCUENTO FLOAT,
    TOTAL     FLOAT,
    SERIE     INT,
    IDAG      INT,
    FOREIGN KEY (IDAG) REFERENCES AGENTE (ID_AGE),
    FOREIGN KEY (SERIE) REFERENCES ARTICULO (SERIE)
);


###INSERTAR DATOS
INSERT INTO ARTICULO(SERIE, CONCEPTO, CATEGORIA, PRECIO, EXISTENCIA)
VALUES (100, 'COLLAR', 'JOYERIA', 599, 50),
       (101, 'ARETE', 'JOYERIA', 319, 60),
       (102, 'ANILLO', 'JOYERIA', 219, 70),
       (103, 'PULSERA', 'JOYERIA', 350, 20),
       (104, 'EUCALIPTO', 'ACEITE', 349, 40),
       (105, 'LAVANDA', 'ACEITE', 280, 30),
       (106, 'MENTA', 'ACEITE', 450, 15),
       (107, 'OREGANO', 'ACEITE', 140, 21);
SELECT *FROM ARTICULO;

INSERT INTO AGENTE(ID_AGE, NOMBRE, APELLIDO, PRESTAMO, ESTIMULO, ZONA)
VALUES (200, 'FEDERICO', 'JUAREZ', 5000, 0, 'NORTE'),
       (201, 'CAMILA', 'RIVAS', 700, 0, 'NORTE'),
       (202, 'HERMELINDO', 'GALEANA', 8000, 0, 'SUR'),
       (203, 'SEBASTIAN', 'LIMA', 1000, 0, 'SUR'),
       (204, 'DIANA', 'GALICIA', 3000, 0, 'NORTE'),
       (205, 'ALEJANDRA', 'LINARES', 5500, 0, 'SUR');
SELECT *FROM AGENTE;



##SECCION DE LOS PROCEDIMIENTOS

# PROCEDIMIENTO 1A
CREATE PROCEDURE PRECIO_MAYOR(in CAT VARCHAR(100))
BEGIN

    declare idarticulo int;
    declare acumupre float;
    declare temppre int default 0;
    declare tempfolio int default 0;
    declare h boolean;


    DECLARE premayor CURSOR FOR SELECT SERIE, PRECIO FROM ARTICULO WHERE CATEGORIA = CAT;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET h = TRUE;

    OPEN premayor;

    loop1:
    loop
        fetch premayor into idarticulo,acumupre;
        if h then
            SELECT CONCEPTO AS CONCEPTO, PRECIO FROM ARTICULO WHERE SERIE = tempfolio;
            leave loop1;
        end if;
        if acumupre >= temppre then
            set temppre = acumupre;
            set tempfolio = idarticulo;
        end if;
    end loop loop1;
    close premayor;
END ;
DROP PROCEDURE PRECIO_MAYOR;
####PRUEBA DEL PROCEDIEMIENTO
CALL PRECIO_MAYOR('ACEITE');
CALL PRECIO_MAYOR('JOYERIA');




##PROCEDIMIENTO 2A
CREATE PROCEDURE REGISTRO_VENTA(IN FECH DATE, IN S INT, IN A INT, IN CANT INT)
BEGIN
    declare x int;
    declare tot,pre,des,sub float;
    declare exit handler for 1452

        BEGIN
            SELECT 'No existe el articulo o el agente' AS MSG;
        END;

    START TRANSACTION;

    select precio into pre from ARTICULO where SERIE = S;
    set sub = pre * CANT;
    if DAYOFMONTH(FECH) BETWEEN 1 AND 5 THEN
        set des = 0.05;
    else
        if DAYOFMONTH(FECH) BETWEEN 6 AND 15 THEN
            set des = 0.15;
        else
            set des = 0.20;
        end if;
    end if;
    set tot = sub * des;

    insert into PEDIDO values (0, FECH, cant, des, tot, S, A);
    update AGENTE set ESTIMULO = ESTIMULO + (tot * 0.20) where ID_AGE = A;
    update AGENTE set PRESTAMO = PRESTAMO - (tot * 0.10) where ID_AGE = A;
    select max(CLAVE) into x from PEDIDO;
    select * from PEDIDO where CLAVE = x;
    COMMIT;
END;
##
CALL REGISTRO_VENTA('2022-07-21',100,201, 3);

###PROCEDIMIENTO  2B
CREATE PROCEDURE  VISUALIZAR_AGENTE()
BEGIN

    DECLARE PROMEDIO_PEDIDOS INT;
    DECLARE A INT;
    DECLARE EST INT;
    DECLARE  NOM VARCHAR(100);
    DECLARE h BOOLEAN;

    DECLARE promedio CURSOR for SELECT IDAG FROM PEDIDO;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET h = TRUE;
    OPEN promedio;

    SELECT AVG(TOTAL) INTO PROMEDIO_PEDIDOS FROM PEDIDO;

    loop1:
    loop
        fetch promedio into A ;
        if h then
            SELECT NOMBRE, ESTIMULO INTO NOM, EST FROM AGENTE WHERE ID_AGE = A;
            leave loop1;
        end if;
    IF EST < PROMEDIO_PEDIDOS THEN
        SELECT NOM, EST;
    END IF;
    end loop loop1;
    CLOSE promedio;
END;
DROP PROCEDURE VISUALIZAR_AGENTE;
CALL VISUALIZAR_AGENTE();

##PROCEDIMIENTO  2C
CREATE PROCEDURE AUMENTO_PRECIO()
BEGIN

    DECLARE PROMEDIO INT;
    DECLARE A INT;
    DECLARE P FLOAT;
    DECLARE AUMENTO FLOAT;

    DECLARE aumentoP CURSOR FOR SELECT PRECIO , SERIE FROM ARTICULO;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET @h = TRUE;

    OPEN aumentoP;
    SELECT AVG(PRECIO) INTO PROMEDIO FROM ARTICULO;

    loop1:
    loop
        fetch aumentoP into P, A;
    IF @h then
      leave loop1;
    end if;
    IF P > PROMEDIO THEN
        SET AUMENTO = (P*0.15);
        SET P = P+AUMENTO;
        SELECT PRECIO FROM ARTICULO WHERE SERIE = A;
        UPDATE ARTICULO SET PRECIO = P WHERE SERIE = A;
    END IF;
    end loop loop1;
    CLOSE aumentoP;
END;

CALL AUMENTO_PRECIO();


##PROCEDIMIENTO  2D
CREATE PROCEDURE SUMAR_PRESTAMO(IN zona1 VARCHAR(100))
BEGIN

    DECLARE A INT;

    DECLARE sumarP CURSOR FOR SELECT PRESTAMO FROM  AGENTE WHERE ZONA = zona1;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET @h = TRUE;

    SELECT SUM(PRESTAMO) AS SUMA FROM AGENTE WHERE ZONA = zona1;
    OPEN sumarP;
    loop1:
    loop
        fetch sumarP INTO A;
        IF @h THEN
            leave loop1;
        end if;
    end loop loop1;
    CLOSE sumarP;
END;
DROP PROCEDURE SUMAR_PRESTAMO;
CALL SUMAR_PRESTAMO('SUR');



USE EI;
