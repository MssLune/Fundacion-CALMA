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
	cod_recurrenteDona int(10),
	privilegio int(1) not NULL,
	actividad boolean not null, -- 0 = Inactivo, 1 = Activo
	fecha_registro datetime not null
);

-- seña: july123
INSERT INTO usuarios VALUES ('1', 'JULISSA ANDREA', 'CASTILLO', 'BARRERA','jc@gmail.com',1,'89475632','$2y$10$HPMtkwmdzIIg7mklbuBc9uFg9c/YtXa6VqIT74sR.TXtHrszH99I.','1992-07-28',2,'965478456', 'PERÚ','LIMA', '', 1,1,1,now());
INSERT INTO usuarios VALUES ('2', 'GERARDO', 'GODOY', 'COLLAO','ggodoy@gmail.com',3,'96748125','$2y$10$Y19dotsKTQ44l3oK0lknL.meEoBB4zBQdVH4sQZ3nJghFznfY.ZZy','1959-07-05',1,'987516987', 'PERÚ','LIMA', '',1, 3,1,now());
INSERT INTO usuarios VALUES ('3', 'ALEJANDRO MATÍAS', 'MANRIQUEZ', 'ESPINOZA','am@gmail.com',2,'11974012600','$2y$10$Umm8NxkFjBGHuqbSzCe5j.kTidN3jRh6eEghepPx1D1HK4YO6E6Nu','1964-10-17',1,'999879841', 'PERÚ','LIMA', '',1, 2,1,now());
-- seña: danielAmaya123
INSERT INTO usuarios VALUES ('4', 'DANIEL', 'AMAYA', 'CARRANZA','dac@gmail.com',1,'04879870','$2y$10$VcpvlyuS/zxhZZpD5Bq0QuOLGMrlXX2pvSrH8G34h/G6TI00tpQr6','1970-01-01',1,'978412579', 'PERÚ','LIMA',1, '', 0,1,now());


-- Tabla Admin (inner join con tabla usuarios)
CREATE TABLE admin (
	cod_admin int(10) auto_increment primary key,
	usuario_id int(10) not NULL,
	area_admin varchar(100) not null
);

INSERT INTO admin VALUES('1', 1, 'AUTOMATIZACIÓN DIGITAL');
INSERT INTO admin VALUES('2', 4, 'MASTER');


-- Tabla medicos (inner join con tabla usuarios): actualmente solo para Psicólogos
CREATE TABLE medicos (
	cod_medico int(10) auto_increment primary key,
	usuario_cod int(10) not NULL,
	motivo_inactividad text,
	wpp_link varchar(100),
	escuela_medico varchar(100) not NULL,
	ramaPersonaMedico varchar(100) not NULL,
	especializacion1 varchar(100),
	especializacion2 varchar(100),
	gradoMedico int(5) not NULL,
	nro_colegiatura varchar(100),
	experiencia_medico text not null,
	espectativaPersonaMedico text not null,
	calificacion_usuarios varchar(100),
	historialPersonaMedico text
);

INSERT INTO medicos VALUES('1', 3, '', '', 'HUMANISMO', 'PSICOLOGÍA CLÍNICA', 'TERAPIA FAMILIAR', '', 2, '104578', 'Práctica privada y en organizaciones con poblaciones con discapacidad visual', 'Ayudar a las personas a tener una  adecuada salud mental y bienestar en su vida presente.', '', '');


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

-- tabla especialidades
CREATE TABLE especialidades (
	especialidad_id int(5) auto_increment primary key,
	nombre_especialidad varchar(250) not null
);

INSERT INTO especialidades VALUES ('1', 'TERAPIA FAMILIAR');
INSERT INTO especialidades VALUES ('2', 'PSICOLOGÍA INFANTOJUVENIL');
INSERT INTO especialidades VALUES ('3', 'PSICOLOGÍA COMUNITARIA');
INSERT INTO especialidades VALUES ('4', 'TERAPIA COGNITIVO-CONDUCTUAL');
INSERT INTO especialidades VALUES ('5', 'CLÍNICA Y DE SALUD');
INSERT INTO especialidades VALUES ('6', 'TERAPIA DE PAREJAS');
INSERT INTO especialidades VALUES ('7', 'TRASTORNOS DE LA CONDUCTA ALIMENTARIA');

-- tabla RAMAS
CREATE TABLE ramas (
	rama_id int(5) auto_increment primary key,
	cod_especialidad int(5) not NULL,
	nombre_rama varchar(250) not null
);

INSERT INTO ramas VALUES ('1','5', 'PSICOLOGÍA CLÍNICA');
INSERT INTO ramas VALUES ('2','5', 'PSICOLOGÍA EDUCATIVA');
INSERT INTO ramas VALUES ('3','2', 'PSICOLOGÍA SOCIAL');
INSERT INTO ramas VALUES ('4','1', 'PSICOLOGÍA EDUCATIVA');
INSERT INTO ramas VALUES ('5','3', 'PSICOLOGÍA LABORAL');
INSERT INTO ramas VALUES ('6','6', 'PSICOLOGÍA FAMILIAR');

-- Tabla consulta (inner join con tabla usuarios a la vez inner join con tabla medicos)
CREATE TABLE consulta (
	consulta_id int(5) auto_increment primary key,
	codigoMedico int(10) not NULL,
	codigoUser int(10) not NULL,
	estado_consulta int(10) not NULL, 
	especialidad int(20) not NULL, 
	fecha_consulta date, 
	hora_consulta time,
	link_medico varchar(250),
	telefono_consultaMedico varchar(50),
	diagnostico_medico text,
	detalle_diagnostico text,
	proxSesionRecomendada text,
	apuntes_medico text,
	fecha_registroConsulta datetime not null
);

INSERT INTO consulta VALUES ('1', '1', '2', 1,5,'2021-06-15','09:00:00','','','','','','',now());


CREATE TABLE estado_consulta (
	id_estadoConsulta int(5) auto_increment primary key,
	nombre_estadoConsulta varchar(250) not null
);

INSERT INTO estado_consulta VALUES ('1', 'PENDIENTE');
INSERT INTO estado_consulta VALUES ('2', 'CANCELADA');
INSERT INTO estado_consulta VALUES ('3', 'FINALIZADA');

-- Tabla de donadores recurrentes
CREATE TABLE dona_recurrente (
	id_donaRecurrente int(5) auto_increment primary key,
	plan_donaRecurrente varchar(250) not null,
	nombre_donaRecurrente varchar(250) not null,
	precio_donaRecurrente varchar(250) not null,
	cantidadCitas_donaRecurrente int(10) not null
);

INSERT INTO dona_recurrente VALUES ('1', 'SIN PLAN', '-', '0', 1);
INSERT INTO dona_recurrente VALUES ('2', 'PLAN 1', 'CASA DE LA CALMA', '100', 3);
INSERT INTO dona_recurrente VALUES ('3', 'PLAN 2', 'MENTE EN CALMA', '200', 5);
INSERT INTO dona_recurrente VALUES ('4', 'PLAN 3', 'CALMA CONTINUA', '300', 8);

-- Tabla de donaciones esporádicas
CREATE TABLE donaciones_esporadica (
	id_donacionEsporadica int(5) auto_increment primary key,
	idUsuario_donacion int(10) not NULL,
	monto_donacionEsporadica varchar(250) not null,
	testimonio_user text
);

INSERT INTO donaciones_esporadica VALUES ('1', 2, '50.00', '');
