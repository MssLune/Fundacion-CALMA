
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Página Calma -->
    <a href="index.php" class="brand-link">
      <img src="img/favicon.png" alt="Calma Logo" class="brand-image logo-sidebar">
      <span class="brand-text font-weight-light">Ir a Calma</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding: 0px 23px">
      <!-- avatar -->
      <div class="avatarall">
        <?php
          if(isset($_SESSION['genero']) && ($_SESSION['genero'] == 1)){
            //masculino
            echo '
              <img src="assets/img/avatar01.jpg" alt="avatar" width="120">
            ';
          }else if(isset($_SESSION['genero']) && ($_SESSION['genero'] == 2)){
            //femenino
            echo '
              <img src="assets/img/avatar.png" alt="avatar" width="120">
            ';
          }
        ?>
      </div>
      <!-- fin avatar -->

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="white-space: normal;">
          <a href="#" class="d-block p-14 mg5"><?php echo $_SESSION['nombres']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
          //TODOS
          function sidebarAll(){
            $opcionTodos = '
            <li class="nav-header mg6">PERFIL</li>
              <li class="nav-item">
                <a href="perfil.php" class="nav-link active">
                  <i class="nav-icon fas fa-user" style="color:#5e72e4"></i>
                  <p>Mi Perfil</p>
                </a>
              </li>
            <li class="nav-header mg6">DONACIONES</li>
              <li class="nav-item">
                <a href="donaciones.php" class="nav-link active">
                  <i class="nav-icon fas fa-hand-holding-medical" style="color:#ffd600"></i>
                  <p>Donaciones</p>
                </a>
              </li>
            <li class="nav-header mg6">SALIR</li>
              <li class="nav-item">
                <a href="includes/login/logout.php" class="nav-link close-session">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>Cerrar Sesión</p>
                </a>
              </li>
            ';
            return $opcionTodos;
          }
           //CONSULTAS : SOLO PARA USUARIOS (3) 
            if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 3)){
              echo '
              <li class="nav-header">PACIENTE CALMA</li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>
                    Consultas
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tableConsultas.php" class="nav-link">
                      <i class="fas fa-align-left nav-icon"></i>
                      <p>Mis consultas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="buscarConsulta.php" class="nav-link">
                      <i class="fas fa-tachometer-alt nav-icon"></i>
                      <p>Programar Consultas</p>
                    </a>
                  </li>
                </ul>
              </li>
              ';
              echo sidebarAll();
            }else if (isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 4)){
              // Externos (4)
              echo '
              <li class="nav-header">PACIENTE EXTERNO</li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>
                    Consultas
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="tableConsultas.php" class="nav-link">
                      <i class="fas fa-align-left nav-icon"></i>
                      <p>Mis consultas</p>
                    </a>
                  </li>
                </ul>
              </li>
              ';
              echo sidebarAll();
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 2)){
              //ADMINISTRAR CONSULTAS : SOLO PARA PSICÓLOGOS (2)
              $generoPsico = "";
              if($_SESSION['genero'] == 1){
                $generoPsico = "PSICÓLOGO";
              }else if($_SESSION['genero'] == 2){
                $generoPsico = "PSICÓLOGA";
              }else {
                $generoPsico = "PSICÓLOGO(A)";
              }

              echo '
              <li class="nav-header">'.$generoPsico.'</li>
              <li class="nav-item">
                <a href="tableConsultas.php" class="nav-link active">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Consultas Aceptadas</p>
                </a>
              </li>
              ';
              echo sidebarAll();
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 1)){
              //ADMINISTRACIÓN : SOLO PARA ADMIN (1)
              echo '
              <li class="nav-header">ADMINISTRADOR</li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                <i class="fas fa-user-cog nav-icon" style="color:#dc7057"></i>

                  <p>
                    Administración
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item pd25-l mg3" >
                    <a href="administrarUsers.php" class="nav-link">

                      <p class="p-14">Administrar Usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item pd25-l mg3">
                    <a href="administrarMedicos.php" class="nav-link">

                      <p class="p-14 ">Administrar Psicólogos</p>
                    </a>
                  </li>
                  <li class="nav-item pd25-l mg3">
                    <a href="#" class="nav-link">

                      <p class="p-14">Administrar Calma Informativa</p>
                    </a>
                  </li>
                  <li class="nav-item pd25-l mg3">
                    <a href="#" class="nav-link">

                      <p class="p-14">Administrar Calma Cursos</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header mg6">USUARIO EXTERNO</li>
                <li class="nav-item">
                  <a href="administrarExternos.php" class="nav-link active">
                    <i class="nav-icon fas fa-user" style="color:#9EC3C1"></i>
                    <p>Usuario Externo</p>
                  </a>
                </li>
              ';
              echo sidebarAll();
            }else if(isset($_SESSION['Logueado']) && isset($_SESSION['privilegio']) && ($_SESSION['Logueado'] === true) && ($_SESSION['privilegio'] == 0)){
              //SUPER ADMIN : SOLO PARA ADMIN MASTER (0)
              echo '
                <li class="nav-header">ADMIN MASTER</li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Administración Master
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="administrarAdmins.php" class="nav-link">
                        <i class="fas fa-user-cog nav-icon"></i>
                        <p>Administrar Administradores</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="administrarMedicos.php" class="nav-link">
                        <i class="fas fa-id-card-alt nav-icon"></i>
                        <p>Administrar Psicólogos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="administrarUsers.php" class="nav-link">
                        <i class="fas fa-id-card-alt nav-icon"></i>
                        <p>Administrar Usuarios</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>Administrar Calma Informativa</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-book-reader nav-icon"></i>
                        <p>Administrar Calma Cursos</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-header mg6">USUARIO EXTERNO</li>
                <li class="nav-item">
                  <a href="administrarExternos.php" class="nav-link active">
                    <i class="nav-icon fas fa-user" style="color:#9EC3C1"></i>
                    <p>Usuario Externo</p>
                  </a>
                </li>
              ';
              echo sidebarAll();
            }
          ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
