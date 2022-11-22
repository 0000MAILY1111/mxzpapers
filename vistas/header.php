<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="76x76" href="../public/img/logoMXZ/logoBlack_1.png">
  <link rel="icon" type="image/png" href="../public/img/logoMXZ/logoBlack_1.png">
  <title>MXZ_PAPERS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">

  <!-- Sellecte funcctioin -->
  <link rel="stylesheet" href="../public/plugins/bootstrap-select/css/bootstrap-select.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="../public/img/logMXZ/logoBlack_1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MXZ_PAPERS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo strtoupper($_SESSION['nombre']); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <!-- PAQUETE_P1 ADMINISTRAR USUARIO -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  ADMINISTRAR USUARIO
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>USUARIO</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="personal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ROLES</p>
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="personal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PERMISO</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="personal.php" class="nav-link">
                    <!--  preguntar??? -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>PERSONAL</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <!--  preguntar??? -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>BITACORA</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- FIN DE PAQUETE_P1 ADMINISTRAR USUARIO -->

            <!-- PAQUETE_2 ADMINISTRAR VENTA -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  ADMINISTRAR VENTA
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="cliente.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>CLIENTE</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cliente.php" class="nav-link">
                    <!-- preguntar??? -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>NOTA DE VENTA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cliente.php" class="nav-link">
                    <!--  preguntar??? -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>GENERAR NOTA DE VENTA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tipopago.php" class="nav-link">
                    <!--  preguntar??? -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>TIPO DE PAGO</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- FIN DE PAQUETE_P2 ADMINISTRAR VENTA -->
            <!-- PAQUETE_3 ADMINISTRAR COMPRA -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  ADMINISTRAR COMPRA
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="usuario.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>NOTA DE COMPRA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="proveedor.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PROVEEDOR</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- FIN DE PAQUETE_P3 ADMINISTRAR COMPRA -->

            <!-- PAQUETE_P4 ADMINISTRAR PRODUCTO -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-cubes-alt"></i>
                <p>
                  ADMINISTRAR PRODUCTO
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="categoria.php" class="nav-link">
                    <!-- archivos de la vista -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>CATEGORIA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="marca.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MARCA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UNIDAD DE MEDIDA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="producto.php" class="nav-link">
                    <!--  preguntar??? -->
                    <i class="far fa-circle nav-icon"></i>
                    <p>PRODUCTO</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- FIN DE PAQUETE_P4 ADMINISTRAR PRODUCTO -->


            <!-- PAQUETE_P5 ADMINISTRAR INVENTARIO -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  ADMINISTRAR INVENTARIO
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>NOTA DE ENTRADA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="personal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>NOTA DE SALIDA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="personal.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>INVENTARIO</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- FIN PAQUETE_P5 ADMINISTRAR INVENTARIO -->

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>