<?php 
require_once '../../database/database.php';

if (isset($_POST["nombres_r"])) {
	$pdo = Database::connect();

    //password sin hash
    $passSinHash = $_POST['pass_r'];
    //password con hash
    $password = password_hash($passSinHash, PASSWORD_BCRYPT);
	
	$sql = "INSERT INTO `usuarios`(`nombres`, `apellido_pat`, `apellido_mat`, `correo_user`, `tipo_doc`,`nro_doc`,`pass`,`fecha_nacimiento`,`sexo`, `telefono`, `pais`, `estado_lugar`, `id_convenio`, `cod_recurrenteDona`,`privilegio`,`actividad`, `fecha_registro`) VALUES 
		('".$_POST['nombres_r']."',
		'".$_POST['paterno_r']."',
		'".$_POST['materno_r']."',
		'".$_POST['email_r']."',
		'".$_POST['tipoDoc_r']."',
		'".$_POST['nroDoc_r']."',
		'".$password."',
		'".$_POST['fechaNacimiento_r']."',
		'".$_POST['genero_r']."',
		'".$_POST['celular_r']."',
		'".$_POST['pais_r']."',
		'".$_POST['estado_r']."',
		'".$_POST['convenio_r']."',
		1,
		3,
		1,
		now()
		)";
	$q = $pdo->query($sql);
	/*error_log(
		$_POST['nombres_r'].' '.
		$_POST['paterno_r'].' '.
		$_POST['materno_r'].' '.
		$_POST['email_r'].' '.
		$password.' '.
		$_POST['genero_r'].' '.
		$_POST['celular_r'].' '.
		$_POST['pais_r'].' '.
		$_POST['estado_r'].' '.
		$_POST['convenio_r']);*/
	echo json_encode("Registrado");
}

?>