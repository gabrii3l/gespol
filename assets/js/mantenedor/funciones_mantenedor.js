

$(document).ready(function () {


    $('#btnmodificar_mantenedorus').click('ready', function () {
        var $cont = 0;
        $("input[type='checkbox'][name='chkSeleccion_mantenedorusuario']").each(function () {
            if ($(this).is(':checked')) {
                                
                    
                    alert($(this).val());
                    
//                    var parametros = {
//                        "iddelito": $(this).val()
//                    };
//                    $.ajax({
//                        data: parametros,
//                        url: '../mantenedor/Ctr_Mantenedor/buscar_funcionario',
//                        type: 'post',
//                        async: false,
//                        beforeSend: function () {
//                        },
//                        success: function (data) {
//                            $('#datos_delito').append(data);
//                        }
//                    });
          limpiacheck_mantenedorus();
            } else {
               
            }
        });
    });
function limpiacheck_mantenedorus() {
    $("input[type='checkbox'][name='chkSeleccion_mantenedorusuario']").each(function () {
        $("input[type='checkbox'][name='chkSeleccion_mantenedorusuario']").prop("checked", false);
    });
}
});