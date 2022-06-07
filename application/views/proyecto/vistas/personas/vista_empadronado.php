
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
                                <select id="cbxtipopersona" name="cbxevento" class="form-control" onchange="tipoinfractor(this.value);" >

                                    <option value="" selected>Seleccionar Tipo de Documento</option>
                                    <?php foreach ($tipopersona as $val) { ?>
                                        <option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                       <div id="tipoInfractor" class="form-group has-error" ></div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Primer Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Segundo Nombre</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Paterno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Apellido Materno</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Fecha Nacimiento</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="form-horizontal" role="form">  </br>


                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Celular</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Teléfono</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Email</label>
                            <div class = "col-md-5">
                                <input type = "text" id = "nuevainfraccion" name =" state-danger" class = "form-control" placeholder = "">
                            </div>                            
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Sexo</label>
                            <div class="col-md-10">
                                <select id="cbxtipopersona" name="cbxevento" class="form-control">

                                    <?php // foreach ($tipopersona as $val) { ?>
                                        <!--<option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>-->
                                    <?php // } ?>

                                </select>
                            </div>                         
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Estudios</label>
                            <div class="col-md-10">
                                <select id="cbxtipopersona" name="cbxevento" class="form-control">

                                    <?php // foreach ($tipopersona as $val) { ?>
                                        <!--<option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>-->
                                    <?php // } ?>

                                </select>
                            </div>                           
                        </div>
                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Estado Civil</label>
                            <div class="col-md-10">
                                <select id="cbxtipopersona" name="cbxevento" class="form-control" >

                                    <?php // foreach ($tipopersona as $val) { ?>
                                        <!--<option value="<?php echo $val["idta_tipopersona"]; ?>"><?php echo $val["td_descripcion"]; ?></option>-->
                                    <?php // } ?>

                                </select>
                            </div>                         
                        </div>

                        <div class="form-group">
                            <label class = "col-md-2 control-label" for = "state-danger">Profesion  </label>
                            <div class="col-md-10">
                                <select id="cbxtipopersona" name="cbxevento" class="form-control" >

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






