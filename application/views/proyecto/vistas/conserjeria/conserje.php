<script src="<?php echo base_url("assets/js/delito/funciones_armas.js"); ?>"></script>

<!--
<div class="row">
    <div class="col-sm-12">

        <div class="contenedor_banner">
         <img  src="<?php echo base_url("assets/images/banner/edificio.png"); ?>" alt="image"  class="img_banner"> 
            <div class="centrado_banner">
                <h2>Ingreso Datos Conserjería</h2></br>
               

            </div>

        </div>

    </div>
</div>-->
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Vista Conserje</b></h4>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Calidad</label>
                            <div class="col-md-10">
                                <select id="cbxcalidadelito_armas" name="cbxevento" class="form-control">
                                    <option value='' selected>Seleccionar Tipo de Calidad</option>
                                    <?php foreach ($calidadelito as $val) { ?>
                                        <option value="<?php echo $val["idta_calidadelito"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Categoría</label>
                            <div class="col-md-10">
                                <select id="cbxcategoria_armas" name="cbxcategoria_armas" class="form-control">

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
                                <select id="cbx_descripciondelito_armas" name="cbx_descripciondelito_armas" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Marca</label>
                            <div class="col-md-10">
                                <input type="text" id="txtmarca_arma" value="<?php echo set_value('txtmarca_arma'); ?>" name="txtmarca_arma" class="form-control" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">N°Serie</label>
                            <div class="col-md-10">
                                <input type="text" id="txtserie_arma" value="<?php echo set_value('txtserie_arma'); ?>" name="txtserie_arma" class="form-control" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Avaluo</label>
                            <div class="col-md-10">
                                <input type="text" id="txtavaluo_arma" value="<?php echo set_value('txtavaluo_arma'); ?>" name="txtavaluo_arma" class="form-control" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">N° de Encargo</label>
                            <div class="col-md-10">
                                <input type="text" id="txtencargo_arma" value="<?php echo set_value('txtencargo_arma'); ?>" name="txtencargo_arma" class="form-control" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="">
                            </div>
                        </div>




                    </form>
                </div>

                <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Destino</label>
                            <div class="col-md-10">
                                <select id="cbxdestino_arma" name="cbxdestino_arma" class="form-control">

                                    <option value='' selected>Seleccionar Lugar de Destino</option>
                                    <?php foreach ($destino as $val) { ?>
                                        <option value="<?php echo $val["idta_destino"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Calibre</label>
                            <div class="col-md-10">
                                <input type="text" id="txtcalibre_arma" value="<?php echo set_value('txtcalibre_arma'); ?>" name="txtcalibre_arma" class="form-control" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Cantidad</label>
                            <div class="col-md-10">
                                <select id="txtcantidad_arma" name="txtcantidad_arma" class="form-control">



                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">N° Cadena Custodia</label>
                            <div class="col-md-10">
                                <input type="text" id="txtcadenacustodia_arma" value="<?php echo set_value('txtcadenacustodia_arma'); ?>" name="txtcadenacustodia_arma" class="form-control" onkeyup="this.value = soloNumeros(this.value)" required="" placeholder="">
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
                        <div>
                            <textarea id="textarea_armasdelito" class="form-control summernote" rows="5" required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right m-b-0">
                <button id="idarmas_delito" type="button" class="btn btn-primary waves-effect w-md waves-light">Guardar</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function() {


        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });



    });
</script>