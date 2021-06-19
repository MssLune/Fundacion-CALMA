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
	}/*else if(isset($_POST['cod_persona'])){
		//actualizar
		$pdo=Database::connect();
	 	$codigo_p=$_POST['cod_persona'];
		$tip_doc=$_POST['tip_doc'];
		$num_doc=$_POST['numdoc'];
		$nombre=$_POST['nombre'];
		$ape_pa=$_POST['apellido_p'];
		$ape_ma=$_POST['apellido_m'];
		$est_c=$_POST['estado_c'];
		$fecha_n=$_POST['fecha_n'];
		$sexo=$_POST['sexo'];
		$dire=$_POST['direccion'];
		$num_celular=$_POST['telef'];
		$correo=$_POST['correo'];
		$depart=$_POST['departamento'];
		$tipo_pers=$_POST['tipo_p'];

		$sql="UPDATE personas SET 
		nombre_completo='$nombre',
		apellido_p='$ape_pa',
		apellido_m='$ape_ma',
		estado_civil='$est_c',
		fecha_nacimiento='$fecha_n',
		sexo='$sexo',
		tip_doc='$tip_doc',
		num_doc='$num_doc',
		correo='$correo',
		ubigeo_cod='$depart',
		direccion='$dire',
		telefono='$num_celular',
		privilegio='$tipo_pers' 
		WHERE cod_persona='$codigo_p'";

		$q = $pdo->prepare($sql);
		$q->execute(array());
		$arr='Actualizado';
		echo json_encode($arr);
		unset($arr);
		Database::disconnect();

	}else if(isset($_POST["elimina_tra"])){
		//eliminar
		$codi=$_POST["elimina_tra"];
		$pdo = Database::connect();
	    $sql = "UPDATE personas SET estado= 0 where cod_persona = '".$codi."'";
		$pdo->query($sql);
		$arr = array("Eliminado");
		echo json_encode($arr);
		unset($arr);
		Database::disconnect();

	}else{
		//registrar
		date_default_timezone_set('America/Lima');
		setlocale(LC_ALL,"ES_ES");

		$pdo=Database::connect();
		
		$tipo_emple=$_POST['empleado'];
		$tip_doc=$_POST['tipdoc'];
		$num_doc=$_POST['numdoc'];
		$nombre=$_POST['nombre'];
		$ape_pa=$_POST['apellido_p'];
		$ape_ma=$_POST['apellido_m'];
		$est_c=$_POST['estado_civil'];
		$fecha_n=$_POST['fecha_n'];
		$sexo=$_POST['sexo'];
		$dire=$_POST['direccion'];
		$num_celular=$_POST['telef'];
		$correo=$_POST['correo'];
		$cod_dist=$_POST['departamento'];

		$sql = "CALL generar_id 
			('0',
			'".$nombre."',
			'".$ape_pa."',
			'".$ape_ma."',
			'".$est_c."',
			'".$fecha_n."',
			'".$sexo."',
			'".$tip_doc."',
			'".$num_doc."',
			'".$correo."',
			'".$cod_dist."',
			'".$dire."',
			'".$num_celular."',
			'".$tipo_emple."'
			)";

		$q = $pdo->prepare($sql);
		$q->execute(array());
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		if ($_POST['rd']=='1') {
			header('Location: tabla_registros.php');
		}else if ($_POST['rd']=='2') {
			header('Location: tabla_doctores.php');
		}else{
			header('Location: tabla_pacientes.php');
		}
	}*/
?>