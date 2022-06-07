$('#cbxregion2').change(function () {


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
            $('#cbxprovincia2').html(data);
        }
    });
    if ($("#cbxprovincia2").val() == "") {
        $("#cbxcomuna2").empty();
        $('#cbxcomunalincencia').empty();
    }

    if ($("#cbxregion2").val() == "") {
        $("#cbxprovincia2").empty();
        $("#cbxcomuna2").empty();
        $('#cbxcomunalincencia').empty();
    }
});

$('#cbxprovincia2').change(function () {
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

            $('#cbxcomuna2').html(data);
            $('#cbxcomunalincencia').html(data);

        }
    });

});


$('#cbxcalidad').change(function () {
    var op = this.value;
    var parametros = {
        "calidad": this.value
    };
    $.ajax({
        data: parametros,
        url: '../procedimientos/ctr_personas/calidad',
        type: 'post',
        async: false,
        beforeSend: function (data) {

        },
        success: function (data) {
            $('#dueno').html(data);
            if (op == 0) {
                $("#datosvehiculo").hide();
                $("#direccion").hide();
            } else {
                $("#datosvehiculo").show();
                $("#direccion").show();
            }
        }
    });


});
$('#cbxmarca').change(function () {

    //        alert(this.value);


    var parametros = {
        "marca": this.value
    };
    $.ajax({
        data: parametros,
        url: '../procedimientos/ctr_personas/modelo',
        type: 'post',
        async: false,
        beforeSend: function (data) {

        },
        success: function (data) {

            $('#cbxmodelo').html(data);
        }
    });


});

function tipoinfractor(tipo) {

    var parametros = {
        "tipo": tipo
    };
    $.ajax({
        data: parametros,
        url: '../procedimientos/ctr_personas/tipoinfractor',
        type: 'post',
        async: false,
        beforeSend: function (data) {

        },
        success: function (data) {
            $('#tipoInfractor').html(data);

        }
    });
}
function tipodueno(tipo) {

    var parametros = {
        "tipo": tipo
    };
    $.ajax({
        data: parametros,
        url: '../procedimientos/ctr_personas/tipodueno',
        type: 'post',
        async: false,
        beforeSend: function (data) {

        },
        success: function (data) {
            $('#tipoDueno').html(data);

        }
    });
}


