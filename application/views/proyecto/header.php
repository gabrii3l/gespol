<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Gestión Policial</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="<?php echo base_url("assets/images/logocarab.png"); ?>">-->


    <?php if ($opcion == "estadistica") { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bases.css"); ?>">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAslzZpKOyBXufRkIO4bM4GeZoIZCVgj84&libraries=places&libraries=&v=weekly&libraries=drawing"></script>

        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/maplabel.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/maplabel-compiled.js"); ?>"></script>

        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/mapa_estadistica.js"); ?>"></script>
    <?php } ?>

    <?php if ($opcion == "buscar") { ?>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/funciones_buscar.js"); ?>"></script>

        <link href="<?php echo base_url("plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/buttons.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/fixedHeader.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/responsive.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/scroller.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/dataTables.colVis.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/dataTables.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/fixedColumns.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bases.css"); ?>">
        <!--<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAslzZpKOyBXufRkIO4bM4GeZoIZCVgj84&libraries=places&callback=initialize&libraries=&v=weekly"></script>-->
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAslzZpKOyBXufRkIO4bM4GeZoIZCVgj84&libraries=places"></script>

        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/mapa_reportes.js"); ?>"></script>

        <script src="<?php echo base_url("assets/js/funciones_buscar.js"); ?>"></script>
    <?php } ?>

    <?php if ($opcion == "index") { ?>
        <link href="<?php echo base_url("plugins/c3/c3.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bases.css"); ?>">
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAslzZpKOyBXufRkIO4bM4GeZoIZCVgj84&libraries=visualization"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/mapa_principal.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/funciones_buscar.js"); ?>"></script>
    <?php } ?>

    <?php if ($opcion == "form") { ?>

        <link href="<?php echo base_url("plugins/timepicker/bootstrap-timepicker.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plugins/clockpicker/css/bootstrap-clockpicker.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plugins/bootstrap-daterangepicker/daterangepicker.css"); ?>" rel="stylesheet">


        <link href="<?php echo base_url("plugins/datatables/jquery.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/buttons.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/fixedHeader.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/responsive.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/scroller.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/dataTables.colVis.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/dataTables.bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("plugins/datatables/fixedColumns.dataTables.min.css"); ?>" rel="stylesheet" type="text/css" />


        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bases.css"); ?>">
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAslzZpKOyBXufRkIO4bM4GeZoIZCVgj84&libraries=places"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/functions.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/functionajax.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/mapa_vistapersona.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/mapa_terminar.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/delito/mapa_delito.js"); ?>"></script>

        <!-- Custom box css -->
        <link href="<?php echo base_url("plugins/custombox/css/custombox.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("plugins/summernote/summernote.css"); ?>" rel="stylesheet" />

    <?php } ?>

    <?php if ($opcion == "carga") { ?>
        <!-- Este código permite css de carga de archivos -->
        <link href="<?php echo base_url("plugins/jquery.filer/css/jquery.filer.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css"); ?>" rel="stylesheet" />
        <link href="<?php echo base_url("plugins/bootstrap-fileupload/bootstrap-fileupload.css"); ?>" rel="stylesheet" />
    <?php } ?>


    <!-- App css -->
    <link href="<?php echo base_url("plugins/bootstrap-select/css/bootstrap-select.min.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/core.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/components.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/icons.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/pages.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/menu.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet" type="text/css" />
    <!--<link href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" rel="stylesheet" />-->
    <link href="<?php echo base_url("/plugins/sweet-alert2/sweetalert2.min.css"); ?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url("assets/js/modernizr.min.js"); ?>"></script>

</head>


