


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Datos del Dueño</b></h4>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Documento Identificacion</label>
                            <div class="col-md-5">
                                <select id="cbxDocDdentificacion" name="cbxtipopersona2" class="form-control" onchange="tipodueno(this.value);">
                                    <option value="" selected>Seleccionar Tipo de Documento</option>
                                    <?php foreach ($tipoidentificacion as $val) { ?>
                                        <option value="<?php echo $val["idta_identificacion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div id="tipoDueno" class="form-group has-error" ></div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Primer Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Dprimernombre" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Segundo Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id="Dsegundonombre" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Paterno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Dprimerapellido" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Materno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Dsegundopellido" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Fecha Nacimiento</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Dfechanac" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">  </br>


                         <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Celular</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Dcelular" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Teléfono</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Dtelefono" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Email</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "Demail" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label">Nacionalidad</label>
                            <div class="col-md-10">
                                <select id="cbxDnacionalidad" name="cbxevento" class="form-control" onchange="personajuridica(this.value)">
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
                                <select id="cbxDsexo" name="cbxevento" class="form-control">
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
                                <select id="cbxDestudios" name="cbxevento" class="form-control">
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
                                <select id="cbxDestadocivil" name="cbxevento" class="form-control">
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
                                <select id="cbxDprofesion" name="cbxevento" class="form-control">
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




