var map_buscadetalle;
var america_lat = -33.4651697;
var america_lng = -70.6880614;
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions: {strokeColor: '#2E9AFE'}});
var directionsService = new google.maps.DirectionsService();
var GoogleMap = function () {};
var geocoder = new google.maps.Geocoder;

    function start_map_buscadetalle() {
   

        map_buscadetalle = new google.maps.Map(document.getElementById('vista_buscadetalle'), {
            center: {lat: america_lat, lng: america_lng},
            zoom: 13

        });

        $.ajax({
            url: '../Ctr_Busqueda/get_location2',
            type: 'post',
            async: false,
            beforeSend: function () {
            },
            success: function (data) {

             
            
                var resultado = JSON.parse(data);
                
          

                var end3 = new google.maps.LatLng(resultado.latitud, resultado.longitud);
                var info3 = new google.maps.InfoWindow();
                var marker3 = new google.maps.Marker({
                    position: end3,
                    map: map_buscadetalle,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    title: 'Localizacion'
                });

                var my_lat = resultado.latitud;
                var my_lng = resultado.longitud;
                var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

                geocoder.geocode({'location': latlng}, function (results, status) {

                    if (status === 'OK') {

                        if (results[0]) {
                            // alert(results[0].formatted_address);

//                                    info3.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

//                                    $('#autocompletado2').val(results[0].formatted_address);

//                                    draw_rute_map2(my_lat, my_lng);
//                                    info3.open(map3, marker3);
                            info3.setContent('<div><strong>' + resultado.id + '-' + results[0].formatted_address + '</strong><br>');
                            info3.open(map_buscadetalle, marker3);


                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });























                var fenway = {lat: parseFloat(resultado.latitud), lng: parseFloat(resultado.longitud)};
                var map5 = new google.maps.Map(document.getElementById('pano'), {
                    center: fenway,
                    zoom: 14
                });
                var panorama = new google.maps.StreetViewPanorama(
                        document.getElementById('pano'), {
                    position: fenway,
                    pov: {
                        heading: 34,
                        pitch: 10
                    }
                });
                map5.setStreetView(panorama);





            }
        });




    }

