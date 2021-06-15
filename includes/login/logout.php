<?php

session_start();
unset ($_SESSION['nombres'],$_SESSION['username'],$_SESSION['correo'],$_SESSION['start'],$_SESSION['privilegio'],$_SESSION['codUsuario'],$_SESSION['Logueado'],$_SESSION['expire'],$_SESSION['acabo'],$_SESSION['estado_actividad'],$_SESSION['usuario'],$_SESSION['telefono'],$_SESSION['genero'],$_SESSION['convenio'],$_SESSION['pais'],$_SESSION['estado'],$_SESSION['tipoDocIdentidad'],$_SESSION['nroDocIdentidad'],$_SESSION['fechaNacimiento'],$_SESSION['recurrenteDonaCod'],$_SESSION['passSinHash']);
session_destroy();

header('Location: ../../index.php');

?>