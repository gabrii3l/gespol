
<script src="<?php echo base_url("assets/js/funciones_persona.js"); ?>" ></script>
<!--<h4>Deberá ingresar todos los datos básicos de la persona</h4>
-->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row"> 
                <div class="col-sm-12">
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title"><b>Calidad de la Infracción</b></h4></br>
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tipo de Infractor</label>
                                <div class="col-md-10">
                                    <select id="cbxcalidad" name="cbxcalidad" class="form-control">
                                        <option value="0" selected>Seleccionar una opción</option>
                                        <?php foreach ($calidad as $val) { ?>
                                            <option value="<?php echo $val["idta_calidad"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="datosvehiculo" class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row ">
                <div class="col-md-6 ">
                    <h4 class="m-t-0 header-title"><b>Datos del Vehículo</b></h4>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Patente</label>
                            <div class="col-md-10">
                                <select id="cbxtipopatente" name="cbxevento" class="form-control" >
                                    <option value="" selected>Seleccionar Tipo de Patente</option>
                                    <?php foreach ($TipoPatente as $val) { ?>
                                        <option value="<?php echo $val["idta_tipopatente"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="state-danger">Patente</label>
                            <div class="col-md-5">
                                <input type="text" id="txtpatente" name="state-danger" class="form-control" placeholder="Debe Ingresar Nombre de Empresa">
                            </div>
                            <div class = 'col-md-3'>
                                <button id = 'btnpatente' onclick='patenteexiste();' type = 'button' class = 'btn btn-inverse waves-effect w-md waves-light'>Buscar</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Marca</label>
                            <div class="col-md-10">
                                <select id="cbxmarca" name="cbxmarca" class="form-control">
                                    <option value="" selected>Seleccionar Marca de Vehículo</option>
                                    <?php foreach ($MarcaVehiculo as $val) { ?>
                                        <option value="<?php echo $val["idta_marcavehiculo"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Modelo</label>
                            <div class="col-md-10">
                                <select id="cbxmodelo" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">

                                    <?php // foreach ($tipopersona as $val) { ?>
                                        <!--<option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>-->
                                    <?php // } ?>

                                </select>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-md-6">
                    <form class="form-horizontal" role="form">  </br>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Vehiculo</label>
                            <div class="col-md-10">
                                <select id="cbxtipvehiculo" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">
                                    <option value="" selected>Seleccionar Tipo de Vehiculo</option>
                                    <?php foreach ($TipoVehiculo as $val) { ?>
                                        <option value="<?php echo $val["idta_tipovehiculo"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Color</label>
                            <div class="col-md-10">
                                <select id="cbxcolor" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">
                                    <option value="" selected>Seleccionar Color</option>
                                    <?php foreach ($Color as $val) { ?>
                                        <option value="<?php echo $val["idta_color"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Año</label>
                            <div class="col-md-10">
                                <select id="cbxano" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">
                                    <option value="" selected>Seleccionar Año</option>
                                    <?php foreach ($Ano as $val) { ?>
                                        <option value="<?php echo $val["idta_ano"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                    </form>
                </div> 
            </div>
        </div> 
    </div>   
</div>



<div id="dueno"></div>


<div id="direccion" class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <div class="row">

                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Dirección</b></h4></br>
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Region:</label>
                            <div class="col-md-5">
                                <select id="cbxregion2" name="" class="form-control">
                                    <option value="" selected>Seleccionar Region</option>
                                    <?php foreach ($region as $val) { ?>
                                        <option value="<?php echo $val["idta_region"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Provincia:</label>
                            <div class="col-lg-5 clockpicker">
                                <select id="cbxprovincia2" name="" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Comuna:</label>
                            <div class="col-md-5">
                                <select id="cbxcomuna2" name="" class="form-control">

                                </select>
                            </div>

                        </div>                

                        <div class="form-group">
                            <label class="col-md-2 control-label">Número</label>
                            <div class="col-md-5">
                                <input id="idnumeroP" type="text"  maxlength="10"    value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Depto</label>
                            <div class="col-md-5">
                                <input id="iddeptoP" type="text" maxlength="10"  value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>

                    </form>
                </div> 

                <div class="col-md-6">
                    </br>
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Block</label>
                            <div class="col-md-10">
                                <input id="idblockP"type="text"  value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Villa o Población</label>
                            <div class="col-md-10">
                                <input type="text" id="txtvillaP" value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"   required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Latitud</label>
                            <div class="col-md-10">
                                <input type="text" id="latitudpersona" name="txtlatitud" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Longitud</label>
                            <div class="col-md-10">
                                <input type="text" id="longitudpersona" name="txtlatitud" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Dirección</label>
                            <div class="col-md-10">
                                <input type="text" id="direccionpersona" name="state-danger" class="form-control" placeholder="Debe Ingresar Dirección">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Geolocalización</label>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-inverse waves-effect w-md waves-light" value="Obtener mi ubicacion" onclick="obtieneubicacion();">Obtener mi ubicación</button>
                            </div>
                        </div>



                    </form>
                </div>

                <div class="col-md-15">
                    <div class="map" id="vistapersona"></div>
                    <script type="text/javascript">
                        start_vistapersona();
                    </script>
                </div>

            </div>



        </div> 
    </div>

</div>



<button id="btnpersona" type="button" class="btn btn-primary waves-effect w-md waves-light" >Guardar</button>







<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ingrese Apellidos de Persona</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="idapellidopaterno" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="idapellidomaterno" placeholder="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                <button onclick="traeapellidospersonas()" type="button" class="btn btn-info waves-effect waves-light">Buscar</button>
            </div>
        </div>
    </div>
</div>     














