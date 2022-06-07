

function evidencia(id) {


    var parametros = {
        "idinfraccion": id
    };
    $.ajax({
        data: parametros,
        url: '../procedimientos/Ctr_Infracciones/buscar_evidencia',
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
        url: '../procedimientos/ctr_infracciones/pdf',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {

        }
    });
}






$('#btnvalidar').click('ready', function () {
    var baseurl = "http://192.168.43.196:8080/gespol";

    swal({
        title: '¿Esta seguro que desea validar?',
        text: "Validadas se incorporan a las estadísticas",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Validar',
        cancelButtonText: 'Cancelar',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger m-l-10',
        buttonsStyling: false
    }).then(function () {



        $.ajax({
            url: '../procedimientos/ctr_infracciones/validainfraccion',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {
                if (data == 0) {

                    swal(
                            'Validación Exitosa',
                            'Se incorporan a la reportería.',
                            'success'
                            )
                    window.location.href = baseurl + "/inicio/principal";


                } else {
                    swal(
                            'Error',
                            'No se pudo validar',
                            'error'
                            )
                }


            }
        });







    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
//                if (dismiss === 'cancel') {
//                    swal(
//                        'Cancelled',
//                        'Your imaginary file is safe :)',
//                        'error'
//                    )
//                }
    })




});           