<script src="<?php echo base_url("assets/js/delito/funciones_delito.js"); ?>" ></script>

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
                                <input id="fechasuceso_delito" type="date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hora Suceso:</label>
                            <div class="col-lg-5 clockpicker">
                                <input id="horasuceso_delito" type="text"  name="txthora"class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Fecha Denuncia:</label>
                            <div class="col-md-5">
                                <input id="fechadenuncia_delito" type="date" class="form-control" value="">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hora Denuncia:</label>
                            <div class="col-lg-5 clockpicker">
                                <input id="horadenuncia_delito" type="text"   name="txthora"class="form-control">

                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                        <h4 class="m-t-0 header-title"><b>Tipo de Adopción y Modo</b></h4></br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Lugar de Recepción de Delito</label>
                            <div class="col-md-10">
                                <select id="cbxadopcion_delito" name="cbxadopcion_delito" class="form-control">
                                    <option value='' selected>Seleccionar Lugar de toma Procedimiento</option>
                                    <?php foreach ($adopcion as $val) { ?>
                                        <option value="<?php echo $val["idta_lugaradopcion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-2 control-label">Modo Opertantis</label>
                            <div class="col-md-10">
                                <select id="cbxmodoperanti_delito" name="cbxmodoperanti_delito" class="form-control">
                                    <option value='' selected>Seleccionar Lugar de Ocurrencia</option>
                                    <?php foreach ($modoperanti as $val) { ?>
                                        <option value="<?php echo $val["idta_modoperanti"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?> 
                                    <option value="0">OTRO LUGAR DE OCURRENCIA</option>
                                </select>
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
                <div class="col-md-7">
                    <div class="card-box table-responsive">
                        <h3> <p class="text-primary ">Delito</p></h3>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <th></th> 
                            <th>Tipo de Delito</th> 
                            </tr></thead>
                            <tbody>
                                <?php foreach ($delito as $val) { ?>
                                    <tr style="text-align: left;" class="identificador" data-valor="<?php echo$val['idta_delito'] ?>" Id="row2">
                                        <td class="numero"><input type="checkbox" value=" <?php echo $val['idta_delito'] ?>" name="chkSeleccion_delito"></input></td>
                                        <td><?php echo $val['td_descripcion'] ?></td>             
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="agregados" class="card-box" >
                        <h4 class="m-t-0 header-title"><b>Delitos asignados a este procedimiento Policial</b></h4>
                        <p class="text-muted font-14 m-b-20">
                            Esta tabla contiene todos los delitos que usted selecciono para este acto
                        </p>
                        <table class="table table-striped m-0" id="myTables_delito">
                            <thead>
                                <tr><th>Delito Asignado</th>  
                                    <th></th>                                        
                                </tr>
                            </thead>
                            <tbody id="datos_delito"></tbody>
                        </table>
                    </div>    
                    <button id="ideasignar_delito" type="button" class="btn btn-primary waves-effect w-md waves-light">Asignar</button>  
                    <button id="idcheck_delito" type="button" class="btn btn-danger waves-effect w-md waves-light">Borrar todos los check</button>  
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
                            <label class="col-md-2 control-label">Lugar Ocurrencia:</label>
                            <div class="col-md-5">
                                <select id="cbxlugar_delito" name="cbxlugar_delito" class="form-control">
                                    <option value='' selected>Seleccionar Lugar Ocurrencia</option>
                                    <?php foreach ($lugarocurrencia as $val) { ?>
                                        <option value="<?php echo $val["idta_lugarocurrencia"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Region:</label>
                            <div class="col-md-5">
                                <select id="cbxregion_delito" name="cbxregion_delito" class="form-control">
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
                                <select id="cbxprovincia_delito" name="cbxprovincia" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Comuna:</label>
                            <div class="col-md-5">
                                <select id="cbxcomuna_delito" name="cbxcomuna" class="form-control">
                                </select>
                            </div>
                        </div>                
                        <div class="form-group">
                            <label class="col-md-2 control-label">Número</label>
                            <div class="col-md-5">
                                <input id="idnumero_delito" type="text"  maxlength="10"    value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Depto</label>
                            <div class="col-md-5">
                                <input id="iddepto_delito" type="text" maxlength="10"  value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Evidencia 1</label>
                            <div class="col-md-5">
                                <input class="btn btn-success btn-bordered waves-effect w-md waves-light" type="file" id="archivo1_delito" name="archivo1_delito" role="button" accept="image/png, .jpeg, .jpg, image/gif" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Evidencia 2</label>
                            <div class="col-md-5">
                                <input class="btn btn-success btn-bordered waves-effect w-md waves-light" type="file" id="archivo2_delito" name="archivo2_delito" role="button" accept="image/png, .jpeg, .jpg, image/gif"  >
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
                                <input id="idblock_delito" type="text"  value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Villa o Población</label>
                            <div class="col-md-10">
                                <input type="text" id="txtvilla_delito" value="<?php echo set_value('txtboleta'); ?>"  name="txtboleta" class="form-control"   required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Latitud</label>
                            <div class="col-md-10">
                                <input type="text" id="latituddelito_delito" name="latituddelito_delito" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Longitud</label>
                            <div class="col-md-10">
                                <input type="text" id="longituddelito_delito" name="longituddelito_delito" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Dirección</label>
                            <div class="col-md-10">
                                <input type="text" id="autocompletado_delito" name="state-danger" class="form-control" placeholder="Debe Ingresar Dirección">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Geolocalización</label>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-inverse waves-effect w-md waves-light" value="Obtener mi ubicacion" onclick="get_locationdelito_2();">Obtener mi ubicación</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-15">
                    <div class="map" id="map_delito"></div>
                    <script type="text/javascript">
                        start_mapdelito();
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
                            <textarea id="textarea_delito" class="form-control summernote" rows="5"  required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right m-b-0">
                <button id="btndelito" type="button" class="btn btn-primary waves-effect w-md waves-light">Guardar</button>
            </div>

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
 <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({keys: true});
            $('#datatable-responsive').DataTable();
            $('#datatable-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable-scroller').DataTable({
                ajax: "http://localhost:8080/gespol/plugins/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });



            TableManageButtons.init();


        });


    </script>  




