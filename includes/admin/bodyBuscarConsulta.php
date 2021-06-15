<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include_once 'includes/admin/preloaderadmin.php'; ?>

    <?php include_once 'includes/admin/navbaradmin.php'; ?>

    <?php include_once 'includes/admin/adminsidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Buscar Consultas</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                <li class="breadcrumb-item active">Buscar Consulta</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <h5 class="text-center">Buscar Especialidad</h5>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="input-group">
                        <select class="form-control form-control-lg letra-select" id="especialidad-search" name="buscar_especialidad" aria-label="Buscar Especialidad">
                            <option disabled selected value="defecto_especialidad">Busca la Especialidad</option>
                            <option value="esp1">Violencia Familiar</option>
                            <option value="esp2">Bullying</option>
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>

  </div>
  <!-- ./wrapper -->

</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
