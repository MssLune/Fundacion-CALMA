<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div style="width:100%; height:90px; background-color:#5e72e4"></div>

    <?php include_once 'includes/admin/preloaderadmin.php'; ?>

    <?php include_once 'includes/admin/navbaradmin.php'; ?>

    <?php include_once 'includes/admin/adminsidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) #f8f9fe-->
      
      <div class="content-header">
      
        <div class="container-fluid">
          
          <div class="row mb-2">
            
            <?php 
              if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 3)){
                //usuario
                echo '
                  <div class="col-sm-6">
                    <h1 class="m-0">Consultas</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Consultas</li>
                    </ol>
                  </div>
                ';
              }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 2)){
                //psicólogo
                echo '
                  <div class="col-sm-6">
                    <h1 class="m-0">Administrar Consultas</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Administrar Consultas</li>
                    </ol>
                  </div>
                ';
              }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 1)){
                //admin
                echo '
                  <div class="col-sm-6">
                    <h1 class="m-0">Administración</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Administración</li>
                    </ol>
                  </div>
                ';
              }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 0)){
                //admin master
                echo '
                  <div class="col-sm-6">
                    <h1 class="m-0">Administración Master</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Administración Master</li>
                    </ol>
                  </div>
                ';
              }else{
                echo 'Nada que mostrar';
              }
            ?>
              
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes -->
          <?php 
            if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 3)){
              //user
              echo '
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <h3 class="h3-adminbody">Buscar Consulta</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-search"></i>
                      </div>
                      <a href="buscarConsulta.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3 class="h3-adminbody">Mis Consultas</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="tableConsultas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              ';
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 2)){
              //psicólogo
              echo '
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3 class="h3-adminbody">Consultas Aceptadas</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="tableConsultas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              ';
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 1)){
              //admin
              echo '
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3 class="h3-adminbody">Administrar Usuarios</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="administrarMedicos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3 class="h3-adminbody">Administrar Psicólogos</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="administrarMedicos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              ';
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 0)){
              //admin master
              echo '
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3 class="h3-adminbody">Administrar Administradores</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3 class="h3-adminbody">Administrar Usuarios</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="administrarMedicos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-6 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3 class="h3-adminbody">Administrar Psicólogos</h3>
                      </div>
                      <div class="icon">
                        <i class="ion ion-calendar"></i>
                      </div>
                      <a href="administrarMedicos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
              ';
            }else{
              echo 'Nada que mostrar';
            }
          ?>
        </div>
      </section>
    </div>
  </div>
  <!-- ./wrapper -->

</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
