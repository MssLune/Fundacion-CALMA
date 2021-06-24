<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <div style="width:100%; height:90px; background-color:#5e72e4"></div>

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

                  <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">PROGRAMAR CONSULTA</h5>
                    <p class="card-text text-muted">Ingrese aquí para programar una consulta.</p>
                    <div class="icon">
                      <i class="ion ion-search"></i>
                    </div>
                    <a href="buscarConsulta.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                   
                  </div>
                  </div>



                <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">MIS CONSULTAS</h5>
                    <p class="card-text text-muted">Ingrese aquí para ver en una lista todas sus consultas realizadas.</p>
                    <div class="icon">
                      <i class="ion ion-grid"></i>
                    </div>
                    <a href="tableConsultas.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                   
                  </div>
                  </div>


              ';
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 2)){
              //psicólogo
              echo '
               
                <div class="card w-75 mx-auto small-box pd25 ">
                <div class="card-body">
                  <h5 class="card-title mg6 p-25">CONSULTAS ACEPTADAS</h5>
                  <p class="card-text text-muted">Ingrese aquí para revisar todas sus consultas aceptadas.</p>
                  <div class="icon">
                      <i class="ion ion-grid"></i>
                  </div>
                  <a href="tableConsultas.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              ';
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 1)){
              //admin
              echo '
                
                <div class="card w-75 mx-auto small-box pd25 ">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">ADMINISTRAR USUARIOS</h5>
                    <p class="card-text text-muted">Ingrese aquí para administrar todos los tipos de usuarios.</p>
                    <div class="icon">
                        <i class="ion ion-grid"></i>
                    </div>
                    <a href="administrarMedicos.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">ADMINISTRAR PSICOLOGOS</h5>
                    <p class="card-text text-muted">Ingrese aquí para administrar todos los psicologos agregados.</p>
                    <div class="icon">
                      <i class="ion ion-grid"></i>
                    </div>
                    <a href="administrarMedicos.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                   
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

</html>