<body data-layout="horizontal" data-menu-align="center">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
                <!-- Image logo -->
                <a href="#" class="logo">
                    <span class="brand-text font-weight-left">
                        <img src="<?php echo base_url("assets/images/icons/icono.png"); ?>" alt="" height="60">

                    </span>

                    <i class="logo">
                        <img src="<?php echo base_url("assets/images/icons/icono2.png"); ?>" alt="" height="58">
                    </i>
                </a>
            </div>



            <!-- Sidebar -->



            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">












                    <!-- Navbar-left -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button type="button" class="button-menu-mobile open-left waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>

                    </ul>

                    <!-- Right(Notification) -->
                    <ul class="nav navbar-nav navbar-right">
                        <!--                            <li class="hidden-xs">
                                                            <form role="search" class="app-search">
                                                                <input type="text" placeholder="Search..."
                                                                       class="form-control">
                                                                <a href=""><i class="fa fa-search"></i></a>
                                                            </form>
                                                        </li>-->
                        <li>
                            <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                <i class="dripicons-bell"></i>
                                <span class="badge badge-pink">4</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right dropdown-lg user-list notify-list">
                                <li class="list-group notification-list m-b-0">
                                    <div class="slimscroll">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left p-r-10">
                                                    <em class="fa fa-diamond bg-primary"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left p-r-10">
                                                    <em class="fa fa-cog bg-warning"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left p-r-10">
                                                    <em class="fa fa-bell-o bg-custom"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Updates</h5>
                                                    <p class="m-0">
                                                        There are <span class="text-primary font-600">2</span> new updates available
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left p-r-10">
                                                    <em class="fa fa-user-plus bg-danger"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New user registered</h5>
                                                    <p class="m-0">
                                                        You have 10 unread messages
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left p-r-10">
                                                    <em class="fa fa-diamond bg-primary"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order has been placed</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="media-left p-r-10">
                                                    <em class="fa fa-cog bg-warning"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>
                                                    <p class="m-0">
                                                        There are new settings available
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <!-- end notification list -->
                            </ul>
                        </li>

                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="<?php echo base_url("img/"); ?><?php echo $sesion['Img'] ?>" alt="user-img" class="img-circle user-img">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li><a href="<?php echo base_url('inicio/principal'); ?>">Principal</a></li>
                                <!--<li><a href="javascript:void(0)"><span class="badge badge-info pull-right">4</span>Settings</a></li>-->
                                <li><a href="<?php echo base_url('evento/ingresar'); ?>">Ingresar Evento</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('inicio/cerrarsesion'); ?>">Cerrar Sesión</a></li>
                            </ul>
                        </li>

                    </ul> <!-- end navbar-right -->

                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metisMenu nav" id="side-menu">
                        <li class="menu-title">Menú <?php echo $sesion['descripcionperfil'] ?></li>
                        <!--                            <li>
                                                            <a href="<?php echo base_url('inicio/principal'); ?>"><i class="fa fa-line-chart"></i><span class="badge badge-success pull-right"><?php echo $cantinfraccion->CONTADOR ?></span> <span> Principal   </span> </a>
                                                        </li>-->
                        <!--                            <li>
                                                            <a href="javascript: void(0);" aria-expanded="true"><i class="fi-layout"></i> <span> Eventos Policiales </span> <span class="menu-arrow"></span></a>
                                                            <ul class="nav-second-level nav" aria-expanded="true">
                            <?php foreach ($sesion['menuperfil'] as $val) { ?>
                                                        
                                                                                                <li><a href="<?php echo base_url($val["ruta"]); ?>"><img class="icon-colored" src="<?php echo base_url("assets/images/icons/survey.svg"); ?>" title="survey.svg"><?php echo $val["menu"]; ?></a></li>
                                                        
                            <?php } ?>
                                                            </ul>
                                                        </li>-->

                        <?php foreach ($sesion['menuperfil'] as $val) { ?>
                            <li>
                                <a href="<?php echo base_url($val["ruta"]); ?>"><i class="<?php echo $val["icono"]; ?>"></i><span class="badge badge-success pull-right"><?php
                                                                                                                                                                            if ($val["menu"] === "Principal") {
                                                                                                                                                                                echo $cantinfraccion->CONTADOR;
                                                                                                                                                                            }
                                                                                                                                                                            ?></span><span><?php echo $val["menu"]; ?></span></a>
                            </li>
                        <?php } ?>

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h5 class="page-title">Bienvenido - <?php echo $fecha_actual; ?> </h5></br></br>


                                <h5 class="page-title" style="color: red">Usuario: <?php echo $sesion['PrimerNombre'] . " " . $sesion['SegundoNombre'] . " " . $sesion['ApellidoPaterno'] . " " . $sesion['ApellidoMaterno']; ?></h5></br>


                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="#">Codefox</a>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                    </li>
                                    <li class="active">
                                        Página Principal
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>