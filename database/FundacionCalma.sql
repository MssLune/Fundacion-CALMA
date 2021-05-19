CREATE DATABASE fundacioncalma;
USE fundacioncalma;

CREATE TABLE usuarios (
    id_usuario int(10) auto_increment primary key,
	nombres varchar(250) not null,
	apellido_pat varchar(100) not null,
	apellido_mat varchar(100) not null,
	correo_user varchar(100) not null,
	pass varchar(100) not null,
	sexo int(1) not null, -- 1 = Masculino, 2 = Femenino
	telefono varchar(50) not null,
    pais varchar(100) not null,
    estado varchar(100) not null,
    id_convenio varchar(250),
	actividad boolean not null, -- 0 = Inactivo, 1 = Activo
	privilegio int(1) not NULL,
	fecha_registro datetime not null
);

-- seña: july123
INSERT INTO usuarios VALUES ('1', 'JULISSA ANDREA', 'CASTILLO', 'BARRERA','jc@gmail.com','$2y$10$HPMtkwmdzIIg7mklbuBc9uFg9c/YtXa6VqIT74sR.TXtHrszH99I.',2,'965478456', 'PERÚ','LIMA', '', 1,0,now());


CREATE TABLE privilegios (
    cod_privilegio int(5) auto_increment primary key,
	nombre_priv varchar(250) not null
);

INSERT INTO privilegios VALUES ('0', 'ADMINISTRADOR');
INSERT INTO privilegios VALUES ('1', 'PSICOLOGO');
INSERT INTO privilegios VALUES ('2', 'USUARIO');


-- PROCEDIMIENTOS ALMACENADOS
DELIMITER $$
CREATE PROCEDURE procedimiento_login(v_usuario VARCHAR(100), v_password VARCHAR(100))  
BEGIN
DECLARE v_codusuario varchar(100);
SET v_codusuario = (SELECT id_usuario FROM usuarios WHERE correo_user = v_usuario AND pass = v_password);
IF v_codusuario = '' OR v_codusuario IS NULL THEN
	SELECT 'Error' nombre;
ELSE
	SELECT id_usuario 'id_user', nombres 'nombres', apellido_pat 'apepat', apellido_mat 'apemat', privilegio 'privilegio', correo_user 'correo_username', sexo 'sexo', telefono 'telf', id_convenio 'convenio_id', pais 'pais', estado 'estado', actividad 'estado_actividad'
    FROM usuarios
    WHERE id_usuario = v_codusuario;
END IF;
END
$$

DELIMITER ; 