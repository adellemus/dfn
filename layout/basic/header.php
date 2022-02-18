<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo BASE_URL; ?>public/img/favicon.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title>

    <!-- Bootstrap -->
    <!-- Validate -->
    <link href="<?php echo BASE_URL; ?>public/css/validationEngine.jquery.css" rel="stylesheet" type="text/css" /> 
    <!-- Font Awesome -->
    <!-- NProgress -->
    <!-- iCheck -->
  
    <!-- bootstrap-progressbar -->
    <!-- JQVMap -->
    <!-- bootstrap-daterangepicker -->

    <!-- Custom Theme Style -->
    <link href="<?php echo BASE_URL; ?>build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>public/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>layout/basic/css/styles.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>layout/basic/css/templatemo-style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>layout/basic/css/vegas.min.css" rel="stylesheet">

    <link href="<?php echo BASE_URL; ?>public/css/alertify.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_URL; ?>public/css/alertify.core.css" rel="stylesheet" type="text/css" />-->
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/jquery.dataTables.min.css"/>

    <!-- Animate.css -->
    <link href="<?php echo BASE_URL; ?>vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- css de las vistas -->
    <?php if(isset($_layoutParams['css']) && count($_layoutParams['css'])): ?>
        <?php for($i=0; $i < count($_layoutParams['css']); $i++): ?>
            <link href="<?php echo $_layoutParams['css'][$i] ?>" rel="stylesheet" type="text/css" />
        <?php endfor; ?>
    <?php endif; ?> 
  </head>
  
<?php if (session::get('autenticado')): ?>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-5" href="<?php echo BASE_URL; ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-home"></i>
        Inicio
        </div>
      </a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#!">Cambiar contraseña</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="<?php echo BASE_URL ?>login/cerrar">Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">General</div>
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="far fa-building"></i></div>
                Empresas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="<?php echo BASE_URL ?>empresa">Administrar</a>
                  <a class="nav-link" href="<?php echo BASE_URL ?>empresa/influencer">Listado</a>
                </nav>
              </div>
              
               <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
                Usuarios
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="<?php echo BASE_URL ?>usuarios">Administrar</a>
                  <a class="nav-link" href="layout-sidenav-light.html">Listado de Actividades</a>
                </nav>
              </div>
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                Choferes/Conductores
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="<?php echo BASE_URL ?>chofer">Administrar</a>
                  <a class="nav-link" href="<?php echo BASE_URL ?>chofer/influencer">Listado de Actividades</a>
                </nav>
              </div>
               <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
                Cargas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="layout-static.html">Administrar</a>
                  <a class="nav-link" href="layout-sidenav-light.html">Listar</a>
                </nav>
              </div>
              <div class="sb-sidenav-menu-heading">Reportes</div>
              <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                  1
              </a>
              <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>
                  2
              </a>
              <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-file-contract"></i></div>
                  3
              </a>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged:</div>
              <?php print_r($_SESSION['usuario']); ?>
              <?php print_r($_SESSION['role']); ?>
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main>
                    
  <?php endif; ?>