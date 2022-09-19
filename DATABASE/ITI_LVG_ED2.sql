CREATE DATABASE TIENDA_MASCOTAS;
USE TIENDA_MASCOTAS; 


CREATE TABLE MASCOTA(
	IDMAS INT PRIMARY KEY,
    NOMBRE VARCHAR(100),
	TIPO VARCHAR(100),
    PESO FLOAT,
    FENAC DATE,
    FESALIDA DATE
);

CREATE TABLE COMIDA(
	IDRE INT PRIMARY KEY,
    MARCA VARCHAR(100),
    CANTIDAD FLOAT,
    HORA VARCHAR(100)
);



CREATE TABLE CARTILLA(
	IDEN INT PRIMARY KEY AUTO_INCREMENT,
    LUGAR VARCHAR(100),
    VACUNA VARCHAR(100),
    FEAPLICACION DATE,
    DOSIS INT,
    ENFERMEDAD_ACTUAL VARCHAR(100),
    IdMas INT,
    IdRe INT,
    FOREIGN KEY (IdMas) REFERENCES MASCOTA (IDMAS),
    FOREIGN KEY (IdRe)  REFERENCES COMIDA (IDRE)
);



###FUNCIONES
#FUNCION 1
DELIMITER //
CREATE FUNCTION PLACA_MASCOTA( tipo VARCHAR(100),
							   nombre VARCHAR(100),
                               fechaNac DATE,
                               fechaSal DATE,
                               hora VARCHAR(20))
RETURNS VARCHAR(30)
DETERMINISTIC
	BEGIN
		DECLARE A, B, C, D, E, F,G VARCHAR(50);

        SET A = left(tipo, 1);
        SET B = left(nombre, 3);
        SET C = right(year(fechaNac),2);
        SET D = month(fechaNac);
        SET E = day(fechaNac);
        SET F = right(DAYNAME(fechaSal),1);
        SET G = left(hora,2);
		
        RETURN upper(concat(A,B,C,D,E,F,G));
    END //

SELECT PLACA_MASCOTA("PERRO","TAKASHI","2018/09/13","2020/08/23","10:00");

#FUNCION 2
DELIMITER //
CREATE FUNCTION ALIMENTACION(peso FLOAT,
							 cant FLOAT	)
RETURNS VARCHAR(50)
DETERMINISTIC
	BEGIN
		DECLARE diasAlimentacion INT;
        DECLARE tipo VARCHAR(100);
        DECLARE kilogramos FLOAT;
        DECLARE kilogramosXmes FLOAT;
        DECLARE precioTotal INT DEFAULT 35;
        
        IF tipo = "PERRO" OR "GATO" THEN 
			IF(peso between 5 AND 8) THEN
				SET diasAlimentacion = 2;
                SET kilogramos = 15;
                SET precioTotal = precioTotal*kilogramos;
			ELSE
				SET diasAlimentacion = 1;
			END IF;
		END IF;
        IF tipo = "PEZ" THEN
			SET diasAlimentacion = 4;
            SET kilogramos = 8;
            SET precioTotal = precioTotal*kilogramos;
		END IF;
        IF tipo = "ROEDORES" THEN
			SET diasAlimentacion = 6;
            SET kilogramos = 10;
            SET precioTotal = precioTotal*kilogramos;
        END IF;
        SET kilogramosXmes = kilogramos*diasAlimentacion;
        RETURN CONCAT("CANTIDAD DE ALIMENTO: ",diasAlimentacion, "CANTIDAD DE ALIMENTACION POR MES",kilogramosXmes,
						"PRECIO POR MES", precioTotal);
    END//

SELECT * FROM CARTILLA INNER JOIN MASCOTA M on CARTILLA.IdMas = M.ID INNER JOIN COMIDA C on CARTILLA.IdRe = C.IDRE;



# FUNCION 3
DELIMITER //
CREATE FUNCTION SEMANAS_TRANSCURRIDAS(fechaNac DATE,
									  fechaSal DATE)
RETURNS INT
DETERMINISTIC
	BEGIN
		DECLARE semanas INT;
        SET semanas = WEEK(fechaSal)-WEEK(fechaNac);
    
    RETURN semanas;
    END //
SELECT SEMANAS_TRANSCURRIDAS("2000/09/12","2000/12/23");	

#parte 2
DELIMTER //
CREATE FUNCTION VACUNAS(tipo VARCHAR(100),
						fechaNac DATE, 
                        fechaSal DATE)
RETURNS VARCHAR(100)
DETERMINISTIC
	BEGIN
		IF tipo = "PERRO" THEN 
			IF(SEMANAS_TRANSCURRIDAS(fechaNac, fechaSal) =8) THEN
				RETURN concat("SE PUEDE VACUNAR");
			END IF;
		END IF;
        IF tipo = "GATO" THEN 
			IF(SEMANAS_TRANSCURRIDAS(fechaNac, fechaSal) =9) THEN
				RETURN concat("SE PUEDE VACUNAR");
			END IF;
		END IF;
        
    END //

#FUNCION 4
DELIMITER //
CREATE FUNCTION ENTRENAMIENTO(fechaNac DATE, fechaSal DATE)
RETURNS DATE
DETERMINISTIC
	BEGIN
		DECLARE MESES INT;
        DECLARE fechaEntrenamiento DATE;
        
		SET MESES = MONTH(fechaSal) -MONTH(fechaNac);
		IF MESES >= 8 THEN
			IF month(fechaSal) /3 <=1 THEN
				SET fechaEntrenamiento = date_add(fechaSal, INTERVAL 7 DAY);
				END IF;
		END IF;
        IF month(fechaSal) /3 between 2 and 3 THEN
			SET fechaEntrenamiento = date_add(fechaActual, INTERVAL 7 DAY);
            END IF;
    END //







