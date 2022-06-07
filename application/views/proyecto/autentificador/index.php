<?php

if (($this->session->userdata('auth_secret')==null)   ) {

    $this->session->set_userdata("failed", false);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gespol-Google Authenticator</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <link rel='shortcut icon' href='/favicon.ico'  />
   <link href="<?php echo base_url("assets/css/login2.css"); ?>" rel="stylesheet" type="text/css" />
    </head>
    <body  class="bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3"  style="background: white; padding: 20px; box-shadow: 10px 10px 5px #888888; margin-top: 100px;">
                    <h1>Google Authenticator</h1>
                    <p style="font-style: italic;">Autentificación Basada en Tiempo</p>
                    <hr>
                    <form action="<?php echo base_url('inicio/validagoogle'); ?>" method="post">
                        <div style="text-align: center;">
                            <?php if ($this->session->userdata('failed')==true){?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Ups!</strong> Código Invalido.
                                </div>
                                <?php
                                $this->session->set_userdata("failed", false);
                                ?>
                            <?php } ?>

                            <!--<img style="text-align: center;;" class="img-fluid" src="<?php echo base_url("qr/Qr.png"); ?>" style="width: 30px; height: 30px;"  alt="Verify this Google Authenticator"><br><br>-->        
                            <input type="text" class="form-control" name="code" placeholder="******" style="font-size: xx-large;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;"><br> <br>    
                            <button type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px;">Verificar</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>