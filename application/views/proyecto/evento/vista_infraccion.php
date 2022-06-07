
<link href="<?php echo base_url("plugins/timepicker/bootstrap-timepicker.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("plugins/clockpicker/css/bootstrap-clockpicker.min.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("plugins/bootstrap-daterangepicker/daterangepicker.css"); ?>" rel="stylesheet">
<link href="<?php echo base_url("plugins/custombox/css/custombox.min.css"); ?>" rel="stylesheet">
<script src="<?php echo base_url("assets/js/funciones_infraccion.js"); ?>" ></script>

<div class="row">

    <div class="col-sm-12">
        <div class="card-box">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Datos Principales</b></h4></br>
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Fecha Suceso:</label>
                            <div class="col-md-5">
                                <input id="fechasuceso" type="date" class="form-control" value="">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hora Suceso:</label>
                            <div class="col-lg-5 clockpicker">
                                <input id="horasuceso" type="text"  name="txthora"class="form-control">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Fecha Citación:</label>
                            <div class="col-md-5">
                                <input id="fechacitacion" type="date" class="form-control" value="">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hora Citación:</label>
                            <div class="col-lg-5 clockpicker">
                                <input id="horacitacion" type="text"   name="txthora"class="form-control">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Número Boleta</label>
                            <div class="col-md-10">
                                <input type="text" id="numboleta" value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>



                    </form>
                </div>


                <div class="col-md-6">
                    <form class="form-horizontal" role="form">

                        <h4 class="m-t-0 header-title"><b>Infracción y Lugar de Ocurrencia</b></h4></br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Infracción</label>
                            <div class="col-md-10">
                                <select id="cbxtipoinfraccion" name="cbxtipoinfraccion" class="form-control">
                                    <option value='' selected>Seleccionar Tipo Infracción</option>
                                    <?php foreach ($tipoinfraccion as $val) { ?>
                                        <option value="<?php echo $val["idta_tipoinfraccion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                    <option value="0">OTRO TIPO DE INFRACCIÓN</option>
                                </select>
                            </div>
                        </div>                        

                        <div id="datosinfraccion" style="display:none;">
                            <div id ="infraccionlimpiar" class = "form-group has-error">
                                <label class = "col-md-2 control-label" for = "state-danger">Nueva Infracción</label>
                                <div class = "col-md-5">
                                    <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "Debe Ingresar Nombre de Nueva Infraccion">
                                </div>
                                <div class = "col-md-3">
                                    <button id = "cbxnuevainfraccion" type = "button" class = "btn btn-inverse waves-effect w-md waves-light">Guardar</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Lugar de Ocurrencia</label>
                            <div class="col-md-10">
                                <select id="cbxlugarocurrencia" name="cbxlugarocurrencia" class="form-control">
                                    <option value='' selected>Seleccionar Lugar de Ocurrencia</option>
                                    <?php foreach ($lugarocurrencia as $val) { ?>
                                        <option value="<?php echo $val["idta_lugarocurrencia"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?> 
                                    <option value="0">OTRO LUGAR DE OCURRENCIA</option>
                                </select>
                            </div>
                        </div>

                        <div id="datosocurrencia" style="display:none;">
                            <div id ="infraccionlimpiar" class = "form-group has-error">
                                <label class = "col-md-2 control-label" for = "state-danger">Nuevo Lugar Ocurrencia</label>
                                <div class = "col-md-5">
                                    <input type = "text" id="nuevaocurrencia" name =" state-danger" class = "form-control" placeholder = "Debe Ingresar Nombre de Nueva Ocurrencia">
                                </div>
                                <div class = "col-md-3">
                                    <button id = "btnlugarocurrencia" type = "button" class = "btn btn-inverse waves-effect w-md waves-light">Guardar</button>
                                </div>
                            </div>
                        </div>

                        <h4 class="m-t-0 header-title"><b>Funcionario responsable</b></h4></br>

                        <div class="form-group">
                            <label data-toggle="modal" data-target="#con-close-modal2" class="col-lg-2 control-label" class="col-lg-2 control-label" for="name">RUN</label>
                            <div class="col-md-5">  
                                <input type="text"  maxlength="10" id="txtrut" value="<?php echo set_value('txtrut'); ?>"  name="txtrut" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="(ej: 17808433k)">  
                            </div>
                            <div class="col-md-3">
                                <button id="btnfuncionarioinfraccion" type="button" class="btn btn-success waves-effect w-md waves-light">Buscar</button>
                            </div>
                            <!--                            //<div id="problemas"></div>-->
                            <table class="table table-striped m-0" id="myTables">
                                <thead>
                                    <tr><th>Rut</th>  
                                        <th>Nombre</th>   
                                        <th>Correo</th>  
                                        <th>Telefono</th>                                                                           

                                    </tr>
                                </thead>
                                <div>
                                    <tbody id="prueba"></tbody>
                                </div>
                            </table>
                        </div>

                </div>

                </form>
            </div> 

        </div>


    </div> 
</div>

</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <div class="row">

                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Dirección de Ocurrencia</b></h4></br>
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Region:</label>
                            <div class="col-md-5">
                                <select id="cbxregion" name="cbxregion" class="form-control">
                                    <option value='' selected>Seleccionar Region</option>
                                    <?php foreach ($region as $val) { ?>
                                        <option value="<?php echo $val["idta_region"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Provincia:</label>
                            <div class="col-lg-5 clockpicker">
                                <select id="cbxprovincia" name="cbxprovincia" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Comuna:</label>
                            <div class="col-md-5">
                                <select id="cbxcomuna" name="cbxcomuna" class="form-control">

                                </select>
                            </div>

                        </div>                

                        <div class="form-group">
                            <label class="col-md-2 control-label">Número</label>
                            <div class="col-md-5">
                                <input id="idnumero" type="text"  maxlength="10"    value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Depto</label>
                            <div class="col-md-5">
                                <input id="iddepto" type="text" maxlength="10"  value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Evidencia 1</label>
                            <div class="col-md-5">
                                <input class="btn btn-success btn-bordered waves-effect w-md waves-light" type="file" id="archivo1" name="archivo1" role="button" accept="image/png, .jpeg, .jpg, image/gif" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Evidencia 2</label>
                            <div class="col-md-5">
                                <input class="btn btn-success btn-bordered waves-effect w-md waves-light" type="file" id="archivo2" name="archivo2" role="button" accept="image/png, .jpeg, .jpg, image/gif"  >
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
                                <input id="idblock"type="text"  value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Villa o Población</label>
                            <div class="col-md-10">
                                <input type="text" id="txtvilla" value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"   required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Latitud</label>
                            <div class="col-md-10">
                                <input type="text" id="latitudinfraccion" name="txtlatitud" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Longitud</label>
                            <div class="col-md-10">
                                <input type="text" id="longitudinfraccion" name="txtlatitud" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Dirección</label>
                            <div class="col-md-10">
                                <input type="text" id="autocompletado2" name="state-danger" class="form-control" placeholder="Debe Ingresar Dirección">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Geolocalización</label>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-inverse waves-effect w-md waves-light" value="Obtener mi ubicacion" onclick="get_my_location2();">Obtener mi ubicación</button>
                            </div>
                        </div>



                    </form>
                </div>

                <div class="col-md-15">
                    <div class="map" id="map2"></div>
                    <script type="text/javascript">
                        start_map2();
                    </script>
                </div>

            </div>



        </div> 
    </div>

</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Ingresar Observaciones</b></h4>
                        <div >
                            <textarea id="textarea" class="form-control summernote" rows="5"  required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button id="btninfraccion" type="button" class="btn btn-primary waves-effect w-md waves-light">Guardar</button>
            <!--    <button id="btninfraccion2" type="button" class="btn btn-primary waves-effect w-md waves-light">Guardar2</button>-->
        </div>
    </div>
</div>



<script src="<?php echo base_url("plugins/moment/moment.js"); ?>" ></script>
<script src="<?php echo base_url("plugins/timepicker/bootstrap-timepicker.js"); ?>"></script>
<script src="<?php echo base_url("plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"); ?>"></script>
<script src="<?php echo base_url("plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"); ?>"></script>
<script src="<?php echo base_url("plugins/clockpicker/js/bootstrap-clockpicker.min.js"); ?>"></script>
<script src="<?php echo base_url("plugins/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>
<script src="<?php echo base_url("assets/pages/jquery.form-pickers.init.js"); ?>"></script>
<script src="<?php echo base_url("plugins/custombox/js/custombox.min.js"); ?>"></script>
<script src="<?php echo base_url("plugins/custombox/js/legacy.min.js"); ?>"></script>



<script type="text/javascript">

                        jQuery(document).ready(function () {


                            $('.summernote').summernote({
                                height: 350, // set editor height
                                minHeight: null, // set minimum height of editor
                                maxHeight: null, // set maximum height of editor
                                focus: false                 // set focus to editable area after initializing summernote
                            });

                            $('.inline-editor').summernote({
                                airMode: true
                            });



                        });

</script>


<div id="con-close-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
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