$('#btnpersona').click('ready', function () {

    if ($("#cbxcalidad").val() == 0) {
//        Swal.fire("Debe Seleccionar una opción para guardar");

        swal({
            title: "Debe Seleccionar una opción para guardar",
            type: 'warning',
            confirmButtonColor: '#4fa7f3'
        })


    } else {
        var calidadtext = cbxcalidad.options[cbxcalidad.selectedIndex].text;
        var calidad = $("#cbxcalidad").val();
        //Datos de Vehiculo
        var cbxtipopatente = $("#cbxtipopatente").val();
        var txtpatente = $("#txtpatente").val();
        var cbxmarca = $("#cbxmarca").val();
        var cbxmodelo = $("#cbxmodelo").val();
        var cbxtipvehiculo = $("#cbxtipvehiculo").val();
        var cbxcolor = $("#cbxcolor").val();
        var cbxano = $("#cbxano").val();
        //Datos de Infractor
        var cbxDocIdentificacion = $("#cbxDocIdentificacion").val();
        var Itxtidentificacion = $("#Itxtidentificacion").val();
        var Iprimernombre = $("#Iprimernombre").val();
        var Isegundonombre = $("#Isegundonombre").val();
        var Iprimerapellido = $("#Iprimerapellido").val();
        var Isegundopellido = $("#Isegundopellido").val();
        var Ifechanac = $("#Ifechanac").val();
        var Icelular = $("#Icelular").val();
        var Itelefono = $("#Itelefono").val();
        var Iemail = $("#Iemail").val();
        var cbxInacionalidad = $("#cbxInacionalidad").val();
        var cbxIsexo = $("#cbxIsexo").val();
        var cbxIestudios = $("#cbxIestudios").val();
        var cbxIestadocivil = $("#cbxIestadocivil").val();
        var cbxIprofesion = $("#cbxIprofesion").val();
        //Datos de Licencia
        var txtlicenciaconducir = $("#txtlicenciaconducir").val();
        var cbxlicencia = $("#cbxlicencia").val();
        var cbxcomunalincencia = $("#cbxcomunalincencia").val();
        //Datos de Dueño
        var cbxDocDdentificacion = $("#cbxDocDdentificacion").val();
        var Dtxtidentificacion = $("#Dtxtidentificacion").val();
        var Dprimernombre = $("#Dprimernombre").val();
        var Dsegundonombre = $("#Dsegundonombre").val();
        var Dprimerapellido = $("#Dprimerapellido").val();
        var Dsegundopellido = $("#Dsegundopellido").val();
        var Dfechanac = $("#Dfechanac").val();
        var Dcelular = $("#Dcelular").val();
        var Dtelefono = $("#Dtelefono").val();
        var Demail = $("#Demail").val();
        var cbxDnacionalidad = $("#cbxDnacionalidad").val();
        var cbxDsexo = $("#cbxDsexo").val();
        var cbxDestudios = $("#cbxDestudios").val();
        var cbxDestadocivil = $("#cbxDestadocivil").val();
        var cbxDprofesion = $("#cbxDprofesion").val();
        //Datos de Empresa
        var txtrunempresa = $("#txtrunempresa").val();
        var txtnombreempresa = $("#txtnombreempresa").val();
        var txtrazonsocialempresa = $("#txtrazonsocialempresa").val();
        var txtgirocomercialempresa = $("#txtgirocomercialempresa").val();
        var txttelefonoempresa = $("#txttelefonoempresa").val();
        var txtmovilempresa = $("#txtmovilempresa").val();
        var txtemailempresa = $("#txtemailempresa").val();
        // Direccion.
        var cbxregion2 = $("#cbxregion2").val();
        var cbxprovincia2 = $("#cbxprovincia2").val();
        var cbxcomuna2 = $("#cbxcomuna2").val();
        var idnumeroP = $("#idnumeroP").val();
        var iddeptoP = $("#iddeptoP").val();
        var idblockP = $("#idblockP").val();
        var txtvillaP = $("#txtvillaP").val();
        var latitudpersona = $("#latitudpersona").val();
        var longitudpersona = $("#longitudpersona").val();
        var direccionpersona = $("#direccionpersona").val();

        var parametros = {
            "calidad": calidad,
            "calidadtext": calidadtext,
            "cbxtipopatente": cbxtipopatente,
            "txtpatente": txtpatente,
            "cbxmarca": cbxmarca,
            "cbxmodelo": cbxmodelo,
            "cbxtipvehiculo": cbxtipvehiculo,
            "cbxcolor": cbxcolor,
            "cbxano": cbxano,
            "cbxDocIdentificacion": cbxDocIdentificacion,
            "Itxtidentificacion": Itxtidentificacion,
            "Iprimernombre": Iprimernombre,
            "Isegundonombre": Isegundonombre,
            "Iprimerapellido": Iprimerapellido,
            "Isegundopellido": Isegundopellido,
            "Ifechanac": Ifechanac,
            "Icelular": Icelular,
            "Itelefono": Itelefono,
            "Iemail": Iemail,
            "cbxInacionalidad": cbxInacionalidad,
            "cbxIsexo": cbxIsexo,
            "cbxIestudios": cbxIestudios,
            "cbxIestadocivil": cbxIestadocivil,
            "cbxIprofesion": cbxIprofesion,
            "txtlicenciaconducir": txtlicenciaconducir,
            "cbxlicencia": cbxlicencia,
            "cbxcomunalincencia": cbxcomunalincencia,
            "cbxDocDdentificacion": cbxDocDdentificacion,
            "Dtxtidentificacion": Dtxtidentificacion,
            "Dprimernombre": Dprimernombre,
            "Dsegundonombre": Dsegundonombre,
            "Dprimerapellido": Dprimerapellido,
            "Dsegundopellido": Dsegundopellido,
            "Dfechanac": Dfechanac,
            "Dcelular": Dcelular,
            "Dtelefono": Dtelefono,
            "Demail": Demail,
            "cbxDnacionalidad": cbxDnacionalidad,
            "cbxDsexo": cbxDsexo,
            "cbxDestudios": cbxDestudios,
            "cbxDestadocivil": cbxDestadocivil,
            "cbxDprofesion": cbxDprofesion,
            "txtrunempresa": txtrunempresa,
            "txtnombreempresa": txtnombreempresa,
            "txtrazonsocialempresa": txtrazonsocialempresa,
            "txtgirocomercialempresa": txtgirocomercialempresa,
            "txttelefonoempresa": txttelefonoempresa,
            "txtmovilempresa": txtmovilempresa,
            "txtemailempresa": txtemailempresa,
            "cbxregion2": cbxregion2,
            "cbxprovincia2": cbxprovincia2,
            "cbxcomuna2": cbxcomuna2,
            "idnumeroP": idnumeroP,
            "iddeptoP": iddeptoP,
            "idblockP": idblockP,
            "txtvillaP": txtvillaP,
            "latitudpersona": latitudpersona,
            "longitudpersona": longitudpersona,
            "direccionpersona": direccionpersona
        };
        $.ajax({
            data: parametros,
            url: '../procedimientos/ctr_personas/save_persona',
            type: 'post',
            async: true,
            beforeSend: function () {
            },
            success: function (data) {
                //$('#cbxprovincia2').html(data);
                
                
                if (data == 1) {
                    traevista_terminar();
                    //Swal.fire("Datos Ingresados Correctamente");
                    swal(
                            {
                                title: 'Datos Ingresados Correctamente',
                                type: 'success',
                                confirmButtonColor: '#4fa7f3'
                            }
                    )



                    // traevista_terminar();
                    //  $("#btnpersona").hide();

                } else {
                    // Swal.fire(data);
                    swal({
                        title: data,
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '800px'
                    })
                }



//                $("#btnpersona").hide();
            }
        });




    }








});

