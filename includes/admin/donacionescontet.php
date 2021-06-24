<?php
  require_once 'database/database.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


      <?php include_once 'includes/admin/preloaderadmin.php'; ?>

      <?php include_once 'includes/admin/navbaradmin.php'; ?>

      <?php include_once 'includes/admin/adminsidebar.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div style="width:100%; height:0.35px; background-color:#5e72e4;">


      <!-- <img src="assets/img/shapes/waves-white.svg" alt="pattern-lines" class="position-absolute opacity-2 start-0"> -->
      </div>

        <div class="content-header">
          <?php
            $pdo = Database::connect();
            $sql = "SELECT u.id_usuario, u.cod_recurrenteDona, dr.id_donaRecurrente, dr.nombre_donaRecurrente FROM usuarios u INNER JOIN dona_recurrente dr ON u.cod_recurrenteDona = dr.id_donaRecurrente WHERE id_usuario = '".$_SESSION['codUsuario']."'";
            $q = $pdo->prepare($sql);
            $q->execute(array());
            $data = $q->fetch(PDO::FETCH_ASSOC);
            Database::disconnect();

            if($data['nombre_donaRecurrente'] == '-'){
              $nombrePlan = 'SIN PLAN ACTUAL';
            }else{
              $nombrePlan = $data['nombre_donaRecurrente'];
            }
          ?>
          <!-- inicia card -->
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-3">
                  <label>PLAN DE DONACIÓN ACTUAL:</label>
                </div>
                <div class="col-sm-9">
                <input type="text" class="form-control" value='<?php echo $nombrePlan ?>' readonly>
                </div>
              </div>
          </div>

            <!-- inicia card body -->
            <div class="card-body" id="moneda">
              <strong>Cambiar moneda:</strong>
              <div class="btn-group">
                <button type="button" class="btn btn-info">MONEDA</button>
                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                </button>
                <div class="dropdown-menu" role="menu">
                  <a class="dropdown-item" href="#">PEN</a>
                  <a class="dropdown-item" href="#">BOL</a>
                  <a class="dropdown-item" href="#">USD</a>
                </div>
              </div>
            </div>
            <!-- fin card-body -->
          </div>
          <!-- fin card -->


          <!-- inicia planes -->
          <div class="row">

            <!-- inicia card -->

            <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="card">
             <div align='center'>
              <div class="card-header" style="background-color:#E8DAEF;">
                <h4 class="my-0 font-weight-normal">Plan Lite</h4>

              </div>
                <div class="card-body">
                  <ul>
                    <li><center><h1 class=" pricing-card-title">S/ 40 <small class="text-muted">/ mes</small></h1></center></li><br/>
                    </ul>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li><center>Este servicio se brinda por: </center> </li>
                    <li><center><img src="img/wsp1.png"></center></li>
                    <li><center><img src="img/check.png">4 Consejerias por Mes</center></li>
                    <li><center><img src="img/check.png">Informe Bimensual y envio de contenido </center> </li>
                    <li><center><img src="img/check.png">Descuento en charlas, talleres y/o conferencias ONLINE. </center></li>
                    <li><center><img src="img/check.png">Descuento en Mamá Millennials</center></li>
                  </ul>
                  <td>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Solicita Ya</button>
                  </td>
                </div>
              </div>
             </div>
            </div>
</div>
            <!--fin card -->

            <!-- inicia card -->
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="card">
                <div class="card-header" style="background-color:#FCF3CF ;">

                <h4 class="my-0 font-weight-normal">Plan Premium</h4>
                </div>

                <div class="card-body">
                <ul>
                    <li><center><h1 class=" pricing-card-title">S/ 80 <small class="text-muted">/ mes</small></h1></center></li>
                    <br/>
                  </ul>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li><center>Este servicio se brinda por: </center> </li>
                    <li><center><img src="img/wsp1.png"></center></li>
                    <li><center><img src="img/check.png">6 Consejerias o Terapias por Mes</center></li>
                    <li><center><img src="img/check.png">Informe Bimensual y envio de contenido </center> </li>
                    <li><center><img src="img/check.png">Programa Psico Nutrición </center> </li>
                    <li><center><img src="img/check.png">VIP PASS Free a eventos ONLINE </center> </li>
                    <li><center><img src="img/check.png">Descuento en Mamá Millennials y menbresia en la Plataforma de Psicologos</center></li>
                    <li><center><img src="img/check.png">Reconocimiento por cumpleaños </center> </li>
                    <li><center><img src="img/check.png">Vales de descuento con empresas aliadas a la Fundación Calma.</center> </li>
                  </ul>
                  <td>
                    <button type="button"class="btn btn-lg btn-block btn-primary">Solicita Ya</button>
                  </td>
                </div>
              </div>
            </div>
            </div>
            <!-- fin card -->

            <!-- inicia card -->
            <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="card">
                <div class="card-header" style="background-color:#DAF7A6;">

                <h4 class="my-0 font-weight-normal">Plan Artesanos de Paz</h4>
                </div>

                <div class="card-body">
                <ul>
                    <li><center><h1 class=" pricing-card-title">S/ 150 <small class="text-muted">/ mes</small></h1></center></li>
                    <br/>
                  </ul>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li><center>Este servicio se brinda por: </center> </li>
                    <li><center><img src="img/wsp1.png"></center> </li>
                    <li><center><img src="img/check.png">Consejerias o Terapias ilimitadas por Mes</center></li>
                    <li><center><img src="img/check.png">Informe quincenal, envío de contenido por correo o WhatsApp.</center></li>
                    <li><center><img src="img/check.png">Programa Psico Nutrición </center> </li>
                    <li><center><img src="img/check.png">VIP PASS Free a eventos ONLINE y OFFLINE </center> </li>
                    <li><center><img src="img/check.png">Descuento en Mamá Millennials y menbresia en la Plataforma de Psicologos</center></li>
                    <li><center><img src="img/check.png">Reconocimiento por cumpleaños </center> </li>
                    <li><center><img src="img/check.png">Vales de descuento con empresas aliadas a la Fundación Calma. </center> </li>
                  </ul>
                  <td>
                    <button type="button" class="btn btn-lg btn-block btn-primary">Solicita Ya</button>
                  </td>
                </div>
              </div>
            </div>
            </div>
            <!-- fin card -->
           </div>
          <!-- fin planes -->
        </div>
      </div>
    </div>
    <!-- fin wrapper -->
</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
