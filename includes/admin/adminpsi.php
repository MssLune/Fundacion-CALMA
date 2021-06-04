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

            <!-- contenido de data table -->

            <?php include_once 'includes/admin/tablecontent.php'; ?>

            <?php include_once 'includes/admin/controlsidebar.php'; ?>
        </div>
    </div>
    <!-- ./wrapper -->
</body>

<?php include_once 'includes/admin/footeradmin.php'; ?>

</html>