function traevista_terminar() {

    $.ajax({
        url: '../procedimientos/ctr_personas/vista_terminar',
        type: 'post',
        async: true,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablaterminar').html(data);
        }
    });
    //history.back();
}

function respaldo() {
    var html = "";
    //Datos de Vehiculo
    html += "-Su Tipo Patente es: " + $("#cbxtipopatente").val() + "</br>";
    html += "-Numero Patente: " + $("#txtpatente").val() + "</br>";
    html += "-Marca: " + $("#cbxmarca").val() + "</br>";
    html += "-Modelo : " + $("#cbxmodelo").val() + "</br>";
    html += "-Vehiculo: " + $("#cbxtipvehiculo").val() + "</br>";
    html += "-Nacionalidad: " + $("#cbxnacionalidad").val() + "</br>";
    html += "-Color : " + $("#cbxcolor").val() + "</br>";
    html += "-Ano: " + $("#cbxano").val() + "</br></br></br></br></br>";



    if ($("#cbxcalidad").val() == 1) {

        //Datos de Infractor
        html += "-Infractor Tipo Identificacion: " + $("#cbxDocIdentificacion").val() + "</br>";
        html += "-Rut Infractor: " + $("#txtrutinfractor").val() + "</br>";
        html += "-Pasaporte Infractor: " + $("#txtpasaporteinfractor").val() + "</br>";
        html += "-Infractor Primer Nombre: " + $("#Iprimernombre").val() + "</br>";
        html += "-Infractor Segundo Nombre: " + $("#Isegundonombre").val() + "</br>";
        html += "-Infractor Primer Apellido : " + $("#Iprimerapellido").val() + "</br>";
        html += "-Infractor Segundo Apellido: " + $("#Isegundopellido").val() + "</br>";
        html += "-Infractor Fecha Naciomiento: " + $("#Ifechanac").val() + "</br>";
        html += "-Infractor Celular : " + $("#Icelular").val() + "</br>";
        html += "-Infractor Telefono: " + $("#Itelefono").val() + "</br>";
        html += "-Infractor Email: " + $("#Iemail").val() + "</br>";
        html += "-Infractor Sexo : " + $("#cbxIsexo").val() + "</br>";
        html += "-Infractor Estudios: " + $("#cbxIestudios").val() + "</br>";
        html += "-Infractor Estado Civil: " + $("#cbxIestadocivil").val() + "</br>";
        html += "-Infractor Profesion: " + $("#cbxIprofesion").val() + "</br>";
        //Datos de Licencia
        html += "-Estudios: " + $("#txtlicenciaconducir").val() + "</br>";
        html += "-Estado Civil: " + $("#cbxlicencia").val() + "</br>";
        html += "-Profesion: " + $("#cbxcomunalincencia").val() + "</br>";

    }

    if ($("#cbxcalidad").val() == 2) {

        //Datos de Infractor
        html += "-Infractor Tipo Identificacion: " + $("#cbxDocIdentificacion").val() + "</br>";
        html += "-Infractor Primer Nombre: " + $("#Iprimernombre").val() + "</br>";
        html += "-Infractor Segundo Nombre: " + $("#Isegundonombre").val() + "</br>";
        html += "-Infractor Primer Apellido : " + $("#Iprimerapellido").val() + "</br>";
        html += "-Infractor Segundo Apellido: " + $("#Isegundopellido").val() + "</br>";
        html += "-Infractor Fecha Naciomiento: " + $("#Ifechanac").val() + "</br>";
        html += "-Infractor Celular : " + $("#Icelular").val() + "</br>";
        html += "-Infractor Telefono: " + $("#Itelefono").val() + "</br>";
        html += "-Infractor Email: " + $("#Iemail").val() + "</br>";
        html += "-Infractor Sexo : " + $("#cbxIsexo").val() + "</br>";
        html += "-Infractor Estudios: " + $("#cbxIestudios").val() + "</br>";
        html += "-Infractor Estado Civil: " + $("#cbxIestadocivil").val() + "</br>";
        html += "-Infractor Profesion: " + $("#cbxIprofesion").val() + "</br>";

        //Datos de Dueño
        html += "-Dueño Tipo Identificacion: " + $("#cbxDocDdentificacion").val() + "</br>";
        html += "-Rut Infractor: " + $("#txtrutdueno").val() + "</br>";
        html += "-Pasaporte Infractor: " + $("#txtpasaportedueno").val() + "</br>";
        html += "-Dueño Primer Nombre: " + $("#Dprimernombre").val() + "</br>";
        html += "-Dueño Segundo Nombre: " + $("#Dsegundonombre").val() + "</br>";
        html += "-Dueño Primer Apellido : " + $("#Dprimerapellido").val() + "</br>";
        html += "-Dueño Segundo Apellido: " + $("#Dsegundopellido").val() + "</br>";
        html += "-Dueño Fecha Naciomiento: " + $("#Dfechanac").val() + "</br>";
        html += "-Dueño Celular : " + $("#Dcelular").val() + "</br>";
        html += "-Dueño Telefono: " + $("#Dtelefono").val() + "</br>";
        html += "-Dueño Email: " + $("#Demail").val() + "</br>";
        html += "-Dueño Sexo : " + $("#cbxDsexo").val() + "</br>";
        html += "-Dueño Estudios: " + $("#cbxDestudios").val() + "</br>";
        html += "-Dueño Estado Civil: " + $("#cbxDestadocivil").val() + "</br>";
        html += "-Dueño Profesion: " + $("#cbxDprofesion").val() + "</br>";


        //Datos de Licencia
        html += "-Numero Licencia: " + $("#txtlicenciaconducir").val() + "</br>";
        html += "-Tipo Licencia: " + $("#cbxlicencia").val() + "</br>";
        html += "-Comuna Licencia: " + $("#cbxcomunalincencia").val() + "</br>";

    }


    if ($("#cbxcalidad").val() == 3) {

        //Datos de Infractor
        html += "-Run Empresa: " + $("#txtrunempresa").val() + "</br>";
        html += "-Nombre Empresa: " + $("#txtnombreempresa").val() + "</br>";
        html += "-Razon Social Empresa: " + $("#txtrazonsocialempresa").val() + "</br>";
        html += "-Giro Comercial Empresa : " + $("#txtgirocomercialempresa").val() + "</br>";
        html += "-Telefono Empresa: " + $("#txttelefonoempresa").val() + "</br>";
        html += "-Movil Empresa: " + $("#txtmovilempresa").val() + "</br>";
        html += "-Email Empresa : " + $("#txtemailempresa").val() + "</br>";


    }

    if ($("#cbxcalidad").val() == 4) {

        //Datos de Infractor
        html += "-Tipo Identificacion: " + $("#cbxDocIdentificacion").val() + "</br>";
        html += "-Primer Nombre: " + $("#Iprimernombre").val() + "</br>";
        html += "-Segundo Nombre: " + $("#Isegundonombre").val() + "</br>";
        html += "-Primer Apellido : " + $("#Iprimerapellido").val() + "</br>";
        html += "-Segundo Apellido: " + $("#Isegundopellido").val() + "</br>";
        html += "-Fecha Naciomiento: " + $("#Ifechanac").val() + "</br>";
        html += "-Celular : " + $("#Icelular").val() + "</br>";
        html += "-Telefono: " + $("#Itelefono").val() + "</br>";
        html += "-Email: " + $("#Iemail").val() + "</br>";
        html += "-Sexo : " + $("#cbxIsexo").val() + "</br>";
        html += "-Estudios: " + $("#cbxIestudios").val() + "</br>";
        html += "-Estado Civil: " + $("#cbxIestadocivil").val() + "</br>";
        html += "-Profesion: " + $("#cbxIprofesion").val() + "</br>";

    }

    //Direccion
    html += "</br></br></br></br>-Region : " + $("#cbxregion2").val() + "</br>";
    html += "-Provincia: " + $("#cbxprovincia2").val() + "</br>";
    html += "-Comuna: " + $("#cbxcomuna2").val() + "</br>";
    html += "-Numero : " + $("#idnumero").val() + "</br>";
    html += "-Depto: " + $("#iddepto").val() + "</br>";
    html += "-Block: " + $("#idblock").val() + "</br>";
    html += "-Villa : " + $("#txtvilla").val() + "</br>";
    html += "-Latitud: " + $("#latitudpersona").val() + "</br>";
    html += "-Longitud: " + $("#longitudpersona").val() + "</br>";
    html += "-Direccion: " + $("#direccionpersona").val() + "</br>";


    Swal.fire(html);

}

