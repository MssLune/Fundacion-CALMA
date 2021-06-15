<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Programar consultas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Programar consultas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="#">

                            

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="name">Nombres y Apellidos</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Escriba aquí">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="email">Correo electronico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Escriba aquí">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="date">Selecciona la fecha</label>
                                        <input type="date" name="date" value="" class="form-control">
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Seleccione una especialidad</label>
                                        <select class="form-control">
                            
                                             <option>Psicologia</option>
                                             <option>Nutrición</option>
                                        </select>
                                   </div>

                                   <div class="col-md-12 col-sm-12">
                                        <label for="telephone">Numero de celular</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Escriba aqui">
                                        <label for="Message">Comentarios</label>
                                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Escriba aquí"></textarea>
                                        <button type="submit" class="form-control" id="cf-submit" name="submit">Programar consulta</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

</div>
</div>
</body>

</html>
