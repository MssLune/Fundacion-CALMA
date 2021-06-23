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
                            <h1>Administrar Administradores</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Administrar Administradores</li>
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
                                    <h3 class="card-title h3-tablecontent">Administrar Administradores</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableAdmins" class="table table-bordered table-striped">
                                        <a href="newAdmin.php" data-toggle="modal" data-target="#newAdmModal"  class="btn btn-primary" style="width: 100%; margin-bottom: 2%;" >Nuevo  Administrador</a>
                                        <thead>
                                            <tr>
                                                <th><center>ID</center></th>
                                                <th><center>Cargo</center></th>
                                                <th><center>Área</center></th>
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
                                                if($_SESSION['privilegio'] == 0){
                                                    $sql = "SELECT *, priv.cod_privilegio, priv.nombre_privilegio, adm.usuario_id, adm.area_admin FROM usuarios u INNER JOIN privilegios priv ON u.privilegio = priv.cod_privilegio INNER JOIN admin adm ON u.id_usuario = adm.usuario_id WHERE privilegio = 1";

                                                    foreach ($pdo->query($sql) as $row){
                                                        echo '<tr>';
                                                        echo '
                                                                <td><center>'. $row['id_usuario'] .'</center></td>
                                                                <td><center>'. $row['nombre_privilegio'] .'</center></td>
                                                                <td><center>'. $row['area_admin'] .'</center></td>
                                                                <td><center>'. $row['nro_doc'] .'</center></td>
                                                                <td><center>'. $row['nombres'].' '. $row['apellido_pat'].' '. $row['apellido_mat'] .'</center></td>
                                                                <td><center>'. $row['fecha_nacimiento'] .'</center></td>
                                                                <td>
                                                                    <center>
                                                                        <a class="btn btn-danger" onclick="eliminarAdmin('."'".$row["id_usuario"]."'".')" title="Eliminar">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a class="btn btn-info" href="#" data-toggle="modal" data-target="#modalAdmin" onclick="masInfoAdmin('."'".$row["id_usuario"]."'".'); editAdmin(true);" title="Más Información">
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
                                        <tfoot>
                                            <tr>
                                                <th><center>ID</center></th>
                                                <th><center>Cargo</center></th>
                                                <th><center>Área</center></th>
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

 <!-- --MODAL ADMIN -->
<div class="modal fade" id="modalAdmin" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Información de Administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body">
                <br>
                <center>
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
                        <button type="button" class="btn btn-blue" onclick="editAdmin(false);" style="color: #FFFFFF; background: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
                            Editar <i class="far fa-edit"></i>
                        </button>
                    </div>
                </center>
                <br>
                <input type="hidden" name="cod_admin" id="codigo_user_admin" value="">

                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Área:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="adminArea" type = "text" id="area_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Tipo de Documento:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md" type="text" name="tipo_doc" id="tipo_docAdm" readonly>
                        <select class="form-control d-none" required name="select_tip_doc_adm" id="select_tipo_docAdm" >
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
                        <input class="form-control input-md" name="numero_docAdm" type = "text" id="numdocAdm" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Nombre:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="nombreAdm" type="text" id="nombre_adm" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apellido Paterno:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="apellido_p_admin" type="text" id="paterno_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apellido Materno:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="apellido_mAdmin" type="text" id="materno_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Correo:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="correoAdmin" type="email" id="correo_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Fecha Nacimiento:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="fecha_admin" type="date" id="nacimiento_adm" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Sexo:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="sexo_adm" type="text" id="sexo_admin" readonly>
                        <select class="form-control d-none" required name="select_sexoAdm" id="select_adminSexo" >
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
                        <input class="form-control input-md" name="telf_adm" type="text" id="telf_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">País:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="adminPais" type="text" id="pais_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Estado/Ciudad:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="ciudad_adm" type="text" id="ciudad_admin" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Convenio:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="conv_admin" type="text" id="convenio_adm" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Activo/Inactivo</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="activ_adm" type="text" id="actividad_admin" readonly>
                        <select class="form-control d-none" required name="select_activAdm" id="select_adm_activ" >
                            <option value="1">Activo</option> 
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Plan Donación</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="adminDona" type="text" id="planDonaAdmin" readonly>

                        <select class="form-control d-none" required name="select_planAdm" id="selectPlan_admin" >
                            <option value="1">Sin Plan</option> 
                            <option value="2">Plan 1: Meditar</option> 
                            <option value="3">Plan 2: Reflexionar</option>
                            <option value="4">Plan 3: Comprender</option>
                        </select>
                    </div>
                </div>
            
                <center class="d-none" id="guardar_admin">
                    <button type="submit" class="btn btn-primary" onclick="actualizarAdmin();">Guardar</button>
                </center>
                
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- --FIN MODAL INFO ADMIN -->

<!-- INICIA MODAL NEW ADMIN -->
<div class="modal fade" id="newAdmModal" style="overflow:hidden;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: rgba(133, 193, 233, 0.4);">
                <h5 class="modal-title">Agregar Nuevo Administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body" style="background: rgba(133, 193, 233, 0.2);">
                <!-- CARD BODY -->
                <div class="card-body">
                    <form id="form_newAdm" action="includes/admin/crud_admin.php" method="POST" onsubmit="msje_regAdm();" >
                                                
                        <input class="d-none" type="text" name="rol_adm" value="1">

                        <div>
                            <h5>DATOS PERSONALES</h5>
                            <hr style="background: rgba(133, 193, 233, 0.4);">
                        </div>

                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Nombres:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newAdm_nombres" id="newadm_name" class="form-control form-control-lg" placeholder="Nombres" aria-label="Nombres" aria-describedby="names-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Apellido Paterno:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newAdm_paterno" id="newadm_paterno" class="form-control form-control-lg" placeholder="Apellido Paterno" aria-label="Apellido Paterno" aria-describedby="apellidoPat-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Apellido Materno:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newAdm_materno" id="newadm_materno" class="form-control form-control-lg" placeholder="Apellido Materno" aria-label="Apellido Materno" aria-describedby="apellidoMat-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Correo:</label> 
                            <input type="email" name="newAdm_email" id="newadm_correo" class="form-control form-control-lg" placeholder="Email (Será su Usuario)" aria-label="Email" aria-describedby="email-addon" required>
                        </div>
                        <div class="mb-3" id="grupo__selectTipoDoc">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Tipo Documento de Identidad:</label> 
                            <select class="form-control form-control-lg letra-select" id="newadm_tipo_doc" name="newAdm_tipoDoc" aria-label="Tipo Documento Identidad" aria-describedby="tipoDoc-addon" required>
                                <option disabled selected value="defecto_tipoDoc">Tipo de Documento de Identidad</option>
                                <option value="1">DNI</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Carné de Extranjería</option>
                            </select>                  
                        </div>
                        <div class="mb-3" id="grupo__nroDoc">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Número de Documento de Identidad:</label> 
                            <input type="text" name="newAdm_nroDoc" id="newadm_num_doc" class="form-control form-control-lg" placeholder="N° Documento" aria-label="Nro Documento Identidad" aria-describedby="nroDocIdentidad-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Fecha de Nacimiento:</label> 
                            <input type="date" name="newAdm_nacimiento" id="newadm_fechaNac" class="form-control form-control-lg" aria-label="Fecha nacimiento" aria-describedby="fechaNacimiento-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">País:</label> 
                            <input onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" type="text" name="newAdm_pais" id="newadmPais" class="form-control form-control-lg" placeholder="País" aria-label="País" aria-describedby="pais-addon" required>            
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Ciudad/Estado:</label> 
                            <input onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" type="text" name="newAdm_ciudad" id="newadmCiudad" class="form-control form-control-lg" placeholder="Estado/ Ciudad" aria-label="Estado/Ciudad" aria-describedby="estado-addon" required>                 
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Celular:</label> 
                            <input type="text" name="newAdm_telf" id="newadmTelf" class="form-control form-control-lg" placeholder="Celular" aria-label="Celular" aria-describedby="celular-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Sexo:</label> 
                            <select class="form-control form-control-lg letra-select" id="newAdm_genero" name="newAdm_sexo" aria-label="Select Genero" required>
                                <option disabled selected value="defecto_genero">Género</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                                <option value="4">Prefiero no decirlo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Contraseña:</label> 
                            <input type="password" name="newAdm_pass" id="newadmPass" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Plan de Donación:</label> 
                            <select class="form-control form-control-lg letra-select" id="newadmDona" name="newAdm_dona" aria-label="Select Donacion" required>
                                <option disabled selected value="defecto_dona">Selecciona Plan de Donación</option>
                                <option value="1">Sin Plan</option>
                                <option value="2">Plan 1: Meditar</option>
                                <option value="3">Plan 2: Reflexionar</option>
                                <option value="4">Plan 3: Comprender</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Convenio:</label> 
                            <input type="text" name="newAdm_convenio" id="newadmConv" class="form-control form-control-lg" placeholder="Convenio" aria-label="convenio" aria-describedby="convenio-addon">
                        </div>

                        <div>
                            <br><br>
                            <h5>DATOS ADMINISTRADOR</h5>
                            <hr style="background: rgba(133, 193, 233, 0.4);">
                        </div>

                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Área:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newAdm_area" id="newadmArea" class="form-control form-control-lg" placeholder="Área del Administrador" aria-label="administrador" aria-describedby="admin-addon" required>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">AÑADIR NUEVO ADMINISTRADOR</button>
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
<!-- FIN MODAL NEW ADMIN -->

<!-- termina modal -->