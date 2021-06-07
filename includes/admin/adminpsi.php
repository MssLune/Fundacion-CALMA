<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once 'includes/admin/preloaderadmin.php'; ?>

        <?php include_once 'includes/admin/navbaradmin.php'; ?>

        <?php include_once 'includes/admin/adminsidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administrar psicologos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Administrar psicologos</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
    
    
            
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">       

        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Elige un Psicologo</option>
                <option value="1">PSICOLOGÍA CLÍNICA</option>
                <option value="2">PSICOLOGÍA EDUCATIVA</option>
                <option value="3">PSICOLOGÍA SOCIAL</option>
                <option value="4">PSICOLOGÍA EDUCATIVA</option>
                <option value="5">PSICOLOGÍA LABORAL</option>
                <option value="6">PSICOLOGÍA FAMILIAR</option>
        </select>

                <button type="button" class="btn btn-warning">Editar</button>
                
                <button type="button" class="btn btn-danger">Eliminar</button>
    
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
           
            <!-- contenido de data table -->

            <?php include_once 'includes/admin/tablepsicontent.php'; ?>

            <?php include_once 'includes/admin/controlsidebar.php'; ?>
        </div>
    </div>
    <!-- ./wrapper -->
</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
