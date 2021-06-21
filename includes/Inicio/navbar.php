<?php
  ob_start();
  @session_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
    <!-- sweetAlert2 -->
    <script src="./assets/js/plugins/sweetalert2.min.js"></script> <!--Importar SweetAlert2-->
    <link href="./assets/css/sweetalert2.min.css" rel="stylesheet"/> <!--Importar SweetAlert2-->
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" />

    <link rel="stylesheet" href="css/main.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/fundacionCalmaEstilos.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <!-- Script de funciones para SweetAlert y Dropdown -->
    <script src="js/funciones.js"></script>
</head>

<body class="invitados">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <div class="container position-sticky z-index-sticky top-0">
          <div class="row">
            <div class="col-12">

              <nav class="navbar navbar-expand-lg  blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-1 start-0 end-0 mx-1">
                <div class="container-fluid" style="padding-left: 70px">
                  <a class="navbar-brand font-weight-bolder ms-sm-3" href="index.php" rel="tooltip"  data-placement="bottom" target="_blank">
                    <img src="assets/img/logocalmaColor.png" alt="42px" width="72px">
                  </a>
                  <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon mt-2">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </span>
                  </button>
                  <!-- pt-3 pb-2 py-lg-0 w-100 -->
                  <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">

                    <ul class="navbar-nav navbar-nav-hover ms-lg-10 ps-lg-0 w-100">
                      <li class="nav-item dropdown dropdown-hover mx-2">
                        <a href="index.php"  class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-monospace text-black-50 font-weight-bold" id="dropdownMenuPages">
                          INICIO
                        </a>
                      </li>

                      <li class="nav-item dropdown dropdown-hover mx-2">
                        <a href="psicologo.php"  class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-monospace text-black-50 font-weight-bold" id="dropdownMenuPages">
                          PSICOLOGO
                        </a>
                      </li>

                      <li class="nav-item dropdown dropdown-hover mx-2">
                        <a  href="empresa.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-monospace text-black-50 font-weight-bold" id="dropdownMenuPages" >
                        EMPRESA
                        </a>
                      </li>

                      <li class="nav-item dropdown dropdown-hover mx-2">
                        <a  href="peticiones.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-monospace text-black-50 font-weight-bold" id="dropdownMenuPages" >
                        PETICIONES
                        </a>
                      </li>

                      <li class="nav-item dropdown dropdown-hover mx-2">
                        <a href="https://fundacioncalma.org/" target= "_blank"  class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-monospace text-black-50 font-weight-bold" id="dropdownMenuPages">
                          BLOG CALMA
                        </a>
                      </li>

                        <?php
                          if(isset($_SESSION['Logueado']) && $_SESSION['Logueado'] === true){
                            echo '
                            <li class="nav-item my-auto ms-10 ms-lg-0" style="padding-left: 90px; vertical-align: center;">
                              <div class="dropdown">
                                <a class="dropdown-toggle btn-dropdown" onclick="dropdown();" role="button" data-toggle="dropdown">'.$_SESSION['nombres'].'</a>
                                  <div class="dropdown-menu content_dropdown" id="menu_dropdown">
                                    <a class="dropdown-item" href="consultoriocalma.php">Ir al Administrador Calma</a>
                                    <a class="dropdown-item" href="includes/login/logout.php">Cerrar Sesión</a>
                                  </div>
                              </div>
                            </li>';
                          }else{
                        ?>
                      <li class="nav-item dropdown dropdown-hover mx-2">
                        <a  href="registrar.php" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-monospace text-black-50 font-weight-bold" id="dropdownMenuPages" >
                          REGÍSTRATE
                        </a>
                      </li>

                      <li class="nav-item my-auto ms-3 ms-lg-0" style="padding-left:  90px;">
                        <a href="login.php" class="btn btn-sm  btn-white  btn-round mb-0 me-1 mt-2 mt-md-0">Iniciar Sesión</a>
                      </li>
                        <?php
                         }
                        ?>
                    </ul>
                  </div>
                </div>
              </nav>
              <!-- End Navbar -->
            </div>
          </div>
        </div>
