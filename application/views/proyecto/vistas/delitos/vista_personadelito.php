
<script src="<?php echo base_url("assets/js/delito/funciones_personadelito.js"); ?>" ></script>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Información Principal Persona</b></h4></br>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tipo de Persona</label>
                            <div class="col-md-10">
                                <select id="cbxtipoper_delito" name="cbxtipoper_delito" class="form-control">
                                    <option value="" selected>Seleccionar una opción</option>                                     
                                    <?php foreach ($tipoper as $val) { ?>
                                        <option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                     <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Calidad Persona</label>
                            <div class="col-md-10">
                                <select id="cbxcalidadelito_delito" name="cbxcalidadelito_delito" class="form-control">
                                    <option value="" selected>Seleccionar una opción</option>                                     
                                    <?php foreach ($Calidadelito as $val) { ?>
                                        <option value="<?php echo $val["idta_calidadelito"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">

                    <form class="form-horizontal" role="form"> </br></br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Datos Identificacion</label>
                            <div class="col-md-10">
                                <select id="cbxtipoidentificacion_delito" name="cbxtipoidentificacion_delito" class="form-control">
                                    <option value="" selected>Seleccionar una opción</option>
                                    <?php foreach ($tipoidentificacion as $val) { ?>
                                        <option value="<?php echo $val["idta_identificacion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
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

<div id="vista_empresa"></div>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-t-0 header-title"><b>Datos Personales</b></h4>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Documento Identificacion</label>
                            <div class="col-md-5">
                                <select id="cbxDocDdentificacion_delito" name="cbxDocDdentificacion_delito" class="form-control" onchange="tipodueno(this.value);">
                                    <option value="" selected>Seleccionar Tipo de Documento</option>
                                    <?php foreach ($identificacion as $val) { ?>
                                        <option value="<?php echo $val["idta_identificacion"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger"></label>
                            <div class = "col-md-5">
                                <input type = "text" id = "txtnum_identificacion_delito" name ="txtnum_identificacion_delito" class = "form-control" placeholder = "Ingrese N° Identificacion">
                            </div>    
                            <div class = 'col-md-3'>
                                <button id = "btnbuscaper_delito" type = "button" class = "btn btn-danger waves-effect w-md waves-light">Buscar</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Primer Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "primernombre_delito" name ="primernombre_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Segundo Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id="segundonombre_delito" name ="segundonombre_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Paterno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "primerapellido_delito" name ="primerapellido_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Materno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "segundoapellido_delito" name ="segundoapellido_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Fecha Nacimiento</label>
                            <div class = "col-md-5">
                                <input type="date" id = "fechanac_delito" name ="fechanac_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">  </br>


                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Celular</label>
                            <div class = "col-md-5">
                                <input type = "text" id="celular_delito" name ="celular_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Teléfono</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "telefono_delito" name ="telefono_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Email</label>
                            <div class = "col-md-5">
                                <input type="text" id = "email_delito" name ="email_delito" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nacionalidad</label>
                            <div class="col-md-10">
                                <select id="cbxnacionalidad_delito" name="cbxnacionalidad_delito" class="form-control">
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
                                <select id="cbxsexo_delito" name="cbxsexo_delito" class="form-control">
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
                                <select id="cbxestudios_delito" name="cbxestudios_delito" class="form-control">
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
                                <select id="cbxestadocivil_delito" name="cbxestadocivil_delito" class="form-control">
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
                                <select id="cbxprofesion_delito" name="cbxprofesion_delito" class="form-control">
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
                    <h4 class="m-t-0 header-title"><b>Dirección</b></h4></br>
                    <form class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-md-2 control-label">Region:</label>
                            <div class="col-md-5">
                                <select id="cbxregionper_delito" name="cbxregionper_delito" class="form-control">
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
                                <select id="cbxprovinciaper_delito" name="cbxprovincia_delito" class="form-control"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Comuna:</label>
                            <div class="col-md-5">
                                <select id="cbxcomunaper_delito" name="cbxcomuna_delito" class="form-control">

                                </select>
                            </div>

                        </div>                

                        <div class="form-group">
                            <label class="col-md-2 control-label">Número</label>
                            <div class="col-md-5">
                                <input id="idnumeropersona_delito" type="text"  maxlength="10"    value="<?php echo set_value('txtboleta'); ?>"  name="idnumero_delito" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Depto</label>
                            <div class="col-md-5">
                                <input id="iddeptopersona_delito" type="text" maxlength="10"  value="<?php echo set_value('txtboleta'); ?>"  name="iddepto_delito" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
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
                                <input id="idblockpersona_delito"type="text"  value="<?php echo set_value('txtboleta'); ?>"  name="idblock_delito" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Villa o Población</label>
                            <div class="col-md-10">
                                <input type="text" id="txtvillapersona_delito" value="<?php echo set_value('txtboleta'); ?>"  name="txtvilla_delito" class="form-control"   required="" placeholder="Ingrese N° Citación">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Latitud</label>
                            <div class="col-md-10">
                                <input type="text" id="latitudpersona_delito" name="latitudpersona_delito" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Longitud</label>
                            <div class="col-md-10">
                                <input type="text" id="longitudpersona_delito" name="longitudpersona_delito" placeholder="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Dirección</label>
                            <div class="col-md-10">
                                <input type="text" id="direccionpersona_delito" name="state-danger" class="form-control" placeholder="Debe Ingresar Dirección">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Geolocalización</label>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-inverse waves-effect w-md waves-light" value="Obtener mi ubicacion" onclick="get_locationdelito_per();">Obtener mi ubicación</button>
                            </div>
                        </div>



                    </form>
                </div>

                <div class="col-md-15">
                    <div class="map" id="vistapersona_delito"></div>
                    <script type="text/javascript">
                        start_mapdelito_persona();
                    </script>
                </div>

            </div>



        </div> 
    </div>

</div>


<div class="form-group text-right m-b-0">
    <button id="btnpersona_delito" type="button" class="btn btn-primary waves-effect w-md waves-light" >Guardar</button>
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














