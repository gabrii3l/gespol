

function generagrupo() {


    if (validaciones() != "") {

   

        swal({
            title: validaciones(),
            type: 'warning',
            confirmButtonColor: '#4fa7f3'
        })


    } else {
        var parametros = {

            "txtfecha": $("#txtfecha").val(),
            "txthora": $("#txthora").val(),
            "txtobservacion": $("textarea#elm1").val(),
        };
        $.ajax({
            data: parametros,
            url: '../procedimientos/ctr_principal/ingresar_save',
            type: 'post',
            beforeSend: function () {

                $("#respuesta").html();
            },
            success: function (response) {

//                $("#datosprincipales").removeAttr('class');
//                $("#datosprincipales").removeAttr('aria-expanded');
                // traefuncionario();   
                actos();
                $("#respuesta").html(response);
                       
                $("#btngrupo").hide();
                // Swal.fire('Procedimiento creado con N°: ' + response);
//                    $("#menuconserje").trigger("click");
                swal(
                        {
                            title: 'Procedimiento Número: ' + response,
                            text: 'Ingreso exitoso !',
                            type: 'success',
                            confirmButtonColor: '#4fa7f3'
                        }
                )
        
            }
        });
     
    }
}

async function actos() {
    $.ajax({
        url: '../procedimientos/ctr_principal/combo_actos',
        type: 'post',
        success: function (response) {
            $("#actos").html(response);
            document.getElementById("cbxevento").addEventListener("cbxevento", cargamenu(document.getElementById("cbxevento").value));
        }
    });

}

function validaciones() {
    var html = "";
    if ($("#txtfecha").val() == "") {
        html += "-Ingresar Fecha de Procedimiento </br>";
    }
    if ($("#txthora").val() == "") {
        html += "-Ingresar Hora de Procedimiento </br>";
    }

    return html;
}

function guardaevento() {
    var parametros = {
        "cbxevento": $("#cbxevento").val(),
        "txtfecha": $("#txtfecha").val(),
        "txthora": $("#txthora").val(),
        "txtobservacion": $("textarea#elm1").val(),
        "txtlatitud": $("#my_lat").val(),
        "txtlongitud": $("#my_lng").val(),
    };
    $.ajax({
        data: parametros,
        url: 'ingresar_save',
        type: 'post',
        beforeSend: function () {

            $("#respuesta").html();
        },
        success: function (response) {

            $("#datosprincipales").removeAttr('class');
            $("#datosprincipales").removeAttr('aria-expanded');
            // traefuncionario();   

            $("#respuesta").html(response);
            $("#menuconserje").trigger("click");
            $("#idevento").hide();
            Swal.fire('Procedimiento creado con N°: ' + response);
            //$("#datosprincipales2").addClass("fi-file-add ");
        }
    });
}

function traefuncionario(prod) {
    $.ajax({
        data: prod,
        url: 'traefuncionarios',
        type: 'post',
        beforeSend: function () {
            $("#datos").html("Procesando, espere por favor...");
        },
        success: function (response) {
            $("#datos").html(response);
        }
    });
}

async function rescataid() {

    // var idevent = document.getElementById("respuesta").innerText;
    var $cont = 0;
    $('input[type="checkbox"]').each(function () {
        if ($(this).is(':checked')) {
            alert("Seleccionado " + $(this).val());


            var parametros = {
                "rutfuncionario": $(this).val()
            };


            $.ajax({
                data: parametros,
                url: '../procedimientos/ctr_infracciones/buscar_funcionario',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {
                    if (data == "RUN no valido") {
//                            Swal.fire(data);
                        swal(
                                {
                                    title: data,
                                    type: 'warning',
                                    confirmButtonColor: '#4fa7f3'
                                }
                        )


                    } else if (data == "No hay datos para este RUN") {
//                            Swal.fire(data);
                        swal({
                            title: data,
                            type: 'warning',
                            confirmButtonColor: '#4fa7f3'})
                    } else {

                        /* no borrar, con esto rescatas idusuario para guardar */
                        $('#datos2 tr').each(function () {
                            var Idusuario = $(this).attr("data-valor");

                            alert(Idusuario);
                            //      
                        });


                        $('#datos2').append(data);
                    }

                }
            });
















            //alert($(this).val());     
            //alert(idevent);
            /*  $cont = $cont + 1;
             var parametros = {
             "fun": $(this).val()
             };
             $.ajax({
             data: parametros,
             url: 'agrega_fun',
             type: 'post',
             async: false,
             beforeSend: function () {
             },
             success: function (response) {
             }
             });
             $("#menupersona").removeAttr('class');*/
            //$("#menupersona").modal('data-toggle');

            // $('#menupersona').add('dropdown-toggle');
            //  $('menupersona').append('data-toggle="tab"');
            //jQuery('#menupersona').find('a').attr('data-target', '#tab');
            // $("#menupersona").data("target").modal("show");
            //$("#menupersona").Attr('data-toggle', 'tab');

        } else {
            // alert("No Seleccionado "+$(this).val());
//            var parametros = {
//                "fun": $(this).val()
//
//            };
//            $.ajax({
//                data: parametros,
//                url: 'elimina_fun',
//                type: 'post',
//                async: false,
//                beforeSend: function () {
//                },
//                success: function (response) {
//                }
//            });


        }
    });
//    traefunevent();
}

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


    $("#fila" + id).remove();





}

