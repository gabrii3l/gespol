



<div class="row">
    <div class="col-md-12">
     
        <div class="card-box table-responsive">
               <h3> <p class="text-primary ">INFRACCIONES REGISTRADAS </p></h3>
           <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                <th> ID </th>
                 <th>Acto</th>
                <th>Region</th>  
                <th>Provincia</th>   
                <th>Comuna</th>  
                <th>Tipo Infracción</th>  
                <th>Lugar Ocurrencia</th>  
                <th>Fecha Suceso</th> 
                <th>Dirección de Ocurrencia</th> 
             
                </tr></thead>
                <tbody>
                    <?php foreach ($infraccion as $val) { ?>
                        <tr>
                            <td>
                            
                           <a href="<?php echo base_url(); ?>index.php/procedimientos/Ctr_Busqueda/buscaid?id=<?php echo base64_encode($val['id']); ?>&idacto=<?php echo $val['idacto']; ?>" target="_blank" ><?php echo $val['id'] ?></a>   
                            
                            </td>
                            <td><?php echo $val['acto'] ?></td>
                            <td><?php echo $val['region'] ?></td>
                            <td><?php echo $val['provincia'] ?></td>
                            <td><?php echo $val['comuna'] ?></td>
                            <td><?php echo $val['tipoinfraccion'] ?></td>
                            <td><?php echo $val['lugarocurrencia'] ?></td>
                            <td><?php echo $val['fechasuceso'] ?></td>
                          <td><?php echo $val['direccion'] ?></td>
                            <?php if ($val['evidencia1'] && $val['evidencia2'] <> "" || $val['evidencia1'] == "" && $val['evidencia2'] <> "" || $val['evidencia1'] <> "" && $val['evidencia2'] == "") { ?>


                                <!--<td><button id="btnevidencia" onclick="evidencia(<?php echo $val['id'] ?>)" type='button' value=" <?php echo base64_encode($val['id']) ?> " name='chkSeleccion' data-toggle="modal" data-target="#myModal" >Evidencia</button></td>-->
                            <?php } else { ?>
                          
                            <?php } ?>

                            <!--<td class=center><a href="<?php echo base_url(); ?>index.php/procedimientos/ctr_infracciones/pdf?id=<?php echo base64_encode($val['id']); ?>" target="_blank"><img style="width:3  0px; height:30px;" src="<?php echo base_url("assets/images/icons/pdf.png"); ?>" alt="Los Tejos" /></a>-->   
                       <!--<td><a href="<?php echo base_url("procedimientos/Ctr_Infracciones/pdf"); ?>"  target="_blank">PDF</a></td>-->


                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>     
    </div>
</div>

      
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="evidencia">



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



            TableManageButtons.init();


        });


    </script>  
