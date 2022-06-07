/* Funciones para encargados */
$(document).ready(function() {
    /*Botones módulos de encargado*/
    $('#btnguardafun').click('ready', function() {


        /*Debo agregar ahora la funcion que recorre la tabla 2 para rescatar los ID e insertar los funcionarios y crear el prodacto*/
        var contador22 = 0;
        $('#datos20 tr').each(function() {
            alert($(this).val());
            contador22 = contador22 + 1;
        });

        if (contador22 < 1) {
            //        Swal.fire('Debe asignar a lo menos 01 funcionario al procedimiento');

            swal({
                title: 'Debe asignar a lo menos 01 funcionario al procedimiento',
                type: 'warning',
                confirmButtonColor: '#4fa7f3'
            })

        } else {

            $('#datos20 tr').each(function() {

                var parametros = {
                    "idfuncionario": $(this).attr("data-valor")
                };
                $.ajax({
                    data: parametros,
                    url: '../delito/Ctr_Encargados/save_funcionario',
                    type: 'post',
                    async: false,
                    beforeSend: function() {},
                    success: function(data) {





                    }
                });
            });
            swal({
                title: 'Funcionarios Asignados Exitosamente',
                text: 'Ingreso exitoso !',
                type: 'success',
                confirmButtonColor: '#4fa7f3'
            })
            traevista_persona_delito();
            traevista_vehiculos();
            traevista_especies();
            traevista_armas();
            traevista_drogas();
            traevista_perito();
            $("#menupersona").trigger("click");
            //$("#btnguardafun").hide();

        }


    });

    $('#ideasignar').click('ready', function() {

        var $cont = 0;

        $("input[type='checkbox'][name='chkSeleccion_fun']").each(function() {

            if ($(this).is(':checked')) {
                if ($('#datos20').html() == "") {
                    var parametros = {
                        "idfuncionario": $(this).val()
                    };
                    $.ajax({
                        data: parametros,
                        url: '../delito/Ctr_Encargados/buscar_funcionario',
                        type: 'post',
                        async: false,
                        beforeSend: function() {},
                        success: function(data) {

                            $('#datos20').append(data);

                        }
                    });
                } else {
                    if (buscafuncionariotabla($(this).val()) > 0) {
                        var parametros = {
                            "idfuncionario": $(this).val()
                        };
                        $.ajax({
                            data: parametros,
                            url: '../delito/Ctr_Encargados/buscar_funcionario',
                            type: 'post',
                            async: false,
                            beforeSend: function() {},
                            success: function(data) {

                                $('#datos20').append(data);

                            }
                        });
                    }
                }
            } else {
                buscafuncionariotabla_eliminar($(this).val());
            }
        });
    });
});

function traevista_persona_delito() {

    $.ajax({
        //        url: 'vista_personas',
        url: '../delito/Ctr_Persona_Delito',
        type: 'post',
        async: false,
        beforeSend: function() {},
        success: function(data) {
            $('#tablapersonas').html(data);
            $("#datosvehiculo").hide();
            $("#direccion").hide();
        }
    });

}

function traevista_vehiculos() {

    $.ajax({
        //        url: 'vista_vehiculos',
        url: '../delito/Ctr_Vehiculo_Delito',
        type: 'post',
        beforeSend: function() {},
        success: function(data) {
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
        beforeSend: function() {},
        success: function(data) {
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
        beforeSend: function() {},
        success: function(data) {
            $('#tablaarmas').html(data);
        }
    });
    //history.back();
}

function traevista_drogas() {

    $.ajax({
        url: '../delito/Ctr_Drogas',
        type: 'post',
        beforeSend: function() {},
        success: function(data) {
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
        beforeSend: function() {},
        success: function(data) {
            $('#tablaperito').html(data);
        }
    });
    //history.back();
}

function rescataidfun() {
    var $cont = 0;
    $('input[type="checkbox"]').each(function() {
        if ($(this).is(':checked')) {
            if ($('#datos20').html() == "") {
                var parametros = {
                    "idfuncionario": $(this).val()
                };
                $.ajax({
                    data: parametros,
                    url: '../delito/ctr_encargado/buscar_funcionario',
                    type: 'post',
                    async: false,
                    beforeSend: function() {},
                    success: function(data) {
                        if (data == "RUN no valido") {
                            swal({
                                title: data,
                                type: 'warning',
                                confirmButtonColor: '#4fa7f3'
                            })
                        } else if (data == "No hay datos para este RUN") {
                            swal({
                                title: data,
                                type: 'warning',
                                confirmButtonColor: '#4fa7f3'
                            })
                        } else {
                            $('#datos20').append(data);
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
                        beforeSend: function() {},
                        success: function(data) {
                            if (data == "RUN no valido") {
                                swal({
                                    title: data,
                                    type: 'warning',
                                    confirmButtonColor: '#4fa7f3'
                                })
                            } else if (data == "No hay datos para este RUN") {
                                swal({
                                    title: data,
                                    type: 'warning',
                                    confirmButtonColor: '#4fa7f3'
                                })
                            } else {
                                $('#datos20').append(data);
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
    $('#datos20 tr').each(function() {
        if (parseFloat($(this)) === parseFloat(id)) {
            $("#fila" + parseFloat(id)).remove();
            return false;
        }
    });
}

function buscafuncionariotabla(id) {
    var cont = 0;
    $('#datos20 tr').each(function() {
        if (parseFloat($(this).attr("data-valor")) === parseFloat(id)) {
            cont = 0;
            return false;
        } else {
            cont++;
        }
    });
    return cont;
}

function remueve_funcionario(id) {
    $("#fila" + id).remove();
}
/*******************************************************************************/