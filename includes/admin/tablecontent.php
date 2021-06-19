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
                                        $sql="SELECT c.consulta_id, c.codigoMedico, c.codigoUser, c.estado_consulta, c.especialidad, c.fecha_consulta, c.hora_consulta, c.link_medico, c.diagnostico_medico, m.cod_medico, m.usuario_cod, u.id_usuario, u.nombres, u.apellido_pat, u.apellido_mat, u.correo_user, ec.id_estadoConsulta, ec.nombre_estadoConsulta, esp.especialidad_id, esp.nombre_especialidad, (SELECT u.nombres FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON u.id_usuario = m.usuario_cod WHERE c.codigoMedico = m.cod_medico AND u.privilegio = 2) as 'nombre_medico', (SELECT u.apellido_pat FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON u.id_usuario = m.usuario_cod WHERE c.codigoMedico = m.cod_medico AND u.privilegio = 2) as 'paterno', (SELECT u.apellido_mat FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON u.id_usuario = m.usuario_cod WHERE c.codigoMedico = m.cod_medico AND u.privilegio = 2) as 'materno', (SELECT u.correo_user FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON u.id_usuario = m.usuario_cod WHERE c.codigoMedico = m.cod_medico AND u.privilegio = 2) as 'email_medico' FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON c.codigoUser = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta INNER JOIN especialidades esp ON c.especialidad = esp.especialidad_id WHERE c.codigoUser = '".$_SESSION['codUsuario']."'";

                                        foreach ($pdo->query($sql) as $row){
                                            if($row['link_medico'] == ''){
                                                $rowLinkMedico = 'SIN LINK DISPONIBLE';
                                            }else{
                                                $rowLinkMedico = $row['link_medico'];
                                            }
    
                                            if($row['diagnostico_medico'] == ''){
                                                $rowDiagMedico = 'SIN RESULTADOS DISPONIBLES';
                                            }else{
                                                $rowDiagMedico = $row['diagnostico_medico'];
                                            }
                                            echo '<tr>';
                                            echo '<td>'. $row['nombre_estadoConsulta'] .'</td>
                                            <td>'. $row['nombre_medico'].' '. $row['paterno'].' '. $row['materno'] .'</td>
                                            <td>'. $row['nombre_especialidad'] .'</td>
                                            <td>'. $row['fecha_consulta'] .'</td>
                                            <td>'. $row['hora_consulta'] .'</td>
                                            <td>'. $rowLinkMedico .'</td>
                                            <td>'. $row['email_medico'] .'</td>
                                            <td>'. $rowDiagMedico .'</td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning" style="font-size: 30px; padding: 20px;" href="#" title="Reprogramar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-danger" style="font-size: 30px; padding: 20px;" href="#" title="Cancelar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </center>
                                            </td>';
                                            echo '</tr>';
                                        }
                                        Database::disconnect();

                                    }else if($_SESSION['privilegio'] == 2){
                                        //Psicólogo
                                        $sql="SELECT c.consulta_id, c.codigoMedico, c.codigoUser, c.estado_consulta, c.especialidad, c.fecha_consulta, c.hora_consulta, c.link_medico, c.telefono_consultaMedico, c.diagnostico_medico, c.detalle_diagnostico, c.proxSesionRecomendada, c.apuntes_medico, m.cod_medico, m.usuario_cod, u.id_usuario, u.nombres, u.apellido_pat, u.apellido_mat, u.correo_user, ec.id_estadoConsulta, ec.nombre_estadoConsulta, esp.especialidad_id, esp.nombre_especialidad, (SELECT u.nombres FROM consulta c INNER JOIN usuarios u ON u.id_usuario = c.codigoUser WHERE u.id_usuario = c.codigoUser AND u.privilegio = 3) as 'nombre_paciente', (SELECT u.apellido_pat FROM consulta c INNER JOIN usuarios u ON u.id_usuario = c.codigoUser WHERE u.id_usuario = c.codigoUser AND u.privilegio = 3) as 'paterno', (SELECT u.apellido_mat FROM consulta c INNER JOIN usuarios u ON u.id_usuario = c.codigoUser WHERE u.id_usuario = c.codigoUser AND u.privilegio = 3) as 'materno', (SELECT u.correo_user FROM consulta c INNER JOIN usuarios u ON u.id_usuario = c.codigoUser WHERE u.id_usuario = c.codigoUser AND u.privilegio = 3) as 'email_paciente' FROM consulta c INNER JOIN medicos m ON c.codigoMedico = m.cod_medico INNER JOIN usuarios u ON m.usuario_cod = u.id_usuario INNER JOIN estado_consulta ec ON c.estado_consulta = ec.id_estadoConsulta INNER JOIN especialidades esp ON c.especialidad = esp.especialidad_id WHERE u.id_usuario = '".$_SESSION['codUsuario']."'";

                                        foreach ($pdo->query($sql) as $row){
                                            if($row['link_medico'] == ''){
                                                $rowLinkMedico = 'SIN LINK DISPONIBLE';
                                            }else{
                                                $rowLinkMedico = $row['link_medico'];
                                            }
    
                                            if($row['diagnostico_medico'] == ''){
                                                $rowDiagMedico = 'SIN RESULTADOS DISPONIBLES';
                                            }else{
                                                $rowDiagMedico = $row['diagnostico_medico'];
                                            }
                                            echo '<tr>';
                                            echo '<td>'. $row['nombre_estadoConsulta'] .'</td>
                                            <td>'. $row['nombre_paciente'].' '. $row['paterno'].' '. $row['materno'] .'</td>
                                            <td>'. $row['nombre_especialidad'] .'</td>
                                            <td>'. $row['fecha_consulta'] .'</td>
                                            <td>'. $row['hora_consulta'] .'</td>
                                            <td>'. $rowLinkMedico .'</td>
                                            <td>'. $row['email_paciente'] .'</td>
                                            <td>'. $rowDiagMedico .'</td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning" style="font-size: 30px; padding: 20px;" href="#" title="Reprogramar">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-danger" style="font-size: 30px; padding: 20px;" href="#" title="Cancelar">
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
                            <tfoot>
                                <?php 
                                    if($_SESSION['privilegio'] == 3){
                                        //usuario
                                        echo $theadUser;
                                    }else if($_SESSION['privilegio'] == 2){
                                        //psicólogo
                                        echo $theadPsico;
                                    }else{

                                    }
                                ?>
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
