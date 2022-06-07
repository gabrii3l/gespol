$(document).ready(function () {
    $('#idespecies_delito').click('ready', function () {



        if (validaciones_especie_delito() != "") {
            swal(
                    {
                        title: validaciones_especie_delito(),
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '500px'
                    }
            )
        } else {
            var observacion_especie = $("textarea#textarea_Especiesdelito").val();
            var cbxcalidadelito_especie = $("#cbxcalidadelito_especie").val();
            var cbxcategoria_especies = $("#cbxcategoria_especies").val();
            var txtnroserie_especie = $("#txtnroserie_especie").val();
            var txtnromarca_especie = $("#txtnromarca_especie").val();
            var cbx_descripciondelito = $("#cbx_descripciondelito_especie").val();
            var txtavaluo_especie = $("#txtavaluo_especie").val();
            var txtcantidad_especie = $("#txtcantidad_especie").val();
            var cbxdestino_especies = $("#cbxdestino_especies").val();

            var parametros = {
                "observacion_especie": observacion_especie,
                "cbxcalidadelito_especie": cbxcalidadelito_especie,
                "cbxcategoria_especies": cbxcategoria_especies,
                "txtnroserie_especie": txtnroserie_especie,
                "txtnromarca_especie": txtnromarca_especie,
                "cbx_descripciondelito": cbx_descripciondelito,
                "txtavaluo_especie": txtavaluo_especie,
                "txtcantidad_especie": txtcantidad_especie,
                "cbxdestino_especies": cbxdestino_especies

            };
            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Especies/save_especies',
                type: 'post',
                async: false,
                beforeSend: function (data) {

                },
                success: function (data) {

                    if (data == 0) {
                        swal(
                                {
                                    title: 'Especie registrada exitosamente',
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

    $('#cbxcategoria_especies').change(function () {


        var parametros = {
            "idcategoria": this.value
        };
        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Especies/busca_categoriadetalle',
            type: 'post',
            async: false,
            beforeSend: function (data) {

            },
            success: function (data) {

                $('#cbx_descripciondelito_especie').html(data);
            }
        });
    });




    function validaciones_especie_delito() {
        var html = "";
        if ($("#cbxcalidadelito_especie").val() == "") {
            html += "-Debe seleccionar tipo de Calidad </br>";
        }
        if ($("#cbxcategoria_especies").val() == "") {
            html += "-Debe tipo de Categoria </br>";
        }
        if ($("#txtnroserie_especie").val() == "") {
            html += "-Debe ingresar N° de Serie</br>";
        }
        if ($("#txtnromarca_especie").val() == "") {
            html += "-Debe ingresar Marca </br>";
        }
        if ($("#cbx_descripciondelito_especie").val() == "") {
            html += "-Debe seleccionar Detalle</br>";
        }
        if ($("#txtavaluo_especie").val() == "") {
            html += "-Debe ingresar monto avaluo </br>";
        }
//        if ($("#txtcantidad_especie").val() == "") {
//            html += "-Ingresar Cantidad </br>";
//        }
        if ($("#cbxdestino_especies").val() == "") {
            html += "-Debe Seleccionar Destino</br>";
        }

        return html;
    }

});