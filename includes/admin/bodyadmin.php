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
              if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 3) || ($_SESSION['privilegio'] == 4)){
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
                    <p class="card-text text-muted">Ingrese aquí para ver en una lista de todas sus consultas realizadas.</p>
                    <div class="icon">
                      <i class="ion ion-grid"></i>
                    </div>
                    <a href="tableConsultas.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              ';
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 4)){
              //user externo
              echo '

                <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">MIS CONSULTAS</h5>
                    <p class="card-text text-muted">Ingrese aquí para ver en una lista de todas sus consultas realizadas.</p>
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
                    <a href="administrarUsers.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">ADMINISTRAR PSICÓLOGOS</h5>
                    <p class="card-text text-muted">Ingrese aquí para administrar todos los psicólogos agregados.</p>
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

                  <div class="card w-75 mx-auto small-box pd25 ">
                    <div class="card-body">
                      <h5 class="card-title mg6 p-25">ADMINISTRAR ADMINISTRADORES</h5>
                      <p class="card-text text-muted">Ingrese aquí para administrar todos los administradores.</p>
                      <div class="icon">
                          <i class="ion ion-grid"></i>
                      </div>
                      <a href="administrarAdmins.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">ADMINISTRAR PSICÓLOGOS</h5>
                    <p class="card-text text-muted">Ingrese aquí para administrar todos los psicólogos agregados.</p>
                    <div class="icon">
                      <i class="ion ion-grid"></i>
                    </div>
                    <a href="administrarMedicos.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="card w-75 mx-auto small-box pd25">
                  <div class="card-body">
                    <h5 class="card-title mg6 p-25">ADMINISTRAR USUARIOS</h5>
                    <p class="card-text text-muted">Ingrese aquí para administrar todos los usuarios agregados.</p>
                    <div class="icon">
                      <i class="ion ion-grid"></i>
                    </div>
                    <a href="administrarUsers.php" class="small-box-footer btn btn-primary wd100">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
