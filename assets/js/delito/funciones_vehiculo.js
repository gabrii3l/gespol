$(document).ready(function () {
    $('#idvehiculo_delito').click('ready', function () {

        if (validaciones_vehiculo_delito() != "") {
            swal(
                    {
                        title: validaciones_vehiculo_delito(),
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '800px'
                    }
            )
        } else {
            var cbxtipopatente_delito = $("#cbxtipopatente_delito").val();
            var txtpatente_delito = $("#txtpatente_delito2").val();
            var parametros = {
                "cbxtipopatente_delito": cbxtipopatente_delito,
                "txtpatente_delito": txtpatente_delito
            };
            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Vehiculo_Delito/busca_vehiculo',
                type: 'post',
                async: false,
                beforeSend: function (data) {

                },
                success: function (data) {

                    if (data == 0) {

                        save_vehiculodelito(2);
                    } else {
                        swal({
                            title: 'La información de este vehículo ya existe en la Base de Datos',
                            text: "¿Desea actualizar la información de esta persona?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Sí',
                            cancelButtonText: 'No',
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger m-l-10',
                            buttonsStyling: false
                        }).then(function () {

                            save_vehiculodelito(0);
                        }, function (dismiss) {

                            save_vehiculodelito(1);
                        })
                    }
                }
            });
        }
    });
    $('#btnpatente_delito').click('ready', function () {

        var cbxtipopatente_delito = $("#cbxtipopatente_delito").val();
        var txtpatente_delito = $("#txtpatente_delito2").val();
        if ($("#txtpatente_delito2").val() == "") {
            swal({
                title: "Debe N° Patente ",
                type: 'warning',
                confirmButtonColor: '#4fa7f3'
            })
        } else {

            if ($("#cbxtipopatente_delito").val() == "") {
                swal({
                    title: "Debe Seleccionar tipo de patente",
                    type: 'warning',
                    confirmButtonColor: '#4fa7f3'
                })
            } else {
                var parametros = {
                    "cbxtipopatente_delito": cbxtipopatente_delito,
                    "txtpatente_delito": txtpatente_delito
                };
                $.ajax({
                    data: parametros,
                    url: '../delito/Ctr_Vehiculo_Delito/busca_vehiculo',
                    type: 'post',
                    async: false,
                    beforeSend: function (data) {

                    },
                    success: function (data) {

                        if (data == 0) {
                            swal({
                                title: "No existen datos asociados a esa Patente",
                                type: 'warning',
                                confirmButtonColor: '#4fa7f3'
                            })

                            $("#cbxmarca_delito").val(null);
                            $("#cbxmodelo_delito").val(null);
                            $("#cbxtipvehiculo_delito").val(null);
                            $("#cbxcolor_delito").val(null);
                            $("#cbxano_delito").val(null);
                            $("#NroChassis_delito").val(null);
                            $("#NroMotor_delito").val(null);
                            $("#Avaluto_delito").val(null);
                        } else {
                            var resultado = JSON.parse(data);
                            $("#cbxtipopatente_delito").val(resultado.idta_tipopatente);
                            $("#txtpatente_delito2").val(resultado.td_patente);
                            $("#cbxmarca_delito").val(resultado.idta_marcavehiculo);
                            var parametros = {
                                "marca": resultado.idta_marcavehiculo
                            };
                            $.ajax({
                                data: parametros,
                                url: '../delito/Ctr_Vehiculo_Delito/busca_modelo',
                                type: 'post',
                                async: false,
                                beforeSend: function (data) {

                                },
                                success: function (data) {

                                    $('#cbxmodelo_delito').html(data);
                                }
                            });
                            $("#cbxmodelo_delito").val(resultado.idta_modelo);
                            $("#cbxtipvehiculo_delito").val(resultado.idta_tipovehiculo);
                            $("#cbxcolor_delito").val(resultado.idta_color);
                            $("#cbxano_delito").val(resultado.idta_ano);
                            $("#NroChassis_delito").val(resultado.td_numerochassis);
                            $("#NroMotor_delito").val(resultado.td_nromotor);
                            $("#Avaluto_delito").val(resultado.td_avaluo);

                        }
                    }
                });
            }

        }

    });
    $('#cbxmarca_delito').change(function () {

        var parametros = {
            "marca": this.value
        };
        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Vehiculo_Delito/busca_modelo',
            type: 'post',
            async: false,
            beforeSend: function (data) {

            },
            success: function (data) {

                $('#cbxmodelo_delito').html(data);
            }
        });
    });
    $('#cbxmodelo_delito').click('ready', function () {

        if (this.value == "") {
            swal({
                title: "Debe Seleccionar Marca de Vehículo",
                type: 'warning',
                confirmButtonColor: '#4fa7f3'
            })
        }



    });
    function save_vehiculodelito(opcion) {

        var cbxtipopatente_delito = $("#cbxtipopatente_delito").val();
        var txtpatente_delito2 = $("#txtpatente_delito2").val();
        var cbxmarca_delito = $("#cbxmarca_delito").val();
        var cbxmodelo_delito = $("#cbxmodelo_delito").val();
        var cbxtipvehiculo_delito = $("#cbxtipvehiculo_delito").val();
        var cbxcolor_delito = $("#cbxcolor_delito").val();
        var cbxano_delito = $("#cbxano_delito").val();
        var NroChassis_delito = $("#NroChassis_delito").val();
        var NroMotor_delito = $("#NroMotor_delito").val();
        var Avaluto_delito = $("#Avaluto_delito").val();
        var parametros = {
            "opcion": opcion,
            "cbxtipopatente_delito": cbxtipopatente_delito,
            "txtpatente_delito2": txtpatente_delito2,
            "cbxmarca_delito": cbxmarca_delito,
            "cbxmodelo_delito": cbxmodelo_delito,
            "cbxtipvehiculo_delito": cbxtipvehiculo_delito,
            "cbxcolor_delito": cbxcolor_delito,
            "cbxano_delito": cbxano_delito,
            "NroChassis_delito": NroChassis_delito,
            "NroMotor_delito": NroMotor_delito,
            "Avaluto_delito": Avaluto_delito
        };
        $.ajax({
            data: parametros,
            url: '../delito/Ctr_Vehiculo_Delito/save_vehiculodelito',
            type: 'post',
            async: false,
            beforeSend: function (data) {

            },
            success: function (data) {

                if (data == 0) {
                    swal(
                            {
                                title: 'Vehiculo registrado exitosamente',
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

    function validaciones_vehiculo_delito() {
        var html = "";
        if ($("#cbxtipopatente_delito").val() == "") {
            html += "-Debe ingresar Fecha de Suceso </br>";
        }
        if ($("#txtpatente_delito").val() == "") {
            html += "-Debe ingresar Hora Suceso </br>";
        }
        if ($("#cbxmarca_delito").val() == "") {
            html += "-Debe ingresar Fecha Delito </br>";
        }
        if ($("#cbxmodelo_delito").val() == "") {
            html += "-Debe ingresar Hora Delito </br>";
        }
        if ($("#cbxtipvehiculo_delito").val() == "") {
            html += "-Debe ingresar Tipo de Adopcion de Delito </br>";
        }
        if ($("#cbxcolor_delito").val() == "") {
            html += "-Debe Seleccionar Modo Operanti </br>";
        }

        return html;
    }

});