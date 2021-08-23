<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/usuarioex.css">
    <title>Usuario Externos</title>
</head>
<?php
  require_once 'database/database.php';
?>
<body>
  <div class="wrapper">

      <?php include_once 'includes/admin/preloaderadmin.php'; ?>

      <?php include_once 'includes/admin/navbaradmin.php'; ?>

      <?php include_once 'includes/admin/adminsidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
              <div class="container-fluid">
                  <div class="row mb-2">
                      <?php
                          if($_SESSION['privilegio'] == 3){
                              //user
                              echo '
                                  <div class="col-sm-6">
                                      <h1>Usuarios Externos</h1>
                                  </div>
                                  <div class="col-sm-6">
                                      <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                          <li class="breadcrumb-item active">Usuarios Externos</li>
                                      </ol>
                                  </div>
                              ';
                          }else if($_SESSION['privilegio'] == 2){
                              //psicólogo
                              echo '
                                  <div class="col-sm-6">
                                      <h1>Consultas Aceptadas</h1>
                                  </div>
                                  <div class="col-sm-6">
                                      <ol class="breadcrumb float-sm-right">
                                          <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                          <li class="breadcrumb-item active">Consultas Aceptadas</li>
                                      </ol>
                                  </div>
                              ';
                          }else{

                          }
                      ?>
                  </div>
              </div>
          </section>

          <!-- contenido de data table -->

          <?php include_once 'includes/admin/usuarioextable.php'; ?>
      </div>
  </div>
