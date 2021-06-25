<?php 
    require_once '../../database/database.php';

$arr='';
	//Editar -- Mi Perfil
	if(isset($_POST["id_perfil"])){
		$pdo=Database::connect();

	 	$codigo_perfil=$_POST['id_perfil'];
		$nombre_perfil=$_POST['nombre_perfil'];
		$ape_pat_perfil=$_POST['paterno_perfil'];
		$ape_mat_perfil=$_POST['materno_perfil'];
		$telf_perfil=$_POST['telf_perfil'];
		$nroDoc_perfil=$_POST['numdoc_perfil'];
		$pais_perfil=$_POST['pais_perfil'];
		$ciudad_perfil=$_POST['ciudad_perfil'];
		$nacimiento_perfil=$_POST['nacimiento_perfil'];
		$sexo_perfil=$_POST['sexo_perfil'];

		$sql="UPDATE usuarios SET 
		nombres='$nombre_perfil',
		apellido_pat='$ape_pat_perfil',
		apellido_mat='$ape_mat_perfil',
		nro_doc='$nroDoc_perfil',
		fecha_nacimiento='$nacimiento_perfil',
		sexo='$sexo_perfil',
		telefono='$telf_perfil',
		pais='$pais_perfil',
		estado_lugar='$ciudad_perfil'
		WHERE id_usuario='$codigo_perfil'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='miPerfil_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}else if(isset($_POST['id_cuenta_email'])){
		//Editar -- Mi cuenta : Email
		$pdo=Database::connect();

	 	$codigo_cuenta=$_POST['id_cuenta_email'];
		$email_cuenta=$_POST['email_cuenta'];

		$sql="UPDATE usuarios SET 
		correo_user='$email_cuenta'
		WHERE id_usuario='$codigo_cuenta'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='CorreoCuenta_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}else if(isset($_POST['id_cuenta_pass'])){
		//Editar -- Mi cuenta : Password
		$pdo=Database::connect();

	 	$cod_cuenta=$_POST['id_cuenta_pass'];

		 //Password sin Hash
		$passSinHash_cuenta=$_POST['pass_cuenta'];
		//password con hash
		$pass_cuentaHash = password_hash($passSinHash_cuenta, PASSWORD_BCRYPT);

		$sql="UPDATE usuarios SET 
		pass='$pass_cuentaHash'
		WHERE id_usuario='$cod_cuenta'";

		$q = $pdo->prepare($sql);
		$q->execute(array());

		$arr='PassCuenta_actualizado';

		echo json_encode($arr);
		unset($arr);

		Database::disconnect();
	}
?>