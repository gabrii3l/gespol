
$(document).ready(function () {


    $('#buscar').click('ready', function () {

        var txtprocedimiento = $("#txtprocedimiento").val();
        var txtacto = $("#txtacto").val();
        var cbxcalidad = $("#cbxcalidad").val();

        if (validaciones() != "") {
            swal(
                    {
                        title: validaciones(),
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '800px'
                    }
            )

        } else {

            var parametros = {
                "txtprocedimiento": txtprocedimiento,
                "txtacto": txtacto,
                "cbxcalidad": cbxcalidad
            };


            $.ajax({
                data: parametros,
                url: '../procedimientos/ctr_busqueda/busqueda',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {

                    $('#tabla').html(data);



//                    if (data == 0) {
//
//
//
//                        $("#archivo1").val(null);
//                        $("#archivo2").val(null);
//                        save_funcionario();
//                        //$('#idinfracc').html(data);
//                        $("#menupersona").trigger("click");
////                    $("#btninfraccion").hide();
//                        swal(
//                                {
//                                    title: 'Infracción registrada exitosamente',
//                                    text: 'Ingreso exitoso !',
//                                    type: 'success',
//                                    confirmButtonColor: '#4fa7f3'
//                                }
//                        )
////                        Swal.fire("Infracción registrada exitosamente");
//                    } else {
//
//                        $("#archivo1").val(null);
//                        $("#archivo2").val(null);
//                        save_funcionario();
//                        // $('#idinfracc').html(data);
//                        $("#menupersona").trigger("click");
////                    $("#btninfraccion").hide();
////                    
////                        Swal.fire("Infracción registrada exitosamente");
//                        swal(
//                                {
//                                    title: 'Infracción registrada exitosamente',
//                                    text: 'Ingreso exitoso !',
//                                    type: 'success',
//                                    confirmButtonColor: '#4fa7f3'
//                                }
//                        )
//                    }


                }
            });
        }



    });


    function validaciones() {
        var html = "";
        if ($("#cbxcalidad").val() === "") {
            html += "-Debe Seleccionar un tipo de Acto </br>";
        }
        if ($("#cbxcalidad").val() == 2 && $("#txtacto").val() === "") {
            html += "-Debe Ingresar n° de infracción </br>";
        }



        return html;
    }



  













});

  function evidencia(id) {   
        var parametros = {
            "idinfraccion": id
        };
        $.ajax({
            data: parametros,
            url: '../ctr_busqueda/buscar_evidencia',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {
                $('#evidencia').html(data);

            }
        });

    }

    function pdf(id) {



        var parametros = {
            "idinfraccion": id
        };
        $.ajax({
            data: parametros,
            url: '../ctr_busqueda/pdf',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {

            }
        });
    }
    