function personaexiste() {

    if ($("#Itxtidentificacion").val() == "") {
        swal({
            title: "Debe ingresar un RUN o Pasaporte",
            type: 'warning',
            confirmButtonColor: '#4fa7f3'
        })
    } else {


        var parametros = {
            "Itxtidentificacion": $("#Itxtidentificacion").val(),
            "cbxDocIdentificacion": $("#cbxDocIdentificacion").val()
        };



        $.ajax({
            data: parametros,
            url: '../procedimientos/ctr_personas/busca_persona',
            type: 'post',
            async: true,
            beforeSend: function () {
            },
            success: function (data) {
                //$('#cbxprovincia2').html(data);
                if (data == 1) {
                    swal({
                        title: "Debe ingresar un número de RUN válido",
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3'
                    })


                } else {
                    if (data == 0) {

                        swal({
                            title: "No existen datos relacionados a este RUN o Pasaporte",
                            type: 'warning',
                            confirmButtonColor: '#4fa7f3'
                        })

                        $("#Iprimernombre").val(null);
                        $("#Isegundonombre").val(null);
                        $("#Iprimerapellido").val(null);
                        $("#Isegundopellido").val(null);
                        $("#Ifechanac").val(null);
                        $("#Icelular").val(null);
                        $("#Iemail").val(null);
                        $("#cbxInacionalidad").val(null);
                        $("#cbxIsexo").val(null);
                        $("#cbxIestudios").val(null);
                        $("#cbxIestadocivil").val(null);
                        $("#cbxIprofesion").val(null);

                        $("#cbxregion2").val(null);
                        $("#cbxprovincia2").val(null);
                        $("#cbxcomuna2").val(null);
                        $("#idnumeroP").val(null);
                        $("#iddeptoP").val(null);
                        $("#idblockP").val(null);
                        $("#txtvillaP").val(null);
                        $("#latitudpersona").val(null);
                        $("#longitudpersona").val(null);
                        $("#direccionpersona").val(null);

                        $("#txtlicenciaconducir").val(null);
                        $("#cbxlicencia").val(null);
                        $("#cbxcomunalincencia").val(null);


                        eliminamarca();

                        // traevista_terminar();
                        //  $("#btnpersona").hide();

                    } else {

                        var resultado = JSON.parse(data);

                        $("#Iprimernombre").val(resultado.td_primernombre);
                        $("#Isegundonombre").val(resultado.td_segundonombre);
                        $("#Iprimerapellido").val(resultado.td_apellidopaterno);
                        $("#Isegundopellido").val(resultado.td_apellidomaterno);
                        $("#Ifechanac").val(resultado.td_fechanacimiento);
                        $("#Icelular").val(resultado.td_celular);
                        $("#Iemail").val(resultado.td_email);
                        $("#cbxInacionalidad").val(resultado.idta_nacionalidad);
                        $("#cbxIsexo").val(resultado.idta_sexo);
                        $("#cbxIestudios").val(resultado.idta_estudios);
                        $("#cbxIestadocivil").val(resultado.idta_estadocivil);
                        $("#cbxIprofesion").val(resultado.idta_profesion);






                        $("#cbxregion2").val(resultado.idta_region);

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
                                $('#cbxprovincia2').html(data);
                            }
                        });

                        $("#cbxprovincia2").val(resultado.idta_provincia);


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

                                $('#cbxcomuna2').html(data);
                                $('#cbxcomunalincencia').html(data);

                            }
                        });


                        $("#cbxcomuna2").val(resultado.idta_comuna);
                        $("#idnumeroP").val(resultado.td_numero);
                        $("#iddeptoP").val(resultado.td_depto);
                        $("#idblockP").val(resultado.td_block);
                        $("#txtvillaP").val(resultado.td_villapoblacion);
                        $("#latitudpersona").val(resultado.td_latitud);
                        $("#longitudpersona").val(resultado.td_longitud);
                        $("#direccionpersona").val(resultado.td_direccion);

                        $("#cbxlicencia").val(resultado.idta_licencia);



                        marca(resultado.td_latitud, resultado.td_longitud);

                    }
                }


