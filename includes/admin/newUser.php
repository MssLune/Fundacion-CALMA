<body class="sign-in-illustration">

<section>
<iframe width="0" height="0" border="0" name="dummyframe" id="dummyframe" class="d-none"></iframe>
  <div class="page-header section-height-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h2 class="text-dark mb-4 texto-registrar">REGISTRAR USUARIO</h2>
              <p class="mb-0">Ingrese datos</p>
            </div>
            <div class="card-body">
              <form id="form-registro" action="#" target="dummyframe" method="POST" onsubmit="registrar_nuevo_usuario();" >
                <div class="mb-3">
                  <input type="text" name="nombres_registrar" id="names-registro" class="form-control form-control-lg" placeholder="Nombres" aria-label="Nombres" aria-describedby="names-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="apellidoPat_registrar" id="apellidoPat-registro" class="form-control form-control-lg" placeholder="Apellido Paterno" aria-label="Apellido Paterno" aria-describedby="apellidoPat-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="apellidoMat_registrar" id="apellidoMat-registro" class="form-control form-control-lg" placeholder="Apellido Materno" aria-label="Apellido Materno" aria-describedby="apellidoMat-addon" required>
                </div>
                <div class="mb-3" id="grupo__email">
                  <input type="email" name="email-user_registrar" id="email-user-registro" class="form-control form-control-lg" placeholder="Email (Será su Usuario)" aria-label="Email" aria-describedby="email-addon" required>
                  <p class="formulario__input-error">Correo inválido</p>
                </div>
                <div class="mb-3" id="grupo__selectTipoDoc">
                  <select class="form-control form-control-lg letra-select" id="tipoDoc-registro" name="tipoDoc_registrar" aria-label="Tipo Documento Identidad" aria-describedby="tipoDoc-addon" required>
                    <option disabled selected value="defecto_tipoDoc">Seleccionar el Tipo de Documento de Identidad</option>
                    <option value="1">DNI</option>
                    <option value="2">Pasaporte</option>
                    <option value="3">Carné de Extranjería</option>
                  </select>                  
                </div>
                <div class="mb-3" id="grupo__nroDoc">
                  <input type="text" name="nroDoc_registrar" id="nroDoc-registro" class="form-control form-control-lg" placeholder="Ingrese su N° Documento" aria-label="Nro Documento Identidad" aria-describedby="nroDocIdentidad-addon" required>
                  <!-- <p class="formulario__input-error">Solo se permiten números</p> -->
                </div>
                <div class="mb-3">
                  <input type="date" name="fechaNacimiento_registrar" id="nacimiento-registro" class="form-control form-control-lg" aria-label="Fecha nacimiento" aria-describedby="fechaNacimiento-addon" required>
                </div>
                <div class="mb-3">
                  <select class="form-control form-control-lg letra-select" id="pais-registro" name="pais_registrar" aria-label="País" aria-describedby="pais-addon" required>
                    <option disabled selected value="defecto_pais">Seleccionar País</option>
                    <option value="peru">Perú</option>
                    <option value="bolivia">Bolivia</option>
                    <option value="chile">Chile</option>
                    <option value="argentina">Argentina</option>
                    <option value="uruguay">Uruguay</option>
                  </select>                  
                </div>
                <div class="mb-3">
                  <select class="form-control form-control-lg letra-select" id="estado-registro" name="estado_registrar" aria-label="Estado" aria-describedby="estado-addon" required>
                    <option disabled selected value="defecto_estado">Seleccionar Estado</option>
                    <option value="lima">Lima</option>
                  </select>                  
                </div>
                <div class="mb-3" id="grupo__celular">
                  <input type="text" name="celular_registrar" id="celular-registro" class="form-control form-control-lg" placeholder="Celular" aria-label="Celular" aria-describedby="celular-addon" required>
                  <p class="formulario__input-error">Número inválido</p>
                </div>
                <div class="mb-3" id="grupo__genero">
                  <select class="form-control form-control-lg letra-select" id="genero-registro" name="genero_registrar" aria-label="Select Genero" required>
                    <option disabled selected value="defecto_genero">Género</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">No Binario</option>
                    <option value="4">Prefiero no decirlo</option>
                  </select>
                </div>
                <div class="mb-3">
                  <input type="password" name="pass_registrar" id="pass-registro" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="mb-3" id="grupo__passConfirm">
                  <input type="password" name="pass-confirm_registrar" id="pass-confirm-registro" class="form-control form-control-lg" placeholder="Repetir Contraseña" aria-label="Password Repeat" aria-describedby="passwordrepeat-addon">
                  <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                </div>
                <div class="mb-3">
                  <input type="text" name="convenio_registrar" id="convenio-registro" class="form-control form-control-lg" placeholder="Convenio" aria-label="convenio" aria-describedby="convenio-addon">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">REGISTRAR</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
    
      </div>
    </div>
  </div>
</section>
<script src="js/validar-campos.js"></script>
</body>
