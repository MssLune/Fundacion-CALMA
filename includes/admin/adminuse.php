<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administrar Usuarios</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Mis consultas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title h3-tablecontent">Mis Usuarios</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Psicólogo</th>
                                                <th>Especialidad</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Link Reunión</th>
                                                <th>Email</th>
                                                <th>Resultados</th>
                                                <th>Reprogramar</th>
                                                <th>Cancelar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet</td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                                <td>X</td>
                                                <td>X</td>
                                                <td>X</td>
                                                <td>
                                                <center>
                                                        <a button type="button" class="btn btn-warning" style="font-size: 30px; padding: 20px;" href="#" title="Editar"
                                                        data-toggle="modal" data-target=".bd-example-modal-xl">
                                                            <i class="far fa-edit"></i>

                                                            <div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog modal-xl" >
                                                                <div class="modal-content">
                                                                  <div class="card-header">
                                                                      <h3 class="card-title h3-tablecontent">Editar usuario</h3>
                                                                  </div>
                                                                  <div class="card-body">
                                                                      <table id="example1" class="table table-bordered table-striped">
                                                                          <thead>
                                                                              <tr>
                                                                                  <th>ID.PERFIL</th>
                                                                                  <th>NOMBRES</th>
                                                                                  <th>APELLIDOS</th>
                                                                                  <th>CORREO</th>
                                                                                  <th>DOCUMENTO</th>
                                                                                  <th>ESPECIALIDAD</th>
                                                                              </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                              <tr>
                                                                                  <th><input type="text" class="form-control" placeholder=".col-3"></th>
                                                                                  <th><input type="text" class="form-control" placeholder=".col-3"></th>
                                                                                  <th><input type="text" class="form-control" placeholder=".col-3"></th>
                                                                                  <th><input type="text" class="form-control" placeholder=".col-3"></th>
                                                                                  <th><input type="text" class="form-control" placeholder=".col-3"></th>
                                                                                  <th><input type="text" class="form-control" placeholder=".col-3"></th>
                                                                              </tr>
                                                                          </tbody>

                                                                      </table>
                                                                  </div>


                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                  </div>

                                                                </div>
                                                              </div>
                                                            </div>
                                                        </a>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-danger" style="font-size: 30px; padding: 20px;" href="#" title="Eliminar">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </center>
                                                </td>

                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Status</th>
                                                <th>Psicólogo</th>
                                                <th>Especialidad</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Link Reunión</th>
                                                <th>Email</th>
                                                <th>Resultados</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->




        </div>
    </div>
    <!-- ./wrapper -->
</body>



</html>
