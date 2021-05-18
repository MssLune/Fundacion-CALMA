<?php 
require_once '../../database/database.php';

if (isset($_POST["nombres_r"])) {
	$pdo = Database::connect();

    //password sin hash
    $passSinHash = $_POST['pass_r'];
    //password con hash
    $password = hash('sha256', $passSinHash);

	$sql = "INSERT INTO `usuarios`(`nombres`, `apellido_pat`, `apellido_mat`, `correo_user`, `pass`, `sexo`, `telefono`, `pais`, `estado`, `id_convenio`, `actividad`, `privilegio`, `fecha_registro`) VALUES 
	('".$_POST['nombres_r']."',
	'".$_POST['paterno_r']."',
	'".$_POST['materno_r']."',
	'".$_POST['email_r']."',
	'".$password."',
	'".$_POST['genero_r']."',
	'".$_POST['celular_r']."',
	'".$_POST['pais_r']."',
	'".$_POST['estado_r']."',
	'".$_POST['convenio_r']."',
	1,
	2,
	now())";
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