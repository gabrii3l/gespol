$('#btninfraccion').click('ready', function() {



    var contador = 0;
    $('#prueba tr').each(function() {
        contador = contador + 1;
    });
    if (contador < 1) {
        //        Swal.fire('Debe asignar a lo menos 01 funcionario al procedimiento');

        swal({
            title: 'Debe asignar a lo menos 01 funcionario al procedimiento',
            type: 'warning',
            confirmButtonColor: '#4fa7f3'
        })

    } else {

        if (validaciones() != "") {
            //            Swal.fire(validaciones());

            swal({
                title: validaciones(),
                type: 'warning',
                confirmButtonColor: '#4fa7f3',
                width: '800px'
            })

        } else {




            //            var html = "";
            //            html += "-Su Fecha de Suceso: " + $("#fechasuceso").val() + "</br>";
            //            html += "-Hora Suceso: " + $("#horasuceso").val() + "</br>";
            //            html += "-Fecha Citación: " + $("#fechacitacion").val() + "</br>";
            //            html += "-Hora Citacion : " + $("#horacitacion").val() + "</br>";
            //            html += "-Número de Boleta: " + $("#numboleta").val() + "</br>";
            //            html += "-Tipo de Infracción: " + $("#cbxtipoinfraccion").val() + "</br>";
            //            html += "-Tipo de Ocurrencia : " + $("#cbxlugarocurrencia").val() + "</br>";
            //            html += "-Region: " + $("#cbxregion").val() + "</br>";
            //            html += "-Provincia: " + $("#cbxprovincia").val() + "</br>";
            //            html += "-Villa o Población: " + $("#txtvilla").val() + "</br>";
            //            html += "-coordenadas de latitud: " + $("#latitudinfraccion").val() + "</br>";
            //            html += "-coordenadas de longitud: " + $("#longitudinfraccion").val() + "</br>";
            //            html += "-Dirección en el Mapa: " + $("#autocompletado2").val() + "</br>";
            //            html += "-Observaciones: " + $("textarea#textarea").val() + "</br>";
            //            Swal.fire(html);

            var archivo1 = $("#archivo1").val();
            var archivo2 = $("#archivo2").val();
            var fechasuceso = $("#fechasuceso").val();
            var horasuceso = $("#horasuceso").val();
            var fechacitacion = $("#fechacitacion").val();
            var horacitacion = $("#horacitacion").val();
            var numboleta = $("#numboleta").val();
            var cbxtipoinfraccion = $("#cbxtipoinfraccion").val();
            var cbxlugarocurrencia = $("#cbxlugarocurrencia").val();
            var cbxregion = $("#cbxregion").val();
            var cbxprovincia = $("#cbxprovincia").val();
            var cbxcomuna = $("#cbxcomuna").val();
            var idnumero = $("#idnumero").val();
            var iddepto = $("#iddepto").val();
            var idblock = $("#idblock").val();
            var txtvilla = $("#txtvilla").val();
            var latitudinfraccion = $("#latitudinfraccion").val();
            var longitudinfraccion = $("#longitudinfraccion").val();
            var autocompletado2 = $("#autocompletado2").val();
            var textarea = $("textarea#textarea").val();

            if (document.getElementById('archivo1').files[0] === null) {
                var property2 = 0;
            } else {
                var property2 = document.getElementById('archivo2').files[0];
            }
            if (document.getElementById('archivo2').files[0] === null) {
                var property = 0;
            } else {
                var property = document.getElementById('archivo1').files[0];
            }




            //            var image_name = property.name;
            ////    var image_name2 = property2.name;
            //            var image_extension = image_name.split('.').pop().toLowerCase();
            //        var image_extension2 = image_name.name.split('.').pop().toLowerCase();

            //            if (jQuery.inArray(image_extension, ['gif', 'jpg', 'jpeg', 'png', '']) == -1) {
            //                swal(
            //                        {
            //                            title: 'Debe Ingresar un formato de evidencia 1 válido',
            //                            type: 'warning',
            //                            confirmButtonColor: '#4fa7f3'
            //                        }
            //                )
            //            }
            //
            var form_data = new FormData();
            form_data.append("file", property);
            form_data.append("file2", property2);
            form_data.append("archivo1", archivo1);
            form_data.append("archivo2", archivo2);
            form_data.append("fechasuceso", fechasuceso);
            form_data.append("horasuceso", horasuceso);
            form_data.append("fechacitacion", fechacitacion);
            form_data.append("horacitacion", horacitacion);
            form_data.append("numboleta", numboleta);
            form_data.append("cbxtipoinfraccion", cbxtipoinfraccion);
            form_data.append("cbxlugarocurrencia", cbxlugarocurrencia);
            form_data.append("cbxregion", cbxregion);
            form_data.append("cbxprovincia", cbxprovincia);
            form_data.append("cbxcomuna", cbxcomuna);
            form_data.append("idnumero", idnumero);
            form_data.append("iddepto", iddepto);
            form_data.append("idblock", idblock);
            form_data.append("txtvilla", txtvilla);
            form_data.append("latitudinfraccion", latitudinfraccion);
            form_data.append("longitudinfraccion", longitudinfraccion);
            form_data.append("autocompletado2", autocompletado2);
            form_data.append("textarea", textarea);





            var parametros = {
                "form_data": form_data,
                "archivo1": archivo1,
                "archivo2": archivo2,
                "fechasuceso": fechasuceso,
                "horasuceso": horasuceso,
                "fechacitacion": fechacitacion,
                "horacitacion": horacitacion,
                "numboleta": numboleta,
                "cbxtipoinfraccion": cbxtipoinfraccion,
                "cbxlugarocurrencia": cbxlugarocurrencia,
                "cbxregion": cbxregion,
                "cbxprovincia": cbxprovincia,
                "cbxcomuna": cbxcomuna,
                "idnumero": idnumero,
                "iddepto": iddepto,
                "idblock": idblock,
                "txtvilla": txtvilla,
                "latitudinfraccion": latitudinfraccion,
                "longitudinfraccion": longitudinfraccion,
                "autocompletado2": autocompletado2,
                "textarea": textarea,
            };


            $.ajax({
                data: form_data,
                url: '../procedimientos/ctr_infracciones/save_infraccion',
                type: 'post',
                contentType: false,
                cache: false,
                processData: false,
                //                data: new FormData(this),
                //                contentType: false,
                //                cache: false,
                //                processData: false,
                async: false,
                beforeSend: function() {},
                success: function(data) {

                    if (data == 0) {

                        $("#archivo1").val(null);
                        $("#archivo2").val(null);
                        save_funcionario();
                        //$('#idinfracc').html(data);
                        $("#menupersona").trigger("click");
                        //                    $("#btninfraccion").hide();
                        swal({
                                title: 'Infracción registrada exitosamente',
                                text: 'Ingreso exitoso !',
                                type: 'success',
                                confirmButtonColor: '#4fa7f3'
                            })
                            //                        Swal.fire("Infracción registrada exitosamente");
                    } else {



                        $("#archivo1").val(null);
                        $("#archivo2").val(null);
                        save_funcionario();
                        // $('#idinfracc').html(data);
                        $("#menupersona").trigger("click");
                        //                    $("#btninfraccion").hide();
                        //                    
                        //                        Swal.fire("Infracción registrada exitosamente");
                        swal({
                            title: 'Infracción registrada exitosamente',
                            text: 'Ingreso exitoso !',
                            type: 'success',
                            confirmButtonColor: '#4fa7f3'
                        })
                    }


                }
            });

        }



    }




    //    $("#txtfecha").val();
    //            $("#txthora").val();
    //            $("textarea#elm1").val();
    //            $("#my_lat").val();
    //            $("#my_lng").val();
    //            alert("Llega");
});

