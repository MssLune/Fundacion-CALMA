<body class="sign-in-illustration">

<section>
<iframe width="0" height="0" border="0" name="dummyframe" id="dummyframe" class="d-none"></iframe>
  <div class="page-header section-height-100">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h2 class="text-dark mb-4 texto-registrar">REGISTRAR MÉDICO</h2>
              <p class="mb-0">Ingrese datos</p>
            </div>
            <div class="card-body">
              <form id="form-registro" action="#" target="dummyframe" method="POST" onsubmit="registrar_nuevo_usuario();" >
                <div class="mb-3">
                  <input type="text" name="escuela_registrar" id="escuela-registro" class="form-control form-control-lg" placeholder="Escuela" aria-label="Escuela" aria-describedby="escuela-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="ramamedic_registrar" id="ramamedic-registro" class="form-control form-control-lg" placeholder="Rama médica" aria-label="Rama medica" aria-describedby="ramamedic-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="esp_registrar" id="esp-registro" class="form-control form-control-lg" placeholder="Especialización" aria-label="Especializacion" aria-describedby="esp-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="esp2_registrar" id="esp2-registro" class="form-control form-control-lg" placeholder="Segunda especialización" aria-label="Segunda especialización" aria-describedby="esp2-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="grado_registrar" id="grado-registro" class="form-control form-control-lg" placeholder="Grado médico" aria-label="Grado medico" aria-describedby="grado-addon" required>
                </div>
                <div class="mb-3">
                  <input type="text" name="nro_registrar" id="nro-registro" class="form-control form-control-lg" placeholder="Número de colegiatura" aria-label="Numero de colegiatura" aria-describedby="nro-addon" required>
                </div>
                <div>
                <textarea  placeholder="Experiencia médica" name="exp_registrar" id="exp-registro" rows="5" class="form-control form-control-lg" cols="50" ></textarea>
                </div>

                <div>
                <textarea  placeholder="Espectativa médica" name="espec_registrar" id="espec-registro" rows="5" class="form-control form-control-lg" cols="50" ></textarea>
                </div>

                <div>
                <textarea  placeholder="Historial" name="histo_registrar" id="histo-registro" rows="5" class="form-control form-control-lg" cols="50" ></textarea>
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
