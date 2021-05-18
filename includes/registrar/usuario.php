<body class="sign-in-illustration">

<section>
  <div class="page-header section-height-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h2 class="text-dark mb-4 texto-registrar">REGISTRAR</h2>
              <p class="mb-0">Ingrese sus datos</p>
            </div>
            <div class="card-body">
              <form role="form" id="form-registro" action="includes/registrar/registro_nuevo_usuario.php" onsubmit="registrar()" method="POST">
                <div class="mb-3">
                  <input type="text" name="nombres_registrar" id="names-registro" class="form-control form-control-lg" placeholder="Nombres" aria-label="Nombres" aria-describedby="names-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="apellidos_registrar" id="apellidos-registro" class="form-control form-control-lg" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="apellidos-addon" required>
                </div>
                <div class="mb-3" id="grupo__email">
                  <input type="email" name="email-user_registrar" id="email-user-registro" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                  <p class="formulario__input-error">Correo inválido</p>
                </div>
                <div class="mb-3">
                  <input type="text" name="pais_registrar" id="pais-registro" class="form-control form-control-lg" placeholder="País" aria-label="País" aria-describedby="pais-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="estado_registrar" id="estado-registro" class="form-control form-control-lg" placeholder="Estado" aria-label="Estado" aria-describedby="estado-addon" required>
                </div>
                <div class="mb-3" id="grupo__celular">
                  <input type="text" name="celular_registrar" id="celular-registro" class="form-control form-control-lg" placeholder="Celular" aria-label="Celular" aria-describedby="celular-addon" required>
                  <p class="formulario__input-error">Número inválido</p>
                </div>
                <div class="mb-3">
                  <input type="password" name="pass_registrar" id="pass-registro" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="mb-3" id="grupo__passConfirm">
                  <input type="password" name="pass-confirm_registrar" id="pass-confirm-registro" class="form-control form-control-lg" placeholder="Repetir Contraseña" aria-label="Password Repeat" aria-describedby="passwordrepeat-addon">
                  <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">REGISTRARME</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-4 text-sm mx-auto">
                Todavia no se ha registrado?
                <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Registrarse como paciente</a>
              </p>
              <p class="mb-4 text-sm mx-auto">
                Unete a nosotros!
                <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Registrarse como psicólogo pro bono</a>
              </p>
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
<script src="js/validar-campos.js"></script>
</body>
