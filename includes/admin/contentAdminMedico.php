<?php 
    require_once 'database/database.php';
?>
<script src="js/functions-administrar.js"></script>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div style="width:100%; height:90px; background-color:#5e72e4"></div>
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
                                        <a href="#" data-toggle="modal" data-target="#newMedModal" class="btn btn-primary" style="width: 100%; margin-bottom: 2%;" >Nuevo  Psicólogo</a>
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
                                                if($_SESSION['privilegio'] == 0 || $_SESSION['privilegio'] == 1){
                                                    $sql = "SELECT *, priv.cod_privilegio, priv.nombre_privilegio FROM usuarios u INNER JOIN privilegios priv ON u.privilegio = priv.cod_privilegio WHERE privilegio = 2";

                                                    foreach ($pdo->query($sql) as $row){
                                                        echo '<tr>';
                                                        echo '
                                                                <td><center>'. $row['id_usuario'] .'</center></td>
                                                                <td><center>'. $row['nombre_privilegio'] .'</center></td>
                                                                <td><center>'. $row['nro_doc'] .'</center></td>
                                                                <td><center>'. $row['nombres'].' '. $row['apellido_pat'].' '. $row['apellido_mat'] .'</center></td>
                                                                <td><center>'. $row['fecha_nacimiento'] .'</center></td>
                                                                <td>
                                                                    <center>
                                                                        <a class="btn btn-danger" onclick="eliminarMedico('."'".$row["id_usuario"]."'".')" title="Eliminar">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a class="btn btn-info" href="#" data-toggle="modal" data-target="#modalAdmin" onclick="masInfoMedico('."'".$row["id_usuario"]."'".'); editMedico(true);" title="Más Información">
                                                                            <i class="fas fa-info-circle"></i>
                                                                        </a>
                                                                    </center>
                                                                </td>
                                                            ';
                                                        echo '</tr>';
                                                    }
                                                    Database::disconnect();
                                                }else{
                                                    echo '
                                                        <script>
                                                            swal("PROHIBIDO", "SIN PERMISOS.", "error");
                                                        </script>
                                                    ';
                                                    session_destroy();
                                                    echo '<script>window.location="login.php";</script>';
                                                }
                                            ?>
                                        </tbody>
                                        
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
                <h5 class="modal-title">Información de Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body">
                <br>
                <center>
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
                        <button type="button" class="btn btn-blue" onclick="editMedico(false);" style="color: #FFFFFF; background: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
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
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="pais_med" type="text" id="pais-med" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Estado/Ciudad:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="ciudad_med" type="text" id="estado-med" readonly>
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
                            <option value="0">Inactivo</option>
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
            
                <center class="d-none" id="guardar_med">
                    <button type="submit" class="btn btn-primary" onclick="actualizarMedico();">Guardar</button>
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

