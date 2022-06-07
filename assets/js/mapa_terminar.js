var map3;
var america_lat = -33.4651697;
var america_lng = -70.6880614;
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions: {strokeColor: '#2E9AFE'}});
var directionsService = new google.maps.DirectionsService();
var GoogleMap = function () {};
var geocoder = new google.maps.Geocoder;

function start_map3() {

    map3 = new google.maps.Map(document.getElementById('map3'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 13

    });
    
    
     $.ajax({
        url: '../procedimientos/ctr_infracciones/get_location',
        type: 'post',
        async: false,
        beforeSend: function () {
        },
        success: function (data) {

            var resultado = JSON.parse(data);
            for (var k in resultado) {

                var end3 = new google.maps.LatLng(resultado[k].latitud, resultado[k].longitud);
                var info3 = new google.maps.InfoWindow();
                var marker3 = new google.maps.Marker({
                    position: end3,
                    map: map3,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    title: 'Localizacion'
                });
                info3.setContent('<div><strong>' + resultado[k].id +'-'+ resultado[k].direccion + '</strong><br>');
                info3.open(map3, marker3);
            }
         }
    });

}




//
//function ponerpuntosssssss() {
//
//
//    $.ajax({
//
//        url: '../procedimientos/ctr_infracciones/get_location',
//        type: 'post',
//        async: false,
//        beforeSend: function () {
//        },
//        success: function (data) {
//
//            var resultado = JSON.parse(data);
//            for (var k in resultado) {
//
//
//
//                var end3 = new google.maps.LatLng(resultado[k].latitud, resultado[k].longitud);
//                var info3 = new google.maps.InfoWindow();
//                var marker3 = new google.maps.Marker({
//                    position: end3,
//                    map: map3,
//                    draggable: false,
//                    animation: google.maps.Animation.DROP,
//                    title: 'Localizacion'
//                });
//                info3.setContent('<div><strong>' + resultado[k].direccion + '</strong><br>');
//                info3.open(map3, marker3);
//                
//            }
//
//
//        }
//
//    });
//
//}
//
