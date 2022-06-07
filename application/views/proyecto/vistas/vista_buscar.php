


<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row"> 
                <div class="col-sm-12">
                    <div class="col-md-6">
                        <h4 class="m-t-0 header-title"><b>Módulo de Búsqueda</b></h4></br>
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tipo de Acto</label>
                                <div class="col-md-10">
                                    <select id="cbxcalidad" name="cbxcalidad" class="form-control">
                                        <option value="" selected>Seleccionar una opción</option>
                                        <?php foreach ($actos as $val) { ?>
                                            <option value="<?php echo $val["idta_acto"]; ?>"><?php echo $val["td_descripcion"]; ?></option>
                                        <?php } ?>
                                             <option value="0">Todos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <label class="col-lg-2 control-label" for="name">Procedimiento</label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" id="txtprocedimiento" name="txtprocedimiento" class="form-control" placeholder="Ingresar N° Procedimiento " onkeyup="this.value = soloNumeros(this.value)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <label class="col-lg-2 control-label" for="name">Acto</label>
                                    <div class="col-lg-5">
                                        <div class="col-sm-10">
                                            <input type="text" id="txtacto" name="txtacto" class="form-control" placeholder="Ingresar N° Acto" id="datepicker-autoclose" onkeyup="this.value = soloNumeros(this.value)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="buscar" type="button" class="btn btn-primary waves-effect w-md waves-light">Buscar</button>      

                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tabla"></div>
