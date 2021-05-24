  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Página Calma -->
    <a href="index.php" class="brand-link">
      <img src="assets/img/logocalmaColor.png" alt="AdminLTE Logo" class="brand-image logo-sidebar">
      <span class="brand-text font-weight-light">Ir a Calma</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" style="white-space: normal;">
          <a href="#" class="d-block"><?php echo $_SESSION['nombres']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- CONSULTAS : SOLO PARA USUARIOS (2) -->
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
                <a href="tableadmin.php" class="nav-link">
                  <i class="fas fa-align-left nav-icon"></i>
                  <p>Mis consultas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Programar Consultas</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- ADMINISTRAR CONSULTAS : SOLO PARA PSICÓLOGOS (1) -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>  
              <p>
                Administrar Consultas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tableadmin.php" class="nav-link">
                  <i class="far fa-check-circle nav-icon"></i>
                  <p>Consultas Aceptadas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Aceptar Consultas</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- ADMINISTRACIÓN : SOLO PARA ADMIN (0) -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>  
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tableadmin.php" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Administrar Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-id-card-alt nav-icon"></i>
                  <p>Administrar Psicólogos</p>
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
          <!-- TODOS -->
          <li class="nav-header">PERFIL</li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>Mi Perfil</p>
              </a>
            </li>
          <li class="nav-header">DONACIONES</li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-hand-holding-medical"></i>
                <p>Donaciones</p>
              </a>
            </li>
          <li class="nav-header">SALIR</li>
            <li class="nav-item">
              <a href="#" class="nav-link close-session">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Cerrar Sesión</p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>