<!-- INICIA MODAL NEW MÉDICO -->
<div class="modal fade" id="newMedModal" style="overflow:hidden;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: rgba(133, 193, 233, 0.4);">
                <h5 class="modal-title">Agregar Nuevo Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body" style="background: rgba(133, 193, 233, 0.2);">
                <!-- CARD BODY -->
                <div class="card-body">
                    <form id="form_newMed" action="includes/admin/crud_medico.php" method="POST" onsubmit="msje_regMed();" >
                                                
                        <input class="d-none" type="text" name="rolUserMed" value="2">

                        <div>
                            <h5>DATOS PERSONALES</h5>
                            <hr style="background: rgba(133, 193, 233, 0.4);">
                        </div>

                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Nombres:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newMed_nombres" id="newmed_name" class="form-control form-control-lg" placeholder="Nombres" aria-label="Nombres" aria-describedby="names-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Apellido Paterno:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newMed_paterno" id="newmed_paterno" class="form-control form-control-lg" placeholder="Apellido Paterno" aria-label="Apellido Paterno" aria-describedby="apellidoPat-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Apellido Materno:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newMed_materno" id="newmed_materno" class="form-control form-control-lg" placeholder="Apellido Materno" aria-label="Apellido Materno" aria-describedby="apellidoMat-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Correo:</label> 
                            <input type="email" name="newMed_email" id="newmed_correo" class="form-control form-control-lg" placeholder="Email (Será su Usuario)" aria-label="Email" aria-describedby="email-addon" required>
                        </div>
                        <div class="mb-3" id="grupo__selectTipoDoc">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Tipo Documento de Identidad:</label> 
                            <select class="form-control form-control-lg letra-select" id="newmed_tipo_doc" name="newMed_tipoDoc" aria-label="Tipo Documento Identidad" aria-describedby="tipoDoc-addon" required>
                                <option disabled selected value="defecto_tipoDoc">Tipo de Documento de Identidad</option>
                                <option value="1">DNI</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Carné de Extranjería</option>
                            </select>                  
                        </div>
                        <div class="mb-3" id="grupo__nroDoc">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Número de Documento de Identidad:</label> 
                            <input type="text" name="newMed_nroDoc" id="newmed_num_doc" class="form-control form-control-lg" placeholder="N° Documento" aria-label="Nro Documento Identidad" aria-describedby="nroDocIdentidad-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Fecha de Nacimiento:</label> 
                            <input type="date" name="newMed_nacimiento" id="newmed_fechaNac" class="form-control form-control-lg" aria-label="Fecha nacimiento" aria-describedby="fechaNacimiento-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">País:</label> 
                            <input onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" type="text" name="newMed_pais" id="newmedPais" class="form-control form-control-lg" placeholder="País" aria-label="País" aria-describedby="pais-addon" required>            
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Ciudad/Estado:</label> 
                            <input onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" type="text" name="newMed_ciudad" id="newmedCiudad" class="form-control form-control-lg" placeholder="Estado/ Ciudad" aria-label="Estado/Ciudad" aria-describedby="estado-addon" required>                 
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Celular:</label> 
                            <input type="text" name="newMed_telf" id="newmedTelf" class="form-control form-control-lg" placeholder="Celular" aria-label="Celular" aria-describedby="celular-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Sexo:</label> 
                            <select class="form-control form-control-lg letra-select" id="newMed_genero" name="newMed_sexo" aria-label="Select Genero" required>
                                <option disabled selected value="defecto_genero">Género</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                                <option value="4">Prefiero no decirlo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Contraseña:</label> 
                            <input type="password" name="newMed_pass" id="newmedPass" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Plan de Donación:</label> 
                            <select class="form-control form-control-lg letra-select" id="newMedDona" name="newMed_dona" aria-label="Select Donacion" required>
                                <option disabled selected value="defecto_dona">Selecciona Plan de Donación</option>
                                <option value="1">Sin Plan</option>
                                <option value="2">Plan 1: Meditar</option>
                                <option value="3">Plan 2: Reflexionar</option>
                                <option value="4">Plan 3: Comprender</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Convenio:</label> 
                            <input type="text" name="newMed_convenio" id="newmedConv" class="form-control form-control-lg" placeholder="Convenio" aria-label="convenio" aria-describedby="convenio-addon">
                        </div>

                        <div>
                            <br><br>
                            <h5>DATOS MÉDICO</h5>
                            <hr style="background: rgba(133, 193, 233, 0.4);">
                        </div>

                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Escuela:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newMed_escuela" id="newmedEscuela" class="form-control form-control-lg" placeholder="Escuela" aria-label="Escuela" aria-describedby="Escuela-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Rama:</label> 
                            <select class="form-control form-control-lg letra-select" id="newMedRama" name="newMed_rama" aria-label="Select Rama" required>
                                <option disabled selected value="defecto_rama">Selecciona una Rama</option>
                                <option value="1">Psicología Clínica</option>
                                <option value="2">Psicología Educativa</option>
                                <option value="3">Psicología Social</option>
                                <option value="4">Psicología Educativa</option>
                                <option value="5">Psicología Laboral</option>
                                <option value="6">Psicología Familiar</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Primera Especialidad :</label> 
                            <select class="form-control form-control-lg letra-select" id="newMedesp1" name="newMed_esp1" aria-label="Select Especialidad 1" required>
                                <option disabled selected value="defecto_esp1">Selecciona una Especialidad</option>
                                <option value="1">Terapia Familiar</option>
                                <option value="2">Psicología Infato - Juvenil</option>
                                <option value="3">Psicología Comunitaria</option>
                                <option value="4">Terapia Cognitivo - Conductual</option>
                                <option value="5">Clínica y de Salud</option>
                                <option value="6">Terapia de Parejas</option>
                                <option value="7">Trastornos de la conducta alimentaria</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Segunda Especialidad (Opcional) :</label> 
                            <select class="form-control form-control-lg letra-select" id="newMedesp2" name="newMed_esp2" aria-label="Select Especialidad 2">
                                <option disabled selected value="defecto_esp2">Selecciona una Especialidad</option>
                                <option value="0">Ninguna</option>
                                <option value="1">Terapia Familiar</option>
                                <option value="2">Psicología Infato - Juvenil</option>
                                <option value="3">Psicología Comunitaria</option>
                                <option value="4">Terapia Cognitivo - Conductual</option>
                                <option value="5">Clínica y de Salud</option>
                                <option value="6">Terapia de Parejas</option>
                                <option value="7">Trastornos de la conducta alimentaria</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Grado:</label> 
                            <select class="form-control form-control-lg letra-select" id="newMedGrado" name="newMed_grado" aria-label="Select Grado" required>
                                <option disabled selected value="defecto_grado">Selecciona el Grado</option>
                                <option value="1">Licenciatura</option>
                                <option value="2">Colegiatura</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Número de Colegiatura/Licenciatura:</label> 
                            <input type="text" name="newMed_nroGrado" id="newmednroGrado" class="form-control form-control-lg" placeholder="N° Grado" aria-label="grado" aria-describedby="grado-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Experiencia del Médico:</label> 
                            <textarea rows="2" name="newMed_experiencia" id="newmedexp" class="form-control form-control-lg" placeholder="Experiencia del Médico" aria-label="experiencia" aria-describedby="experiencia-addon"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Espectativa del Médico:</label> 
                            <textarea rows="2" name="newMed_espectativa" id="newmedespect" class="form-control form-control-lg" placeholder="Espectativa del Médico" aria-label="espectativa" aria-describedby="espectativa-addon"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">AÑADIR NUEVO MÉDICO</button>
                        </div>
                    </form>
                </div>
                <!-- FIN CARD BODY -->
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL NEW MÉDICO -->

<!-- termina modal -->