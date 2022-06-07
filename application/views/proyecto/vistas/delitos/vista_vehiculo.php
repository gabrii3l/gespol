<script src="<?php echo base_url("assets/js/delito/funciones_vehiculo.js"); ?>" ></script>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Ingreso de datos de datos Vehiculo</b></h4>
<!--            <p class="text-muted m-b-30 font-14">
                Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
            </p>-->

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Patente</label>
                            <div class="col-md-10">
                                <select id="cbxtipopatente_delito" name="cbxevento" class="form-control" >
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
                                <input type="text" id="txtpatente_delito2" name="state-danger" class="form-control" placeholder="Debe Ingresar Patente">
                            </div>
                            <div class = "col-md-2">
                                <button id = "btnpatente_delito" type = "button" class = "btn btn-danger waves-effect w-md waves-light">Buscar</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Vehiculo</label>
                            <div class="col-md-10">
                                <select id="cbxtipvehiculo_delito" name="cbxevento" class="form-control">
                                    <option value="" selected>Seleccionar Tipo de Vehiculo</option>
                                    <?php foreach ($TipoVehiculo as $val) { ?>
                                        <option value="<?php echo $val["idta_tipovehiculo"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Marca</label>
                            <div class="col-md-10">
                                <select id="cbxmarca_delito" name="cbxmarca" class="form-control">
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
                                <select id="cbxmodelo_delito" name="cbxmodelo_delito" class="form-control" onchange="personajuridica(this.value)">

                                    <?php // foreach ($tipopersona as $val) { ?>
                                        <!--<option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>-->
                                    <?php // } ?>

                                </select>
                            </div>
                        </div>





                    </form>
                </div>

                <div class="col-md-6">
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Color</label>
                            <div class="col-md-10">
                                <select id="cbxcolor_delito" name="cbxcolor_delito" class="form-control">
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
                                <select id="cbxano_delito" name="cbxano_delito" class="form-control">
                                    <option value="" selected>Seleccionar Año</option>
                                    <?php foreach ($Ano as $val) { ?>
                                        <option value="<?php echo $val["idta_ano"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Nro.Chassis</label>
                            <div class="col-md-10">
                                <input type="text" id="NroChassis_delito" value="<?php echo set_value('txtpasaporte'); ?>"  name="txtpasaporte" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese N° Chassis">   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Nro.Motor</label>
                            <div class="col-md-10">
                                <input type="text" id="NroMotor_delito" value="<?php echo set_value('txtpasaporte'); ?>"  name="txtpasaporte" class="form-control"   required="" placeholder="Ingrese N° Motor">   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Avaluo</label>
                            <div class="col-md-10">
                                <input type="text" id="Avaluto_delito" value="<?php echo set_value('txtpasaporte'); ?>"  name="txtpasaporte" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese Avaluo">   
                            </div>
                        </div>

                    </form>
                </div> 
            </div>


        </div> 
    </div>
    <div class="form-group text-right m-b-0">
        <button id="idvehiculo_delito" type="button" class="btn btn-primary waves-effect w-md waves-light">Siguiente</button>
    </div>
</div>

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
                            <input type="text" class="form-control" id="idapellidopaterno" placeholder="Ingresar apellido Paterno">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="idapellidomaterno" placeholder="Ingresar apellido Materno">
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