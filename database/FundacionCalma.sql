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
INSERT INTO usuarios VALUES ('1', 'JULISSA ANDREA', 'CASTILLO', 'BARRERA','jc@gmail.com',1,'89475632','$2y$10$HPMtkwmdzIIg7mklbuBc9uFg9c/YtXa6VqIT74sR.TXtHrszH99I.','1992-07-28',2,'965478456', 'PERÚ','LIMA', 'SIN CODIGO', 1,1,1,now());
-- seña: gerardo
INSERT INTO usuarios VALUES ('2', 'GERARDO', 'GODOY', 'COLLAO','ggodoy@gmail.com',3,'96748125','$2y$10$Y19dotsKTQ44l3oK0lknL.meEoBB4zBQdVH4sQZ3nJghFznfY.ZZy','1959-07-05',1,'987516987', 'PERÚ','LIMA', 'SIN CODIGO',3, 3,1,now());
-- seña: alejandro
INSERT INTO usuarios VALUES ('3', 'ALEJANDRO MATÍAS', 'MANRIQUEZ', 'ESPINOZA','am@gmail.com',2,'11974012600','$2y$10$Umm8NxkFjBGHuqbSzCe5j.kTidN3jRh6eEghepPx1D1HK4YO6E6Nu','1964-10-17',1,'999879841', 'PERÚ','LIMA', 'SIN CODIGO',4, 2,1,now());
-- seña: danielAmaya123
INSERT INTO usuarios VALUES ('4', 'DANIEL', 'AMAYA', 'CARRANZA','dac@gmail.com',1,'04879870','$2y$10$VcpvlyuS/zxhZZpD5Bq0QuOLGMrlXX2pvSrH8G34h/G6TI00tpQr6','1970-01-01',1,'978412579', 'PERÚ','LIMA','SIN CODIGO', 1,0,1,now());
-- seña: lorena
INSERT INTO usuarios VALUES ('5', 'LORENA', 'CAMPOS', 'VERA','lor@gmail.com',1,'08412249','$2y$10$rPHiMTDhcxdovPQsWgVJA.keEuglt/oKFDjJ1gf7zxGuUCB3bo23q','1950-01-01',2,'986652997', 'PERÚ','LIMA','SIN CODIGO', 2,2,1,now());
-- seña: naomi
INSERT INTO usuarios VALUES ('6', 'NAOMI', 'CAMPBELL', 'CLARK','naomi@hotmail.com',2,'18745100244','$2y$10$dPkNFFLSZaCctuGxyfQuNOtGaPG.cdb2mQvmDHil876F5Jd6naBza','1990-08-22',4,'987141211', 'PERÚ','LIMA','ABVGF129', 1,2,1,now());
-- seña: emma
INSERT INTO usuarios VALUES ('7', 'EMMA', 'WATSON', 'GRANGER','ew@gmail.com',3,'11145782','$2y$10$k8hA2Q5eLplJ1X5/FMixVeworDlbmI7YV0jbPIg1SnUhgJ/mfnnKe','1991-03-30',3,'998769985', 'PERÚ','LIMA', 'SIN CODIGO',1, 3,1,now());

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
	ramaPersonaMedico int(20) not NULL,
	especializacion1 int(20) not NULL,
	especializacion2 int(20),
	gradoMedico int(5) not NULL,
	nro_colegiatura varchar(100),
	experiencia_medico text not null,
	espectativaPersonaMedico text not null,
	calificacion_usuarios varchar(100),
	historialPersonaMedico text
);

INSERT INTO medicos VALUES('1', 3, '', '', 'HUMANISMO', 1, 1, '', 2, '104578', 'Práctica privada y en organizaciones con poblaciones con discapacidad visual', 'Ayudar a las personas a tener una  adecuada salud mental y bienestar en su vida presente.', '', '');
INSERT INTO medicos VALUES('2', 5, '', '', 'HUMANISMO', 5, 2, 3, 2, '105548', 'Práctica privada y en organizaciones con poblaciones con discapacidad visual', 'Ayudar a las personas a tener una  adecuada salud mental y bienestar en su vida presente.', '', '');
INSERT INTO medicos VALUES('3', 6, '', '', 'HUMANISMO', 6, 6, '', 2, '114784', 'Práctica privada y en organizaciones con poblaciones con discapacidad visual', 'Ayudar a las personas a tener una  adecuada salud mental y bienestar en su vida presente.', '', '');


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
INSERT INTO dona_recurrente VALUES ('2', 'PLAN 1', 'MEDITAR', '50', 1);
INSERT INTO dona_recurrente VALUES ('3', 'PLAN 2', 'REFLEXIONAR', '100', 2);
INSERT INTO dona_recurrente VALUES ('4', 'PLAN 3', 'COMPRENDER', '150', 3);

-- Tabla de donaciones esporádicas
CREATE TABLE donaciones_esporadica (
	id_donacionEsporadica int(5) auto_increment primary key,
	idUsuario_donacion int(10) not NULL,
	monto_donacionEsporadica varchar(250) not null,
	testimonio_user text
);

INSERT INTO donaciones_esporadica VALUES ('1', 2, '50.00', '');


-- tabla de convenios
CREATE TABLE convenio (
	id_convenio int(5) auto_increment primary key,
	codigo_convenio varchar(250) not null,
	nombre_convenio varchar(250) not null
);

