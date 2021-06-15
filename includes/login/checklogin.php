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
    $password_sinHash = $_POST['password_user'];
}else{
    $password_sinHash = '';
}

$_SESSION['Logueado'] = false;

$pdo = Database::connect();
$sql = "SELECT * 
            FROM usuarios 
                WHERE correo_user = '$username'";
$q = $pdo->prepare($sql);
$q->execute(array());
$dato=$q->fetch(PDO::FETCH_ASSOC);
Database::disconnect();

//password guardado en BD con hash
$passwordHash = $dato['pass'];
//verificar si coincide ambos passwords
if ($dato['actividad'] == 1 && password_verify($password_sinHash, $passwordHash) ===true) {
    $_SESSION['passSinHash'] = $password_sinHash;
    $_SESSION['nombres'] = $dato['nombres']." ".$dato['apellido_pat']." ".$dato['apellido_mat'];
    $_SESSION['privilegio'] = $dato['privilegio'];
    $_SESSION['username'] = $dato['correo_user'];
    $_SESSION['codUsuario'] = $dato['id_usuario'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
    $_SESSION['correo']=$dato['correo_user'];
    $_SESSION['telefono']=$dato['telefono'];
    $_SESSION['genero']=$dato['sexo'];
    $_SESSION['tipoDocIdentidad']=$dato['tipo_doc'];
    $_SESSION['nroDocIdentidad']=$dato['nro_doc'];
    $_SESSION['fechaNacimiento']=$dato['fecha_nacimiento'];
    $_SESSION['convenio']=$dato['id_convenio'];
    $_SESSION['recurrenteDonaCod']=$dato['cod_recurrenteDona'];
    $_SESSION['pais']=$dato['pais'];
    $_SESSION['estado']=$dato['estado_lugar'];

    if($_SESSION['privilegio'] == 0 || $_SESSION['privilegio'] == 1 || $_SESSION['privilegio'] == 2 || $_SESSION['privilegio'] == 3){
        echo "<script>login_exitoso();</script>";
        header('Location: ../../consultoriocalma.php'); 
        $_SESSION['Logueado']=true;
    }else{
            echo "<script>datos_incorrectos();</script>";
            header('Location: ../../login.php'); 
             $_SESSION['Logueado']=false;
        } 
}else{
	$_SESSION['estado_actividad']=$dato['actividad'];
    }

if($_SESSION['Logueado'] != true){
    $_SESSION['usuario'] = $username;
    header('Location: ../../login.php');
}
ob_end_flush();
?>