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

      <div class="contenedor">
        <div class="contenedor-contenido">
          <div class="col-sm-6">
                <h1>Mis consultas</h1>
            </div>
            <div class="table1">
              <table>
                <thead>
                  <tr>
                    <th> Nombres </th>
                    <th> Apellidos </th>
                    <th> Correo </th>
                    <th> Distrito </th>
                  </tr>
                </thead>
              </table>
            </Div>

    </div>
    </div>
  </div>

  </body>
</html>
