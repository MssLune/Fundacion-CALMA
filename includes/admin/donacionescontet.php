
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      
      <?php include_once 'includes/admin/preloaderadmin.php'; ?>

      <?php include_once 'includes/admin/navbaradmin.php'; ?>

      <?php include_once 'includes/admin/adminsidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <img src="assets/img/fondocalma.png" class="d-block w-100" height="200px">
        <div class="content-header">
          <!-- inicia card -->
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-3">
                  <label>PLAN DE DONACIÓN ACTUAL:</label>
                </div>
                <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="">
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
                    <h5><i class="icon fas fa-ban"></i>MEDITAR</h5>
                  </div>
                </div>

                <div class="card-body">
                  <ul>
                    <li><center>50 SOLES</center></li>
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
