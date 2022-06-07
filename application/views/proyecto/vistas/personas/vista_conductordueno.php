
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">

                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Datos del Infractor</b></h4>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Documento Identificacion</label>
                            <div class="col-md-5">
                                <select id="cbxDocIdentificacion" class="form-control" onchange="tipoinfractor(this.value);">

                                    <option value="" selected>Seleccionar Tipo de Documento</option>
                                    <?php foreach ($tipoidentificacion as $val) { ?>
                                        <option value="<?php echo $val["idta_identificacion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div id="tipoInfractor" class="form-group has-error" ></div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Primer Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Iprimernombre" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Segundo Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id="Isegundonombre" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Paterno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Iprimerapellido" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Materno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Isegundopellido" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Fecha Nacimiento</label>
                            <div class = "col-md-5">
                                <input type = "date" id = "Ifechanac" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">  </br>


                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Celular</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Icelular" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Teléfono</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Itelefono" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Email</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Iemail" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label">Nacionalidad</label>
                            <div class="col-md-10">
                                <select id="cbxInacionalidad" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">
                                    <option value="" selected>Seleccionar Nacionalidad</option>
                                    <?php foreach ($Nacionalidad as $val) { ?>
                                        <option value="<?php echo $val["idta_nacionalidad"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Sexo</label>
                            <div class="col-md-10">
                                <select id="cbxIsexo" name="cbxevento" class="form-control">
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
                                <select id="cbxIestudios" name="cbxevento" class="form-control">
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
                                <select id="cbxIestadocivil" name="cbxevento" class="form-control">
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
                                <select id="cbxIprofesion" name="cbxevento" class="form-control">
                                    <option value="" selected>Seleccionar Profesion</option>
                                    <?php foreach ($profesion as $val) { ?>
                                        <option value="<?php echo $val["idta_profesion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
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

                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Licencia de Conducir</b></h4>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nro. Licencia</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="txtlicenciaconducir" placeholder="" onkeyup="this.value = soloNumeros(this.value)" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo Licencia</label>
                            <div class="col-md-10">
                                <select id="cbxlicencia" name="cbxlicencia" class="form-control" onchange="personajuridica(this.value)">
                                    <option value="" selected>Seleccionar Tipo de Licencia</option>
                                    <?php foreach ($tipolicencia as $val) { ?>
                                        <option value="<?php echo $val["idta_licencia"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Comuna Licencia</label>
                            <div class="col-md-10">
                                <select id="cbxcomunalincencia" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">

                                    <?php // foreach ($tipopersona as $val) { ?>
                                        <!--<option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>-->
                                    <?php // } ?>

                                </select>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div> 
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








