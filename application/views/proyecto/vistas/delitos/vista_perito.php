

<h4>Deberá ingresar todos los datos Asociados al Perito</h4>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Ingreso de datos de Personas</b></h4>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">                      

                        <div class="form-group">
                            <label data-toggle="modal" data-target="#con-close-modal2" class="col-lg-2 control-label" class="col-lg-2 control-label" for="name">RUN</label>
                            <div class="col-md-5">
                                <input type="text" id="rut" value="<?php echo set_value('txtrut'); ?>"  name="txtapellidopaterno"class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="(ej: 17808433k)">  
                            </div>
                            <div class="col-md-3">
                                <button id="idevento" type="button" class="btn btn-success waves-effect w-md waves-light" onclick="buscapersona();">Buscar</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Pasaporte</label>
                            <div class="col-md-10">
                                <input type="text" id="pasaporte" value="<?php echo set_value('txtpasaporte'); ?>"  name="txtpasaporte" class="form-control"  onkeyup="this.value = soloNumeros(this.value)"  required="" placeholder="">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nacionalidad</label>
                            <div class="col-md-10">
                                <select id="cbxevento" name="cbxevento" class="form-control">


                                </select>
                            </div>
                        </div>



                    </form>
                </div>

            </div>


        </div> 
    </div>
    <button id="idevento" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="buscapersona();">Guardar</button>
</div>

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
