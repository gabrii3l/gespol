$(document).ready(function () {

    $('#btnbuscaemp_delito').click('ready', function () {

        if ($("#txtrunempresa_delito").val() == "") {
            swal(
                    {
                        title: 'Debe ingresar un N° de Empresa',
                        type: 'warning',
                        confirmButtonColor: '#4fa7f3',
                        width: '500px'
                    }
            )
        } else {
            var txtrunempresa_delito = $("#txtrunempresa_delito").val();     
            var parametros = {
                "txtrunempresa_delito": txtrunempresa_delito
            };
            $.ajax({
                data: parametros,
                url: '../delito/Ctr_Persona_Delito/btnbusca_empresa',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {
                    if (data == 1) {
                        swal(
                                {
                                    title: 'No existen datos asociados a ese N° de Empresa',
                                    type: 'warning',
                                    confirmButtonColor: '#4fa7f3',
                                    width: '500px'
                                }
                        )
                       
                        $("#txtnombreempresa_delito").val(null);
                        $("#txtrazonsocialempresa_delito").val(null);
                        $("#txtgirocomercialempresa_delito").val(null);
                        $("#txttelefonoempresa_delito").val(null);
                        $("#txtmovilempresa_delito").val(null);
                        $("#txtemailempresa_delito").val(null);

                    } else {
                        var resultado = JSON.parse(data);
                        $("#txtrunempresa_delito").val();
                        $("#txtnombreempresa_delito").val(resultado.td_nombrefantasia);
                        $("#txtrazonsocialempresa_delito").val(resultado.td_razonsocial);
                        $("#txtgirocomercialempresa_delito").val(resultado.td_girocomercial);
                        $("#txttelefonoempresa_delito").val(resultado.td_telefono);
                    }
                }
            });
        }
    });
});