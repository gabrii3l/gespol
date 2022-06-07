var map3;
var america_lat = -33.4532763;
var america_lng = -70.6984356;
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions: {strokeColor: '#2E9AFE'}});
var directionsService = new google.maps.DirectionsService();
var GoogleMap = function () {};
var geocoder = new google.maps.Geocoder;
var circle = null;

function start_map3() {
    circle = null;
    map3 = new google.maps.Map(document.getElementById('map3'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 15

    });
    hmap1 = new google.maps.Map(document.getElementById('hotmap'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 12

    });
//// con esto pongo el panel de herramientas
//    var drawingManager = new google.maps.drawing.DrawingManager({
//        // drawingMode: google.maps.drawing.OverlayType.MARKER,
//        drawingControl: true,
//        drawingControlOptions: {
//
//            position: google.maps.ControlPosition.TOP_CENTER,
//            drawingModes: ["marker", "circle", "polygon", "polyline", "rectangle"]
//        },
//
//        markerOptions: {
//            icon:
//                    "http://192.168.8.146:8080/gespol/assets/images/icons/beachflag.png"
//
//        },
//        circleOptions: {
//            fillColor: "#FF0000",
//            fillOpacity: 0.2,
//            strokeWeight: 5,
//            clickable: false,
//            editable: true,
//            zIndex: 1
//        }
//
//    });
//    drawingManager.setMap(map3);


//con esto pongo un circulo en el mapa
//
//    var citymap = {
//
//        center: {lat: -33.459029, lng: -70.697703},
//        population: 100
//
//
//    };



    //    var cityCircle = new google.maps.Circle({
    //        strokeColor: "#FF0000",
    //        strokeOpacity: 0.8,
    //        strokeWeight: 2,
    //        fillColor: "#FF0000",
    //        fillOpacity: 0.35,
    //        map: map3,
    //        center: citymap.center,
    //        radius: Math.sqrt(citymap.population) * 100
    //    });

//    var circle = null;
//
//      con esto obtengo los datos del circulo realizado en el mapa para guardarlos en la BD
    //    google.maps.event.addDomListener(drawingManager, 'overlaycomplete', function (event) {
    //
    //        if (event.type === 'circle') {
    //
    //            var center = event.overlay.getCenter();
    //
    //
    //            alert(event.overlay.getRadius());
    //            alert(center.lat());
    //            alert(center.lng());
    //
    //
    //            circle = {
    //                radius: event.overlay.getRadius(),
    //                center: {
    //                    lat: center.lat(),
    //                    lng: center.lng()
    //                }
    //            },
    //                    alert(center.lat());
    //        }
    //        
    //        
    //
    //    });
    $.ajax({
        url: '../procedimientos/ctr_principal/get_location',
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
                //esto es para incorporar direcciones en cada puntero
                //  info3.setContent('<div><strong>' + resultado[k].id + '-' + resultado[k].direccion + '</strong><br>');
                // info3.setContent('<div><strong>' + resultado[k].direccion + '</strong><br>');
//                info3.setContent('<div><strong>' + resultado[k].id + '</strong><br>');
                //   info3.open(map3, marker3);




//           esto es para el mapacaliente
                var heatmapData = [
                    new google.maps.LatLng(resultado[k].latitud, resultado[k].longitud),
                ];

//           esto es para el mapacaliente
                var heatmap = new google.maps.visualization.HeatmapLayer({
                    data: heatmapData,
                    radio: 10
                });
                //        
                heatmap.set("radius", heatmap.get("radius") ? null : 40);
                heatmap.setMap(hmap1);

                marker3.addListener('click', function () {



//
//                        $('#latitudinfraccion').val(this.getPosition().lat());
//                        $('#longitudinfraccion').val(this.getPosition().lng());

                    var my_lat = this.getPosition().lat();
                    var my_lng = this.getPosition().lng();
                    var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

                    geocoder.geocode({'location': latlng}, function (results, status) {

                        if (status === 'OK') {

                            if (results[0]) {
                                // alert(results[0].formatted_address);

//                                    info3.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

//                                    $('#autocompletado2').val(results[0].formatted_address);

//                                    draw_rute_map2(my_lat, my_lng);
//                                    info3.open(map3, marker3);
                                swal(
                                        results[0].formatted_address
                                        )


                            } else {
                                window.alert('No results found');
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status);
                        }
                    });



                });
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
