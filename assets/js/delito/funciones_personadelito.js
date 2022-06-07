$(document).ready(function () {
    $('#cbxtipoper_delito').change(function () {
        var op = this.value;
        if (op == 2) {
            $.ajax({
                url: '../delito/Ctr_Persona_Delito/vista_empresa',
                type: 'post',
                async: false,
                beforeSend: function (data) {

                },
                success: function (data) {
                    $('#vista_empresa').html(data);

                }
            });
        } else {
            $('#vista_empresa').html("");
        }
//    var parametros = {
//        "calidad": this.value
//    };
//    $.ajax({
//        data: parametros,
//        url: '../procedimientos/ctr_personas/calidad',
//        type: 'post',
//        async: false,
//        beforeSend: function (data) {
//
//        },
//        success: function (data) {
//            $('#dueno').html(data);
//            if (op == 0) {
//                $("#datosvehiculo").hide();
//                $("#direccion").hide();
//            } else {
//                $("#datosvehiculo").show();
//                $("#direccion").show();
//            }
//        }
//    });


    });
    $('#cbxregionper_delito').change(function () {

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
                $('#cbxprovinciaper_delito').html(data);
            }
        });
        if ($("#cbxprovinciaper_delito").val() == "") {
            $("#cbxcomunaper_delito").empty();
        }

    });
    $('#cbxprovinciaper_delito').change(function () {
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

                $('#cbxcomunaper_delito').html(data);
            }
        });

    });
    $('#btnpersona_delito').click('ready', function () {


        if (validaciones_delitopersona() != "") {
            swal(
                    {
                        title: validaciones_delitopersona(),
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '800px'
                    }
            )
        } else {
            var cbxDocDdentificacion_delito = $("#cbxDocDdentificacion_delito").val();
            var txtnum_identificacion_delito = $("#txtnum_identificacion_delito").val();

            var parametros = {
                "cbxDocDdentificacion_delito": cbxDocDdentificacion_delito,
                "txtnum_identificacion_delito": txtnum_identificacion_delito
            };

            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Persona_Delito/busca_persona',
                type: 'post',
                async: true,
                beforeSend: function () {
                },
                success: function (data) {
                    if (data == 0) {
                        swal(
                                {
                                    title: 'Debe Ingresar un RUN válido',
                                    type: 'warning',
                                    confirmButtonColor: '#4fa7f3',
                                    width: '800px'
                                }
                        )
                    }
                    if (data == 2) {
                        swal({
                            title: 'La información de esta persona ya existe en la Base de Datos',
                            text: "¿Desea actualizar la información de esta persona?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Sí',
                            cancelButtonText: 'No',
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger m-l-10',
                            buttonsStyling: false
                        }).then(function () {

                            save_persona(0);

                        }, function (dismiss) {

                            save_persona(1);
                        })
                    } else {
                        if (data != 0) {
                            save_persona(2);
                        }

                    }




                }
            });

        }
    });
    $('#btnbuscaper_delito').click('ready', function () {

        if (validaciones_buscapersona() != "") {
            swal(
                    {
                        title: validaciones_buscapersona(),
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '500px'
                    }
            )
        } else {
            if ($("#txtnum_identificacion_delito").val() == "") {
                swal(
                        {
                            title: 'Debe Ingresar N° de Identificacion',
                            type: 'warning',
                            confirmButtonColor: '#4fa7f3',
                            width: '500px'
                        }
                )
            } else {

                var parametros = {
                    "cbxDocDdentificacion_delito": $("#cbxDocDdentificacion_delito").val(),
                    "txtnum_identificacion_delito": $("#txtnum_identificacion_delito").val()
                };


                $.ajax({
                    data: parametros,
                    url: '../delito/Ctr_Persona_Delito/btnbusca_persona',
                    type: 'post',
                    async: false,
                    beforeSend: function () {
                    },
                    success: function (data) {

                        if (data == 0) {
                            swal(
                                    {
                                        title: 'No existen datos asociados a ese N° de identificación',
                                        type: 'warning',
                                        confirmButtonColor: '#4fa7f3',
                                        width: '500px'
                                    }
                            )

//                            $("#cbxDocDdentificacion_delito").val(null);
//                            $("#txtnum_identificacion_delito").val(null);
                            $("#primernombre_delito").val(null);
                            $("#segundonombre_delito").val(null);
                            $("#primerapellido_delito").val(null);
                            $("#segundoapellido_delito").val(null);
                            $("#fechanac_delito").val(null);
                            $("#celular_delito").val(null);
                            $("#telefono_delito").val(null);
                            $("#email_delito").val(null);
                            $("#cbxnacionalidad_delito").val(null);
                            $("#cbxsexo_delito").val(null);
                            $("#cbxestudios_delito").val(null);
                            $("#cbxestadocivil_delito").val(null);
                            $("#cbxprofesion_delito").val(null);

                            $("#cbxregionper_delito").val(null);
                            $("#cbxprovinciaper_delito").val(null);
                            $("#cbxcomunaper_delito").val(null);
                            $("#idnumeropersona_delito").val(null);
                            $("#iddeptopersona_delito").val(null);
                            $("#idblockpersona_delito").val(null);
                            $("#txtvillapersona_delito").val(null);
                            $("#latitudpersona_delito").val(null);
                            $("#longitudpersona_delito").val(null);
                            $("#direccionpersona_delito").val(null);


                            eliminamarca();

                        } else {



                            var resultado = JSON.parse(data);

                            $("#primernombre_delito").val(resultado.td_primernombre);
                            $("#segundonombre_delito").val(resultado.td_segundonombre);
                            $("#primerapellido_delito").val(resultado.td_apellidopaterno);
                            $("#segundoapellido_delito").val(resultado.td_apellidomaterno);
                            $("#fechanac_delito").val(resultado.td_fechanacimiento);
                            $("#celular_delito").val(resultado.td_celular);
                            $("#email_delito").val(resultado.td_email);
                            $("#cbxnacionalidad_delito").val(resultado.idta_nacionalidad);
                            $("#cbxsexo_delito").val(resultado.idta_sexo);
                            $("#cbxestudios_delito").val(resultado.idta_estudios);
                            $("#cbxestadocivil_delito").val(resultado.idta_estadocivil);
                            $("#cbxprofesion_delito").val(resultado.idta_profesion);

                            $("#cbxregionper_delito").val(resultado.idta_region);
                            var parametros = {
                                "idregion": resultado.idta_region
                            };
                            $.ajax({
                                data: parametros,
                                url: 'traeprovincia',
                                type: 'post',
                                async: false,
                                beforeSend: function () {
                                },
                                success: function (data) {
                                    $('#cbxprovinciaper_delito').html(data);
                                }
                            });

                            $("#cbxprovinciaper_delito").val(resultado.idta_provincia);


                            var parametros = {
                                "idprovincia": resultado.idta_provincia
                            };
                            $.ajax({
                                data: parametros,
                                url: 'traecomuna',
                                type: 'post',
                                async: false,
                                beforeSend: function () {
                                },
                                success: function (data) {
                                    $('#cbxcomunaper_delito').html(data);

                                }
                            });

                            $("#cbxcomunaper_delito").val(resultado.idta_comuna);
                            $("#idnumeropersona_delito").val(resultado.td_numero);
                            $("#idblockpersona_delito").val(resultado.td_depto);
                            $("#idblockpersona_delito").val(resultado.td_block);
                            $("#txtvillapersona_delito").val(resultado.td_villapoblacion);
                            $("#latitudpersona_delito").val(resultado.td_latitud);
                            $("#longitudpersona_delito").val(resultado.td_longitud);
                            $("#direccionpersona_delito").val(resultado.td_direccion);

                            marca(resultado.td_latitud, resultado.td_longitud);
                        }
                    }
                });


            }
        }






    });


    function marca(lat, long) {
        var imported = document.createElement('script');
        imported.src = '../assets/js/delito/mapa_delito.js';
        document.head.appendChild(imported);
        ponerpunto(lat, long);
    }

    function eliminamarca() {
        var imported = document.createElement('script');
        imported.src = '../assets/js/delito/mapa_delito.js';
        document.head.appendChild(imported);
        setMapOnAll();
    }


    function save_persona(opcion) {

        var cbxtipoper_delito = $("#cbxtipoper_delito").val();
        var cbxtipoidentificacion_delito = $("#cbxtipoidentificacion_delito").val();
        var cbxcalidadelito_delito = $("#cbxcalidadelito_delito").val();


        var txtrunempresa_delito = $("#txtrunempresa_delito").val();
        var txtnombreempresa_delito = $("#txtnombreempresa_delito").val();
        var txtrazonsocialempresa_delito = $("#txtrazonsocialempresa_delito").val();
        var txtgirocomercialempresa_delito = $("#txtgirocomercialempresa_delito").val();
        var txttelefonoempresa_delito = $("#txttelefonoempresa_delito").val();
        var txtmovilempresa_delito = $("#txtmovilempresa_delito").val();
        var txtemailempresa_delito = $("#txtemailempresa_delito").val();

        var cbxDocDdentificacion_delito = $("#cbxDocDdentificacion_delito").val();
        var txtnum_identificacion_delito = $("#txtnum_identificacion_delito").val();
        var primernombre_delito = $("#primernombre_delito").val();
        var segundonombre_delito = $("#segundonombre_delito").val();
        var primerapellido_delito = $("#primerapellido_delito").val();
        var segundoapellido_delito = $("#segundoapellido_delito").val();
        var fechanac_delito = $("#fechanac_delito").val();
        var celular_delito = $("#celular_delito").val();
        var telefono_delito = $("#telefono_delito").val();
        var email_delito = $("#email_delito").val();
        var cbxnacionalidad_delito = $("#cbxnacionalidad_delito").val();
        var cbxsexo_delito = $("#cbxsexo_delito").val();
        var cbxestudios_delito = $("#cbxestudios_delito").val();
        var cbxestadocivil_delito = $("#cbxestadocivil_delito").val();
        var cbxprofesion_delito = $("#cbxprofesion_delito").val();

        var cbxregionper_delito = $("#cbxregionper_delito").val();
        var cbxprovinciaper_delito = $("#cbxprovinciaper_delito").val();
        var cbxcomunaper_delito = $("#cbxcomunaper_delito").val();
        var idnumeropersona_delito = $("#idnumeropersona_delito").val();
        var iddeptopersona_delito = $("#iddeptopersona_delito").val();
        var idblockpersona_delito = $("#idblockpersona_delito").val();
        var txtvillapersona_delito = $("#txtvillapersona_delito").val();
        var latitudpersona_delito = $("#latitudpersona_delito").val();
        var longitudpersona_delito = $("#longitudpersona_delito").val();
        var direccionpersona_delito = $("#direccionpersona_delito").val();

        var parametros = {
            "opcion": opcion,
            "cbxtipoper_delito": cbxtipoper_delito,
            "cbxtipoidentificacion_delito": cbxtipoidentificacion_delito,
            "cbxcalidadelito_delito": cbxcalidadelito_delito,
            "txtrunempresa_delito": txtrunempresa_delito,
            "txtnombreempresa_delito": txtnombreempresa_delito,
            "txtrazonsocialempresa_delito": txtrazonsocialempresa_delito,
            "txtgirocomercialempresa_delito": txtgirocomercialempresa_delito,
            "txttelefonoempresa_delito": txttelefonoempresa_delito,
            "txtmovilempresa_delito": txtmovilempresa_delito,
            "txtemailempresa_delito": txtemailempresa_delito,
            "cbxDocDdentificacion_delito": cbxDocDdentificacion_delito,
            "txtnum_identificacion_delito": txtnum_identificacion_delito,
            "primernombre_delito": primernombre_delito,
            "segundonombre_delito": segundonombre_delito,
            "primerapellido_delito": primerapellido_delito,
            "segundoapellido_delito": segundoapellido_delito,
            "fechanac_delito": fechanac_delito,
            "celular_delito": celular_delito,
            "telefono_delito": telefono_delito,
            "email_delito": email_delito,
            "cbxnacionalidad_delito": cbxnacionalidad_delito,
            "cbxsexo_delito": cbxsexo_delito,
            "cbxestudios_delito": cbxestudios_delito,
            "cbxestadocivil_delito": cbxestadocivil_delito,
            "cbxprofesion_delito": cbxprofesion_delito,
            "cbxregionper_delito": cbxregionper_delito,
            "cbxprovinciaper_delito": cbxprovinciaper_delito,
            "cbxcomunaper_delito": cbxcomunaper_delito,
            "idnumeropersona_delito": idnumeropersona_delito,
            "iddeptopersona_delito": iddeptopersona_delito,
            "idblockpersona_delito": idblockpersona_delito,
            "txtvillapersona_delito": txtvillapersona_delito,
            "latitudpersona_delito": latitudpersona_delito,
            "longitudpersona_delito": longitudpersona_delito,
            "direccionpersona_delito": direccionpersona_delito
        };

        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Persona_Delito/save_personaprod',
            type: 'post',
            async: true,
            beforeSend: function () {
            },
            success: function (data) {

                if (data == 0) {
                    $("#encargados2").trigger("click");
            
                    swal(
                            {
                                title: 'Persona registrado exitosamente',
                                text: 'Ingreso exitoso !',
                                type: 'success',
                                confirmButtonColor: '#4fa7f3'
                            }
                    )
                }
            }
        });

    }

    function validaciones_delitopersona() {
        var html = "";
        if ($("#cbxtipoper_delito").val() == "") {
            html += "-Debe Seleccionar tipo de persona </br>";
        }
        if ($("#cbxtipoidentificacion_delito").val() == "") {
            html += "-Debe Seleccionar Datos de identificacion </br>";
        }


        if ($("#txtrunempresa_delito").val() == "") {
            html += "-Debe ingresar RUT de empresa </br>";
        }
        if ($("#txtnombreempresa_delito").val() == "") {
            html += "-Debe ingresar Nombre de empresa </br>";
        }
        if ($("#txtrazonsocialempresa_delito").val() == "") {
            html += "-Debe ingresar Razon Social de Empresa </br>";
        }
        if ($("#txtgirocomercialempresa_delito").val() == "") {
            html += "-Debe ingresar Giro Comercial de Empresa </br>";
        }
        if ($("#txttelefonoempresa_delito").val() == "") {
            html += "-Debe ingresar Telefono de contacto </br>";
        }
        if ($("#txtemailempresa_delito").val() == "") {
            html += "-Debe ingresar email </br>";
        }


        if ($("#cbxDocDdentificacion_delito").val() == "") {
            html += "-Debe Seleccionar Tipo de Identificacion </br>";
        }
        if ($("#primernombre_delito").val() == "") {
            html += "-Debe ingresar Primer Nombre </br>";
        }
        if ($("#segundoapellido_delito").val() == "") {
            html += "-Debe ingresar Segundo APellido </br>";
        }
        if ($("#fechanac_delito").val() == "") {
            html += "-Debe ingresar Primer Apellido </br>";
        }
        if ($("#celular_delito").val() == "") {
            html += "-Debe ingresar Numero de Celular </br>";
        }

        if ($("#email_delito").val() == "") {
            html += "-Debe ingresar email </br>";
        }
        if ($("#cbxnacionalidad_delito").val() == "") {
            html += "-Debe Seleccionar Nacionalidad </br>";
        }
        if ($("#cbxsexo_delito").val() == "") {
            html += "-Debe Seleccionar Sexo  </br>";
        }
        if ($("#cbxestudios_delito").val() == "") {
            html += "-Debe Seleccionar Estudios  </br>";
        }
        if ($("#cbxestadocivil_delito").val() == "") {
            html += "-Debe Seleccionar Estado Civil  </br>";
        }
        if ($("#cbxprofesion_delito").val() == "") {
            html += "-Debe Seleccionar Profesion </br>";
        }


        if ($("#cbxregionper_delito").val() == "") {
            html += "-Debe Seleccionar Región </br>";
        }
        if ($("#cbxprovinciaper_delito").val() == "") {
            html += "-Debe Seleccionar Provincia </br>";
        }
        if ($("#cbxcomunaper_delito").val() == "") {
            html += "-Debe Seleccionar Comuna  </br>";
        }
        if ($("#latitudpersona_delito").val() == "") {
            html += "-Debe poseer latitud </br>";
        }
        if ($("#longitudpersona_delito").val() == "") {
            html += "-Debe poseer longitud </br>";
        }
        if ($("#direccionpersona_delito").val() == "") {
            html += "-Debe poseer dirección </br>";
        }


        return html;
    }

    function validaciones_buscapersona() {
        var html = "";
        if ($("#cbxDocDdentificacion_delito").val() == "") {
            html += "-Debe Seleccionar tipo de Identificacion </br>";
        }



        return html;
    }
    function buscaempresa() {
        alert("llega");
    }

});