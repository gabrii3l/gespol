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
   <link href="<?php echo base_url("assets2/libs/bootstrap-select/bootstrap-select.min.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets2/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
   
    <!--<link href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" rel="stylesheet" />-->
    <link href="<?php echo base_url("plugins/sweet-alert2/sweetalert2.min.css"); ?>" rel="stylesheet" type="text/css">
   
    <link href="<?php echo base_url("assets2/css/app.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets2/css/icons.min.css"); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets2/libs/c3/c3.min.css"); ?>">
 

    <link href="<?php echo base_url("assets/css/icons.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/pages.css"); ?>" rel="stylesheet" type="text/css" />

</head>


<body data-layout="horizontal" data-menu-align="center">

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Navigation Bar-->
        <header id="topnav">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="d-none d-sm-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="slimscroll noti-scroll">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-settings-outline"></i>
                                        </div>
                                        <p class="notify-details">New settings
                                            <small class="text-muted">There are new settings available</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>


                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-bell-outline"></i>
                                        </div>
                                        <p class="notify-details">Updates
                                            <small class="text-muted">There are 2 new updates available</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user
                                            <small class="text-muted">You have 10 unread messages</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo base_url("assets/images/icons/icono.png"); ?>" alt="user-image" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>



                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo text-center logo-light">
                            <span class="logo-lg">
                                <img src="<?php echo base_url("assets/images/icons/icono.png"); ?>" alt="" height="50">
                                <!-- <span class="logo-lg-text-light">Codefox</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">C</span> -->
                                <img src="<?php echo base_url("assets/images/logo-sm.png"); ?>" alt="" height="24">
                            </span>
                        </a>

                        <a href="index.html" class="logo text-center logo-dark">
                            <span class="logo-lg">
                                <img src="<?php echo base_url("assets/images/logo-dark.png"); ?> alt="" height="20">
                                <!-- <span class="logo-lg-text-png">Codefox</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">c</span> -->
                                <img src="<?php echo base_url("assets/images/logo-sm.png"); ?> alt="" height="24">
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
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
                        </li>


                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Codefox</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                          
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Bienvenido - <?php echo $fecha_actual; ?></h4>
                                   
                                </div>
                            </div>
                        </div> 