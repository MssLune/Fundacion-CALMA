<?php 
  require_once 'database/database.php';
?>
<script src="js/functions-administrar.js"></script>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
      
    <?php include_once 'includes/admin/preloaderadmin.php'; ?>

    <?php include_once 'includes/admin/navbaradmin.php'; ?>

    <?php include_once 'includes/admin/adminsidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <div style="width:100%; height:90px; background-color:#5e72e4">
    
    </div>
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title h3-perfil">Mi perfil</h3>
                </div>
                <!-- /.card-header -->

                <?php 
                  $pdo = Database::connect();
                  $sql = "SELECT u.id_usuario, u.nombres, u.apellido_pat, u.apellido_mat, u.correo_user, u.tipo_doc, u.nro_doc, u.pass, u.fecha_nacimiento, u.sexo, u.telefono, u.pais, u.estado_lugar, s.id_genero, s.nombre_genero FROM usuarios u INNER JOIN sexo s ON u.sexo = s.id_genero WHERE id_usuario = '".$_SESSION['codUsuario']."'";
                  $q = $pdo->prepare($sql);
                  $q->execute(array());
                  $data = $q->fetch(PDO::FETCH_ASSOC);
                  Database::disconnect();
                ?>

                <!-- card start -->
                <div class="card-body">
                  <input type="hidden" name="codigoPerfil" id="cod_perfil" value='<?php echo $data['id_usuario'] ?>'>

                  <input class="d-none" type="text" id="id_miPerfil" name="idMiPerfil" value="1">
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Nombres</label>
                          <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" id="perfilNombre" class="form-control" value='<?php echo $data['nombres'] ?>' readonly>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Apellido paterno</label>
                          <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" id="perfilPaterno" class="form-control" value='<?php echo $data['apellido_pat'] ?>' readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Apellido Materno</label>
                          <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" id="perfilMaterno" class="form-control" value='<?php echo $data['apellido_mat'] ?>' readonly>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>Celular</label>
                          <input type="text" id="perfilTelf" class="form-control" value='<?php echo $data['telefono'] ?>' readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Documento</label>
                          <input type="text" id="perfilNroDoc" class="form-control" value='<?php echo $data['nro_doc'] ?>' readonly>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                          <label>PAÍS</label>
                          <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" id="perfilPais" class="form-control" value='<?php echo $data['pais'] ?>' readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>CIUDAD</label>
                          <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" id="perfilCiudad" class="form-control" value='<?php echo $data['estado_lugar'] ?>' readonly>
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
                            <input type="date" id="perfilNacimiento" class="form-control" value='<?php echo $data['fecha_nacimiento'] ?>' readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Sexo</label>
                          <input type="text" id="perfilSexo" class="form-control" value='<?php echo $data['nombre_genero'] ?>' readonly>
                          <select class="form-control d-none" required name="sexo_select_perfil" id="select_perfilSexo" >
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>  
                            <option value="3">No Binario</option>
                            <option value="4">Prefiero No Decir</option> 
                          </select> 
                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <center>
                        <button type="submit" class="btn btn-primary" style="width: 100%;" onclick="editarPerfil(false);" id= "edit_perfil">Editar</button>
                      </center>
                      <center class="d-none" id="guardar_perfil">
                        <button type="submit" class="btn btn-primary" onclick="actualizarPerfil();">Guardar</button>
                      </center>
                      <center class="d-none" id="cancelar_perfil">
                        <button type="submit" class="btn btn-danger" onclick="cancelPerfil(true);">Cancelar</button>
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
                  <h3 class="card-title h3-perfil">Mi cuenta</h3>
                </div>
                <!-- card body -->
                <div class="card-body">

                  <input class="d-none" type="text" id="id_miCuenta" name="idMiCuenta" value="2">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" id="cuentaEmail" class="form-control" value='<?php echo $data['correo_user'] ?>' readonly>
                      <button type="submit" class="btn btn-info">Cambiar</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">#</span>
                      </div>
                      <input type="text" id="cuentaPass" class="form-control" value='<?php echo $_SESSION['passSinHash'] ?>' readonly>
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
                  <h3 class="card-title h3-perfil">Foto </h3>
                </div>
                <!-- card body -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="perfilFoto">FOTO</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="perfilFoto">
                        <label class="custom-file-label" for="perfilFoto">Imagen..</label>
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
