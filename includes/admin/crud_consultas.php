<?php 
    require_once '../../database/database.php';

$arr='';
	//Reprogramar - Consulta Médico
	if(isset($_POST["cod_medicoConsulta"])){
		$pdo = Database::connect();
		$sql = "SELECT c.consulta_id, c.codigoMedico, c.codigoUser, c.estado_consulta, c.fecha_consulta, c.hora_consulta, c.link_medico, c.diagnostico_medico, c.detalle_diagnostico, c.proxSesionRecomendada, c.apuntes_medico, m.cod_medico, m.usuario_cod, u.id_usuario, u.nombres, u.apellido_pat, u.apellido_mat, u.correo_user, ec.id_estadoConsulta, ec.nombre_estadoConsulta, (SELECT u.id_usuario FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON u.id_usuario = m.usuario_cod WHERE c.codigoMedico = m.cod_medico AND u.privilegio = 2) as 'codigoUserMed' FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON m.usuario_cod = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta WHERE u.id_usuario='".$_POST['cod_medicoConsulta']."'";

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
				$row['codigoUserMed'], //8
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
		//Reporgramar Consulta Usuario
		$pdo = Database::connect();
		$sql = "SELECT c.consulta_id, c.codigoMedico, c.codigoUser, c.especialidad, c.fecha_consulta, c.hora_consulta, m.cod_medico, m.usuario_cod, u.id_usuario, u.nombres, u.apellido_pat, u.apellido_mat, u.correo_user, esp.especialidad_id, esp.nombre_especialidad, (SELECT u.id_usuario FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON u.id_usuario = m.usuario_cod WHERE c.codigoMedico = m.cod_medico AND u.privilegio = 2) as 'codigoUserMed' FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON c.codigoUser = u.id_usuario INNER JOIN especialidades esp ON c.especialidad = esp.especialidad_id WHERE u.id_usuario='".$_POST['cod_consultaUsuario']."'";

	    $busqueda=$pdo->query($sql);
	    $arrDatos=$busqueda->fetchAll(PDO::FETCH_ASSOC);
		//mostrar datos en modal
		foreach ($arrDatos as $row) {
			$arr = array(
                $row['codigoUser'], //0
                $row['consulta_id'], //1
                $row['codigoMedico'], //2
                $row['codigoUserMed'], //3
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
	}
?>