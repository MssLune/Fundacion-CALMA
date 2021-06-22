<?php 
  require_once 'database/database.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      
      
      <?php include_once 'includes/admin/preloaderadmin.php'; ?>

      <?php include_once 'includes/admin/navbaradmin.php'; ?>

      <?php include_once 'includes/admin/adminsidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <div style="width:100%; height:300px; background-color:#5e72e4">
      <!-- <img src="assets/img/shapes/waves-white.svg" alt="pattern-lines" class="position-absolute opacity-2 start-0"> -->
    </div>
        <div class="content-header">
          <?php 
            $pdo = Database::connect();
            $sql = "SELECT u.id_usuario, u.cod_recurrenteDona, dr.id_donaRecurrente, dr.nombre_donaRecurrente FROM usuarios u INNER JOIN dona_recurrente dr ON u.cod_recurrenteDona = dr.id_donaRecurrente WHERE id_usuario = '".$_SESSION['codUsuario']."'";
            $q = $pdo->prepare($sql);
            $q->execute(array());
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();

            if($data['nombre_donaRecurrente'] == '-'){
              $nombrePlan = 'SIN PLAN ACTUAL';
            }else{
              $nombrePlan = $data['nombre_donaRecurrente'];
            }
          ?>
          <!-- inicia card -->
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-3">
                  <label>PLAN DE DONACIÓN ACTUAL:</label>
                </div>
                <div class="col-sm-9">
                <input type="text" class="form-control" value='<?php echo $nombrePlan ?>' readonly>
                </div>
              </div>
            </div>

            <!-- inicia card body -->
            <div class="card-body" id="moneda">
              <strong>Cambiar moneda:</strong>
              <div class="btn-group">
                <button type="button" class="btn btn-info">MONEDA</button>
                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                </button>
                <div class="dropdown-menu" role="menu">
                  <a class="dropdown-item" href="#">PEN</a>
                  <a class="dropdown-item" href="#">BOL</a>
                  <a class="dropdown-item" href="#">USD</a>
                </div>
              </div>
            </div>
            <!-- fin card-body -->
          </div>
          <!-- fin card -->


          <!-- inicia planes -->
          <div class="row">
            <!-- inicia card -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="alert alert-danger alert-dismissible">
                    <h5><center><i class="icon fas fa-ban"></i>MEDITAR</center></h5>
                  </div>
                </div>

                <div class="card-body">
                  <ul>
                    <li><center><p>S/ 50</p>/MES<p></p></center> </li>
                  </ul>
                  <ul>
                    <li><center>1 Consultas por Mes</center></li>
                    <li><center>Beneficios Adicionales </center> </li>
                  </ul>
                  <td>
                    <button type="button" class="btn btn-block bg-gradient-success btn-lg">Solicita Ya</button>
                  </td>
                </div>
              </div>
            </div>
            <!--fin card -->

            <!-- inicia card -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-header" >
                  <div class="alert alert-info alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> REFLEXIONAR </h5>
                  </div>
                </div>

                <div class="card-body">
                  <ul>
                    <li><center>100 SOLES</center></li>
                  </ul>
                  <ul>
                    <li><center>2 Consultas por Mes</center></li>
                    <li><center>Beneficios Adicionales </center> </li>
                  </ul>
                  <td>
                    <button type="button" class="btn btn-block bg-gradient-success btn-lg">Solicita Ya</button>
                  </td>
                </div>
              </div>
            </div>
            <!-- fin card -->

            <!-- inicia card -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="alert alert-warning alert-dismissible">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> COMPRENDER!</h5>
                  </div>
                </div>

                <div class="card-body">
                  <ul>
                    <li><center>150 SOLES</center></li>
                  </ul>
                  <ul>
                    <li><center>3 Consultas por Mes</center></li>
                    <li><center>Beneficios Adicionales</center> </li>
                  </ul>
                  <td>
                    <button type="button" class="btn btn-block bg-gradient-success btn-lg">Solicita Ya</button>
                  </td>
                </div>
              </div>
            </div>
            <!-- fin card -->
          </div>
          <!-- fin planes -->
        </div>
      </div>
    </div>
    <!-- fin wrapper -->
</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
