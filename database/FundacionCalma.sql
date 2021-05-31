CREATE DATABASE fundacioncalma;
USE fundacioncalma;


-- Tabla Usuarios (en general)
CREATE TABLE usuarios (
    id_usuario int(10) auto_increment primary key,
	nombres varchar(250) not null,
	apellido_pat varchar(100) not null,
	apellido_mat varchar(100) not null,
	correo_user varchar(100) not null,
	tipo_doc int(5) not null, -- 1=DNI, 2=Pasaporte, 3=carné extranjería
	nro_doc char(20) not null,
	pass varchar(100) not null,
	fecha_nacimiento date not null,
	sexo int(1) not null, -- 1 = Masculino, 2 = Femenino, 3=No binario, 4=prefiero no decir
	telefono varchar(50) not null,
    pais varchar(100) not null,
    estado_lugar varchar(100) not null,
    id_convenio varchar(250),
	privilegio int(1) not NULL,
	actividad boolean not null, -- 0 = Inactivo, 1 = Activo
	fecha_registro datetime not null
);

-- seña: july123
INSERT INTO usuarios VALUES ('1', 'JULISSA ANDREA', 'CASTILLO', 'BARRERA','jc@gmail.com',1,'89475632','$2y$10$HPMtkwmdzIIg7mklbuBc9uFg9c/YtXa6VqIT74sR.TXtHrszH99I.','1992-07-28',2,'965478456', 'PERÚ','LIMA', '', 1,1,now());
INSERT INTO usuarios VALUES ('2', 'GERARDO', 'GODOY', 'COLLAO','ggodoy@gmail.com',3,'96748125','$2y$10$Y19dotsKTQ44l3oK0lknL.meEoBB4zBQdVH4sQZ3nJghFznfY.ZZy','1959-07-05',1,'987516987', 'PERÚ','LIMA', '', 3,1,now());
INSERT INTO usuarios VALUES ('3', 'ALEJANDRO MATÍAS', 'MANRIQUEZ', 'ESPINOZA','am@gmail.com',2,'11974012600','$2y$10$Umm8NxkFjBGHuqbSzCe5j.kTidN3jRh6eEghepPx1D1HK4YO6E6Nu','1964-10-17',1,'999879841', 'PERÚ','LIMA', '', 2,1,now());
-- seña: danielAmaya123
INSERT INTO usuarios VALUES ('4', 'DANIEL', 'AMAYA', 'CARRANZA','dac@gmail.com',1,'04879870','$2y$10$VcpvlyuS/zxhZZpD5Bq0QuOLGMrlXX2pvSrH8G34h/G6TI00tpQr6','1970-01-01',1,'978412579', 'PERÚ','LIMA', '', 0,1,now());


-- Tabla Admin (inner join con tabla usuarios)
CREATE TABLE admin (
	cod_admin int(10) auto_increment primary key,
	usuario_id int(10) not NULL,
	carrera_admin varchar(100) not null,
	area_admin varchar(100) not null
);

INSERT INTO admin VALUES('1', 1, 'INGENIERÍA DE SISTEMAS', 'AUTOMATIZACIÓN DIGITAL');
INSERT INTO admin VALUES('2', 4, 'MASTER', 'MASTER');


-- Tabla rubros (inner join con tabla usuarios): actualmente solo para Psicólogos
CREATE TABLE rubros (
	cod_personaRubro int(10) auto_increment primary key,
	usuario_cod int(10) not NULL,
	motivo_inactividad text,
	wpp_link varchar(100),
	escuela_personaRubro varchar(100) not NULL,
	ramaPersonaRubro varchar(100) not NULL,
	especializacion1 varchar(100),
	especializacion2 varchar(100),
	gradoPersonaRubro int(5) not NULL,
	nro_colegiatura varchar(100),
	experiencia_personaRubro text not null,
	espectativaPersonaRubro text not null,
	calificacion_usuarios varchar(100),
	historialPersonaRubro text
);

INSERT INTO rubros VALUES('1', 3, '', '', 'HUMANISMO', 'PSICOLOGÍA CLÍNICA', 'TERAPIA FAMILIAR', '', 2, '104578', 'Práctica privada y en organizaciones con poblaciones con discapacidad visual', 'Ayudar a las personas a tener una  adecuada salud mental y bienestar en su vida presente.', '', '');


CREATE TABLE privilegios (
    cod_privilegio int(5) auto_increment primary key,
	nombre_privilegio varchar(250) not null
);

INSERT INTO privilegios VALUES ('0', 'ADMIN MASTER');
INSERT INTO privilegios VALUES ('1', 'ADMINISTRADOR');
INSERT INTO privilegios VALUES ('2', 'PSICOLOGO');
INSERT INTO privilegios VALUES ('3', 'USUARIO');

CREATE TABLE sexo (
	id_genero int(5) auto_increment primary key,
	nombre_genero varchar(250) not null
);

INSERT INTO sexo VALUES ('1', 'MASCULINO');
INSERT INTO sexo VALUES ('2', 'FEMENINO');
INSERT INTO sexo VALUES ('3', 'NO BINARIO');
INSERT INTO sexo VALUES ('4', 'PREFIERO NO DECIR');

CREATE TABLE tipoDocumentoIdentidad (
	id_tipoDoc int(5) auto_increment primary key,
	nombre_tipoDoc varchar(250) not null,
	longitud_digitos int(20) not null
);

INSERT INTO tipoDocumentoIdentidad VALUES ('1', 'DNI', 8);
INSERT INTO tipoDocumentoIdentidad VALUES ('2', 'PASAPORTE', 11);
INSERT INTO tipoDocumentoIdentidad VALUES ('3', 'CARNE DE EXTRANJERIA', 8);

CREATE TABLE grado_persona (
	grado_id int(5) auto_increment primary key,
	nombre_grado varchar(250) not null
);

INSERT INTO grado_persona VALUES ('1', 'LICENCIATURA');
INSERT INTO grado_persona VALUES ('2', 'COLEGIATURA');


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