<?php 
    require_once '../../database/database.php';

$arr='';
	//Más info - Médicos
	if(isset($_POST["cod_userMedico"])){
		$pdo = Database::connect();
		$sql = "SELECT * FROM usuarios u INNER JOIN medicos m ON u.id_usuario = m.usuario_cod INNER JOIN sexo s ON u.sexo = s.id_genero INNER JOIN tipodocumentoidentidad tdoc ON tdoc.id_tipoDoc = u.tipo_doc INNER JOIN grado_persona gp ON m.gradoMedico = gp.grado_id INNER JOIN convenio conv ON conv.codigo_convenio = u.id_convenio INNER JOIN dona_recurrente drec ON drec.id_donaRecurrente = u.cod_recurrenteDona INNER JOIN ramas ram ON ram.rama_id = m.ramaPersonaMedico INNER JOIN especialidades esp ON esp.especialidad_id IN (m.especializacion1, m.especializacion2) WHERE u.id_usuario='".$_POST['cod_userMedico']."'";
	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
		foreach ($arrDatos as $row) {
			$arr = array(
                $row['id_usuario'], //0
                $row['nombres'], //1
                $row['apellido_pat'], //2
                $row['apellido_mat'], //3
                $row['correo_user'], //4
                $row['tipo_doc'], //5
                $row['nombre_tipoDoc'], //6
                $row['nro_doc'], //7
                $row['fecha_nacimiento'], //8
                $row['sexo'], //9
                $row['nombre_genero'], //10
                $row['telefono'], //11
                $row['pais'], //12
                $row['estado_lugar'], //13
                $row['id_convenio'], //14
                $row['nombre_convenio'], //15
                $row['cod_recurrenteDona'], //16
                $row['nombre_donaRecurrente'], //17
                $row['actividad'], //18
                $row['escuela_medico'], //19
                $row['ramaPersonaMedico'], //20
                $row['nombre_rama'], //21
                $row['especializacion1'], //22
                $row['especializacion2'], //23
                $row['nombre_especialidad'], //24
                $row['gradoMedico'], //25
                $row['nombre_grado'], //26
                $row['nro_colegiatura'], //27
                $row['experiencia_medico'], //28
                $row['calificacion_usuarios'] //29
            );
		}

		echo json_encode($arr);
		unset($arr);
        Database::disconnect();
	}else if(isset($_POST['idUser_medico'])){
		//Actualizar Médico
		$pdo=Database::connect();

	 	$codigo_med=$_POST['idUser_medico'];
		$tipoDoc_med=$_POST['tipo_docMed'];
		$num_doc_med=$_POST['numdoc_med'];
		$nombre_med=$_POST['nombre_med'];
		$ape_pat_med=$_POST['apellido_p_med'];
		$ape_mat_med=$_POST['apellido_m_med'];
		$correo_med=$_POST['correo_med'];
		$nacimiento_med=$_POST['fecha_nac_med'];
		$sexo_med=$_POST['sexo_med'];
		$telf_med=$_POST['telefono_med'];
		$pais_med=$_POST['pais_med'];
		$ciudad_med=$_POST['ciudad_med'];
		$activ_med=$_POST['activ_med'];
		$donacion_med=$_POST['dona_med'];

		$sql="UPDATE usuarios SET 
		nombres='$nombre_med',
		apellido_pat='$ape_pat_med',
		apellido_mat='$ape_mat_med',
		correo_user='$correo_med',
		tipo_doc='$tipoDoc_med',
		nro_doc='$num_doc_med',
		fecha_nacimiento='$nacimiento_med',
		sexo='$sexo_med',
		telefono='$telf_med',
		pais='$pais_med',
		estado_lugar='$ciudad_med',
		cod_recurrenteDona='$donacion_med',
		actividad='$activ_med' 
		WHERE id_usuario='$codigo_med'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='Medico_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();

	}else if(isset($_POST["elimina_medico"])){
		//Eliminar MÉDICO
		$codigo_med=$_POST["elimina_medico"];

		$pdo = Database::connect();
		
		$sql = "DELETE usuarios, medicos FROM usuarios INNER JOIN medicos ON medicos.usuario_cod = usuarios.id_usuario WHERE usuarios.id_usuario = ".$codigo_med."";

		$pdo->query($sql);
		error_log($sql);
		$arr = array("Eliminado_medico");

		echo json_encode($arr);
		unset($arr);
		Database::disconnect();

	}else{
		//Nuevo Medico
		$pdo=Database::connect();
		
		//para tabla usuarios
		$rolMed=$_POST['rolUserMed'];
		$medNombres=$_POST['newMed_nombres'];
		$medPaterno=$_POST['newMed_paterno'];
		$medMaterno=$_POST['newMed_materno'];
		$medEmail=$_POST['newMed_email'];
		$med_tipoDoc=$_POST['newMed_tipoDoc'];
		$med_nroDoc=$_POST['newMed_nroDoc'];
		$medNacimiento=$_POST['newMed_nacimiento'];
		$medPais=$_POST['newMed_pais'];
		$medCiudad=$_POST['newMed_ciudad'];
		$medTelf=$_POST['newMed_telf'];
		$medSexo=$_POST['newMed_sexo'];
		$medDonacion=$_POST['newMed_dona'];

		//password sin hash
		$medPassSinHash=$_POST['newMed_pass'];
		//password con hash
		$medPassword = password_hash($medPassSinHash, PASSWORD_BCRYPT);
	
		//convenio vacío
		if($_POST['newMed_convenio'] == ''){
			$medConvenio = 'SIN CODIGO';
		}else{
			$medConvenio = $_POST['newMed_convenio'];
		}

		//para tabla medicos
		$medEscuela=$_POST['newMed_escuela'];
		$medRama=$_POST['newMed_rama'];
		$medEsp1=$_POST['newMed_esp1'];
		$medEsp2=$_POST['newMed_esp2'];
		$medGrado=$_POST['newMed_grado'];
		$medNroGrado=$_POST['newMed_nroGrado'];
		$medExp=$_POST['newMed_experiencia'];
		$medEspect=$_POST['newMed_espectativa'];

		$sql = "CALL insertNewMedico 
			('0',
			'".$medNombres."',
			'".$medPaterno."',
			'".$medMaterno."',
			'".$medEmail."',
			'".$med_tipoDoc."',
			'".$med_nroDoc."',
			'".$medPassword."',
			'".$medNacimiento."',
			'".$medSexo."',
			'".$medTelf."',
			'".$medPais."',
			'".$medCiudad."',
			'".$medConvenio."',
			'".$medDonacion."',
			'".$rolMed."',
			'".$medEscuela."',
			'".$medRama."',
			'".$medEsp1."',
			'".$medEsp2."',
			'".$medGrado."',
			'".$medNroGrado."',
			'".$medExp."',
			'".$medEspect."'
		)";

		$q = $pdo->prepare($sql);
		$q->execute(array());
		$data = $q->fetch(PDO::FETCH_ASSOC);
		error_log($sql);
		Database::disconnect();

		header('Location: ../../administrarMedicos.php');
	}
?>