function save_funcionario() {

    /* no borrar, con esto rescatas idusuario para guardar */
    $('#prueba tr').each(function() {
        var Idusuario = $(this).attr("data-valor");
        //alert(Idusuario);
        var parametros = {
            "Idusuario": Idusuario
        };
        $.ajax({
            data: parametros,
            url: '../procedimientos/ctr_infracciones/save_infraccion_fun',
            type: 'post',
            async: false,
            beforeSend: function() {},
            success: function(data) {}
                //            ,
                //            error: function (jqXHR, textStatus, errorThrown) {
                //                alert(errorThrown);
                //            }
        });

        //      
    });

}

function validaciones() {
    var html = "";
    if ($("#fechasuceso").val() == "") {
        html += "-Debe ingresar Fecha de Suceso </br>";
    }
    if ($("#horasuceso").val() == "") {
        html += "-Debe ingresar Hora Suceso </br>";
    }
    if ($("#fechacitacion").val() == "") {
        html += "-Debe ingresar Fecha Citación </br>";
    }
    if ($("#horacitacion").val() == "") {
        html += "-Debe ingresar Hora Citacion </br>";
    }
    if ($("#numboleta").val() == "") {
        html += "-Debe ingresar Número de Boleta </br>";
    }
    if ($("#cbxtipoinfraccion").val() == "") {
        html += "-Debe Seleccionar Tipo de Infracción </br>";
    }
    if ($("#cbxlugarocurrencia").val() == "") {
        html += "-Debe Seleccionar Tipo de Ocurrencia </br>";
    }
    if ($("#cbxregion").val() == "") {
        html += "-Debe Seleccionar Region </br>";
    }
    if ($("#cbxprovincia").val() == "") {
        html += "-Debe Seleccionar Provincia </br>";
    }
    if ($("#txtvilla").val() == "") {
        html += "-Debe ingresar Villa o Población </br>";
    }
    if ($("#latitudinfraccion").val() == "") {
        html += "-Debe poseer las coordenadas de latitud </br>";
    }
    if ($("#longitudinfraccion").val() == "") {
        html += "-Debe poseer las coordenadas de longitud </br>";
    }
    if ($("#autocompletado2").val() == "") {
        html += "-Debe ingresar una dirección en el Mapa</br>";
    }
    return html;
}

