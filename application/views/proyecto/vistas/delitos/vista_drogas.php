<script src="<?php echo base_url("assets/js/delito/funciones_droga.js"); ?>" ></script>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Ingreso de datos de datos de Drogas</b></h4></br>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Calidad</label>
                            <div class="col-md-10">
                                <select id="cbxcalidadelito_drogas" name="cbxcalidadelito_drogas" class="form-control">
                                    <option value='' selected>Seleccionar Tipo de Calidad</option>
                                    <?php foreach ($calidadelito as $val) { ?>
                                        <option value="<?php echo $val["idta_calidadelito"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Especificacion</label>
                            <div class="col-md-10">
                                <select id="cbxespecificacion_drogas" name="cbxespecificacion_drogas" class="form-control">

                                    <option value='' selected>Seleccionar Especificacion</option>
                                    <?php foreach ($categoria as $val) { ?>
                                        <option value="<?php echo $val["idta_categoria"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Detalle:</label>
                            <div class="col-md-10">
                                <select id="cbxcatdetalle_drogas" name="cbxcatdetalle_drogas" class="form-control">



                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Medición:</label>
                            <div class="col-md-10">
                                <select id="cbxmedicion_drogas" name="cbxmedicion_drogas" class="form-control">
                                    <option value='' selected>Seleccionar Medicion</option>
                                    <?php foreach ($medicion as $val) { ?>
                                        <option value="<?php echo $val["idta_tipomedicion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>


                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Avaluo</label>
                            <div class="col-md-10">
                                <input type="text" id="txtavaluo_drogas" value="<?php echo set_value('txtpasaporte'); ?>"  name="txtpasaporte" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese monto avaluo">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Lugar de Ocultamiento</label>
                            <div class="col-md-10">
                                <select id="cbxocultamiento_drogas" name="cbxocultamiento_drogas" class="form-control">
                                    <option value='' selected>Seleccionar Especificacion</option>
                                    <?php foreach ($ocultamiento as $val) { ?>
                                        <option value="<?php echo $val["idta_lugarocultamiento"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>


                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Destino:</label>
                            <div class="col-md-10">
                                <select id="cbxodestino_drogas" name="cbxodestino_drogas" class="form-control">

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
    <div class="col-md-6"> 

        <div class="card-box table-responsive">
            <h3> <p class="text-primary ">Funcionarios de su unidad</p></h3>
            <table id="datatable-buttons3" class="table table-striped table-bordered">
                <thead>
                <th>    </th> 
                <th>Rut</th>  
                <th>Nombre</th>                         
                <th>Comuna</th>    

                </tr></thead>
                <tbody Id="row2">
                    <?php foreach ($funcionarios_droga as $val) { ?>
                        <tr style="text-align: left;" class="identificador_drogas" data-valor="<?php echo$val['idfun'] ?>" >
                            <td class="numero"><input type="checkbox" value=" <?php echo $val['idfun'] ?>" name="chkSeleccion_drogas"></input></td>
                            <td><?php echo $val['RunUsuario'] . "-" . $val['DigitoUsuario'] ?></td>               
                            <td><?php echo $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] ?></td>                    
                            <td><?php echo $val['Comuna'] ?> </td>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div> 
    </div>
    <div class="col-md-6">
        </br>
        <div id="agregados_drogas" class="card-box" >
            <h4 class="m-t-0 header-title"><b>Personal de Servicio asignado</b></h4>
            <p class="text-muted font-14 m-b-20">
                Esta es la relación del personal que se asociará a este evento policial.
            </p>

            <table class="table table-striped m-0" id="myTables_Drogas">
                <thead>
                    <tr><th>Rut</th>  
                        <th>Nombre</th>   
                        <th>Cargo</th>  
                        <th>Grado</th>  
                        <th>Comuna</th>                                          

                    </tr>
                </thead>
                <tbody id="datos2_drogas"></tbody>
            </table>
        </div>                   
 <button id="ideasignar_drogas" type="button" class="btn btn-primary waves-effect w-md waves-light">Asignar</button>   


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
                            <textarea id="textarea_Drogasdelito" class="form-control summernote" rows="5"  required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right m-b-0">
                <button id="iddrogas_delito" type="button" class="btn btn-primary waves-effect w-md waves-light">Guardar</button>
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



            TableManageButtons3.init();


        });


    </script>  

