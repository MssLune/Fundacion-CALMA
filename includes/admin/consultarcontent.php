<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 mx-auto">
          
              <!-- general form elements -->
              <div class="card card-primary pd25">
                <div class="card-header">
                  <h3 class="card-title h3-perfil">Programar consulta</h3>
                </div>
                   
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="#">
                           
                              <!-- Main content -->
                              <section class="content">
                              <div class="container-fluid">
                                   <h5 class="text-center">Buscar Especialidad</h5>
                                   <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                             <div class="input-group">
                                             <select class="form-control form-control-lg letra-select" id="especialidad-search" name="buscar_especialidad" aria-label="Buscar Especialidad">
                                                  <option disabled selected value="defecto_especialidad">Busca la Especialidad</option>
                                                  <option value="esp1">Violencia Familiar</option>
                                                  <option value="esp2">Bullying</option>
                                             </select>
                                             <div class="input-group-append">
                                                  <button type="button" class="btn btn-lg btn-default">
                                                       <i class="fa fa-search"></i>
                                                  </button>
                                             </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              </section>

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Nombres y Apellidos</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Escriba aquí">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="email">Correo electronico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Escriba aquí">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="date">Selecciona la fecha</label>
                                        <input type="date" name="date" value="" class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Seleccione una especialidad</label>
                                        <select class="form-control">
                            
                                             <option>Psicologia</option>
                                             <option>Nutrición</option>
                                        </select>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="telephone">Numero de celular</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Escriba aqui">
                                        <label for="Message">Comentarios</label>
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Escriba aquí"></textarea>
                                     <center>
                                     <button type="submit" class="btn btn-primary">Programar consulta</button>
                                     </center>                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

</div>
</div>
</body>

</html>
