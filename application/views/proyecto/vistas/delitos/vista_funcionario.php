<script src="<?php echo base_url("assets/js/delito/funciones_encargado.js"); ?>" ></script>

<div class="row">
    <div class="col-md-4"> 

        <div class="text-center card-box">
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                    <h3 class="m-0 text-muted"><i class="mdi mdi-dots-horizontal"></i></h3>
                </a>

            </div>
            <div class="clearfix"></div>
            <div class="member-card">
                <div class="thumb-xl member-thumb m-b-10 center-block">

                    <img src="<?php echo base_url(); ?>img/<?php echo $sesion['Imagen']; ?>" class="img-circle img-thumbnail" alt="profile-image">
                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                </div>

                <div class="">
                    <h4 class="m-b-5"><?php echo $sesion['PrimerNombre'] . " " . $sesion['SegundoNombre'] . " " . $sesion['ApellidoPaterno'] . " " . $sesion['ApellidoMaterno']; ?>  </h4>
                    <p class="text-muted"><?php echo $sesion['Correo']; ?> <span> | </span> <span> <a href="#" class="text-success"><?php echo $sesion['Entidad']; ?></a> </span></p>
                </div>

                <p class="text-muted font-13">
                <ul class="list-unstyled w-list">
                    <li><b>Comuna:</b> <?php echo $sesion['Comuna']; ?> </li>
                    <li><b>RUN:</b> <?php echo $sesion['RunUsuario'] . "-" . $sesion['DigitoUsuario']; ?> </li>                                          
                    <li><b>Grado:</b></li>
                    <li><b>Cargo:</b> </li>
                </ul>
                </p>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-md-6">

            <div class="card-box table-responsive">
                <h3> <p class="text-primary ">Funcionarios de su unidad</p></h3>
                <table id="datatable-buttons2" class="table table-striped table-bordered">
                    <thead>
                    <th>    </th> 
                    <th>Rut</th>  
                    <th>Nombre</th>                         
                    <th>Comuna</th>    

                    </tr></thead>
                    <tbody Id="row2">
                        <?php foreach ($funcionarios as $val) { ?>
                            <tr style="text-align: left;" class="identificador" data-valor="<?php echo$val['idfun'] ?>" >
                                <td class="numero"><input type="checkbox" value=" <?php echo $val['idfun'] ?>" name="chkSeleccion_fun"></input></td>
                                <td><?php echo $val['RunUsuario'] . "-" . $val['DigitoUsuario'] ?></td>               
                                <td><?php echo $val['PrimerNombre'] . " " . $val['SegundoNombre'] . " " . $val['ApellidoPaterno'] . " " . $val['ApellidoMaterno'] ?></td>                    
                                <td><?php echo $val['Comuna'] ?> </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div> 

            <button id="ideasignar" type="button" class="btn btn-primary waves-effect w-md waves-light">Asignar</button>    
            <div id="agregados" class="card-box" >
                <h4 class="m-t-0 header-title"><b>Personal de Servicio asignado</b></h4>
                <p class="text-muted font-14 m-b-20">
                    Esta es la relación del personal que se asociará a este evento policial.
                </p>

                <table class="table table-striped m-0" id="myTables">
                    <thead>
                        <tr><th>Rut</th>  
                            <th>Nombre</th>   
                            <th>Cargo</th>  
                            <th>Grado</th>  
                            <th>Comuna</th>                                          

                        </tr>
                    </thead>
                    <tbody id="datos20"></tbody>
                </table>
            </div>                   



        </div>
    </div>
    
    
    
    <div class="form-group text-right m-b-0">
        <button id="btnguardafun" type="button" class="btn btn-primary waves-effect w-md waves-light">Siguiente</button>    
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



            TableManageButtons2.init();


        });


    </script>  
