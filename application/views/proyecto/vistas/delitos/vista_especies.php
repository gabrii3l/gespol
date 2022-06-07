<script src="<?php echo base_url("assets/js/delito/funciones_especies.js"); ?>" ></script>
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
                            <label class="col-md-2 control-label" for="example-email">Calidad</label>
                            <div class="col-md-10">
                                <select id="cbxcalidadelito_especie" name="cbxcalidadelito_especie" class="form-control">
                                    <option value='' selected>Seleccionar Tipo de Calidad</option>
                                    <?php foreach ($calidadelito as $val) { ?>
                                        <option value="<?php echo $val["idta_calidadelito"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Categoria</label>
                            <div class="col-md-10">
                                <select id="cbxcategoria_especies" name="cbxcategoria_especies" class="form-control">
                                    <option value='' selected>Seleccionar Categoria</option>
                                    <?php foreach ($categoria as $val) { ?>
                                        <option value="<?php echo $val["idta_categoria"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Detalle</label>
                            <div class="col-md-10">
                                <select id="cbx_descripciondelito_especie" name="cbx_descripciondelito_especie" class="form-control">



                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">Marca</label>
                            <div class="col-md-10">
                                <input type="text" id="txtnromarca_especie" value="<?php echo set_value('txtnromarca_especie'); ?>"  name="txtnromarca_especie" class="form-control"   required="" placeholder="">   
                            </div>
                        </div>




                    </form>
                </div>

                <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nro.Serie</label>
                            <div class="col-md-10">
                                <input type="text" id="txtnroserie_especie" value="<?php echo set_value('txtnroserie_especie'); ?>"  name="txtnroserie_especie" class="form-control"   required="" placeholder="">   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Avaluo</label>
                            <div class="col-md-10">
                                <input type="text" id="txtavaluo_especie" value="<?php echo set_value('txtavaluo_especie'); ?>"  name="txtpasaporte" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Cantidad</label>
                            <div class="col-md-10">
                                <select id="txtcantidad_especie" name="txtcantidad_especie" class="form-control">



                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Destino</label>
                            <div class="col-md-10">
                                <select id="cbxdestino_especies" name="cbxdestino_especies" class="form-control">
                                    <option value='' selected>Seleccionar Lugar de Destino</option>
                                    <?php foreach ($destino as $val) { ?>
                                        <option value="<?php echo $val["idta_destino"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
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
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Ingresar Observaciones</b></h4>
                        <div >
                            <textarea id="textarea_Especiesdelito" class="form-control summernote" rows="5"  required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right m-b-0">
                <button id="idespecies_delito" type="button" class="btn btn-primary waves-effect w-md waves-light">Guardar</button>
            </div>

        </div>
    </div>
</div>

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