

<body class="sign-in-illustration">

<section>
  <div class="page-header section-height-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
            <h2 class="text-dark mb-4">Iniciar Sesión</h2>
              <p class="mb-0">Acceda a su cuenta</p>
            </div>
            <div class="card-body">
              <div class="form-check form-check-inline" onClick="redirect_externo()">
                <input class="form-check-input" type="radio" name="userExternoradio" id="radio_externo" value="optionExterno">
                <label class="form-check-label" for="radio_pcteCalma">Soy Paciente Externo</label>
              </div>
              <form role="form" action="includes/login/checklogin.php" onsubmit="cargando()" method="POST">
                <div class="mb-3">
                  <input type="email" name="email_user" id="email_login" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="password" name="password_user" id="password_login" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>
                <!-- <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Recuérdame</label>
                </div> -->
                <div class="text-center">
                  <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">INGRESAR</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-4 text-sm mx-auto">
                Todavía no se ha registrado?
                <a href="registrar.php" class="text-primary text-gradient font-weight-bold">Registrarse como paciente</a>
              </p>
              <!-- <p class="mb-4 text-sm mx-auto">
                Únete a nosotros!
                <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Registrarse como psicólogo pro bono</a>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
          <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
            <img src="assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
            <div class="position-relative">
              <img class="max-width-500 w-100 position-relative z-index-2" src="assets/img/logocalma.png">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
  //Mantener lo escrito en usuario al haber error de login
  if(isset($_SESSION['usuario']))
    {
      echo "<script>
              document.getElementById('email_login').value='".$_SESSION['usuario']."';
              document.getElementById('password_login').focus();
            </script>";
    }
?>


</body>
