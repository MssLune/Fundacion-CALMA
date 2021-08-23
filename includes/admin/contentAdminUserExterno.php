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
                            
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Administrar Usuarios Externos</li>
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
                                    <h3 class="card-title h3-tablecontent">Administrar Usuarios Externos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableAdminUser" class="table table-bordered table-striped">
                                        <a href="#" data-toggle="modal" data-target="#newUserModal" class="btn btn-primary" style="width: 100%; margin-bottom: 2%;" >Nuevo  Usuario Externo</a>
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
                                                    $sql = "SELECT *, priv.cod_privilegio, priv.nombre_privilegio FROM usuarios u INNER JOIN privilegios priv ON u.privilegio = priv.cod_privilegio WHERE privilegio = 4";
    
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
                                                                        <a class="btn btn-danger" onclick="eliminarUser('."'".$row["id_usuario"]."'".')" title="Eliminar">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <a class="btn btn-info" href="#" data-toggle="modal" data-target="#modalAdmin" onclick="masInfoUser('."'".$row["id_usuario"]."'".'); editUser(true);" title="Más Información">
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

 <!-- --MODAL USER -->
<div class="modal fade" id="modalAdmin" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Información de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body">
                <br>
                <center>
                    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-6">
                        <button type="button" class="btn btn-blue" onclick="editUser(false);" style="color: #FFFFFF; background: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
                            Editar <i class="far fa-edit"></i>
                        </button>
                    </div>
                </center>
                <br>
                <input type="hidden" name="cod_user" id="codigo_user" value="">
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Tipo de Documento:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md" type="text" name="tipo-doc" id="tipo_doc" readonly>
                        <select class="form-control d-none" required name="select_tip_doc" id="select_tipo_doc" >
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
                        <input class="form-control input-md" name="num_doc-user" type = "text" id="numdocUser" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Nombre:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="nombre-user" type="text" id="nombre_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apellido Paterno:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="apellido_p_user" type="text" id="paterno_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apellido Materno:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="apellido_m_user" type="text" id="materno_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Correo:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="correoUser" type="email" id="correo_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Fecha Nacimiento:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="fecha_nac-user" type="date" id="nacimiento_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Sexo:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="usersexo" type="text" id="sexo_user" readonly>
                        <select class="form-control d-none" required name="sexo_select_user" id="select_sexoUser" >
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
                        <input class="form-control input-md" name="telfUser" type="text" id="telf_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">País:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="paisUser" type="text" id="pais_user" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Estado/Ciudad:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="ciudad_user" type="text" id="estadoUser" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Convenio:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="convenio_user" type="text" id="convenioUser" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Activo/Inactivo</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="actividad-user" type="text" id="userActividad" readonly>

                        <select class="form-control d-none" required name="selectActiv_user" id="select_activUser" >
                            <option value="1">Activo</option> 
                            <option value="2">Inactivo</option> 
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Plan Donación</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="donaUser" type="text" id="planDona_user" readonly>

                        <select class="form-control d-none" required name="user_select_plan" id="select_planUser" >
                            <option value="1">Sin Plan</option> 
                            <option value="2">Plan 1: Meditar</option> 
                            <option value="3">Plan 2: Reflexionar</option>
                            <option value="4">Plan 3: Comprender</option>
                        </select>
                    </div>
                </div>
            
                <center class="d-none" id="guardar_user">
                    <button type="submit" class="btn btn-primary " onclick="actualizarUser();">Guardar</button>
                </center>
                
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- --FIN MODAL USERS -->

