var persona;
var marker;
var america_lat = -33.4651697;
var america_lng = -70.6880614;
var directionsDisplay = new google.maps.DirectionsRenderer({ polylineOptions: { strokeColor: '#2E9AFE' } });
var directionsService = new google.maps.DirectionsService();
var geocoder = new google.maps.Geocoder;
var GoogleMap = function() {};


function start_vistapersona() {

    persona = new google.maps.Map(document.getElementById('vistapersona'), {
        center: { lat: america_lat, lng: america_lng },
        zoom: 13

    });

    var info = new google.maps.InfoWindow();
    /*Obtengo texto buscado*/
    var texto = document.getElementById('direccionpersona');
    const marcador = new google.maps.Marker({
        map: persona,
        draggable: true,
        animation: google.maps.Animation.DROP,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    /*creo variable para busqueda google*/
    const busca = new google.maps.places.Autocomplete(texto);
    /*posiciono la busqueda en el mapa*/
    busca.bindTo("bounds", persona);
    /*posiciono la busqueda en el mapa*/
    busca.addListener('place_changed', function() {

        var place = busca.getPlace();
        if (!place.geometry.viewport) {
            windows.alert("Error al mostrar el lugar");
        }
        if (place.geometry.viewport) {
            persona.fitBounds(place.geometry.viewport);
        } else {
            persona.setCenter(place.geometry.location);
            persona.setZoom(18);
        }
        /*geneero marcardor del lugar*/
        marcador.setPosition(place.geometry.location);

        marcador.addListener('click', function() {
            info.open(persona, marcador);
        });




        var address = "";
        /*obtengo detalles de la direccion*/
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || ''),
            ];
        }
        // alert("Llega");
        draw_rute_map2(place.geometry.location.lat(), place.geometry.location.lng());
        /*asigno a variables*/
        $('#latitudpersona').val(place.geometry.location.lat());
        $('#longitudpersona').val(place.geometry.location.lng());

        /*muestro informacion*/
        info.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        info.open(persona, marcador);
    });

    marcador.addListener('dragend', function(event) {


        $('#latitudpersona').val(this.getPosition().lat());
        $('#longitudpersona').val(this.getPosition().lng());

        var my_lat = $('#latitudpersona').val();
        var my_lng = $('#longitudpersona').val();
        var latlng = { lat: parseFloat(my_lat), lng: parseFloat(my_lng) };

        geocoder.geocode({ 'location': latlng }, function(results, status) {

            if (status === 'OK') {

                if (results[0]) {
                    // alert(results[0].formatted_address);

                    info.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                    $('#direccionpersona').val(results[0].formatted_address);
                    info.open(map2, marcador);
                    // draw_rute_map2(my_lat, my_lng);

                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });


    });

}

function geocodeLatLng() {

    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    persona = new google.maps.Map(document.getElementById('vistapersona'), {
        center: { lat: america_lat, lng: america_lng },
        zoom: 13,
        styles: [
            { elementType: 'geometry', stylers: [{ color: '#242f3e' }] },
            { elementType: 'labels.text.stroke', stylers: [{ color: '#242f3e' }] },
            { elementType: 'labels.text.fill', stylers: [{ color: '#746855' }] },
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#d59563' }]
            },
            {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#d59563' }]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{ color: '#263c3f' }]
            },
            {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#6b9a76' }]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{ color: '#38414e' }]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{ color: '#212a37' }]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#9ca5b3' }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{ color: '#746855' }]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{ color: '#1f2835' }]
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#f3d19c' }]
            },
            {
                featureType: 'transit',
                elementType: 'geometry',
                stylers: [{ color: '#2f3948' }]
            },
            {
                featureType: 'transit.station',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#d59563' }]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{ color: '#17263c' }]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{ color: '#515c6d' }]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.stroke',
                stylers: [{ color: '#17263c' }]
            }
        ]
    });









}

