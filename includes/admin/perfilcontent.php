<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
      
    <?php include_once 'includes/admin/preloaderadmin.php'; ?>

    <?php include_once 'includes/admin/navbaradmin.php'; ?>

    <?php include_once 'includes/admin/adminsidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Mi perfil</h3>
                </div>
                <!-- /.card-header -->

                <!-- card start -->
                <div class="card-body">

                  <div class="form-group">
                    <div class="row">
                      <div class="col-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Nombres</label>
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Apellido paterno </label>
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Apellido Materno</label>
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Celular </label>
                          <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Documento</label>
                          <input type="text" class="form-control" placeholder="Enter ...">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>PAÍS</label>
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>CIUDAD</label>
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                    </div>
                              
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Fecha Nacimiento</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="">
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Sexo</label>
                          <input type="text" class="form-control" placeholder="">
                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <center>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="submit" class="btn btn-primary left">Borrar</button>
                      </center>
                    </div>
                  </div>

                </div>
                <!-- fin card body -->
              </div>
            </div>
            <!-- fin left column -->

            <!-- right column -->
            <div class="col-md-6">
              <!-- primer card -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Mi cuenta</h3>
                </div>
                <!-- card body -->
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo </label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Correo">
                      <button type="submit" class="btn btn-info">Cambiar</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">#</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Contraseña">
                      <button type="submit" class="btn btn-info">Cambiar</button>
                    </div>
                  </div>
                </div>
                <!-- fin card-body -->
              </div>
              <!-- fin primer card -->

              <!-- segundo card -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Foto </h3>
                </div>
                <!-- card body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">FOTO</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Imagen..</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Subir</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- fin card-body -->
              </div>
              <!-- fin segundo card -->
            </div>
            <!-- fin right column -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fin wrapper -->
</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
