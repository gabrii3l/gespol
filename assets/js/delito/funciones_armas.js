$(document).ready(function () {
    $('#idarmas_delito').click('ready', function () {

        if (validaciones_armas_delito() != "") {
            swal(
                    {
                        title: validaciones_armas_delito(),
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '500px'
                    }
            )
        } else {
            var cbxcalidadelito_armas = $("#cbxcalidadelito_armas").val();
            var cbxcategoria_armas = $("#cbxcategoria_armas").val();
            var cbx_descripciondelito_armas = $("#cbx_descripciondelito_armas").val();
            var txtmarca_arma = $("#txtmarca_arma").val();
            var txtserie_arma = $("#txtserie_arma").val();
            var txtavaluo_arma = $("#txtavaluo_arma").val();
            var txtencargo_arma = $("#txtencargo_arma").val();
            var cbxdestino_arma = $("#cbxdestino_arma").val();
            var txtcalibre_arma = $("#txtcalibre_arma").val();
            var txtcantidad_arma = $("#txtcantidad_arma").val();
            var txtcadenacustodia_arma = $("#txtcadenacustodia_arma").val();
            var textarea_armasdelito = $("#textarea_armasdelito").val();

            var parametros = {
                "cbxcalidadelito_armas": cbxcalidadelito_armas,
                "cbxcategoria_armas": cbxcategoria_armas,
                "cbx_descripciondelito_armas": cbx_descripciondelito_armas,
                "txtmarca_arma": txtmarca_arma,
                "txtserie_arma": txtserie_arma,
                "txtavaluo_arma": txtavaluo_arma,
                "txtencargo_arma": txtencargo_arma,
                "cbxdestino_arma": cbxdestino_arma,
                "txtcalibre_arma": txtcalibre_arma,
                "txtcantidad_arma": txtcantidad_arma,
                "txtcadenacustodia_arma": txtcadenacustodia_arma,
                "textarea_armasdelito": textarea_armasdelito
            };
            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Armas/save_armas',
                type: 'post',
                async: false,
                beforeSend: function (data) {

                },
                success: function (data) {

                    if (data == 0) {
                        swal(
                                {
                                    title: 'Arma registrada exitosamente',
                                    text: 'Ingreso exitoso !',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3'
                                }
                        )
                    } else {
                        alert(data);
                    }
                }
            });

        }



    });




    $('#cbxcategoria_armas').change(function () {

        var parametros = {
            "idcategoria": this.value
        };
        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Armas/busca_categoriadetalle',
            type: 'post',
            async: false,
            beforeSend: function (data) {

            },
            success: function (data) {

                $('#cbx_descripciondelito_armas').html(data);
            }
        });
    });




    function validaciones_armas_delito() {
        
        var html = "";
        
        if ($("#cbxcalidadelito_armas").val() == "") {
            html += "-Debe seleccionar tipo de Calidad </br>";
        }
         if ($("#cbxcategoria_armas").val() == "") {
            html += "-Debe seleccionar Categoria </br>";
        }
         if ($("#cbx_descripciondelito_armas").val() == "") {
            html += "-Debe seleccionar Detalle</br>";
        }
         if ($("#txtmarca_arma").val() == "") {
            html += "-Debe ingresar Marca </br>";
        }
         if ($("#txtserie_arma").val() == "") {
            html += "-Debe Ingresar N° de Serie </br>";
        }
         if ($("#txtavaluo_arma").val() == "") {
            html += "-Debe ingresar avaluo </br>";
        }
         if ($("#txtencargo_arma").val() == "") {
            html += "-Debe Ingresar N° de Encargo </br>";
        }
         if ($("#cbxdestino_arma").val() == "") {
            html += "-Debe seleccionar Destino </br>";
        }
         if ($("#txtcalibre_arma").val() == "") {
            html += "-Debe Ingresar Calibre </br>";
        }
         if ($("#txtcantidad_arma").val() == "") {
            html += "-Debe Ingresar Cantidad </br>";
        }
         if ($("#txtcadenacustodia_arma").val() == "") {
            html += "-Debe Ingresar Cadena de Custorida </br>";
        }
      

        return html;
    }

});