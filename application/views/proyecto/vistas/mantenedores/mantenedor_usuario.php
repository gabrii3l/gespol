<script src="<?php echo base_url("assets/js/mantenedor/funciones_mantenedor.js"); ?>" ></script>

</BR></BR>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">

                <div class="col-md-6">
                    <h3> <p class="text-primary ">Ingreso de Usuarios</p></h3>

                    <form class="form-horizontal" action="<?php echo base_url('mantenedor/Ctr_Mantenedor/save_usuario'); ?>" method="post">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Perfilamiento</label>
                            <div class="col-md-5">
                                <select id="cbx_perfil" name="cbx_perfil" class="form-control" onchange="tipoinfractor(this.value);">

                                    <option value="" selected>Seleccionar tipo de Perfil</option>
                                    <?php foreach ($perfil as $val) { ?>
                                        <option value="<?php echo $val["idta_perfil"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">N° RUN</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_run" name ="txt_run" value="<?php echo set_value('txt_run'); ?>" class = "form-control" placeholder = "" onkeyup="this.value = soloNumeros(this.value)"maxlength="10">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Grado Jerarquico</label>
                            <div class="col-md-5">
                                <select id="cbx_grado" name ="cbx_grado"class="form-control" onchange="tipoinfractor(this.value);">

                                    <option value="" selected>Seleccionar tipo de Grado</option>
                                    <?php foreach ($grado as $val) { ?>
                                        <option value="<?php echo $val["idta_grado"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Primer Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_primer_nombre"   value="<?php echo set_value('txt_primer_nombre'); ?>"    name =" txt_primer_nombre"   class = "form-control" placeholder = "" maxlength="15">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Segundo Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id="txt_segundo_nombre"  value="<?php echo set_value('txt_segundo_nombre'); ?>" name =" txt_segundo_nombre" class = "form-control" placeholder = "" maxlength="15">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Paterno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_apellido_pat"  value="<?php echo set_value('txt_apellido_pat'); ?>"   name =" txt_apellido_pat" class = "form-control" placeholder = "" maxlength="15">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Materno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_apellido_mat"  value="<?php echo set_value('txt_apellido_mat'); ?>" name =" txt_apellido_mat" class = "form-control" placeholder = "" maxlength="15">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Fecha Nacimiento</label>
                            <div class = "col-md-5">
                                <input type = "date" id = "fecha_nac"  value="<?php echo set_value('fecha_nac'); ?>" name =" fecha_nac" class = "form-control" placeholder = "">
                            </div>                            
                        </div>

                </div>
                </br>
                <div class="col-md-6">

                    <div class="form-horizontal" role="form">  </br>


                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Celular</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_celular"  value="<?php echo set_value('txt_celular'); ?>"  name ="txt_celular" class = "form-control" placeholder = "" onkeyup="this.value = soloNumeros_celda(this.value)" maxlength="10">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Teléfono</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_telefono"    value="<?php echo set_value('txt_telefono'); ?>"   name =" txt_telefono" class = "form-control" placeholder = "" onkeyup="this.value = soloNumeros_celda(this.value)" maxlength="10">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Email</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txt_email"  value="<?php echo set_value('txt_email'); ?>" name =" txt_email" class = "form-control" placeholder = "" >
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Sexo</label>
                            <div class="col-md-10">
                                <select id="cbx_sexo" name="cbx_sexo" class="form-control">
                                    <option value="" selected>Seleccionar Sexo</option>
                                    <?php foreach ($sexo as $val) { ?>
                                        <option value="<?php echo $val["idta_sexo"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Estudios</label>
                            <div class="col-md-10">
                                <select id="cbx_estudios" name="cbx_estudios" class="form-control">
                                    <option value="" selected>Seleccionar Estudios</option>
                                    <?php foreach ($estudios as $val) { ?>
                                        <option value="<?php echo $val["idta_estudios"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>                           
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Estado Civil</label>
                            <div class="col-md-10">
                                <select id="cbx_ecivil" name="cbx_ecivil" class="form-control">
                                    <option value="" selected>Seleccionar Estado Civil</option>
                                    <?php foreach ($estadocivil as $val) { ?>
                                        <option value="<?php echo $val["idta_estadocivil"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>                         
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Profesion  </label>
                            <div class="col-md-10">
                                <select id="cbx_profesion" name="cbx_profesion" class="form-control">
                                    <option value="" selected>Seleccionar Profesion</option>
                                    <?php foreach ($profesion as $val) { ?>
                                        <option value="<?php echo $val["idta_profesion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>                           
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Estado </label>
                            <div class="col-md-10">
                                <select id="cbx_estado" name="cbx_estado" class="form-control">
                                    <option value="0" selected>ACTIVO</option>
                                    <option value="1">INACTIVO</option>
                                </select>
                            </div>                           
                        </div>

                    </div>

                    <div class="form-group text-right m-b-0">
                        <button type="submit" value="Guardar" class="btn btn-primary waves-effect w-md waves-light">Guardar</button>
                    </div>
                </div> 


                </form>



            </div>
            <center>
                <?php echo validation_errors(); ?>    
            </center>


        </div>

    </div>

</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box table-responsive">
                        <h3> <p class="text-primary ">Relación  de Usuarios</p></h3>
                        <table id="datatable-buttons4" class="table table-striped table-bordered">
                            <thead>  
                            <th></th> 
                            <th>Primer Nombre</th> 
                            <th>Segundo Nombre</th> 
                            <th>Apellido Paterno</th> 
                            <th>Apellido Materno</th> 
                            <th>Correo</th> 
                            <th>Telefono</th> 
                            </tr></thead>
                            <tbody>
                                <?php foreach ($get_usuario as $val) { ?>
                                    <tr style="text-align: left;" class="identificador" data-valor="<?php echo$val['idfuncionario'] ?>" Id="row2">
                                        <td class="numero"><input type="checkbox" value=" <?php echo $val['idfuncionario'] ?>" name="chkSeleccion_mantenedorusuario"></input></td>
                                        <td><?php echo $val['PrimerNombre'] ?></td>   
                                        <td><?php echo $val['SegundoNombre'] ?></td>  
                                        <td><?php echo $val['ApellidoPaterno'] ?></td>  
                                        <td><?php echo $val['ApellidoMaterno'] ?></td> 
                                        <td><?php echo $val['Correo'] ?></td>  
                                        <td><?php echo $val['Telefono'] ?></td>  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button id="btnmodificar_mantenedorus" type="button" class="btn btn-primary waves-effect w-md waves-light">Modificar</button>  
                    <button id="btneliminar_mantenedorus" type="button" class="btn btn-danger waves-effect w-md waves-light">Borrar</button>  
                </div>

            </div> 
        </div>


    </div> 
</div>

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



        TableManageButtons4.init();


    });


</script>  