function obtieneubicacion() {

    var info2 = new google.maps.InfoWindow();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            $('#latitudpersona').val(position.coords.latitude);
            $('#longitudpersona').val(position.coords.longitude);
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            const marker = new google.maps.Marker({
                map: persona,
                draggable: true,
                animation: google.maps.Animation.DROP,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                position: pos
            });


            geocoder.geocode({ 'location': pos }, function(results, status) {

                if (status === 'OK') {

                    if (results[0]) {
                        // alert(results[0].formatted_address);

                        info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                        $('#direccionpersona').val(results[0].formatted_address);
                        info2.open(map, marker);

                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });






            marker.addListener('dragend', function(event) {

                $('#latitudpersona').val(this.getPosition().lat());
                $('#longitudpersona').val(this.getPosition().lng());

                var my_lat = $('#latitudpersona').val();
                var my_lng = $('#longitudpersona').val();
                var latlng = { lat: parseFloat(my_lat), lng: parseFloat(my_lng) };

                geocoder.geocode({ 'location': latlng }, function(results, status) {

                    if (status === 'OK') {

                        if (results[0]) {
                            // alert(results[0].formatted_address);

                            info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                            $('#direccionpersona').val(results[0].formatted_address);
                            info2.open(persona, marker);

                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });




            });






        });





    }
}


function draw_rute2(value) {
    if (value > 0) {
        $.ajax({
            type: 'POST',
            url: 'class/google.php',
            data: 'value=' + value,
            dataType: 'JSON',
            success: function(response) {
                draw_rute_map(response.lat, response.lng);
            }
        });
    }
}

function draw_rute(value) {
    if (value > 0) {
        $.ajax({
            type: 'POST',
            url: 'google.php',
            data: 'value=' + value,
            dataType: 'JSON',
            success: function(response) {
                ponerpunto(response.lat, response.lng);
            }
        });
    }
}

function draw_rute_map2(lat, lng) {
    var my_lat = $('#my_lat').val();
    var my_lng = $('#my_lng').val();
    var start = new google.maps.LatLng(my_lat, my_lng);
    var end = new google.maps.LatLng(lat, lng);
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setMap(persona);
            directionsDisplay.setOptions({ suppressMarkers: true });
        }
    });
}
// Con esta función puedo marcar en el mapa la ubicación
function ponerpunto(lat, lng) {

    var info2 = new google.maps.InfoWindow();
    var end = new google.maps.LatLng(lat, lng);
    if (navigator.geolocation) {
        marker = new google.maps.Marker({
            position: end,
            map: persona,
            title: 'Localizacion'
        });

        var latlng = { lat: parseFloat(lat), lng: parseFloat(lng) };


        geocoder.geocode({ 'location': latlng }, function(results, status) {

            if (status === 'OK') {

                if (results[0]) {
                    // alert(results[0].formatted_address);

                    info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                    $('#direccionpersona').val(results[0].formatted_address);
                    info2.open(persona, marker);

                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });






    }
}
// Sets the map on all markers in the array.
// Sets the map on all markers in the array.
function setMapOnAll() {
    marker.setMap(null);

}



// Con esta función puedo marcar en el mapa la ubicación
function ponerpunto_persona(lat, lng) {

    var info2 = new google.maps.InfoWindow();
    var end = new google.maps.LatLng(lat, lng);
    if (navigator.geolocation) {
        marker = new google.maps.Marker({
            position: end,
            map: persona,
            title: 'Localizacion'
        });

        var latlng = { lat: parseFloat(lat), lng: parseFloat(lng) };


        geocoder.geocode({ 'location': latlng }, function(results, status) {

            if (status === 'OK') {

                if (results[0]) {
                    // alert(results[0].formatted_address);

                    info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                    $('#direccionpersona').val(results[0].formatted_address);
                    info2.open(persona, marker);

                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });






    }
}
// Sets the map on all markers in the array.
// Sets the map on all markers in the array.
function setMapOnAll_persona() {
    marker.setMap(null);

}