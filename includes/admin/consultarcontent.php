<?php 
    require_once 'database/database.php';
?>
<script src="js/funciones.js"></script>

<!-- abrir modal de horarios -->
<script type="text/javascript">
     function modalOpenHorario(){
          $('#modalHorarios').modal({backdrop: 'static', keyboard: false});
     }
</script>

<body class="hold-transition sidebar-mini layout-fixed" onload="setTimeout(modalOpenHorario(), 5000);">
     <!-- inicia wrapper -->
     <div class="wrapper">

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
               <!-- Content Header (Page header) -->
               <section class="content-header">
                    <div class="container-fluid">
                         <!-- inicia row -->
                         <div class="row mb-2">
                              <div class="col-sm-6 mx-auto">
                                   <!-- empieza card -->
                                   <div class="card card-primary pd25">
                                        <div class="card-header">
                                             <h3 class="card-title h3-perfil">Programar consulta</h3>
                                        </div>
                                   
                                        <!-- Main content -->
                                        <section class="content">
                                             <div class="container-fluid">
                                                  <br>

                                                  <?php
                                                       $pdo = Database::connect();
                                                       $sql = "SELECT * FROM especialidades";
                                                       $optionsEspecialidad = '';
                                                       foreach ($pdo->query($sql) as $row){
                                                            $optionsEspecialidad .= '<option value="'.$row["especialidad_id"].'">'. $row["nombre_especialidad"] . '</option>';
                                                       }

                                                       $sql2 = "SELECT * FROM usuarios u INNER JOIN medicos m ON u.id_usuario = m.usuario_cod WHERE privilegio = 2";
                                                       $optionsMedicos = '';
                                                       $optionTelefono = '';
                                                       foreach ($pdo->query($sql2) as $fila){
                                                            $optionsMedicos .= '<option value="'.$fila["cod_medico"].'">'. $fila["nombres"] . ' ' . $fila["apellido_pat"]. ' ' . $fila["apellido_mat"] . '</option>';
                                                       }
                                                       
                                                       Database::disconnect();
                                                  ?>

                                                  <!-- Inicia Especialidad -->
                                                  <h5 class="text-center">Buscar Especialidad</h5>
                                                  <div class="row">
                                                       <div class="col-md-12">
                                                            <div class="input-group">
                                                                 <select class="form-control form-control-lg letra-select" id="newConsulta_especialidad" name="newConsulta_especialidad" aria-label="Buscar Especialidad" required>
                                                                      <option disabled selected value="defecto_especialidad">Busca la Especialidad</option>
                                                                      <?php echo $optionsEspecialidad; ?>
                                                                 </select>
                                                                 <div class="input-group-append">
                                                                      <button type="button" class="btn btn-lg btn-default">
                                                                           <i class="fa fa-search"></i>
                                                                      </button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <!-- END especialidad -->
                                                  <br><br>
                                                  <!-- Inicia buscar médico -->
                                                  <h5 class="text-center">Buscar Médico</h5>
                                                  <div class="row">
                                                       <div class="col-md-12">
                                                            <div class="input-group">
                                                                 <select class="form-control form-control-lg letra-select" id="newConsulta_medico" name="newConsulta_medico" aria-label="Buscar Médico" required>
                                                                      <option disabled selected value="defecto_medico">Busca al Médico</option>
                                                                      <?php echo $optionsMedicos; ?>
                                                                 </select>
                                                                 <div class="input-group-append">
                                                                      <button type="button" class="btn btn-lg btn-default">
                                                                           <i class="fa fa-search"></i>
                                                                      </button>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <!-- END buscar médico -->
                                             </div>

                                             <br>

                                             <input type="hidden" name="idUser_newConsulta" id="idUser_newConsulta" value='<?php echo $_SESSION["codUsuario"] ?>'>

                                             <div class="wow fadeInUp" data-wow-delay="0.8s">
                                                  <div class="col-md-6 col-sm-6">
                                                       <label for="date">Selecciona la Fecha</label>
                                                       <input type="date" id="newConsulta_fecha" name="newConsulta_fecha" class="form-control" required>
                                                  </div>

                                                  <div class="col-md-6 col-sm-6">
                                                       <label for="date">Selecciona la Hora</label>
                                                       <input type="time" id="newConsulta_hora" name="newConsulta_hora" class="form-control" required>
                                                  </div>

                                                  <br>

                                                  <div class="col-md-12 col-sm-12">
                                                       <button type="submit" id="newConsulta_programar" class="btn btn-primary" style="width: 100%;" onclick="newConsulta();">Programar consulta</button>                        
                                                  </div>
                                             </div>

                                        </section>
                                   </div>
                                   <!-- END card -->
                              </div>
                         </div>
                         <!-- END row -->
                    </div>
               </section>
          </div>
     </div>
     <!-- END wrapper -->
