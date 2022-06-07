<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>



        <meta charset="utf-8">
        <title>PDF Infracción</title>

        <style>
            @page { margin: 180px 50px; }
            #header { position: fixed; left: 0px; top: -150px; right: 0px; height: 150px; text-align: left; }
            #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px;}
            #footer .page:after { content: counter(page, upper-roman); }
            #watermark {
                position: fixed;
                text-align: center;
                opacity: .07;
                /**
                    Set a position in the page for your image
                    This should center it vertically
                **/
                bottom:   12cm;
                left:     5.5cm;
                /** Change image dimensions**/
                width:    8cm;
                height:   8cm;
                /** Your watermark should be behind every content**/
                z-index:  -1000;
            }
            div.encabezado{
                position: absolute;
                /*left:40px;*/
            }
            div.enca_carab{
                position: absolute;
                margin-top: 85px;
            }
            div.enca_carab2{
                position: absolute;
                margin-top: 30px;
                right: -20px;
            }
            div.enca_carab3{
                position: absolute;
                margin-top: 45px;
                right: 20px;
            }
            div.enca_carab4{
                position: absolute;
                margin-top: 60px;
                right: 10px;
            }
            th, td {
                border-bottom: 1px solid #ddd;
            }

            #content h4 {

                font-weight:bold;
                font-color:#ffffff;
                font-family: Vegur, 'PT Sans', Verdana, sans-serif;
            }
            #content{

                /*font-weight:bold;*/
                font-color:#ffffff;
                font-family: Vegur, 'PT Sans', Verdana, sans-serif;
            }

            #customers {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                /*width: 100%;*/
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>



    </head>
    <body>
        <div id="watermark">
          
              <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/images/LogoMuni/ptealto.png'?>"height="230%" width="200%"/>
        </div>

        <div class="container">
            <div id="header">
                <div class="encabezado">
                    
               <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/images/LogoMuni/ptealto.png'?>" height="120" width="140"/>
                    
                    </div>

                <div class="enca_carab2">INGRESO NUMERO</div>
                <div class="enca_carab3"> <?php echo $id; ?></div>
                <?php foreach ($vehiculo as $val) { ?>
                    <div class="enca_carab4">PATENTE: <?php echo $val['patente'] ?></div>

                <?php } ?>
            </div>
            <div id="footer">
                <p class="page">Pagina </p>
            </div>

            <div id="content">
          
            <?php if($this->session->userdata('idcalidad') == 3){ ?>
            
                  <h4>Datos de la Empresa</h4>
                <?php foreach ($empresa as $val) { ?>            

                                   
                    <table id="customers">
                            <tbody>
       
                                <tr>
                                    <td><b class="control-label">NOMBRE</b></td>
                                    <td>  <H6><?php echo $val['nombre'] ?></H6></td>
                                    <td><b class="control-label">Razón Social</b></td>
                                    <td>  <H6><?php echo $val['razonsocial'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><b class="control-label"> Giro:</b></td>
                                    <td> <H6><?php echo $val['girocomercial'] ?></H6></td>
                                    <td><b class="control-label">telefono</b></td>
                                    <td><H6><?php echo $val['telefono'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><b class="control-label">Telefono Movil</b></td>
                                    <td><H6> <?php echo $val['telefonomovil'] ?></H6></td>   
                                     <td><b class="control-label">Email</b></td>
                                    <td><H6> <?php echo $val['email'] ?></H6></td>
                                </tr>
                              
                                                            
                                <tr>
                                  
                                    <td><b class="control-label">Region</b></td>
                                    <td><H6><?php echo $val['region'] ?></H6></td>
                                     <td><b class="control-label">Provincia</b></td>
                                    <td><H6> <?php echo $val['provincia'] ?></H6></td>
                                </tr>
                                <tr>
                                   
                                    <td><b class="control-label">Comuna</b></td>
                                    <td><H6><?php echo $val['comuna'] ?></H6></td>
                                    <td><b class="control-label">Direccion</b></td>
                                    <td><H6> <?php echo $val['direccion'] ?></H6></td> 
                                </tr>
                              
                               



                            </tbody>
                        </table>


            

                    <?php }?>

            
            
            <?php } ?>
            
            
            
            <?php if($this->session->userdata('idcalidad') == 2){ ?>
          
                <h4>Datos del Dueño</h4>
                <?php foreach ($personadueno as $val) { ?>            

                                 
                        <table id="customers">
                            <tbody>
       
                                <tr>
                                    <td><b>NOMBRE</b></td>
                                    <td>  <H6><?php echo $val['primernombre'] . " " . $val['segundonombre'] . " " . $val['apellidopaterno'] . " " . $val['apellidomaterno'] ?></H6></td>
                                    <td><b>RUN</b></td>
                                    <td><H6><?php echo $val['run'] . "-" . $val['digito'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><b> CORREO</b></td>
                                    <td> <H6><?php echo $val['correo'] ?></H6></td>
                                    <td><b class="control-label">FECHA NACIMIENTO</b></td>
                                    <td><H6><?php echo $val['fechanac'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><b class="control-label">TELEFONO</b></td>
                                    <td><H6> <?php echo $val['fono'] ?></H6></td>                                    
                                </tr>
                              
                                <tr>
                                    <td><b class="control-label">CALIDAD</b></td>
                                    <td><H6> <?php echo $val['calidad'] ?></H6></td>
                                    <td><b class="control-label">NACIONALIDAD</b></td>
                                    <td><H6><?php echo $val['nacionalidad'] ?></H6></td>
                                </tr>
                              
                                <tr>
                                  
                                    <td><b class="control-label">TIPO PERSONA</b></td>
                                    <td><H6><?php echo $val['tipoper'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><b class="control-label">IDENTIFICACION</b></td>
                                    <td><H6> <?php echo $val['indetificacion'] ?></H6></td>
                                    <td><b class="control-label">SEXO</b></td>
                                    <td><H6><?php echo $val['sexo'] ?></H6></td>
                                </tr>
                                <tr>
                                    <td><b class="control-label">ESTADO CIVIL</b></td>
                                    <td><H6> <?php echo $val['estadocivil'] ?></H6></td>
                                    <td><b class="control-label">ESTUDIOS</b></td>
                                    <td><H6><?php echo $val['estudios'] ?></H6></td>
                                </tr>

                                <tr>
                                    <td><b class="control-label">PROFESIÓN</b></td>
                                    <td><H6> <?php echo $val['profesion'] ?></H6></td>
                                  
                                </tr>

                                    



                            </tbody>
                        </table>


                   

                    <?php }?>

        
            
            
            <?php } ?>
                
     

   <?php if($this->session->userdata('idcalidad') == 2 ||$this->session->userdata('idcalidad') == 1 ){ ?>
                <h4>Datos del Infractor</h4>
                <table id="customers">
                    <?php foreach ($persona as $val) { ?>
                        <tr>
                            <td><b>Nombre</b></td>                          
                           <td><?php echo $val['primernombre'] . " " . $val['segundonombre'] . " " . $val['apellidopaterno'] . " " . $val['apellidomaterno'] ?></td>
                            <td><b>RUN</b></td>
                            <td><?php echo $val['run'] . "-" . $val['digito'] ?> </td>
                        </tr>
                        <tr>
                            <td><b>Correo</b></td>
                            <td style="width: 200px;"><?php echo $val['correo'] ?></td>
                            <td><b>Fecha Nacimiento</b></td>
                            <td> <?php echo $val['fechanac'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Teléfono</b></td>
                            <td style="width: 200px;"><?php echo $val['fono'] ?></td>
                            <td><b>Dirección</b></td>
                            <td><?php echo $val['direccion'] ?></td>
                        </tr>
                        <tr>
                            <td style="width: 100px;"><b>Villa/Población</b></td>
                            <td style="width: 200px;"><?php echo $val['villapoblacon'] ?></td>
                            <td><b>Calidad Persona</b></td>
                            <td><?php echo $val['calidadper'] ?></td>
                        </tr>
                    <?php } ?>


                </table>
   <?php } ?>
                &nbsp;
                <h4>Datos del Vehículo</h4>
                <table id="customers">
                    <?php foreach ($vehiculo as $val) { ?>
                    
                        <tr>
                            <td><b>Tipo Patente</b></td>
                            <td><?php echo $val['tipopatente'] ?></td>                      
                            <td><b>Patente</b></td>
                            <td><?php echo $val['patente'] ?></td>
                        </tr>
                       <tr>
                            <td><b>Marca</b></td>
                           <td> <?php echo $val['marcavehiculo'] ?></td>                          
                            <td><b>Modelo</b></td>
                            <td><?php echo $val['modelo'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipo Vehíclo</b></td>
                            <td><?php echo $val['tipovehiculo'] ?>  </td>                        
                            <td><b>Color</b></td>
                            <td><?php echo $val['color'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Año</b></td>
                           <td> <?php echo $val['ano'] ?>       </td>                   
                            <td><b>Servicio Vehículo</b></td>
                            <td><?php echo $val['serviciovehiculo'] ?></td>
                        </tr>
                    <?php } ?>


                </table>
                &nbsp;
                <h4 style="margin-top:50px;">Datos de la Infracción</h4>
                <table id="customers">
                    <tbody>

                        <?php foreach ($infraccion as $val) { ?>

                            <tr>
                                <td><b>Region</b></td>
                                <td style="width: 150px;"><?php echo $val['region'] ?></td>                               
                                <td><b>Provincia</b></td>
                                <td  style="width: 50px;"><?php echo $val['provincia'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Comuna</b></td>
                                <td><?php echo $val['comuna'] ?></td>       

                                <td ><b>Dirección</b></td>
                                <td style="width: 300px;"><?php echo $val['direccion'] ?></td>
                            </tr>

                            <tr>
                                <td><b>Tipo Infracción</b></td>
                                <td style="width: 50px;"><?php echo $val['tipoinfraccion'] ?></td>                               
                                <td><b>Lugar Ocurrencia</b></td>
                                <td style="width: 50px;"><?php echo $val['lugarocurrencia'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Fecha Suceso</b></td>
                                <td style="width: 50px;"><?php echo $val['fechasuceso'] ?></td>                               
                                <td><b>Hora Suceso</b></td>
                                <td style="width: 50px;"><?php echo $val['horasuceso'] ?></td>
                            </tr>
                            <tr>
                                <td><b>Fecha Citación</b></td>
                                <td style="width: 50px;"><?php echo $val['fechacitacion'] ?></td>                               
                                <td><b>Hora Citación</b></td>
                                <td style="width: 50px;"><?php echo $val['horacitacion'] ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

                <div style="page-break-before: always;">

                    <div id="header">
                        <div class="encabezado">
                       
                              <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/images/LogoMuni/ptealto.png'?>" height="120" width="140"/>
                            
                            </div>

                        <div class="enca_carab2">INGRESO NUMERO</div>
                        <div class="enca_carab3"> <?php echo $id; ?></div>
                        <?php foreach ($vehiculo as $val) { ?>
                            <div class="enca_carab4">PATENTE: <?php echo $val['patente'] ?></div>

                        <?php } ?>
                    </div>
                    <div id="footer">
                        <p class="page">Pagina </p>
                    </div>

                    <h2>Set de Evidencia</h2>
                    <?php foreach ($infraccion as $val) { ?>
                        <table>
                            <?php if ($val['evidencia1']!= ""){ ?>
                            <tr>
                                <td>
                                    
                                    <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/evi/'.$val['evidencia1'];?>" style="margin-left: 100px;" alt="" height="400px;" width="500px;"/>
                                    
                                   
                                </td>

                            </tr>
                                <?php }?>
                                 <?php if ($val['evidencia2']!= ""){ ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/evi/'.$val['evidencia2'];?>" style="margin-left: 100px;" alt="" height="400px;" width="500px;"/>
                                </td>
                            </tr>
                              <?php }?>
                        </table>
                    <?php } ?>


                </div>
                <div style="page-break-before: always;">

                    <div id="header">
                        <div class="encabezado">
                            
                         <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/images/LogoMuni/ptealto.png'?>" height="120" width="140"/>
                            
                            </div>

                        <div class="enca_carab2">INGRESO NUMERO</div>
                        <div class="enca_carab3"> <?php echo $id; ?></div>
                        <?php foreach ($vehiculo as $val) { ?>
                            <div class="enca_carab4">PATENTE: <?php echo $val['patente'] ?></div>

                        <?php } ?>
                    </div>
                    <div id="footer">
                        <p class="page">Pagina </p>
                    </div>























                </div>  
            </div>
        </div>
    </body>
</html>