$('#cbxregion').change(function() {

    var parametros = {
        "idregion": this.value
    };
    $.ajax({
        data: parametros,
        url: 'traeprovincia',
        type: 'post',
        async: false,
        beforeSend: function() {},
        success: function(data) {
            $('#cbxprovincia').html(data);
        }
    });
    if ($("#cbxprovincia").val() == "") {
        $("#cbxcomuna").empty();
    }

});

$('#cbxprovincia').change(function() {
    var parametros = {
        "idprovincia": this.value
    };
    $.ajax({
        data: parametros,
        url: 'traecomuna',
        type: 'post',
        async: false,
        beforeSend: function() {},
        success: function(data) {

            $('#cbxcomuna').html(data);
        }
    });

});

$('#cbxtipoinfraccion').change(function() {


    if (this.value == 0) {
        $("#datosinfraccion").css("display", "block");

    } else {
        document.getElementById('nuevainfraccion').value = '';
        $("#datosinfraccion").css("display", "none");
    }

});

$('#cbxnuevainfraccion').click(function() {


    //  alert($("#nuevainfraccion").val());

    var parametros = {
        "nuevainfraccion": $("#nuevainfraccion").val()
    };
    $.ajax({
        data: parametros,
        url: 'guardanuevainfraccion',
        type: 'post',
        async: false,
        beforeSend: function() {

        },
        success: function(data) {
            // $('#cbxtipoinfraccion').empty();
            document.getElementById('nuevainfraccion').value = '';
            $("#datosinfraccion").css("display", "none");
            $('#cbxtipoinfraccion').html(data);
            Swal.fire('Nuevo Tipo de Infracción agregado correctamente');
        }
    });




});

$('#cbxlugarocurrencia').change(function() {


    if (this.value == 0) {
        $("#datosocurrencia").css("display", "block");

    } else {
        document.getElementById('nuevaocurrencia').value = '';
        $("#datosocurrencia").css("display", "none");
    }

});