//                $("#btnpersona").hide();
            }
        });
    }



}


function patenteexiste() {



    if ($("#txtpatente").val() == "") {
        swal({
            title: "Debe N° Patente ",
            type: 'warning',
            confirmButtonColor: '#4fa7f3'
        })
    } else {

        if ($("#cbxtipopatente").val() == "") {
            swal({
                title: "Debe Seleccionar tipo de patente",
                type: 'warning',
                confirmButtonColor: '#4fa7f3'
            })
        } else {

            var parametros = {
                "txtpatente": $("#txtpatente").val(),
                "cbxtipopatente": $("#cbxtipopatente").val(),
                "cbxcalidad": $("#cbxcalidad").val()

            };
            $.ajax({
                data: parametros,
                url: '../procedimientos/ctr_vehiculo/busca_vehiculo',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {



                    if (data == 0) {
                        swal({
                            title: "No existen datos asociados a esa Patente",
                            type: 'warning',
                            confirmButtonColor: '#4fa7f3'
                        })

                        $("#cbxtipopatente").val(null);
                        $("#txtpatente").val(null);
                        $("#cbxmarca").val(null);
                        $("#cbxmodelo").val(null);
                        $("#cbxtipvehiculo").val(null);
                        $("#cbxcolor").val(null);
                        $("#cbxano").val(null);


                        $("#Iprimernombre").val(null);
                        $("#Isegundonombre").val(null);
                        $("#Iprimerapellido").val(null);
                        $("#Isegundopellido").val(null);
                        $("#Ifechanac").val(null);
                        $("#Icelular").val(null);
                        $("#Iemail").val(null);
                        $("#cbxInacionalidad").val(null);
                        $("#cbxIsexo").val(null);
                        $("#cbxIestudios").val(null);
                        $("#cbxIestadocivil").val(null);
                        $("#cbxIprofesion").val(null);

                        $("#cbxregion2").val(null);
                        $("#cbxprovincia2").val(null);
                        $("#cbxcomuna2").val(null);
                        $("#idnumeroP").val(null);
                        $("#iddeptoP").val(null);
                        $("#idblockP").val(null);
                        $("#txtvillaP").val(null);
                        $("#latitudpersona").val(null);
                        $("#longitudpersona").val(null);
                        $("#direccionpersona").val(null);

                        $("#txtlicenciaconducir").val(null);
                        $("#cbxlicencia").val(null);
                        $("#cbxcomunalincencia").val(null);

                        eliminamarca();


                    } else {
                        var resultado = JSON.parse(data);

                        $("#txtpatente").val(resultado.td_patente);
                        $("#cbxmarca").val(resultado.idta_marcavehiculo);


                        var parametros = {
                            "marca": resultado.idta_marcavehiculo
                        };
                        $.ajax({
                            data: parametros,
                            url: '../procedimientos/ctr_personas/modelo',
                            type: 'post',
                            async: false,
                            beforeSend: function (data) {

                            },
                            success: function (data) {

                                $('#cbxmodelo').html(data);
                            }
                        });


                        $("#cbxmodelo").val(resultado.idta_modelo);
                        $("#cbxtipvehiculo").val(resultado.idta_tipovehiculo);
                        $("#cbxcolor").val(resultado.idta_color);
                        $("#cbxano").val(resultado.idta_ano);


                        $("#cbxDocIdentificacion").val(resultado.idta_identificacion);

                        var parametros = {
                            "tipo": resultado.idta_identificacion
                        };
                        $.ajax({
                            data: parametros,
                            url: '../procedimientos/ctr_personas/tipoinfractor',
                            type: 'post',
                            async: false,
                            beforeSend: function (data) {

                            },
                            success: function (data) {
                                $('#tipoInfractor').html(data);

                            }
                        });




                        $("#Itxtidentificacion").val(resultado.td_run);

                        $("#Iprimernombre").val(resultado.td_primernombre);
                        $("#Isegundonombre").val(resultado.td_segundonombre);
                        $("#Iprimerapellido").val(resultado.td_apellidopaterno);
                        $("#Isegundopellido").val(resultado.td_apellidomaterno);
                        $("#Ifechanac").val(resultado.td_fechanacimiento);
                        $("#Icelular").val(resultado.td_celular);
                        $("#Iemail").val(resultado.td_email);
                        $("#cbxInacionalidad").val(resultado.idta_nacionalidad);
                        $("#cbxIsexo").val(resultado.idta_sexo);
                        $("#cbxIestudios").val(resultado.idta_estudios);
                        $("#cbxIestadocivil").val(resultado.idta_estadocivil);
                        $("#cbxIprofesion").val(resultado.idta_profesion);






                        $("#cbxregion2").val(resultado.idta_region);

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
                                $('#cbxprovincia2').html(data);
                            }
                        });

                        $("#cbxprovincia2").val(resultado.idta_provincia);


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

                                $('#cbxcomuna2').html(data);
                                $('#cbxcomunalincencia').html(data);

                            }
                        });


                        $("#cbxcomuna2").val(resultado.idta_comuna);
                        $("#idnumeroP").val(resultado.td_numero);
                        $("#iddeptoP").val(resultado.td_depto);
                        $("#idblockP").val(resultado.td_block);
                        $("#txtvillaP").val(resultado.td_villapoblacion);
                        $("#latitudpersona").val(resultado.td_latitud);
                        $("#longitudpersona").val(resultado.td_longitud);
                        $("#direccionpersona").val(resultado.td_direccion);

                        $("#cbxlicencia").val(resultado.idta_licencia);


                        marca(resultado.td_latitud, resultado.td_longitud);



                    }
                }
            });




        }




    }

}


function marca(lat, long) {
    var imported = document.createElement('script');
    imported.src = '../assets/js/mapa_vistapersona.js';
    document.head.appendChild(imported);
    ponerpunto_persona(lat, long);
}

function eliminamarca() {
    var imported = document.createElement('script');
    imported.src = '../assets/js/mapa_vistapersona.js';
    document.head.appendChild(imported);
    setMapOnAll_persona();
}