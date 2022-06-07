/* Funciones para encargados */
$(document).ready(function () {
    /*Botones módulos Delito*/
    $('#btndelito').click('ready', function () {

        var contador = 0;
        $('#datos_delito tr').each(function () {
            contador = contador + 1;
        });
        if (contador < 1) {
            swal(
                    {
                        title: 'Debe asignar a lo menos 01 delito al procedimiento',
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3'
                    }
            )
        } else {
            if (validaciones_delito() != "") {
                swal(
                        {
                            title: validaciones_delito(),
                            type: 'warning',
                            confirmButtonColor: '#4fa7f3',
                            width: '800px'
                        }
                )
            } else {
                var archivo1_delito = $("#archivo1_delito").val();
                var archivo2_delito = $("#archivo2_delito").val();
                var fechasuceso_delito = $("#fechasuceso_delito").val();
                var horasuceso_delito = $("#horasuceso_delito").val();
                var fechadenuncia_delito = $("#fechadenuncia_delito").val();
                var horadenuncia_delito = $("#horadenuncia_delito").val();
                var cbxadopcion_delito = $("#cbxadopcion_delito").val();
                var cbxmodoperanti_delito = $("#cbxmodoperanti_delito").val();
                var cbxlugar_delito = $("#cbxlugar_delito").val();
                var cbxregion_delito = $("#cbxregion_delito").val();
                var cbxprovincia_delito = $("#cbxprovincia_delito").val();
                var cbxcomuna_delito = $("#cbxcomuna_delito").val();
                var idnumero_delito = $("#idnumero_delito").val();
                var iddepto_delito = $("#iddepto_delito").val();
                var idblock_delito = $("#idblock_delito").val();
                var txtvilla_delito = $("#txtvilla_delito").val();
                var latituddelito_delito = $("#latituddelito_delito").val();
                var longituddelito_delito = $("#longituddelito_delito").val();
                var autocompletado_delito = $("#autocompletado_delito").val();
                var textarea_delito = $("textarea#textarea_delito").val();

                if (document.getElementById('archivo1_delito').files[0] === null) {
                    var property2_delito = 0;
                } else {
                    var property2_delito = document.getElementById('archivo2_delito').files[0];
                }
                if (document.getElementById('archivo2_delito').files[0] === null) {
                    var property_delito = 0;
                } else {
                    var property_delito = document.getElementById('archivo1_delito').files[0];
                }



                var form_data = new FormData();
                form_data.append("file_delito", property_delito);
                form_data.append("file2_delito", property2_delito);
                form_data.append("archivo1_delito", archivo1_delito);
                form_data.append("archivo2_delito", archivo2_delito);
                form_data.append("fechasuceso_delito", fechasuceso_delito);
                form_data.append("horasuceso_delito", horasuceso_delito);
                form_data.append("fechadenuncia_delito", fechadenuncia_delito);
                form_data.append("horadenuncia_delito", horadenuncia_delito);
                form_data.append("cbxadopcion_delito", cbxadopcion_delito);
                form_data.append("cbxmodoperanti_delito", cbxmodoperanti_delito);
                form_data.append("cbxlugar_delito", cbxlugar_delito);
                form_data.append("cbxregion_delito", cbxregion_delito);
                form_data.append("cbxprovincia_delito", cbxprovincia_delito);
                form_data.append("cbxcomuna_delito", cbxcomuna_delito);
                form_data.append("idnumero_delito", idnumero_delito);
                form_data.append("iddepto_delito", iddepto_delito);
                form_data.append("idblock_delito", idblock_delito);
                form_data.append("txtvilla_delito", txtvilla_delito);
                form_data.append("latituddelito_delito", latituddelito_delito);
                form_data.append("longituddelito_delito", longituddelito_delito);
                form_data.append("autocompletado_delito", autocompletado_delito);
                form_data.append("textarea_delito", textarea_delito);

                var parametros = {
                    "form_data": form_data,
                    "archivo1_delito": archivo1_delito,
                    "archivo2_delito": archivo2_delito,
                    "fechasuceso_delito": fechasuceso_delito,
                    "horasuceso_delito": horasuceso_delito,
                    "fechadenuncia_delito": fechadenuncia_delito,
                    "horadenuncia_delito": horadenuncia_delito,
                    "cbxadopcion_delito": cbxadopcion_delito,
                    "cbxmodoperanti_delito": cbxmodoperanti_delito,
                    "cbxlugar_delito": cbxlugar_delito,
                    "cbxregion_delito": cbxregion_delito,
                    "cbxprovincia_delito": cbxprovincia_delito,
                    "cbxcomuna_delito": cbxcomuna_delito,
                    "idnumero_delito": idnumero_delito,
                    "iddepto_delito": iddepto_delito,
                    "idblock_delito": idblock_delito,
                    "txtvilla_delito": txtvilla_delito,
                    "latituddelito_delito": latituddelito_delito,
                    "longituddelito_delito": longituddelito_delito,
                    "autocompletado_delito": autocompletado_delito,
                    "textarea_delito": textarea_delito,
                };

                $.ajax({
                    data: form_data,
                    url: '../delito/Ctr_Delito/save_partepol',
                    type: 'post',
                    contentType: false,
                    cache: false,
                    processData: false,
                    async: false,
                    beforeSend: function () {
                    },
                    success: function (data) {


                        if (data == 0) {

                            $("#archivo1_delito").val(null);
                            $("#archivo2_delito").val(null);
                            save_delitos();
                            traevista_funcionario();
                            $("#encargados2").trigger("click");
                            $("#btndelito").hide();
                            swal(
                                    {
                                        title: 'Delito registrado exitosamente',
                                        text: 'Ingreso exitoso !',
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3'
                                    }
                            )

                        }

                    }
                });

            }
        }
    });

    $('#ideasignar_delito').click('ready', function () {
        var $cont = 0;
       $("input[type='checkbox'][name='chkSeleccion_delito']").each(function () {
            if ($(this).is(':checked')) {
                if ($('#datos_delito').html() == "") {
                    var parametros = {
                        "iddelito": $(this).val()
                    };
                    $.ajax({
                        data: parametros,
                        url: '../delito/Ctr_Delito/buscar_delito',
                        type: 'post',
                        async: false,
                        beforeSend: function () {
                        },
                        success: function (data) {
                            $('#datos_delito').append(data);
                        }
                    });
                } else {
                    if (buscadelitotabla($(this).val()) > 0) {
                        var parametros = {
                            "iddelito": $(this).val()
                        };
                        $.ajax({
                            data: parametros,
                            url: '../delito/Ctr_Delito/buscar_delito',
                            type: 'post',
                            async: false,
                            beforeSend: function () {
                            },
                            success: function (data) {

                                $('#datos_delito').append(data);

                            }
                        });
                    }
                }
            } else {
                buscadelitotabla_eliminar($(this).val());
            }
        });
    });
    $('#idcheck_delito').click('ready', function () {

        $('input[type="checkbox"]').each(function () {
            $("input[type=checkbox]").prop("checked", false);

        });


        document.getElementById("ideasignar_delito").click();

    });
    $('#cbxregion_delito').change(function () {

        var parametros = {
            "idregion": this.value
        };
        $.ajax({
            data: parametros,
            url: 'traeprovincia',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {
                $('#cbxprovincia_delito').html(data);
            }
        });
        if ($("#cbxprovincia_delito").val() == "") {
            $("#cbxcomuna_delito").empty();
        }

    });
    $('#cbxprovincia_delito').change(function () {
        var parametros = {
            "idprovincia": this.value
        };
        $.ajax({
            data: parametros,
            url: 'traecomuna',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {

                $('#cbxcomuna_delito').html(data);
            }
        });

    });

});
function save_delitos() {

    $('#datos_delito tr').each(function () {

        var parametros = {
            "iddelito": $(this).attr("data-valor")
        };
        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Delito/save_delito',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {


            }
        });




    });



}
/*****************************____Funciones___**************************************/
function validaciones_delito() {
    var html = "";
    if ($("#fechasuceso_delito").val() == "") {
        html += "-Debe ingresar Fecha de Suceso </br>";
    }
    if ($("#horasuceso_delito").val() == "") {
        html += "-Debe ingresar Hora Suceso </br>";
    }
    if ($("#fechadenuncia_delito").val() == "") {
        html += "-Debe ingresar Fecha Delito </br>";
    }
    if ($("#horadenuncia_delito").val() == "") {
        html += "-Debe ingresar Hora Delito </br>";
    }
    if ($("#cbxadopcion_delito").val() == "") {
        html += "-Debe ingresar Tipo de Adopcion de Delito </br>";
    }
    if ($("#cbxmodoperanti_delito").val() == "") {
        html += "-Debe Seleccionar Modo Operanti </br>";
    }
    if ($("#cbxlugar_delito").val() == "") {
        html += "-Debe Seleccionar Lugar de Delito </br>";
    }
    if ($("#cbxregion_delito").val() == "") {
        html += "-Debe Seleccionar Region </br>";
    }
    if ($("#cbxprovincia_delito").val() == "") {
        html += "-Debe Seleccionar Provincia </br>";
    }
    if ($("#cbxcomuna_delito").val() == "") {
        html += "-Debe Seleccionar Comuna </br>";
    }
    if ($("#latituddelito_delito").val() == "") {
        html += "-Debe poseer las coordenadas de latitud </br>";
    }
    if ($("#longituddelito_delito").val() == "") {
        html += "-Debe poseer las coordenadas de longitud </br>";
    }
    if ($("#autocompletado_delito").val() == "") {
        html += "-Debe ingresar una dirección en el Mapa</br>";
    }
    return html;
}
function limpiacheck() {
    $('input[type="checkbox"]').each(function () {
        $("input[type=checkbox]").prop("checked", false);
    });
}
function buscadelitotabla_eliminar(id) {
    $('#datos_delito tr').each(function () {
        if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
            $("#fila_delito" + parseFloat(id)).remove();
            return false;
        }
    });
}
function buscadelitotabla(id) {
    var cont = 0;
    $('#datos_delito tr').each(function () {
        if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
            cont = 0;
            return false;
        } else {
            cont++;
        }
    });
    return cont;
}
function rescataidfun() {
    var $cont = 0;
    $('input[type="checkbox"]').each(function () {
        if ($(this).is(':checked')) {
            if ($('#datos2').html() == "") {
                var parametros = {
                    "idfuncionario": $(this).val()
                };
                $.ajax({
                    data: parametros,
                    url: '../delito/ctr_encargado/buscar_funcionario',
                    type: 'post',
                    async: false,
                    beforeSend: function () {
                    },
                    success: function (data) {
                        if (data == "RUN no valido") {
                            swal(
                                    {
                                        title: data,
                                        type: 'warning',
                                        confirmButtonColor: '#4fa7f3'
                                    }
                            )
                        } else if (data == "No hay datos para este RUN") {
                            swal({
                                title: data,
                                type: 'warning',
                                confirmButtonColor: '#4fa7f3'})
                        } else {
                            $('#datos2').append(data);
                        }
                    }
                });
            } else {
                if (buscafuncionariotabla($(this).val()) > 0) {
                    var parametros = {
                        "idfuncionario": $(this).val()
                    };
                    $.ajax({
                        data: parametros,
                        url: '../delito/ctr_encargado/buscar_funcionario',
                        type: 'post',
                        async: false,
                        beforeSend: function () {
                        },
                        success: function (data) {
                            if (data == "RUN no valido") {
                                swal(
                                        {
                                            title: data,
                                            type: 'warning',
                                            confirmButtonColor: '#4fa7f3'
                                        }
                                )
                            } else if (data == "No hay datos para este RUN") {
                                swal({
                                    title: data,
                                    type: 'warning',
                                    confirmButtonColor: '#4fa7f3'})
                            } else {
                                $('#datos2').append(data);
                            }
                        }
                    });
                }
            }
        } else {
            buscafuncionariotabla_eliminar($(this).val());
        }
    });
}
function buscafuncionariotabla_eliminar(id) {
    $('#datos2 tr').each(function () {
        if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
            $("#fila_delito" + parseFloat(id)).remove();
            return false;
        }
    });
}
function buscafuncionariotabla(id) {
    var cont = 0;
    $('#datos2 tr').each(function () {
        if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
            cont = 0;
            return false;
        } else {
            cont++;
        }
    });
    return cont;
}
function remueve(id) {
    $("#fila_delito" + id).remove();
}
/*****************************__vistas___**********************************/
function traevista_funcionario() {

    $.ajax({
        url: '../delito/Ctr_Encargados',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablafuncionarios').html(data);
        }
    });

}

