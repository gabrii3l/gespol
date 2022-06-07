$(document).ready(function () {
    $('#iddrogas_delito').click('ready', function () {

        var contador = 0;
        $('#datos2_drogas tr').each(function () {
            contador = contador + 1;
        });
        if (contador < 1) {
//        Swal.fire('Debe asignar a lo menos 01 funcionario al procedimiento');

            swal(
                    {
                        title: 'Debe asignar a lo menos 01 funcionario a Drogas',
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3'
                    }
            )

        } else {

//            if (validaciones_drogas_delito() != "") {
//                swal(
//                        {
//                            title: validaciones_especie_delito(),
//                            type: 'warning',
//                            confirmButtonColor: '#4fa7f3',
//                            width: '500px'
//                        }
//                )
//            } else {

            var cbxcalidadelito_drogas = $("#cbxcalidadelito_drogas").val();
            var cbxespecificacion_drogas = $("#cbxespecificacion_drogas").val();
            var cbxcatdetalle_drogas = $("#cbxcatdetalle_drogas").val();
            var cbxmedicion_drogas = $("#cbxmedicion_drogas").val();
            var txtavaluo_drogas = $("#txtavaluo_drogas").val();
            var cbxocultamiento_drogas = $("#cbxocultamiento_drogas").val();
            var cbxodestino_drogas = $("#cbxodestino_drogas").val();
            var textarea_Drogasdelito = $("textarea#textarea_Drogasdelito").val();

            var parametros = {
                "cbxcalidadelito_drogas": cbxcalidadelito_drogas,
                "cbxespecificacion_drogas": cbxespecificacion_drogas,
                "cbxcatdetalle_drogas": cbxcatdetalle_drogas,
                "cbxmedicion_drogas": cbxmedicion_drogas,
                "txtavaluo_drogas": txtavaluo_drogas,
                "cbxocultamiento_drogas": cbxocultamiento_drogas,
                "cbxodestino_drogas": cbxodestino_drogas,
                "textarea_Drogasdelito": textarea_Drogasdelito

            };
            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Drogas/save_drogas',
                type: 'post',
                async: false,
                beforeSend: function (data) {

                },
                success: function (data) {

                    if (data == 0) {
                        swal(
                                {
                                    title: 'Droga registrada exitosamente',
                                    text: 'Ingreso exitoso !',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3'
                                }
                        )
                        save_drogafun();
                    } else {
                        alert(data);
                    }
                }
            });


        }

    });

    $('#cbxespecificacion_drogas').change(function () {



        var parametros = {
            "idcategoria": this.value
        };
        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Drogas/busca_categoriadetalle',
            type: 'post',
            async: false,
            beforeSend: function (data) {

            },
            success: function (data) {

                $('#cbxcatdetalle_drogas').html(data);
            }
        });
    });

    $('#ideasignar_drogas').click('ready', function () {

        var $cont = 0;

        $("input[type='checkbox'][name='chkSeleccion_drogas']").each(function () {

            if ($(this).is(':checked')) {
                if ($('#datos2_drogas').html() == "") {
                    var parametros = {
                        "idfuncionario": $(this).val()
                    };
                    $.ajax({
                        data: parametros,
                        url: '../delito/Ctr_Drogas/buscar_funcionario',
                        type: 'post',
                        async: false,
                        beforeSend: function () {
                        },
                        success: function (data) {

                            $('#datos2_drogas').append(data);

                        }
                    });
                } else {
                    if (buscafuncionariotabla_droga($(this).val()) > 0) {
                        var parametros = {
                            "idfuncionario": $(this).val()
                        };
                        $.ajax({
                            data: parametros,
                            url: '../delito/Ctr_Drogas/buscar_funcionario',
                            type: 'post',
                            async: false,
                            beforeSend: function () {
                            },
                            success: function (data) {

                                $('#datos2_drogas').append(data);

                            }
                        });
                    }
                }
            } else {
                buscafuncionariotabla_eliminar_droga($(this).val());
            }
        });
    });

    function buscafuncionariotabla_eliminar_droga(id) {
        $('#datos2_drogas tr').each(function () {
            if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
                $("#fila_drogas" + parseFloat(id)).remove();
                return false;
            }
        });
    }

    function buscafuncionariotabla_droga(id) {
        var cont = 0;
        $('#datos2_drogas tr').each(function () {
            if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
                cont = 0;
                return false;
            } else {
                cont++;
            }
        });
        return cont;
    }

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

    function save_drogafun() {
        $('#datos2_drogas tr').each(function () {


            var parametros = {
                "id_funcionario": $(this).attr("data-valor")
            };
            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Drogas/save_prodroga',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {
           

                }
            });

        });
    }

    function validaciones_drogas_delito() {

    }
});

function remueve_funcionario_droga(id) {
    $("#fila_droga" + id).remove();
}
