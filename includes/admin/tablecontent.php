<?php 
    require_once 'database/database.php';
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <?php 
                            if($_SESSION['privilegio'] == 3){
                                //user
                                echo '
                                    <h3 class="card-title h3-tablecontent">Mis consultas</h3>
                                ';
                            }else if($_SESSION['privilegio'] == 2){
                                //psicólogo
                                echo '
                                    <h3 class="card-title h3-tablecontent">Consultas Aceptadas</h3>
                                ';
                            }else{

                            }
                        ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <?php 
                                    if($_SESSION['privilegio'] == 3){
                                        //usuario
                                        $theadUser = '
                                            <tr>
                                                <th>Status</th>
                                                <th>Psicólogo</th>
                                                <th>Especialidad</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Link Reunión</th>
                                                <th>Email</th>
                                                <th>Celular</th>
                                                <th>Resultados</th>
                                                <th>Reprogramar</th>
                                                <th>Cancelar</th>
                                            </tr>
                                        ';
                                        echo $theadUser;
                                    }else if($_SESSION['privilegio'] == 2){
                                        //psicólogo
                                        $theadPsico = '
                                            <tr>
                                                <th>Status</th>
                                                <th>Paciente</th>
                                                <th>Especialidad</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Link Reunión</th>
                                                <th>Email</th>
                                                <th>Celular</th>
                                                <th>Resultados</th>
                                                <th>Reprogramar</th>
                                                <th>Cancelar</th>
                                            </tr>
                                        ';
                                        echo $theadPsico;
                                    }else{

                                    }
                                ?>
                            </thead>
                            <tbody>
                                <?php 
                                    $pdo = Database::connect();
                                    if($_SESSION['privilegio'] == 3){
                                        //Usuario
                                        $sql="SELECT * FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON c.codigoUser = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta INNER JOIN especialidades esp ON c.especialidad = esp.especialidad_id WHERE c.codigoUser = '".$_SESSION['codUsuario']."'";

                                        foreach ($pdo->query($sql) as $row){
                                            if($row['link_medico'] == '' || $row['link_medico'] == NULL){
                                                $rowLinkMedico = 'SIN LINK DISPONIBLE';
                                            }else{
                                                $rowLinkMedico = $row['link_medico'];
                                            }

                                            echo '<tr>';
                                            echo '<td>'. $row['nombre_estadoConsulta'] .'</td>
                                            <td>'. $row['nombre_med'].' '. $row['ap_pat_med'].' '. $row['ap_mat_med'] .'</td>
                                            <td>'. $row['nombre_especialidad'] .'</td>
                                            <td>'. $row['fecha_consulta'] .'</td>
                                            <td>'. $row['hora_consulta'] .'</td>
                                            <td>'. $rowLinkMedico .'</td>
                                            <td>'. $row['email_med'] .'</td>
                                            <td>'. $row['telefono_consultaMedico'] .'</td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-default" id="results_verUser" href="#" data-toggle="modal" data-target="#modalResult_user" onclick="mostrarResultuser('."'".$row["codigoUser"]."'". ','."'".$row["consulta_id"]."'".');" style="font-size: 30px; padding: 20px;" title="Ver Mis Resultados">
                                                        <i class="far fa-file"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning" id="reprog_user" href="#" data-toggle="modal" data-target="#modalUser" onclick="reprogConsultaUser('."'".$row["codigoUser"]."'". ','."'".$row["consulta_id"]."'".'); editconsultaUser(false);" style="font-size: 30px; padding: 20px;" title="Reprogramar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-danger" style="font-size: 30px; padding: 20px;" title="Cancelar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </center>
                                            </td>';
                                            echo '</tr>';
                                        }
                                        Database::disconnect();

                                    }else if($_SESSION['privilegio'] == 2){
                                        //Psicólogo
                                        $sql="SELECT * FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON m.usuario_cod = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta INNER JOIN especialidades esp ON c.especialidad = esp.especialidad_id WHERE u.id_usuario = '".$_SESSION['codUsuario']."'";

                                        foreach ($pdo->query($sql) as $row){
                                            if($row['link_medico'] == '' || $row['link_medico'] == NULL){
                                                $rowLinkMedico = 'SIN LINK DISPONIBLE';
                                            }else{
                                                $rowLinkMedico = $row['link_medico'];
                                            }
                                            echo '<tr>';
                                            echo '<td>'. $row['nombre_estadoConsulta'] .'</td>
                                            <td>'. $row['nombre_pcte'].' '. $row['ap_pat_pcte'].' '. $row['ap_mat_pcte'] .'</td>
                                            <td>'. $row['nombre_especialidad'] .'</td>
                                            <td>'. $row['fecha_consulta'] .'</td>
                                            <td>'. $row['hora_consulta'] .'</td>
                                            <td>'. $rowLinkMedico .'</td>
                                            <td>'. $row['email_pcte'] .'</td>
                                            <td>'. $row['telf_pcte'] .'</td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-default" id="results_verMed" href="#" data-toggle="modal" data-target="#modalResult_med" onclick="mostrarResultmed('."'".$row["idUser_med"]."'". ','."'".$row["consulta_id"]."'".');" style="font-size: 15px; padding: 8px;" title="Ver Resultados">
                                                        <i class="far fa-file"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning" id="reprog_medico" href="#" data-toggle="modal" data-target="#modalMedico" onclick="reprogConsultaMed('."'".$row["idUser_med"]."'". ','."'".$row["consulta_id"]."'".'); editconsultaMed(false);" style="font-size: 10px; padding: 10px;" title="Reprogramar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-danger" style="font-size: 10px; padding: 10px;" href="#" title="Cancelar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </center>
                                            </td>';
                                        }
                                        Database::disconnect();

                                    }else{
                                        
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


 <!-- EMPIEZAN MODALES -->

    <!-- INICIA MODAL MÉDICOS -->
<div class="modal fade" id="modalMedico" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información de Consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body">
                <input type="hidden" name="cod_medConsulta" id="codigo_medConsulta" value="">
                <input type="hidden" name="id_ConsultaMed" id="id_consulta_med" value="">
                <input type="hidden" name="id_tableMedico" id="id_tablaMedico" value="">

                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Status de Consulta:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md d-none" type="text" name="statusConsultaMed" id="status_medConsulta" readonly>
                        <select class="form-control" required name="select_statusmedConsulta" id="select_medstatusconsulta" >
                            <option value="1">PENDIENTE</option>
                            <option value="2">CANCELADA</option>
                            <option value="3">FINALIZADA</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Fecha de la Consulta:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="fecha_medConsulta" type="date" id="consultaMed_fecha" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Hora de la Consulta:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="hora_medConsulta" type="time" id="consultaMed_hora" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Link para Reunión:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input class="form-control input-md" name="link_consultaMed" type="text" id="link_medConsulta" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Diagnóstico:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <textarea class="form-control input-md" name="diag_consultaMed" id="diag_medConsulta" readonly></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Apuntes:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <textarea class="form-control input-md" name="apuntes_consultaMed" id="apuntes_medConsulta" readonly></textarea>
                    </div>
                </div>
            
                <center >
                    <button type="submit" id="actualizar_consultaMedico" class="btn btn-primary" onclick="actualizarConsultaMedico();">Guardar</button>

                    <button type="submit" id="cancel_consultaMedico" class="btn btn-danger d-none" onclick="editconsultaMed(true);">Cancelar</button>
                </center>
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <!-- END MODAL MÉDICO -->

        <!-- INICIA MODAL USER -->
<div class="modal fade" id="modalUser" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información de Consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body">
                <input type="hidden" name="id_User" id="id_User" value="">
                <input type="hidden" name="id_ConsultaUser" id="id_ConsultaUser" value="">
                <input type="hidden" name="id_tableMedico" id="id_tableMedico" value="">
                <input type="hidden" name="id_userMedico" id="id_userMedico" value="">

                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-4 control-label">Especialidad:</label>
                    <div class="col-lg-7 col-md-5 col-sm-5 col-6">
                        <input class="form-control input-md d-none" type="text" name="especialidad_userConsulta" id="especialidad_userConsulta" readonly>
                        <select class="form-control" required name="select_userEspConsulta" id="select_userEspConsulta" >
                            <option value="1">TERAPIA FAMILIAR</option>
                            <option value="2">PSICOLOGÍA INFANTOJUVENIL</option>
                            <option value="3">PSICOLOGÍA COMUNITARIA</option>
                            <option value="4">TERAPIA COGNITIVO-CONDUCTUAL</option>
                            <option value="5">CLÍNICA Y DE SALUD</option>
                            <option value="6">TERAPIA DE PAREJAS</option>
                            <option value="7">TRASTORNOS DE LA CONDUCTA ALIMENTARIA</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Fecha de la Consulta:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="fecha_userConsulta" type="date" id="fecha_userConsulta" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-0"></div>
                    <label class="col-lg-2 col-md-3 col-sm-3 col-xs-4 control-label">Hora de la Consulta:</label>  
                    <div class="col-lg-7 col-md-5 col-sm-5 col-xs-6">
                        <input  class="form-control input-md" name="hora_userConsulta" type="time" id="hora_userConsulta" readonly>
                    </div>
                </div>
            
                <center >
                    <button type="submit" id="actualizar_consultaUser" class="btn btn-primary" onclick="actualizarConsultaUser();">Guardar</button>

                    <button type="submit" id="cancel_consultaUser" class="btn btn-danger d-none" onclick="editconsultaUser(true);">Cancelar</button>
                </center>
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <!-- END MODAL USER -->

    <!-- INICIA MODAL RESULT MEDICO -->
<div class="modal fade" id="modalResult_med" data-backdrop="static" data-keyboard="false" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: rgba(133, 193, 233, 0.4);">
                <h5 class="modal-title">Resultados de Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body" style="background: rgba(133, 193, 233, 0.2);">
                <input type="hidden" name="id_user" id="id_user" value="">
                <input type="hidden" name="id_medico" id="id_medico" value="">
                <input type="hidden" name="id_userMedico" id="id_userMedico" value="">
                <input type="hidden" name="id_consulta" id="id_consulta" value="">

                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Diagnóstico:</label> 
                    <textarea rows="10" class="form-control input-md" name="diag_result" id="diag_result" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Detalles:</label> 
                    <textarea rows="10" class="form-control input-md" name="diagdetail_result" id="diagdetail_result" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Próxima Sesión Recomendada:</label> 
                    <textarea rows="10" class="form-control input-md" name="proxSesion_result" id="proxSesion_result" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Notas Adicionales:</label> 
                    <textarea rows="10" class="form-control input-md" name="apuntes_result" id="apuntes_result" readonly></textarea>
                </div>
                
                <center>
                    <button type="submit" class="btn btn-primary" onclick="editResultmed(false);" id= "edit_diag_med">Editar</button>
                </center>
                <center>
                    <button type="submit" class="btn btn-primary d-none" id="guardar_result_med" onclick="actualizarResultMed('<?php $consult_id ?>');">Guardar</button>

                    <button type="submit" id="cancelar_resultmed" class="btn btn-danger d-none" onclick="editResultmed(true);">Cancelar</button>
                </center>
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <!-- END MODAL RESULT MEDICO -->

    <!-- INICIA MODAL RESULT USUARIO -->
<div class="modal fade" id="modalResult_user" data-backdrop="static" data-keyboard="false" style="overflow:hidden;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: rgba(133, 193, 233, 0.4);">
                <h5 class="modal-title">Mis Resultados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- contenido modal -->
            <div class="modal-body" style="background: rgba(133, 193, 233, 0.2);">
                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Diagnóstico:</label> 
                    <textarea rows="10" class="form-control input-md" name="resultado_diag_user" id="resultado_diag_user" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Detalles:</label> 
                    <textarea rows="10" class="form-control input-md" name="resultado_detail_user" id="resultado_detail_user" readonly></textarea>
                </div>

                <div class="mb-3">
                    <label class="col-lg-12 col-md-3 col-sm-3 col-12 control-label">Próxima Sesión Recomendada:</label> 
                    <textarea rows="10" class="form-control input-md" name="resultado_proxSes_user" id="resultado_proxSes_user" readonly></textarea>
                </div>
            </div>
            <!-- fin contenido modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <!-- END MODAL RESULT USUARIO -->

<!-- END MODALES -->

<script src="js/resultadosClinica.js"></script>