<!-- INICIA MODAL NEW USER -->
<div class="modal fade" id="newUserModal" style="overflow:hidden;" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: rgba(133, 193, 233, 0.4);">
                <h5 class="modal-title">Agregar Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body" style="background: rgba(133, 193, 233, 0.2);">
                <!-- CARD BODY -->
                <div class="card-body">
                    <form id="form_newUser" action="includes/admin/crud_usuario.php" method="POST" onsubmit="msje_regUser();" >
                                                
                        <input class="d-none" type="text" name="rolUser" value="3">

                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Nombres:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newUser_nombres" id="newuser_name" class="form-control form-control-lg" placeholder="Nombres" aria-label="Nombres" aria-describedby="names-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Apellido Paterno:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newUser_paterno" id="newuser_paterno" class="form-control form-control-lg" placeholder="Apellido Paterno" aria-label="Apellido Paterno" aria-describedby="apellidoPat-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Apellido Materno:</label> 
                            <input type="text" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" name="newUser_materno" id="newuser_materno" class="form-control form-control-lg" placeholder="Apellido Materno" aria-label="Apellido Materno" aria-describedby="apellidoMat-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Correo:</label> 
                            <input type="email" name="newUser_email" id="newuser_correo" class="form-control form-control-lg" placeholder="Email (Será su Usuario)" aria-label="Email" aria-describedby="email-addon" required>
                        </div>
                        <div class="mb-3" id="grupo__selectTipoDoc">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Tipo Documento de Identidad:</label> 
                            <select class="form-control form-control-lg letra-select" id="newuser_tipo_doc" name="newUser_tipoDoc" aria-label="Tipo Documento Identidad" aria-describedby="tipoDoc-addon" required>
                                <option disabled selected value="defecto_tipoDoc">Tipo de Documento de Identidad</option>
                                <option value="1">DNI</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Carné de Extranjería</option>
                            </select>                  
                        </div>
                        <div class="mb-3" id="grupo__nroDoc">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Número de Documento de Identidad:</label> 
                            <input type="text" name="newUser_nroDoc" id="newuser_num_doc" class="form-control form-control-lg" placeholder="N° Documento" aria-label="Nro Documento Identidad" aria-describedby="nroDocIdentidad-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Fecha de Nacimiento:</label> 
                            <input type="date" name="newUser_nacimiento" id="newuser_fechaNac" class="form-control form-control-lg" aria-label="Fecha nacimiento" aria-describedby="fechaNacimiento-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">País:</label> 
                            <input onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" type="text" name="newUser_pais" id="newuserPais" class="form-control form-control-lg" placeholder="País" aria-label="País" aria-describedby="pais-addon" required>            
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Ciudad/Estado:</label> 
                            <input onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" type="text" name="newUser_ciudad" id="newuserCiudad" class="form-control form-control-lg" placeholder="Estado/ Ciudad" aria-label="Estado/Ciudad" aria-describedby="estado-addon" required>                 
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Celular:</label> 
                            <input type="text" name="newUser_telf" id="newuserTelf" class="form-control form-control-lg" placeholder="Celular" aria-label="Celular" aria-describedby="celular-addon" required>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Sexo:</label> 
                            <select class="form-control form-control-lg letra-select" id="newUser_genero" name="newUser_sexo" aria-label="Select Genero" required>
                                <option disabled selected value="defecto_genero">Género</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">No Binario</option>
                                <option value="4">Prefiero no decirlo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Contraseña:</label> 
                            <input type="password" name="newUser_pass" id="newuserPass" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Plan de Donación:</label> 
                            <select class="form-control form-control-lg letra-select" id="newUserDona" name="newUser_dona" aria-label="Select Donacion" required>
                                <option disabled selected value="defecto_dona">Selecciona Plan de Donación</option>
                                <option value="1">Sin Plan</option>
                                <option value="2">Plan 1: Meditar</option>
                                <option value="3">Plan 2: Reflexionar</option>
                                <option value="4">Plan 3: Comprender</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Convenio:</label> 
                            <input type="text" name="newUser_convenio" id="newuserConv" class="form-control form-control-lg" placeholder="Convenio" aria-label="convenio" aria-describedby="convenio-addon">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">AÑADIR NUEVO USUARIO</button>
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
<!-- FIN MODAL NEW USER -->

<!-- termina modal -->