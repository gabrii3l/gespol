
<!-- end row -->
<!-- Basic Form Wizard -->
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <!--echo   $this->session->userdata('idacto');--> 
            <h4 class="m-t-0 header-title"><b>INGRESO DE PROCEDIMIENTO POLICIAL </b><b id="respuesta"></h4> </b></br>

            <ul id="subevento" class="nav nav-tabs">
                <li id="datosprincipales" class="active"><a id="datosprincipales2"  data-toggle="tab" href="#home" > <img style="width:40px; height:40px;" src="<?php echo base_url("assets/images/icons/principal.jpg"); ?>" >Datos Principales</a></li>

            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active"> 
                    <form action="#">
                        <div class="form-group clearfix" id="actos"></div>


                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label" for="name">Fecha Ingreso</label>
                            <div class="col-lg-2">
                                <div class="col-sm-10">
                                    <input type="date" id="txtfecha" name="txtfecha" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label" for="name"> Hora Ingreso</label>
                            <div class="col-lg-2">
                                <div class="col-lg-10 clockpicker">
                                    <input type="text" id="txthora" name="txthora"class="form-control" value="" readonly>

                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <label class="col-lg-2 control-label" for="name"> Breve Descripción</label>
                            <div class="col-lg-10">
                                <div class="col-lg-10 ">
                                    <textarea id="elm1" class="form-control" rows="5" id="comment" required="" ></textarea>
                                </div>
                            </div>
                        </div>
                        <!--                        <div class="form-group clearfix">
                                                    <label class="col-md-2 control-label" for="state-danger">Dirección</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="autocompletado" name="state-danger" class="form-control" placeholder="Debe Ingresar Dirección">
                                                    </div>
                                                </div>-->
                        <!--                        <div class="form-group clearfix">
                        
                                                    <label class="col-lg-2 control-label" for="name"> Seleccione su ubicación</label>
                                                    <div class="col-lg-10">
                                                        <div class="col-lg-10 ">
                                                            <table class="table-elements">
                                                                <tr>
                                                                    <td>
                                                                        <button type="button" class="btn btn-inverse waves-effect w-md waves-light" value="Obtener mi ubicacion - A" onclick="get_my_location();">Obtener mi ubicación -A</button>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="my_lat" name="txtlatitud" placeholder="Latitud" class="txt" readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="my_lng" name="txtlongitud" placeholder="Longitud"  class="txt" readonly>
                                                                    </td>
                        
                                                                </tr>
                                                            </table>
                                                           <div class="map" id="map"></div>
                                                            <script type="text/javascript">
                                                               start_map();
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <button id="btngrupo" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="generagrupo();">Guardar</button>                
                    </form>
                </div>
                 <div id="menu10" class="tab-pane fade">
                    <div id="tabladelito"></div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div id="tablafuncionarios"></div>
                </div>  
                <div id="menu2" class="tab-pane fade">
                    <div id="tablapersonas"></div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div id="tablavehiculos"></div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div id="tablaespecies"></div>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <div id="tablaarmas"></div>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <div id="tabladrogas"></div>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <div id="tablaperito"></div>
                </div>
                <div id="menu8" class="tab-pane fade">
                    <div id="tablaterminar"></div>
                </div>
                <div id="menu9" class="tab-pane fade">
                    <div id="tablainfraccion"></div>
                </div>     
                <div id="menu11" class="tab-pane fade">
                    <div id="tablaconserje"></div>
                </div>  

            </div>

        </div>









    </div>



</div>