INSERT INTO convenio VALUES (0, 'SIN CODIGO', 'SIN CONVENIO');
INSERT INTO convenio VALUES (1, 'ABVGF129', 'SANNA');


-- Tabla de países
CREATE TABLE paises (
	id_pais int(5) auto_increment primary key,
	nombre_pais varchar(250) not null
);

INSERT INTO paises VALUES (1, 'PERÚ');
INSERT INTO paises VALUES (2, 'COLOMBIA');
INSERT INTO paises VALUES (3, 'ECUADOR');
INSERT INTO paises VALUES (4, 'BRAZIL');
INSERT INTO paises VALUES (5, 'MÉXICO');
INSERT INTO paises VALUES (6, 'ITALIA');
INSERT INTO paises VALUES (7, 'ARGENTINA');

-- Tabla de ESTADOS
CREATE TABLE estado_ciudad (
	id_estado int(5) auto_increment primary key,
	cod_pais int(5) not null,
	nombre_estado varchar(250) not null
);

INSERT INTO estado_ciudad VALUES (1, 1, 'LIMA');
INSERT INTO estado_ciudad VALUES (2, 7, 'BUENOS AIRES');
INSERT INTO estado_ciudad VALUES (3, 1, 'ICA');
INSERT INTO estado_ciudad VALUES (4, 6, 'MILÁN');


-- Procedimientos Almacenados
DELIMITER $$
CREATE PROCEDURE insertNewMedico(gen_param char(1), param_nombre varchar(250), param_ap_pat varchar(100), param_ap_mat varchar(100), param_email varchar(100), param_tipoDoc int(5), param_nroDoc char(20), param_pass varchar(100), param_nacimiento date, param_sexo int(1), param_telf varchar(50), param_pais varchar(100), param_ciudad varchar(100), param_convenio varchar(250), param_dona int(10), param_priv int(1), param_escuela varchar(100), param_rama int(20), parama_esp1 int(20), parama_esp2 int(20), param_grado int(5), param_nroGrado varchar(100), param_exp text, param_espect text)

BEGIN	
	IF gen_param = 0 THEN
		BEGIN
			DECLARE ultimoUser int(10);
			DECLARE finalUser int(10);
			DECLARE ultimoMed int(10);
			DECLARE finalMed int(10);

			SET ultimoUser = (SELECT u.id_usuario FROM usuarios u ORDER BY u.id_usuario DESC LIMIT 1);
				IF ultimoUser IS NULL OR ultimoUser = '' THEN
					SET finalUser = '1';
				ELSE
					SET finalUser = (ultimoUser+1);
				END IF;

			SET ultimoMed = (SELECT m.cod_medico FROM medicos m ORDER BY m.cod_medico DESC LIMIT 1);
				IF ultimoMed IS NULL OR ultimoMed = '' THEN
					SET finalMed = '1';
				ELSE
					SET finalMed = (ultimoMed+1);
				END IF;
				
			INSERT INTO usuarios VALUES(finalUser, param_nombre, param_ap_pat, param_ap_mat, param_email, param_tipoDoc, param_nroDoc, param_pass, param_nacimiento, param_sexo, param_telf, param_pais, param_ciudad, param_convenio, param_dona, param_priv, 1, now());

			INSERT INTO medicos VALUES(finalMed, finalUser, '', '', param_escuela, param_rama, parama_esp1, parama_esp2, param_grado, param_nroGrado, param_exp, param_espect, '', '');
		END;
	END IF;
END
$$

CREATE PROCEDURE insertNewAdmin(gen_param char(1), param_nombre varchar(250), param_ap_pat varchar(100), param_ap_mat varchar(100), param_email varchar(100), param_tipoDoc int(5), param_nroDoc char(20), param_pass varchar(100), param_nacimiento date, param_sexo int(1), param_telf varchar(50), param_pais varchar(100), param_ciudad varchar(100), param_convenio varchar(250), param_dona int(10), param_priv int(1), param_areaAdm varchar(100))

BEGIN	
	IF gen_param = 1 THEN
		BEGIN
			DECLARE ultimoUser int(10);
			DECLARE finalUser int(10);
			DECLARE ultimoAdm int(10);
			DECLARE finalAdm int(10);

			SET ultimoUser = (SELECT u.id_usuario FROM usuarios u ORDER BY u.id_usuario DESC LIMIT 1);
				IF ultimoUser IS NULL OR ultimoUser = '' THEN
					SET finalUser = '1';
				ELSE
					SET finalUser = (ultimoUser+1);
				END IF;

			SET ultimoAdm = (SELECT adm.cod_admin FROM admin adm ORDER BY adm.cod_admin DESC LIMIT 1);
				IF ultimoAdm IS NULL OR ultimoAdm = '' THEN
					SET finalAdm = '1';
				ELSE
					SET finalAdm = (ultimoAdm+1);
				END IF;
				
			INSERT INTO usuarios VALUES(finalUser, param_nombre, param_ap_pat, param_ap_mat, param_email, param_tipoDoc, param_nroDoc, param_pass, param_nacimiento, param_sexo, param_telf, param_pais, param_ciudad, param_convenio, param_dona, param_priv, 1, now());

			INSERT INTO admin VALUES(finalAdm, finalUser, param_areaAdm);
		END;
	END IF;
END
$$

DELIMITER ;