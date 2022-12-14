CREATE DATABASE AGENCIA_EVENTOS;
USE AGENCIA_EVENTOS;

CREATE TABLE COMENSAL(
	IDCOME INT PRIMARY KEY auto_increment,
    NOMBRE VARCHAR(100),
    APELLIDO VARCHAR(100),
    FECHANAC DATE,
    DOMICILIO VARCHAR(100),
    CREDITO DOUBLE
);

CREATE TABLE EVENTO(
	IDEVENTO INT PRIMARY KEY auto_increment,
    TIPO VARCHAR(100),
    PRECIOPERSONA DOUBLE,
    CUPO INT,
    DESCUENTO INT
);

CREATE TABLE APARTADO (
	FOILIO INT PRIMARY KEY auto_increment,
    FECHAAPAR DATE,
    ESTADO VARCHAR(100),
    MONTO DOUBLE,
    SALDODEUDOR DOUBLE,
    FEABONO DATE,
    idCome INT,
    
    FOREIGN KEY(idCome) REFERENCES COMENSAL(IDCOME)

);

CREATE TABLE SOLICITUD(
	SERIE INT PRIMARY KEY auto_increment,
    FECHA DATE,
    CANTPER INT,
    TOTAL DOUBLE,
    FORMAPA VARCHAR(100),
    idCome INT,
    idEvento INT,
	FOREIGN KEY(idCome) REFERENCES EVENTO(IDEVENTO)
);


#procedimiento 1
CREATE PROCEDURE `Comensal` (IN nombre VARCHAR(100),
							IN apellido VARCHAR(100),
                            IN   fecha DATE,
							IN  domicilio VARCHAR(100)
							)
salir: BEGIN

	DECLARE credito DOUBLE DEFAULT 0;
    
	IF YEAR(CURRENT_DATE) - YEAR(fecha) BETWEEN 21 AND 60 THEN
		SELECT 'CORRECTO' AS 'ESTADO';
	ELSE 
		SELECT 'RANGO DE EDAD NO PERMITIDO' AS 'ESTADO';
		LEAVE salir;
    END IF;
    
    IF domicilio= 'CUAUTLA' THEN 
		SET  credito =10000;
	ELSEIF domicilio = 'JIUTEPEC' THEN 
		SET credito = 5000;
	ELSEIF domicilio =  'CUERNAVACA' THEN 
        SET credito = 7000;
	ELSE 
		SELECT 'Credito No VALIDADO' AS 'STATUS';
	END IF;
	INSERT INTO COMENSAL (NOMBRE, APELLIDO, FECHANAC, DOMICILIO,CREDITO)
			VALUES(nombre, apellido, fecha, domicilio,credito);
END$$

DELIMITER ;
CALL Comensal("CARLOS", "AYALA", '1970/01/31',"JIUTEPEC");
DROP PROCEDURE Comensal;
SELECT *FROM COMENSAL;



#procedimiento 2
CREATE PROCEDURE `evento` (IN tipo VARCHAR(100))

BEGIN
    DECLARE PRECIOPERSONA DOUBLE DEFAULT 0;
    DECLARE CUPO INT DEFAULT 0;
	DECLARE DESCUENTO INT DEFAULT 0;
    
    IF tipo = 'BODA' THEN
		SET PRECIOPERSONA= 150.00;
        SET CUPO = 300;
        SET DESCUENTO = 10;
	ELSEIF tipo = 'BAUTIZO' THEN
		SET PRECIOPERSONA= 250.00;
        SET CUPO = 350;
        SET DESCUENTO = 15;
	ELSEIF tipo = 'COMUNION' THEN
		SET PRECIOPERSONA= 200.00;
        SET CUPO = 150;
        SET DESCUENTO = 25;
	ELSE 
		SET PRECIOPERSONA= 100.00;
        SET CUPO = 100;
        SET DESCUENTO = 0;
	END IF;
	INSERT INTO EVENTO(TIPO,PRECIOPERSONA, CUPO,DESCUENTO) VALUES(tipo, PRECIOPERSONA,CUPO,DESCUENTO);

END$$

DELIMITER ;

DROP PROCEDURE evento;
CALL evento("COMUNION");
SELECT *FROM EVENTO;


#procedimiento 3


#procediemiento 4
 CREATE PROCEDURE `tabla_Apartados`(IN idComensal INT,
                                   IN montoADar DOUBLE)

BEGIN
	DECLARE SD_ACTUAL DOUBLE DEFAULT 0;
    
    SELECT FEABONO INTO SD_ACTUAL FROM APARTADO WHERE idCome = idComensal;
    
    IF SD_ACTUAL = SD_ACTUAL-montoADar THEN
		SELECT 'SALDO CUBIERTO' AS 'ESTADO';
    ELSEIF SD_ACTUAL-montoADar <0 THEN 
		SELECT montoADar - SD_ACTUAL AS 'FALTA POR CUBRIR SALDO';
        SET SD_ACTUAL = 0;
	END IF;
    
    
	UPDATE APARTADO SET FEABONO = SDACTUAL WHERE idCome = idComensal;
    SELECT BONOACTUAL AS 'ESTATUS';
    
END$$

DELIMITER ;
CALL tabla_Apartados(3, 500.50);
SELECT *FROM APARTADOS;
