

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <!--            <div class="clearfix">
                            <div class="pull-left">
                                <img src="assets/images/logo.png" alt="" height="30">
                            </div>
                            <div class="pull-right">
                                <h3 class="m-0">Invoice</h3>
                            </div>
                        </div>
            
            
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="pull-left m-t-30">
                                    <p><b>Hello, Stanley Jones</b></p>
                                    <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                        promises to provide high quality products for you as well as outstanding
                                        customer service for every transaction. </p>
                                </div>
            
                            </div>
                            <div class="col-sm-3 col-sm-offset-3 col-xs-4 col-xs-offset-2">
                                <div class="m-t-30 pull-right">
                                    <p><small><strong>Order Date: </strong></small> Jan 17, 2016</p>
                                    <p><small><strong>Order Status: </strong></small> <span class="label label-success">Paid</span></p>
                                    <p><small><strong>Order ID: </strong></small> #123456</p>
                                </div>
                            </div>
                        </div>-->
            <!-- end row -->

            <div class="row m-t-30">
                <h3> <p class="text-primary">FUNCIONARIOS INVOLUCRADOS  </p></h3>
                <?php foreach ($funcionarios as $val) { ?>
                    <!--                    <div class="col-xs-6">
                                            <h5><?php echo $val['primernombre'] . " " . $val['segundonombre'] . " " . $val['apellidopaterno'] . " " . $val['apellidomaterno'] ?></h5>
                    
                                            <address class="line-h-24">
                                                RUN:<?php echo $val['run'] . "-" . $val['digito'] ?> <br>
                                                Correo:<?php echo $val['correo'] ?> <br>
                                                Fecha Nacimiento: <?php echo $val['fechanac'] ?><br>
                                                <abbr title="Phone">Telefono:</abbr> <?php echo $val['fono'] ?>
                                            </address>
                                        </div>-->
                <?php } ?>
                <?php foreach ($funcionarios as $val) { ?>
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
                                    <img src="<?php echo base_url(); ?>img/<?php echo $val['img']; ?>" class="img-circle img-thumbnail" style="width:150px; height:120px;" alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="m-b-5"><?php echo $val['primernombre'] . " " . $val['segundonombre'] . " " . $val['apellidopaterno'] . " " . $val['apellidomaterno'] ?></h4>
                                    <h5 class="m-b-5">RUN: <?php echo $val['run'] ?></h5>
                                    <h5 class="m-b-5">Fecha Nacimiento: <?php echo $val['fechanac'] ?></h5>
                                    <abbr title="Phone">Telefono:</abbr> <?php echo $val['fono'] ?>
                                    <p class="text-muted"><span> <a href="#" class="text-primary"><?php echo $val['correo'] ?></a> </span></p>

                                </div>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
            </div>


  



   <?php if($idcalidad == 3){ ?>
            
                <div class="row m-t-30">
                <h3> <p class="text-primary">DATOS DE LA EMPRESA</p></h3>
                <?php foreach ($empresa as $val) { ?>            

                    <div class="col-md-10">                   
                        <table class="table table-bordered table-sm" style="font-size: 11px;">
                            <tbody>
       
                                <tr>
                                    <td><label class="control-label">NOMBRE</label></td>
                                    <td>  <H6><?php echo $val['nombre'] ?></H6></td>
                                    <td><label class="control-label">Razón Social</label></td>
                                    <td>  <H6><?php echo $val['razonsocial'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"> Giro:</label></td>
                                    <td> <H6><?php echo $val['girocomercial'] ?></H6></td>
                                    <td><label class="control-label">telefono</label></td>
                                    <td><H6><?php echo $val['telefono'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">Telefono Movil</label></td>
                                    <td><H6> <?php echo $val['telefonomovil'] ?></H6></td>   
                                     <td><label class="control-label">Email</label></td>
                                    <td><H6> <?php echo $val['email'] ?></H6></td>
                                </tr>
                              
                                                            
                                <tr>
                                  
                                    <td><label class="control-label">Region</label></td>
                                    <td><H6><?php echo $val['region'] ?></H6></td>
                                     <td><label class="control-label">Provincia</label></td>
                                    <td><H6> <?php echo $val['provincia'] ?></H6></td>
                                </tr>
                                <tr>
                                   
                                    <td><label class="control-label">Comuna</label></td>
                                    <td><H6><?php echo $val['comuna'] ?></H6></td>
                                    <td><label class="control-label">Direccion</label></td>
                                    <td><H6> <?php echo $val['direccion'] ?></H6></td> 
                                </tr>
                              
                               



                            </tbody>
                        </table>


                    </div>

                    <?php }?>

            </div>
            
            
            <?php } ?>
            
            <?php if($idcalidad == 2){ ?>
            
                <div class="row m-t-30">
                <h3> <p class="text-primary">DATOS DEL DUEÑO</p></h3>
                <?php foreach ($personadueno as $val) { ?>            

                    <div class="col-md-10">                   
                        <table class="table table-bordered table-sm" style="font-size: 11px;">
                            <tbody>
       
                                <tr>
                                    <td><label class="control-label">NOMBRE</label></td>
                                    <td>  <H6><?php echo $val['primernombre'] . " " . $val['segundonombre'] . " " . $val['apellidopaterno'] . " " . $val['apellidomaterno'] ?></H6></td>
                                    <td><label class="control-label">RUN</label></td>
                                    <td>  <H6><?php echo $val['run'] . "-" . $val['digito'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"> CORREO</label></td>
                                    <td> <H6><?php echo $val['correo'] ?></H6></td>
                                    <td><label class="control-label">FECHA NACIMIENTO</label></td>
                                    <td><H6><?php echo $val['fechanac'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">TELEFONO</label></td>
                                    <td><H6> <?php echo $val['fono'] ?></H6></td>                                    
                                </tr>
                              
                                <tr>
                                    <td><label class="control-label">CALIDAD</label></td>
                                    <td><H6> <?php echo $val['calidad'] ?></H6></td>
                                    <td><label class="control-label">NACIONALIDAD</label></td>
                                    <td><H6><?php echo $val['nacionalidad'] ?></H6></td>
                                </tr>
                              
                                <tr>
                                  
                                    <td><label class="control-label">TIPO PERSONA</label></td>
                                    <td><H6><?php echo $val['tipoper'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">IDENTIFICACION</label></td>
                                    <td><H6> <?php echo $val['indetificacion'] ?></H6></td>
                                    <td><label class="control-label">SEXO</label></td>
                                    <td><H6><?php echo $val['sexo'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">ESTADO CIVIL</label></td>
                                    <td><H6> <?php echo $val['estadocivil'] ?></H6></td>
                                    <td><label class="control-label">ESTUDIOS</label></td>
                                    <td><H6><?php echo $val['estudios'] ?></H6></td>
                                </tr>

                                <tr>
                                    <td><label class="control-label">PROFESIÓN</label></td>
                                    <td><H6> <?php echo $val['profesion'] ?></H6></td>
                                  
                                </tr>

                                    



                            </tbody>
                        </table>


                    </div>

                    <?php }?>

            </div>
            
            
            <?php } ?>

            <?php if($idcalidad == 2 ||$idcalidad == 1 ){ ?>
            
            
            <div class="row m-t-30">
                <h3> <p class="text-primary">DATOS DEL INFRACTOR</p></h3>
                <?php foreach ($persona as $val) { ?>
            

                    <div class="col-md-10">                   
                        <table class="table table-bordered table-sm" style="font-size: 11px;">
                            <tbody>
       
                                <tr>
                                    <td><label class="control-label">NOMBRE</label></td>
                                    <td>  <H6><?php echo $val['primernombre'] . " " . $val['segundonombre'] . " " . $val['apellidopaterno'] . " " . $val['apellidomaterno'] ?></H6></td>
                                    <td><label class="control-label">RUN</label></td>
                                    <td>  <H6><?php echo $val['run'] . "-" . $val['digito'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label"> CORREO</label></td>
                                    <td> <H6><?php echo $val['correo'] ?></H6></td>
                                    <td><label class="control-label">FECHA NACIMIENTO</label></td>
                                    <td><H6><?php echo $val['fechanac'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">TELEFONO</label></td>
                                    <td><H6> <?php echo $val['fono'] ?></H6></td>
                                    <td><label class="control-label">DIRECCIÓN</label></td>
                                    <td><H6><?php echo $val['direccion'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">VILLA O POBLACIÓN</label></td>
                                    <td><H6> <?php echo $val['villapoblacon'] ?></H6></td>
                                    <td><label class="control-label">CALIDAD PERSONA</label></td>
                                    <td><H6><?php echo $val['calidadper'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">CALIDAD</label></td>
                                    <td><H6> <?php echo $val['calidad'] ?></H6></td>
                                    <td><label class="control-label">NACIONALIDAD</label></td>
                                    <td><H6><?php echo $val['nacionalidad'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">REGION</label></td>
                                    <td><H6> <?php echo $val['region'] ?></H6></td>
                                    <td><label class="control-label">PROVINCIA</label></td>
                                    <td><H6><?php echo $val['provincia'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">COMUNA</label></td>
                                    <td><H6> <?php echo $val['comuna'] ?></H6></td>
                                    <td><label class="control-label">TIPO PERSONA</label></td>
                                    <td><H6><?php echo $val['tipoper'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">IDENTIFICACION</label></td>
                                    <td><H6> <?php echo $val['indetificacion'] ?></H6></td>
                                    <td><label class="control-label">SEXO</label></td>
                                    <td><H6><?php echo $val['sexo'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><label class="control-label">ESTADO CIVIL</label></td>
                                    <td><H6> <?php echo $val['estadocivil'] ?></H6></td>
                                    <td><label class="control-label">ESTUDIOS</label></td>
                                    <td><H6><?php echo $val['estudios'] ?></H6></td>
                                </tr>

                                <tr>
                                    <td><label class="control-label">PROFESIÓN</label></td>
                                    <td><H6> <?php echo $val['profesion'] ?></H6></td>
                                    <td><label class="control-label">TIPO LICENCIA</label></td>
                                    <td><H6><?php echo $val['tipolicencia'] ?></H6></td>
                                </tr>

                                <tr>
                                    <td><label class="control-label">NUMERO LICENCIA</label></td>
                                    <td><H6> <?php echo $val['numlicencia'] ?></H6></td>

                                </tr>
                                



                            </tbody>
                        </table>


                    </div>

<?php }?>

            </div>

                <?php } ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            <div class="row">
                <div class="col-md-12">
                    <h3> <p class="text-primary">Datos del Vehículo</p></h3>
                    <div class="table-responsive">
                        <table class="table m-t-30 table-colored table-primary">

                            <thead>
                            <th>Tipo Pantente</th>  
                            <th>Patente</th>   
                            <th>Marca Vehículo</th>  
                            <th>Modelo</th>  
                            <th>Tipo Vehículo</th>                                                                    
                            <th>Color</th>  
                            <th>Año</th>  

                            </tr></thead>
                            <tbody>
                                <?php foreach ($vehiculo as $val) { ?>
                                    <tr>
                                        <td><?php echo $val['tipopatente'] ?></td>
                                        <td><?php echo $val['patente'] ?></td>
                                        <td><?php echo $val['marcavehiculo'] ?></td>
                                        <td><?php echo $val['modelo'] ?></td>
                                        <td><?php echo $val['tipovehiculo'] ?></td>
                                        <td><?php echo $val['color'] ?></td>
                                        <td><?php echo $val['ano'] ?></td>                                      
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                    <!--                    <button id="" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="ponerpuntosssssss();">Guardar</button>-->
                </div>
            </div>




            <div class="row">
                <div class="col-md-12">
                    <h3> <p class="text-primary">INFRACCIONES REGISTRADAS </p></h3>
                    <div class="table-responsive">
                        <table class="table m-t-30 table-colored table-primary">
                            <thead>
                            <th> ID </th>
                            <th>Region</th>  
                            <th>Provincia</th>   
                            <th>Comuna</th>  
                            <th>Tipo Infracción</th>  
                            <th>Lugar Ocurrencia</th>  
                            <th>Fecha Suceso</th>                                             
                            <th>Hora Suceso</th>  
                            <th>Fecha Citación</th>  
                            <th>Hora Citación</th>  
                            <th>Numero Boleta</th>  
                            <th>Villa o Población</th>  
                            <th>Dirección de Ocurrencia</th>    
                            <th>Evidencia </th>
                            <th>PDF </th>
<!--                            <th>latitud</th>  
                           <th>longitud</th>  -->
                            </tr></thead>
                            <tbody>
                                <?php foreach ($infraccion as $val) { ?>
                                    <tr>
                                        <td><?php echo $val['id'] ?></td>
                                        <td><?php echo $val['region'] ?></td>
                                        <td><?php echo $val['provincia'] ?></td>
                                        <td><?php echo $val['comuna'] ?></td>
                                        <td><?php echo $val['tipoinfraccion'] ?></td>
                                        <td><?php echo $val['lugarocurrencia'] ?></td>
                                        <td><?php echo $val['fechasuceso'] ?></td>
                                        <td><?php echo $val['horasuceso'] ?></td>
                                        <td><?php echo $val['fechacitacion'] ?></td>
                                        <td><?php echo $val['horacitacion'] ?></td>
                                        <td><?php echo $val['numeroboleta'] ?></td>
                                        <td><?php echo $val['villapoblacion'] ?></td>
                                        <td><?php echo $val['direccion'] ?></td>


                                        <td><button  onclick="evidencia(<?php echo $val['id'] ?>)" type='button' value=" <?php echo base64_encode($val['id']) ?> " name='chkSeleccion' data-toggle="modal" data-target="#myModal" >Evidencia</button></td>


                                        <td class=center><a href="<?php echo base_url(); ?>index.php/procedimientos/Ctr_Busqueda/pdf?id=<?php echo base64_encode($val['id']); ?>&idacto=<?php echo base64_encode($val['idacto']); ?>" target="_blank"><img style="width:3  0px; height:30px;" src="<?php echo base_url("assets/images/icons/pdf.png"); ?>" alt="Los Tejos" /></a>   
                                   <!--<td><a href="<?php echo base_url("procedimientos/ctr_infracciones/pdf"); ?>"  target="_blank">PDF</a></td>-->


                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                    <!--                    <button id="" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="ponerpuntosssssss();">Guardar</button>-->
                </div>
            </div>






            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title"><b>Vista Mapa</b></h4>

                        <div class="map" id="vista_buscadetalle" ></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-20 header-title"><b>Street View Panorámica</b></h4>

                        <div class="map" id="pano"></div>
                    </div>
                </div>

                <script type="text/javascript">
                    start_map_buscadetalle();
                </script>
            </div>


        </div>

    </div>

</div>
<!-- end row -->

</div> <!-- container -->

</div> <!-- content -->


</div>
<!-- Modal -->


<script src="<?php echo base_url("plugins/custombox/js/custombox.min.js"); ?>"></script>
<script src="<?php echo base_url("plugins/custombox/js/legacy.min.js"); ?>"></script>



<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Modal title</h4>
    <div class="custom-modal-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </div>
</div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="evidencia">



        </div>
    </div>
</div>     


