<html>

<head>
    <meta charset="utf-8" />
    <title>Gespol</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="<?php echo base_url("assets/images/logocarab.png"); ?>"-->
    <link href="<?php echo base_url("../plugins/bootstrap-select/css/bootstrap-select.min.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/core.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/components.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/icons.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/pages.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/menu.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.green.css"); ?>" id="theme-stylesheet">

    <script src="<?php echo base_url("assets/js/modernizr.min.js"); ?>"></script>

</head>


<body>
    <div class="page login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row m-t-50">
                    <div class="col-sm-5 bg-white center-page">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages ">
                                <div class="text-center account-logo-box">
                                    <h5 class="black-mode">Procedimientos de Seguridad</h5>

                                    <!--<img src="<?php echo base_url("assets/images/fondos/contraloria.jpg"); ?>" alt="" height="150">-->
                                </div>

                                <div class="account-content">
                                    <form class="form-horizontal" action="<?php echo base_url('inicio/login'); ?>" enctype="multipart / form-data" method="post">
                                        <div class="form-group m-b-25">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Rut</label>
                                                <input class="form-control input-lg" maxlength="10" type="text" id="rut" name="txtrut" value="<?php echo set_value('txtrut'); ?>" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="Ingrese su Rut (ej: 17808433k)">
                                            </div>
                                        </div>



                                        <div class="form-group m-b-25">
                                            <div class="col-xs-12">
                                                <!--<a href="page-recoverpw.html" class="text-muted pull-right font-14">Forgot your password?</a>-->
                                                <label for="password">Password</label>
                                                <input class="form-control input-lg" type="password" name="txtpass" required="" id="password" placeholder="Ingrese su password">
                                            </div>
                                        </div>

                                        <!--                                            <div class="form-group m-b-20">
                                                                                            <div class="col-xs-12">
                                                                                                <div class="checkbox checkbox-custom">
                                                                                                    <label>
                                                                                                        <input type="checkbox" value="">
                                                                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                                                                        Remember me
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>-->
                                        <?php echo validation_errors(); ?>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-lg btn-rounded  btn-lg btn-custom waves-effect waves-light" type="submit">Ingresar</button>

                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Creado por la Security and Peace <a href="page-register.html" class="text-dark m-l-5" p</a> </p> </div> </div> </div> <!-- end wrapper -->

                                </div>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
            <script>
                var resizefunc = [];
            </script>

            <!-- jQuery  -->
            <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
            <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
            <script src="<?php echo base_url("assets/js/metisMenu.min.js"); ?>"></script>
            <script src="<?php echo base_url("assets/js/waves.js"); ?>"></script>
            <script src="<?php echo base_url("assets/js/jquery.slimscroll.js"); ?>"></script>
            <script src="<?php echo base_url("../plugins/bootstrap-select/js/bootstrap-select.min.js"); ?>" type="text/javascript"></script>

            <!-- App js -->
            <script src="<?php echo base_url("assets/js/jquery.core.js"); ?>"></script>
            <script src="<?php echo base_url("assets/js/jquery.app.js"); ?>"></script>

            <script type="text/javascript">
                function soloNumeros(string) {
                    var out = '';
                    var filtro = '1234567890kK'; //Caracteres validos

                    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
                    for (var i = 0; i < string.length; i++)
                        if (filtro.indexOf(string.charAt(i)) != -1)
                            //Se añaden a la salida los caracteres validos
                            out += string.charAt(i);

                    //Retornar valor filtrado
                    return out;
                }
            </script>
            <script type="text/javascript">
                function Numeros(e) {
                    var key = window.Event ? e.which : e.keyCode
                    return (key >= 48 && key <= 57)
                }
            </script>

</body>

</html>