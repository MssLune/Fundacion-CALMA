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
              <h1 class="m-0">Administrar Consultas</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                <li class="breadcrumb-item active">Administrar Consultas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes -->
          <div class="row">
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 class="h3-adminbody">Buscar Consulta</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-search"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 class="h3-adminbody">Agendar Consulta</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include_once 'includes/admin/controlsidebar.php'; ?>

  </div>
  <!-- ./wrapper -->

</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
