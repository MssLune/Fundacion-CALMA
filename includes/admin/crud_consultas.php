<?php 
	ob_start(); 
	session_start();

    require_once '../../database/database.php';

$arr='';
	//Reprogramar - Consulta Médico
	if(isset($_POST["cod_consultaMedico"])){
		$pdo = Database::connect();
		$sql = "SELECT * FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON m.usuario_cod = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta WHERE u.id_usuario='".$_POST['cod_consultaMedico']."' AND c.consulta_id = '".$_POST['codigo_consultaId']."'";

	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
		//mostrar datos en modal
		foreach ($arrDatos as $row) {
			$arr = array(
                $row['codigoUser'], //0
                $row['nombre_estadoConsulta'], //1
                $row['estado_consulta'], //2
                $row['fecha_consulta'], //3
                $row['hora_consulta'], //4
                $row['link_medico'], //5
                $row['diagnostico_medico'], //6
                $row['apuntes_medico'], //7
				$row['idUser_med'], //8
				$row['consulta_id'], //9
				$row['codigoMedico'] //10
            );
		}

		echo json_encode($arr);
		unset($arr);
        Database::disconnect();
	}else if(isset($_POST['iduser_medico'])){
		//Actualizar Consulta Médico
		$pdo=Database::connect();

	 	$id_consultaMed=$_POST['id_consulta'];
		$codMedico=$_POST['codigo_med'];
		$id_userMedico=$_POST['iduser_medico'];
		$status_consulta=$_POST['estado_consulta'];
		$fechaConsulta=$_POST['fecha_consulta'];
		$hora_consulta=$_POST['hora_consulta'];
		$link_consulta=$_POST['link_consulta'];
		$diagConsulta=$_POST['diagnosticoConsulta'];
		$apuntesConsulta=$_POST['apuntes_consulta'];

		$sql="UPDATE consulta SET 
		estado_consulta='$status_consulta',
		fecha_consulta='$fechaConsulta',
		hora_consulta='$hora_consulta',
		link_medico='$link_consulta',
		diagnostico_medico='$diagConsulta',
		apuntes_medico='$apuntesConsulta'
		WHERE consulta_id='$id_consultaMed'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='ConsultaMedico_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();

	}else if(isset($_POST["cod_consultaUsuario"])){
		//Reprogramar Consulta Usuario
		$pdo = Database::connect();
		$sql = "SELECT * FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON c.codigoUser = u.id_usuario INNER JOIN especialidades esp ON c.especialidad = esp.especialidad_id WHERE u.id_usuario='".$_POST['cod_consultaUsuario']."' AND c.consulta_id = '".$_POST['cod_consultaId']."'";

	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
		//mostrar datos en modal
		foreach ($arrDatos as $row) {
			$arr = array(
                $row['codigoUser'], //0
                $row['consulta_id'], //1
                $row['codigoMedico'], //2
                $row['idUser_med'], //3
                $row['fecha_consulta'], //4
                $row['hora_consulta'], //5
				$row['nombre_especialidad'], //6
				$row['especialidad_id'], //7
            );
		}

		echo json_encode($arr);
		unset($arr);
        Database::disconnect();
	}else if(isset($_POST['codigo_user'])){
		//Actualizar Consulta Usuario
		$pdo=Database::connect();

	 	$id_consultaUser=$_POST['id_ConsultaUsuario'];
		$codigoUsuario=$_POST['codigo_user'];
		$cod_usuarioMedico=$_POST['codigoUsuario_med'];
		$idMedico=$_POST['id_medico'];
		$especialidad_consultaUser=$_POST['especialidadConsulta'];
		$fechaUser_consulta=$_POST['fecha_consulta'];
		$horaUser_consulta=$_POST['hora_consulta'];

		$sql="UPDATE consulta SET 
		especialidad='$especialidad_consultaUser',
		fecha_consulta='$fechaUser_consulta',
		hora_consulta='$horaUser_consulta'
		WHERE consulta_id='$id_consultaUser'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='ConsultaUsuario_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}else if(isset($_POST['newCons_idUser'])){
		//Nueva Consulta de Usuario
		$pdo=Database::connect();

	 	$newCons_idUsuario = $_POST['newCons_idUser'];
		$newCons_esp = $_POST['newCons_esp'];
		$newCons_med = $_POST['newCons_medico'];
		$newCons_fecha = $_POST['newCons_fecha'];
		$newCons_hora = $_POST['newCons_hora'];

		//Para otros datos del Médico
		$sql2 = "SELECT * FROM usuarios u INNER JOIN medicos m ON u.id_usuario = m.usuario_cod WHERE m.cod_medico='".$newCons_med."'";
		$q2 = $pdo->prepare($sql2);
		$q2->execute(array());
		$data = $q2->fetch(PDO::FETCH_ASSOC);

		$idUsuarioMed = $data['id_usuario'];
		$nameMed = $data['nombres'];
		$paternoMed = $data['apellido_pat'];
		$maternoMed = $data['apellido_mat'];
		$emailMed = $data['correo_user'];
		$telefonoMed = $data['telefono'];

		//Guardar en BD
		$sql = "INSERT INTO `consulta`(`codigoMedico`,`idUser_med`, `codigoUser`,`nombre_pcte`,`ap_pat_pcte`,`ap_mat_pcte`, `email_pcte`,`telf_pcte`,`estado_consulta`, `especialidad`, `fecha_consulta`,`hora_consulta`,`nombre_med`,`ap_pat_med`,`ap_mat_med`,`email_med`,`telefono_consultaMedico`,`fecha_registroConsulta`) VALUES 
			('".$newCons_med."',
			'".$idUsuarioMed."',
			'".$newCons_idUsuario."',
			'".$_SESSION['nombres_nom']."',
			'".$_SESSION['nombres_pat']."',
			'".$_SESSION['nombres_mat']."',
			'".$_SESSION['correo']."',
			'".$_SESSION['telefono']."',
			'1',
			'".$newCons_esp."',
			'".$newCons_fecha."',
			'".$newCons_hora."',
			'".$nameMed."',
			'".$paternoMed."',
			'".$maternoMed."',
			'".$emailMed."',
			'".$telefonoMed."',
			now()
		)";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='New_consulta';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}else if(isset($_POST['id_medUser_result'])){
		//mostrar resultados - médico
		$pdo = Database::connect();
		$sql = "SELECT * FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON m.usuario_cod = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta WHERE u.id_usuario='".$_POST['id_medUser_result']."' AND c.consulta_id = '".$_POST['id_consulta_result']."'";

	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);

		foreach ($arrDatos as $row) {
			$arr = array(
                $row['idUser_med'], //0
                $row['codigoMedico'], //1
                $row['codigoUser'], //2
                $row['diagnostico_medico'], //3
                $row['detalle_diagnostico'], //4
                $row['proxSesionRecomendada'], //5
                $row['apuntes_medico'], //6
				$row['consulta_id'] //7
            );
		}

		echo json_encode($arr);
		unset($arr);
        Database::disconnect();
	}else if(isset($_POST['id_userConsulta'])){
		// Actualizar resultados - Médico
		$pdo = Database::connect();

		$consultaId_result=$_POST['id_userConsulta'];
		$userId_result=$_POST['usuarioId'];
		$medicoID=$_POST['medicoId'];
		$medUser_id=$_POST['idusuario_med'];
		$diagnostico_result=$_POST['result_diag'];
		$detail_result=$_POST['result_detail'];
		$proxSes_result=$_POST['result_proxSesion'];
		$apuntes_result=$_POST['result_apuntes'];

		$sql="UPDATE consulta SET 
		diagnostico_medico='$diagnostico_result',
		detalle_diagnostico='$detail_result',
		proxSesionRecomendada='$proxSes_result',
		apuntes_medico='$apuntes_result'
		WHERE consulta_id='$consultaId_result'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='ResultadosConsultaUsuario_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}else if(isset($_POST['id_usuario_result_user'])){
		//mostrar resultados - usuario
		$pdo = Database::connect();
		$sql = "SELECT * FROM consulta c INNER JOIN usuarios u ON c.codigoUser = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta WHERE c.codigoUser='".$_POST['id_usuario_result_user']."' AND c.consulta_id = '".$_POST['consultId_result_user']."'";

	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);

		foreach ($arrDatos as $row) {
			$arr = array(
                $row['diagnostico_medico'], //0
                $row['detalle_diagnostico'], //1
                $row['proxSesionRecomendada'] //2
            );
		}

		echo json_encode($arr);
		unset($arr);
        Database::disconnect();
	}
?>