async function traefunevent() {

    // var idevent= document.getElementById("idpro").innerText; 
    //alert (idevent);

    $.ajax({
        url: 'trae_funeven',
        type: 'post',
        async: true,
        beforeSend: function () {
            $("#datos2").html("Procesando, espere por favor...");
        },
        success: function (response) {
            if (response)
            {
                $("#datos2").html();
                $("#datos2").html(response);
            } else
            {
                Swal.fire('Debe Asignar Personal al Procedimiento N°: ' + idevent);
            }
        }
    });
}

/*********** Vistas ********************/
function traevista2() {
    alert("llega");

    var url = 'vista_personas';
    $.post(url, {}, function (data) {
        $('#tablapersonas').html(data);
    });
}

/* Infraccion */

function traevista_infraccion() {

    $.ajax({
//        url: 'vista_infraccion',
        url: '../procedimientos/Ctr_Infracciones',
        type: 'post',
        async: true,
        beforeSend: function () {
        },
        success: function (data) {

            $('#tablainfraccion').html(data);
        }
    });
}

function traevista_persona() {

    $.ajax({
//        url: 'vista_personas',
        url: '../procedimientos/Ctr_Personas',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablapersonas').html(data);
            $("#datosvehiculo").hide();
            $("#direccion").hide();
        }
    });

}
function traevista_persona_delito() {

    $.ajax({
//        url: 'vista_personas',
        url: '../delito/Ctr_Persona_Delito',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablapersonas').html(data);
            $("#datosvehiculo").hide();
            $("#direccion").hide();
        }
    });

}
function traevista_terminar() {

    $.ajax({
        url: 'vista_terminar',
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

function traeapellidospersonas() {
    alert($("#idapellidopaterno").val());
    alert($("#idapellidomaterno").val());
    var parametros = {
        "idapellidopaterno": $("#idapellidopaterno").val(),
        "idapellidomaterno": $("#idapellidomaterno").val()
    };
    $.ajax({
        data: parametros,
        url: 'busca_personaspellido',
        type: 'post',
        beforeSend: function () {

            $("#respuesta").html();
        },
        success: function (response) {


        }
    });
}

function buscapersona() {
    alert("llega");
}

/* Conserjeria */

function traeconserjeria() {

    $.ajax({
        url: '../conserjeria/Ctr_Conserjeria',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablaconserje').html(data);
           
        }
    });

}


/* Delito */

function traevista_delito() {

    $.ajax({
        url: '../delito/Ctr_Delito',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tabladelito').html(data);
        }
    });

}

function traevista_funcionario() {

    $.ajax({
        url: 'vista_funcionarios',
        // url: '../delito/Ctr_Encargados',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablafuncionarios').html(data);
        }
    });
    //history.back();
}

function traevista_vehiculos() {

    $.ajax({
//        url: 'vista_vehiculos',
        url: '../delito/Ctr_Vehiculo_Delito',
        type: 'post',
        beforeSend: function () {
        },
        success: function (data) {

            $('#tablavehiculos').html(data);
        }
    });
    //history.back();
}

function traevista_especies() {

    $.ajax({
//        url: 'vista_especies',
        url: '../delito/Ctr_Especies',
        type: 'post',
//        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablaespecies').html(data);
        }
    });
    //history.back();
}

function traevista_armas() {

    $.ajax({
//        url: 'vista_armas',
        url: '../delito/Ctr_Armas',
        type: 'post',
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablaarmas').html(data);
        }
    });
    //history.back();
}

function traevista_drogas() {

    $.ajax({
        url: '../delito/Ctr_Drogas',
        type: 'post',
        beforeSend: function () {
        },
        success: function (data) {
            $('#tabladrogas ').html(data);
        }
    });
    //history.back();
}

function traevista_perito() {

    $.ajax({
        url: '../delito/Ctr_Perito',
        type: 'post',
//        async: false,
        beforeSend: function () {
        },
        success: function (data) {
            $('#tablaperito').html(data);
        }
    });
    //history.back();
}

/* Funciones complementarias */

function personajuridica(tipopersona) {


    if (tipopersona == 2) {
        $("#datosempresa").css("display", "block");
    } else {
        document.getElementById('nombremepresa').value = '';
        document.getElementById('direccionempresa').value = '';

        $("#datosempresa").css("display", "none");
    }

}

function cargamenu_evento() {
    traevista_funcionario();
    traevista_persona();
    traevista_vehiculos();
    traevista_especies();
    traevista_armas();
    traevista_drogas();
    traevista_perito();
    traevista_infraccion();
}

function cargamenu(opcionmenu) {

    var parametros = {
        "opcionmenu": opcionmenu

    };
    $.ajax({
        data: parametros,
        url: 'genera_menu',
        type: 'post',
        beforeSend: function () {
        },
        success: function (data) {
            $('#subevento').html(data);
        }
    });
 

 
 
    if (opcionmenu == 1) {
        traevista_delito();
        traevista_funcionario();
        traevista_persona_delito();
        traevista_vehiculos();
        traevista_especies();
        traevista_armas();
        traevista_drogas();
        traevista_perito();
    }
    if (opcionmenu == 2) {
        traevista_infraccion();
        traevista_persona();
//        traevista_terminar();

    }
    if (opcionmenu == 9) {
        traeconserjeria(); 
         }

}

function llenartable() {

    $("#cbxevento option").each(function () {
        if ($(this).val() != "") {
            // concatValor += $(this).val()+' - '+$(this).text()+'\n';
            // alert($(this).text());
            var parametros = {
                "llenado": $(this).text()

            };
            $.ajax({
                data: parametros,
                url: 'ingresa_combo',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {
                    //$('#tablafuncionarios').html(data);
                }
            });




        }
    });




}