$('#btnlugarocurrencia').click(function() {

    var parametros = {
        "nuevaocurrencia": $("#nuevaocurrencia").val()
    };
    $.ajax({
        data: parametros,
        url: 'guardanuevaocurrencia',
        type: 'post',
        async: false,
        beforeSend: function() {

        },
        success: function(data) {
            // $('#cbxtipoinfraccion').empty();
            document.getElementById('nuevaocurrencia').value = '';
            $("#datosocurrencia").css("display", "none");
            $('#cbxlugarocurrencia').html(data);
            Swal.fire('Nuevo Tipo de Ocurrencia agregado correctamente');
        }
    });




});

function remueve(id) {

    /* no borrar, con esto rescatas idusuario para guardar */
    //    $('#prueba tr').each(function () {
    //        var Id_reg = $(this).attr("data-valor");
    //        alert(Id_reg);
    ////        if (parseInt(Id_reg) > 0) {
    ////            var url_Fam = base_url + 'index.php/C_crudControler/agregaPer_AntecMed';
    ////            $.ajax({
    ////                type: 'post',
    ////                data: {
    ////                    'DatoMedico': DatoMedico,
    ////                    'Id_reg': Id_reg
    ////                },
    ////                url: url_Fam,
    ////                success: function (responseFam)
    ////                {
    ////
    ////
    ////                },
    ////                error: function (jqXHR, textStatus, errorThrown) {
    ////                    alert(errorThrown);
    ////                }
    ////            });
    ////        }
    //    });



    var Idusuario = id;
    //alert(Idusuario);
    var parametros = {
        "Idusuario": Idusuario,
    };
    $.ajax({
        data: parametros,
        url: '../procedimientos/ctr_infracciones/delete_infraccion_fun',
        type: 'post',
        async: false,
        beforeSend: function() {},
        success: function(data) {
            $("#fila" + id).remove();
        }

    });







}

$('#btnfuncionarioinfraccion').click(function() {
    alert("llega");
    if ($("input#txtrut").val() == "") {
        // Swal.fire('Debe ingresar un RUN para asignar');
        swal({
            title: 'Debe ingresar un RUN para asignar',
            type: 'warning',
            confirmButtonColor: '#4fa7f3'
        })



    } else {
        if ($("input#txtrut").val().length < 2) {
            //            Swal.fire('Debe ingresar más de un caracter');
            swal({
                title: 'Debe ingresar más de un caracter',
                type: 'warning',
                confirmButtonColor: '#4fa7f3'
            })


        } else {

            if (validatabla() == true) {
                //                Swal.fire('Funcionario ingresado ya asignado');


                swal({
                    title: 'Funcionario ingresado ya asignado',
                    type: 'warning',
                    confirmButtonColor: '#4fa7f3'
                })

            } else {
                var parametros = {
                    "rutfuncionario": $("input#txtrut").val()
                };
                $.ajax({
                    data: parametros,
                    url: '../procedimientos/Ctr_Infracciones/buscar_funcionario',
                    type: 'post',
                    async: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data == "RUN no valido") {
                            //                            Swal.fire(data);
                            swal({
                                title: data,
                                type: 'warning',
                                confirmButtonColor: '#4fa7f3'
                            })


                        } else if (data == "No hay datos para este RUN") {
                            //                            Swal.fire(data);
                            swal({
                                title: data,
                                type: 'warning',
                                confirmButtonColor: '#4fa7f3'
                            })
                        } else {
                            $("#myTables").css("display", "block");
                            $('#prueba').append(data);
                        }

                    }
                });
            }
        }
    }


});

function validatabla() {
    var codigo = null;
    var filas = $("#prueba").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste   
    for (i = 0; i < filas.length; i++) { //Recorre las filas 1 a 1
        var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
        //alert($(celdas[5]).value());
        if (parseInt($(celdas[0]).text()) == parseInt($("input#txtrut").val())) {
            codigo = true;
        } else {
            codigo = false;
        }
    }
    return codigo;
}