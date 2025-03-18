<?php
    use App\Models\ConfiguracionModel;
    use App\Models\Usuarios;
    $conf     = new ConfiguracionModel;
    $usuarios = new Usuarios;
    $usuario  = $usuarios->where('id', session()->get('id'))->find();
    $name     = $conf->findAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CI Abarrotes 2</title>
    <?php echo link_tag('images/shops.png', 'shortcut icon', 'image/x-icon');?>

    <!-- Custom fonts for this template-->
    <?php echo link_tag('fontawesome/css/all.css')?>
    <?php echo link_tag('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')?>

    <!-- Custom styles for this template-->
    <?php echo link_tag('css/sb-admin-2.min.css')?>
    <!-- <?php echo link_tag('sweetalert/dist/sweetalert2.min.css')?> -->
    <?php echo link_tag('dataTable/css/datatables.min.css')?>
    <!-- Bootstrap core JavaScript-->
    <?php echo script_tag('popper/popper.min.js')?>
    <?php echo script_tag('jquery/jquery-3.6.0.js')?>
    <?php echo script_tag('bootstrap/bootstrap.min.js')?>
    <?php echo script_tag('sweetalert/sweetalert2.js')?>
    <?php echo script_tag('fontawesome/js/all.js')?>
    <?php echo script_tag('chartjs/chart.min.js')?>
    <?php echo script_tag('zoomerang/zoomerang.js')?>
    <?php echo script_tag('dataTable/js/datatables.min.js')?>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard')?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-store"></i> <!-- Poner aqui el logo u otra cosa -->
                </div>
                <?php foreach ($name as $empresa): ?>
                <div class="sidebar-brand-text mx-3">
                    <?php echo $empresa['nombre_empresa'] ? esc($empresa['nombre_empresa']) : 'Empresa sin nombre'?></div>
                <?php endforeach; ?>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <?php if (session()->get('rol_id') == 1): ?>
            <div class="sidebar-heading">
                Administrador
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('bitacora')?>" data-toggle="collapse"
                    data-target="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
                    <i class="fas fa-book"></i>
                    <span>Bitacora</span>
                </a>
                <div id="collapseZero" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones:</h6>
                        <?php echo anchor(base_url('bitacora'), 'Bitacora', ['class' => 'collapse-item'])?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('configuracion')?>">
                    <i class="fas fa-cogs"></i>
                    <span>Configuracion</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('empleados')?>">
                    <i class="fas fa-users-cog"></i>
                    <span>Empleados</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php endif; ?>
            <!-- Heading -->
            <?php if (session()->get('id') != 1): ?>
            <div class="sidebar-heading">
                Perfil de usuario
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('perfil')?>">
                    <i class="fas fa-user"></i>
                    <span>Perfil de usuario</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <?php endif; ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Abarrotes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('categorias')?>">
                    <i class="fas fa-tags"></i>
                    <span>Categorias</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('proveedores')?>">
                    <i class="fas fa-truck"></i>
                    <span>Proveedores</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('productos')?>">
                    <i class="fas fa-boxes"></i>
                    <span>Productos</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="salir">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span>
                </a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="#">Colors</a>
                        <a class="collapse-item" href="#">Borders</a>
                        <a class="collapse-item" href="#">Animations</a>
                        <a class="collapse-item" href="#">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Ferreteria
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="#">Login</a>
                        <a class="collapse-item" href="#">Register</a>
                        <a class="collapse-item" href="#">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="#">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h2>
                        <b>
                            <!--Aqui poner un titulo-->
                            <?php echo $this->renderSection('titulo')?>
                        </b>
                    </h2>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <?php echo csrf_field()?>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo session()->get('usuario')?>
                                </span>
                                <?php foreach ($usuario as $perfil): ?>
<?php $img = $perfil['rol_id'] != 1 ? $perfil['foto_perfil'] : 'images/undraw_profile.svg'?>
                                <?php echo img(['src' => $img, 'class' => 'img-profile rounded-circle'])?>
<?php endforeach; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php if (session()->get('id') != 1): ?>
                                <a class="dropdown-item" href="perfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil de usuario
                                </a>
                                <div class="dropdown-divider"></div>
                                <?php endif; ?>
                                <a class="dropdown-item" href="salir">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>


                    <!-- Contenido -->
                    <?php echo $this->renderSection('contenido');?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;JAX Studios <?php echo date('Y')?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Custom scripts for all pages-->
    <?php echo script_tag('js/sb-admin-2.min.js')?>
</body>

</html>