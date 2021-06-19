<?php 
    require_once 'database/database.php';
?>
<script src="js/functions-administrar.js"></script>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administrar Psicólogos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Administrar Psicólogos</li>
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
                                    <h3 class="card-title h3-tablecontent">Administrar Psicólogos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableAdminMedico" class="table table-bordered table-striped">
                                        <a href="#" class="btn btn-primary" style="width: 100%; margin-bottom: 2%;" >Nuevo  Psicólogo</a>
                                        <thead>
                                            <tr>
                                                <th><center>ID</center></th>
                                                <th><center>Cargo</center></th>
                                                <th><center>Nro. Documento</center></th>
                                                <th><center>Nombres</center></th>
                                                <th><center>Fecha Nacimiento</center></th>
                                                <th><center>Eliminar</center></th>
                                                <th><center>Más Info</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                                $pdo = Database::connect();
                                                $sql = "SELECT *, priv.cod_privilegio, priv.nombre_privilegio FROM usuarios u INNER JOIN privilegios priv ON u.privilegio = priv.cod_privilegio WHERE privilegio = 2";

                                                foreach ($pdo->query($sql) as $row){
                                                    if($row['actividad'] === 1){
                                                        $rowActividad = 'ACTIVO';
                                                    }else if($row['actividad'] === 0){
                                                        $rowActividad = 'INACTIVO';
                                                    }

                                                    echo '<tr>';
                                                    echo '
                                                            <td><center>'. $row['id_usuario'] .'</center></td>
                                                            <td><center>'. $row['nombre_privilegio'] .'</center></td>
                                                            <td><center>'. $row['nro_doc'] .'</center></td>
                                                            <td><center>'. $row['nombres'].' '. $row['apellido_pat'].' '. $row['apellido_mat'] .'</center></td>
                                                            <td><center>'. $row['fecha_nacimiento'] .'</center></td>
                                                            <td>
                                                                <center>
                                                                    <a class="btn btn-default" onclick="" title="Eliminar">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modalAdmin" onclick="masInfo('."'".$row["id_usuario"]."'".');" title="Más Información">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </a>
                                                                </center>
                                                            </td>
                                                        ';
                                                    echo '</tr>';
                                                }
                                                Database::disconnect();
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><center>ID</center></th>
                                                <th><center>Cargo</center></th>
                                                <th><center>Nro. Documento</center></th>
                                                <th><center>Nombres</center></th>
                                                <th><center>Fecha Nacimiento</center></th>
                                                <th><center>Eliminar</center></th>
                                                <th><center>Más Info</center></th>
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

<!-- modal para más info -->

 <!-- --MODAL PSICÓLOGOS -->
<div class="modal fade" id="modalAdmin" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body">
                <br>
                <center>
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
                        <button type="button" class="btn btn-blue" onclick="" style="color: #FFFFFF; background: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
                            Editar <i class="far fa-edit"></i>
                        </button>
                    </div>
                </center>
                <br>
                <input type="hidden" name="cod_medico" id="codigo_user-medico" value="">
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Tipo de Documento:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md" type="text" name="tipo_doc" id="tipo-doc" readonly>
                        <select class="form-control d-none" required name="select_tip_doc" id="select-tip_doc" >
                            <option value="1">DNI</option>
                            <option value="2">PASAPORTE</option>
                            <option value="3">CARNÉ EXTRANJERIA</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Nro Documento:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md" name="numero_doc" type = "text" id="numdoc" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Nombre:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="nombre_med" type="text" id="nombre-medico" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apellido Paterno:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="apellido_p-med" type="text" id="paterno_med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apellido Materno:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="apellido_m-med" type="text" id="materno_med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Correo:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="correo_med" type="email" id="correo-med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Fecha Nacimiento:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="fecha_nac" type="date" id="nacimiento_med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Sexo:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="sexo" type="text" id="sexo-med" readonly>
                        <select class="form-control d-none" required name="select_sexo" id="select-sexo" >
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>  
                            <option value="3">No Binario</option>
                            <option value="4">Prefiero No Decir</option> 
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Teléfono:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="telf_med" type="text" id="telf-med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">País:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="pais_med" type="text" id="pais-med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Estado/Ciudad:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="ciudad_med" type="text" id="estado-med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Convenio:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="convenio_med" type="text" id="convenio-med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Activo/Inactivo</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="actividad-medico" type="text" id="actividad-med" readonly>

                        <select class="form-control d-none" required name="select_activ" id="select-activ" >
                            <option value="1">Activo</option> 
                            <option value="2">Inactivo</option> 
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Plan Donación</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="dona-medico" type="text" id="planDona-med" readonly>

                        <select class="form-control d-none" required name="select_plan" id="select-plan" >
                            <option value="1">Sin Plan</option> 
                            <option value="2">Plan 1: Meditar</option> 
                            <option value="3">Plan 2: Reflexionar</option>
                            <option value="4">Plan 3: Comprender</option>
                        </select>
                    </div>
                </div>
            
                <center class="d-none" id="guardar-nuevo-med">
                    <button type="submit" class="btn btn-primary " onclick="">Guardar</button>
                </center>
                
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- --FIN MODAL PSICÓLOGOS -->


<!-- termina modal -->