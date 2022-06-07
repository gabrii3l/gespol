
<div class="row">
    <div class="col-md-4"> 

        <div class="text-center card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                    <h3 class="m-0 text-muted"><i class="mdi mdi-dots-horizontal"></i></h3>
                </a>

            </div>
            <div class="clearfix"></div>
            <div class="member-card">
                <div class="thumb-xl member-thumb m-b-10 center-block">

                    <img src="<?php echo base_url(); ?>img/<?php echo $sesion['Imagen']; ?>" class="img-circle img-thumbnail" alt="profile-image">
                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                </div>

                <div class="">
                    <h4 class="m-b-5"><?php echo $sesion['PrimerNombre'] . " " . $sesion['SegundoNombre'] . " " . $sesion['ApellidoPaterno'] . " " . $sesion['ApellidoMaterno']; ?>  </h4>
                    <p class="text-muted"><?php echo $sesion['Correo']; ?> <span> | </span> <span> <a href="#" class="text-success"><?php echo $sesion['Entidad']; ?></a> </span></p>
                </div>

                <p class="text-muted font-13">
                <ul class="list-unstyled w-list">
                    <li><b>Comuna:</b> <?php echo $sesion['Comuna']; ?> </li>
                    <li><b>RUN:</b> <?php echo $sesion['RunUsuario'] . "-" . $sesion['DigitoUsuario']; ?> </li>                                          
                    <li><b>Grado:</b></li>
                    <li><b>Cargo:</b> </li>
                </ul>
                </p>
            </div>
        </div>
    </div>