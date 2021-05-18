<?php
//iniciar componentes de sesión
ob_start(); 
session_start();

require_once '../../database/database.php';


if(isset($_POST['email_user'])){ 
    $username = $_POST['email_user'];
}else{
    $username = '';
}
if(isset($_POST['password_user'])){
    $password = $_POST['password_user'];
}else{
    $password = '';
}

$_SESSION['Logueado'] = false;

$pdo1 = Database::connect();
//Uso Procedimiento Almacenado
$sql1 = "CALL procedimiento_login 
        ('".$username."',
            '".$password."'
        )";
$qr = $pdo1->prepare($sql1);
$qr->execute(array());
$dato = $qr->fetch(PDO::FETCH_ASSOC);
Database::disconnect();

if ($dato['estado_actividad'] == 1) {
    $_SESSION['nombres'] = $dato['nombres']." ".$dato['apepat']." ".$dato['apemat'];
    $_SESSION['privilegio'] = $dato['privilegio'];
    $_SESSION['username'] = $dato['correo_username'];
    $_SESSION['codUsuario'] = $dato['id_user'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
    $_SESSION['correo']=$dato['correo_username'];
    $_SESSION['telefono']=$dato['telf'];
    $_SESSION['genero']=$dato['sexo'];
    $_SESSION['convenio']=$dato['convenio_id'];
    $_SESSION['pais']=$dato['pais'];
    $_SESSION['estado']=$dato['estado'];

    if($_SESSION['privilegio'] == 0 || $_SESSION['privilegio'] == 1 || $_SESSION['privilegio'] == 2){
        echo "<script>login_exitoso();</script>";
        header('Location: ../../index.php'); 
        $_SESSION['Logueado']=true;
    }else{
            echo "<script>datos_incorrectos();</script>";
            header('Location: ../../login.php'); 
             $_SESSION['Logueado']=false;
        } 
}else{
	$_SESSION['estado_actividad']=$dato['estado_actividad'];
    }

if($_SESSION['Logueado'] != true){
    $_SESSION['usuario'] = $username;
    header('Location: ../../login.php');
}
ob_end_flush();
?>