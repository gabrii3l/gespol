



<?php if ($opcion == "form") { ?>
    <!--Esto es para la tabla -->
<!--    <script src="<?php echo base_url("plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/buttons.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/vfs_fonts.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.fixedHeader.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.keyTable.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/responsive.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.scroller.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.colVis.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/datatables/dataTables.fixedColumns.min.js"); ?>"></script>-->
    <!-- init -->
    <script src="<?php echo base_url("assets/pages/jquery.datatables.init.js"); ?>"></script>
    <!--Esto es para poder usar en el formulario el date y la hora-->
    <script src="<?php echo base_url("plugins/moment/moment.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/timepicker/bootstrap-timepicker.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/clockpicker/js/bootstrap-clockpicker.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>
    <!--Esto es para poder usar el formulario wizard siguiente-->
    <script src="<?php echo base_url("plugins/jquery.steps/js/jquery.steps.min.js"); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url("plugins/jquery-validation/js/jquery.validate.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/tinymce/tinymce.min.js"); ?>" ></script>

    <script src="<?php echo base_url("plugins/gmaps/gmaps.min.js"); ?>"></script>

    <!--Summernote js-->
    <script src="<?php echo base_url("plugins/summernote/summernote.min.js"); ?>"></script>

<?php } ?>



<?php if ($opcion == "form") { ?>
    <!--Esto es para poder usar el formulario wizard siguiente-->
    <script src="<?php echo base_url("assets/pages/jquery.wizard-init.js"); ?>" type="text/javascript"></script>
    <!--Esto es para poder usar en el formulario el date y la hora-->
    <script src="<?php echo base_url("assets/pages/jquery.form-pickers.init.js"); ?>"></script>


    <!-- Modals -->

    <script src="<?php echo base_url("plugins/custombox/js/custombox.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/custombox/js/legacy.min.js"); ?>"></script>


    <!-- Esto es para las tablas -->
    <script type="text/javascript">

//
//
//        $(document).ready(function () {
//            $('#datatable').dataTable();
//            $('#datatable-keytable').DataTable({keys: true});
//            $('#datatable-responsive').DataTable();
//            $('#datatable-colvid').DataTable({
//                "dom": 'C<"clear">lfrtip',
//                "colVis": {
//                    "buttonText": "Change columns"
//                }
//            });
//            $('#datatable-scroller').DataTable({
//                ajax: "../plugins/datatables/json/scroller-demo.json",
//                deferRender: true,
//                scrollY: 380,
//                scrollCollapse: true,
//                scroller: true
//            });
//            var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
//            var table = $('#datatable-fixed-col').DataTable({
//                scrollY: "300px",
//                scrollX: true,
//                scrollCollapse: true,
//                paging: false,
//                fixedColumns: {
//                    leftColumns: 1,
//                    rightColumns: 1
//                }
//            });
//
//
//
//            TableManageButtons.init();
//            $('#myTables tr').each(function () {
//                var Id_reg = $(this).attr("data-valor");
//                if (parseInt(Id_reg) > 0) {
//
//                    alert(Id_reg);
//                    /*
//                     
//                     var url_Fam = 'agrega_fun';            
//                     $.ajax({
//                     type: 'post',
//                     data:{
//                     'DatoMedico':DatoMedico,                        
//                     'Id_reg':Id_reg        
//                     },
//                     url: 'agrega_fun',
//                     success: function(responseFam)
//                     {         
//                     
//                     
//                     },
//                     error: function(jqXHR, textStatus, errorThrown){
//                     alert(errorThrown);                                 
//                     }
//                     }); */
//                }
//            });
//
//
//        });


    </script>   
<?php } ?>