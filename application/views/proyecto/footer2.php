</div> <!-- end container-fluid -->

</div> <!-- end content -->



<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2016 - 2020 &copy; Codefox theme by <a href="">Coderthemes</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="#">About Us</a>
                    <a href="#">Help</a>
                    <a href="#">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->


</div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/metisMenu.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/waves.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery.slimscroll.js"); ?>"></script>
<script src="<?php echo base_url("/plugins/sweet-alert2/sweetalert2.min.js"); ?>"></script>


<?php if ($opcion == "form") { ?>

<script src="<?php echo base_url("plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
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
<script src="<?php echo base_url("plugins/datatables/dataTables.fixedColumns.min.js"); ?>"></script>

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
<script src="<?php echo base_url("plugins/tinymce/tinymce.min.js"); ?>"></script>

<script src="<?php echo base_url("plugins/gmaps/gmaps.min.js"); ?>"></script>

<!--Summernote js-->
<script src="<?php echo base_url("plugins/summernote/summernote.min.js"); ?>"></script>






<?php } ?>

<!-- Vendor js -->
<script src="<?php echo base_url("assets2/js/vendor.min.js"); ?>"></script>

<!-- Bootstrap select plugin -->
<script src="<?php echo base_url("assets2/libs/bootstrap-select/bootstrap-select.min.js"); ?>"></script>

<!-- plugins -->
<script src="<?php echo base_url("assets2/libs/c3/c3.min.js"); ?>"></script>
<script src="<?php echo base_url("assets2/libs/d3/d3.min.js"); ?>"></script>

<!-- dashboard init -->
<script src="<?php echo base_url("assets2/js/pages/dashboard.init.js"); ?>"></script>

<!-- App js -->
<script src="<?php echo base_url("assets2/js/app.min.js"); ?>"></script>

<script src="<?php echo base_url("assets/js/jquery.core.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery.app.js"); ?>"></script>
<?php if ($opcion == "form") { ?>
    <!--Esto es para poder usar el formulario wizard siguiente-->
    <script src="<?php echo base_url("assets/pages/jquery.wizard-init.js"); ?>" type="text/javascript"></script>
    <!--Esto es para poder usar en el formulario el date y la hora-->
    <script src="<?php echo base_url("assets/pages/jquery.form-pickers.init.js"); ?>"></script>


    <!-- Modals -->

    <script src="<?php echo base_url("plugins/custombox/js/custombox.min.js"); ?>"></script>
    <script src="<?php echo base_url("plugins/custombox/js/legacy.min.js"); ?>"></script>


    <!-- Esto es para las tablas -->
    <!-- init -->
    <script src="<?php echo base_url("assets/pages/jquery.datatables.init.js"); ?>"></script>

<?php } ?>


<script type="text/javascript">
    function soloNumeros(string) {
        var out = '';
        var filtro = '1234567890kK-'; //Caracteres validos

        //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
        for (var i = 0; i < string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                //Se añaden a la salida los caracteres validos
                out += string.charAt(i);
        //Retornar valor filtrado
        return out;
    }

    function soloNumeros_celda(string) {
        var out = '';
        var filtro = '1234567890'; //Caracteres validos

        //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
        for (var i = 0; i < string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                //Se añaden a la salida los caracteres validos
                out += string.charAt(i);
        //Retornar valor filtrado
        return out;
    }
</script>
<script type="text/javascript">
    function Numeros(e) {
        var key = window.Event ? e.which : e.keyCode
        return (key >= 48 && key <= 57);
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
            keys: true
        });
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
        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });
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
</body>
</html>