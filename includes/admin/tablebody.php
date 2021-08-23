<script src="js/funciones.js"></script>

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
                        <?php 
                            if($_SESSION['privilegio'] == 3 || $_SESSION['privilegio'] == 4){
                                //user
                                echo '
                                    <div class="col-sm-6">
                                        <h1>Mis consultas</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                            <li class="breadcrumb-item active">Mis consultas</li>
                                        </ol>
                                    </div>
                                ';
                            }else if($_SESSION['privilegio'] == 2){
                                //psicólogo
                                echo '
                                    <div class="col-sm-6">
                                        <h1>Consultas Aceptadas</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="consultoriocalma.php">Inicio</a></li>
                                            <li class="breadcrumb-item active">Consultas Aceptadas</li>
                                        </ol>
                                    </div>
                                ';
                            }else{

                            }
                        ?>
                    </div>
                </div>
            </section>

            <!-- contenido de data table -->

            <?php include_once 'includes/admin/tablecontent.php'; ?>
        </div>
    </div>
    <!-- ./wrapper -->
</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