</body>

  <!-- INICIA MODAL HORARIOS -->
<div class="modal fade" id="modalHorarios" style="overflow:hidden;">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" style="max-width:80%">
          <div class="modal-content" style = "border: 3px solid rgba(133, 193, 233, 1); border-radius: 0.3rem;">
               <div class="modal-header" style="background: rgba(133, 193, 233, 0.4);">
                    <h5 class="modal-title">HORARIOS REFERENCIALES DE PSICÓLOGOS</h5>
               </div>
               <!-- contenido modal -->
               <div class="modal-body">
                    <table id="tableHorarios" class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <th scope="col"><center>HORA / DÍA</center></th>
                                   <th scope="col"><center>Lunes</center></th>
                                   <th scope="col"><center>Martes</center></th>
                                   <th scope="col"><center>Miércoles</center></th>
                                   <th scope="col"><center>Jueves</center></th>
                                   <th scope="col"><center>Viernes</center></th>
                                   <th scope="col"><center>Sábado</center></th>
                                   <th scope="col"><center>Domingo</center></th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <th scope="row"><center>9 A.M <br>-<br> 10 A.M.</center></th>
                                   <td><center>ALEJANDRO MANRÍQUEZ ESPINOZA</center></td>
                                   <td><center>LORENA CAMPOS VERA</center></td>
                                   <td><center>ALEJANDRO MANRÍQUEZ ESPINOZA</center></td>
                                   <td><center></center></td>
                                   <td><center>ALEJANDRO MANRÍQUEZ ESPINOZA <br><br> NAOMI CAMPBELL CLARK </center></td>
                                   <td><center>NAOMI CAMPBELL CLARK</center></td>
                                   <td><center>ALEJANDRO MANRÍQUEZ ESPINOZA</center></td>
                              </tr>

                              <tr>
                                   <th scope="row"><center>10 A.M <br>-<br> 11 A.M.</center></th>
                                   <td><center>LORENA CAMPOS VERA</center></td>
                                   <td><center>LORENA CAMPOS VERA</center></td>
                                   <td><center>NAOMI CAMPBELL CLARK</center></td>
                                   <td><center></center></td>
                                   <td><center>ALEJANDRO MANRÍQUEZ ESPINOZA <br><br> LORENA CAMPOS VERA </center></td>
                                   <td><center>NAOMI CAMPBELL CLARK</center></td>
                                   <td><center>LORENA CAMPOS VERA</center></td>
                              </tr>

                              <tr>
                                   <th scope="row"><center>11 A.M <br>-<br> 12 P.M.</center></th>
                                   <td><center>LORENA CAMPOS VERA</center></td>
                                   <td><center>LORENA CAMPOS VERA</center></td>
                                   <td><center>NAOMI CAMPBELL CLARK</center></td>
                                   <td><center>NAOMI CAMPBELL CLARK</center></td>
                                   <td><center>NAOMI CAMPBELL CLARK <br><br> LORENA CAMPOS VERA </center></td>
                                   <td><center>NAOMI CAMPBELL CLARK</center></td>
                                   <td><center>ALEJANDRO MANRÍQUEZ ESPINOZA</center></td>
                              </tr>
                         </tbody>
                    </table>
               </div>
               <!-- fin contenido modal -->
               <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
               </div>
          </div>
     </div>
</div>

</html>
