<?php 
    require_once '../../database/database.php';

$arr='';
	//Más info - Usuarios
	if(isset($_POST["cod_user"])){
		$pdo = Database::connect();
		$sql = "SELECT * FROM usuarios u INNER JOIN sexo s ON u.sexo = s.id_genero INNER JOIN tipodocumentoidentidad tdoc ON tdoc.id_tipoDoc = u.tipo_doc INNER JOIN convenio conv ON conv.codigo_convenio = u.id_convenio INNER JOIN dona_recurrente drec ON drec.id_donaRecurrente = u.cod_recurrenteDona WHERE u.id_usuario='".$_POST['cod_user']."'";
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
                $row['actividad'] //18
            );
		}

		echo json_encode($arr);
		unset($arr);
        Database::disconnect();
	}else if(isset($_POST['id_usuario'])){
		//Actualizar Usuario
		$pdo=Database::connect();

	 	$codigo_user=$_POST['id_usuario'];
		$tipoDoc_user=$_POST['tipo_docUser'];
		$num_doc_user=$_POST['numdoc_user'];
		$nombre_user=$_POST['nombre_user'];
		$ape_pat_user=$_POST['apellido_p_user'];
		$ape_mat_user=$_POST['apellido_m_user'];
		$correo_user=$_POST['correo_user'];
		$nacimiento_user=$_POST['fecha_nac_user'];
		$sexo_user=$_POST['sexo_user'];
		$telf_user=$_POST['telefono_user'];
		$pais_user=$_POST['pais_user'];
		$ciudad_user=$_POST['ciudad_user'];
		$activ_user=$_POST['activ_user'];
		$donacion_user=$_POST['dona_user'];

		$sql="UPDATE usuarios SET 
		nombres='$nombre_user',
		apellido_pat='$ape_pat_user',
		apellido_mat='$ape_mat_user',
		correo_user='$correo_user',
		tipo_doc='$tipoDoc_user',
		nro_doc='$num_doc_user',
		fecha_nacimiento='$nacimiento_user',
		sexo='$sexo_user',
		telefono='$telf_user',
		pais='$pais_user',
		estado_lugar='$ciudad_user',
		cod_recurrenteDona='$donacion_user',
		actividad='$activ_user' 
		WHERE id_usuario='$codigo_user'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='Usuario_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();

	}else if(isset($_POST["elimina_user"])){
		//Eliminar Usuario
		$codigo_user=$_POST["elimina_user"];

		$pdo = Database::connect();
		
		$sql = "DELETE FROM usuarios WHERE id_usuario = ".$codigo_user."";
		
		$pdo->query($sql);
		
		$arr = array("Eliminado_user");

		echo json_encode($arr);
		unset($arr);
		Database::disconnect();

	}else{
		//Nuevo Usuario
		$pdo=Database::connect();
		
		$rolUser=$_POST['rolUser'];
		$userNombres=$_POST['newUser_nombres'];
		$userPaterno=$_POST['newUser_paterno'];
		$userMaterno=$_POST['newUser_materno'];
		$userEmail=$_POST['newUser_email'];
		$user_tipoDoc=$_POST['newUser_tipoDoc'];
		$user_nroDoc=$_POST['newUser_nroDoc'];
		$userNacimiento=$_POST['newUser_nacimiento'];
		$userPais=$_POST['newUser_pais'];
		$userCiudad=$_POST['newUser_ciudad'];
		$userTelf=$_POST['newUser_telf'];
		$userSexo=$_POST['newUser_sexo'];
		$userDonacion=$_POST['newUser_dona'];

		//password sin hash
		$userPassSinHash=$_POST['newUser_pass'];
		//password con hash
		$userPassword = password_hash($userPassSinHash, PASSWORD_BCRYPT);
	
		//convenio vacío
		if($_POST['newUser_convenio'] == ''){
			$userConvenio = 'SIN CODIGO';
		}else{
			$userConvenio = $_POST['newUser_convenio'];
		}

		$sql = "INSERT INTO `usuarios`(`nombres`, `apellido_pat`, `apellido_mat`, `correo_user`, `tipo_doc`,`nro_doc`,`pass`,`fecha_nacimiento`,`sexo`, `telefono`, `pais`, `estado_lugar`, `id_convenio`, `cod_recurrenteDona`,`privilegio`,`actividad`, `fecha_registro`) VALUES 
			('".$userNombres."',
			'".$userPaterno."',
			'".$userMaterno."',
			'".$userEmail."',
			'".$user_tipoDoc."',
			'".$user_nroDoc."',
			'".$userPassword."',
			'".$userNacimiento."',
			'".$userSexo."',
			'".$userTelf."',
			'".$userPais."',
			'".$userCiudad."',
			'".$userConvenio."',
			'".$userDonacion."',
			'".$rolUser."',
			1,
			now()
		)";

		$q = $pdo->prepare($sql);
		$q->execute(array());
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();

		header('Location: ../../administrarUsers.php');
	}
?>