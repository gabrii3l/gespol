var delito;
var delitomap;
var marker_delito;
var america_lat = -33.4651697;
var america_lng = -70.6880614;
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions: {strokeColor: '#2E9AFE'}});
var directionsService = new google.maps.DirectionsService();
var geocoder_delito = new google.maps.Geocoder;
var GoogleMap = function () {};


function   start_mapdelito() {

    delitomap = new google.maps.Map(document.getElementById('map_delito'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 13

    });

    var info = new google.maps.InfoWindow();
    /*Obtengo texto buscado*/
    var texto = document.getElementById('autocompletado_delito');
    const marcador_delito = new google.maps.Marker({
        map: delitomap,
        draggable: true,
        animation: google.maps.Animation.DROP,
        mapTypeId: google.maps.MapTypeId.ROADMAP});
    /*creo variable para busqueda google*/
    const busca_delito = new google.maps.places.Autocomplete(texto);
    /*posiciono la busqueda en el mapa*/
    busca_delito.bindTo("bounds", delitomap);
    /*posiciono la busqueda en el mapa*/
    busca_delito.addListener('place_changed', function () {

        var place = busca_delito.getPlace();
        if (!place.geometry.viewport) {
            windows.alert("Error al mostrar el lugar");
        }
        if (place.geometry.viewport) {
            delitomap.fitBounds(place.geometry.viewport);
        } else {
            delitomap.setCenter(place.geometry.location);
            delitomap.setZoom(18);
        }
        /*geneero marcardor del lugar*/
        marcador_delito.setPosition(place.geometry.location);

        marcador_delito.addListener('click', function () {
            info.open(delitomap, marcador_delito);
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
        $('#latituddelito_delito').val(place.geometry.location.lat());
        $('#longituddelito_delito').val(place.geometry.location.lng());

        /*muestro informacion*/
        info.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        info.open(delitomap, marcador_delito);
    });

    marcador_delito.addListener('dragend', function (event)
    {


        $('#latituddelito_delito').val(this.getPosition().lat());
        $('#longituddelito_delito').val(this.getPosition().lng());

        var my_lat = $('#latituddelito_delito').val();
        var my_lng = $('#longituddelito_delito').val();
        var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

        geocoder_delito.geocode({'location': latlng}, function (results, status) {

            if (status === 'OK') {

                if (results[0]) {
                    // alert(results[0].formatted_address);

                    info.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                    $('#autocompletado_delito').val(results[0].formatted_address);
                    info.open(delitomap, marcador_delito);
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

function   start_mapdelito_persona() {

    delito = new google.maps.Map(document.getElementById('vistapersona_delito'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 13

    });

    var info = new google.maps.InfoWindow();
    /*Obtengo texto buscado*/
    var texto = document.getElementById('direccionpersona_delito');
    const marcador_delito = new google.maps.Marker({
        map: delito,
        draggable: true,
        animation: google.maps.Animation.DROP,
        mapTypeId: google.maps.MapTypeId.ROADMAP});
    /*creo variable para busqueda google*/
    const busca_delito = new google.maps.places.Autocomplete(texto);
    /*posiciono la busqueda en el mapa*/
    busca_delito.bindTo("bounds", delito);
    /*posiciono la busqueda en el mapa*/
    busca_delito.addListener('place_changed', function () {

        var place = busca_delito.getPlace();
        if (!place.geometry.viewport) {
            windows.alert("Error al mostrar el lugar");
        }
        if (place.geometry.viewport) {
            delito.fitBounds(place.geometry.viewport);
        } else {
            delito.setCenter(place.geometry.location);
            delito.setZoom(18);
        }
        /*geneero marcardor del lugar*/
        marcador_delito.setPosition(place.geometry.location);

        marcador_delito.addListener('click', function () {
            info.open(delito, marcador_delito);
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
        $('#latitudpersona_delito').val(place.geometry.location.lat());
        $('#longitudpersona_delito').val(place.geometry.location.lng());

        /*muestro informacion*/
        info.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        info.open(delito, marcador_delito);
    });

    marcador_delito.addListener('dragend', function (event)
    {


        $('#latitudpersona_delito').val(this.getPosition().lat());
        $('#longitudpersona_delito').val(this.getPosition().lng());

        var my_lat = $('#latitudpersona_delito').val();
        var my_lng = $('#longitudpersona_delito').val();
        var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

        geocoder_delito.geocode({'location': latlng}, function (results, status) {

            if (status === 'OK') {

                if (results[0]) {
                    // alert(results[0].formatted_address);

                    info.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                    $('#direccionpersona_delito').val(results[0].formatted_address);
                    info.open(delito, marcador_delito);
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

function get_locationdelito_per() {

    var info2 = new google.maps.InfoWindow();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            $('#latitudpersona_delito').val(position.coords.latitude);
            $('#longitudpersona_delito').val(position.coords.longitude);
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            const marker_delito = new google.maps.Marker({
                map: delito,
                draggable: true,
                animation: google.maps.Animation.DROP,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                position: pos
            });


            geocoder_delito.geocode({'location': pos}, function (results, status) {

                if (status === 'OK') {

                    if (results[0]) {
                        // alert(results[0].formatted_address);

                        info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                        $('#direccionpersona_delito').val(results[0].formatted_address);
                        info2.open(delito, marker_delito);

                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });






            marker_delito.addListener('dragend', function (event)
            {
                $('#latitudpersona_delito').val(this.getPosition().lat());
                $('#longitudpersona_delito').val(this.getPosition().lng());

                var my_lat = $('#latitudpersona_delito').val();
                var my_lng = $('#longitudpersona_delito').val();
                var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

                geocoder_delito.geocode({'location': latlng}, function (results, status) {

                    if (status === 'OK') {

                        if (results[0]) {
                            // alert(results[0].formatted_address);

                            info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                            $('#direccionpersona_delito').val(results[0].formatted_address);
                            info2.open(delito, marker_delito);

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

function geocodeLatLng_delito() {

    var geocoder = new google.maps.Geocoder;
    var infowindow = new google.maps.InfoWindow;
    persona = new google.maps.Map(document.getElementById('vistapersona'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 13,
        styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{color: '#263c3f'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#6b9a76'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#38414e'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{color: '#212a37'}]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{color: '#9ca5b3'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#746855'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#1f2835'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text.fill',
                stylers: [{color: '#f3d19c'}]
            },
            {
                featureType: 'transit',
                elementType: 'geometry',
                stylers: [{color: '#2f3948'}]
            },
            {
                featureType: 'transit.station',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{color: '#17263c'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#515c6d'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#17263c'}]
            }
        ]
    });









}

function get_locationdelito_2() {

    var info2 = new google.maps.InfoWindow();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            $('#latituddelito_delito').val(position.coords.latitude);
            $('#longituddelito_delito').val(position.coords.longitude);
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            const marker_delito = new google.maps.Marker({
                map: delitomap,
                draggable: true,
                animation: google.maps.Animation.DROP,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                position: pos
            });


            geocoder_delito.geocode({'location': pos}, function (results, status) {

                if (status === 'OK') {

                    if (results[0]) {
                        // alert(results[0].formatted_address);

                        info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                        $('#autocompletado_delito').val(results[0].formatted_address);
                        info2.open(delitomap, marker_delito);

                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });






            marker_delito.addListener('dragend', function (event)
            {
                $('#latituddelito_delito').val(this.getPosition().lat());
                $('#longituddelito_delito').val(this.getPosition().lng());

                var my_lat = $('#latituddelito_delito').val();
                var my_lng = $('#longituddelito_delito').val();
                var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

                geocoder_delito.geocode({'location': latlng}, function (results, status) {

                    if (status === 'OK') {

                        if (results[0]) {
                            // alert(results[0].formatted_address);

                            info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                            $('#autocompletado_delito').val(results[0].formatted_address);
                            info2.open(delitomap, marker_delito);

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

// Con esta función puedo marcar en el mapa la ubicación
function ponerpunto(lat, lng) {

    var info2 = new google.maps.InfoWindow();
    var end = new google.maps.LatLng(lat, lng);
    if (navigator.geolocation) {
        marker_delito = new google.maps.Marker({
            position: end,
            map: delito,
            title: 'Localizacion'
        });

        var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};


        geocoder.geocode({'location': latlng}, function (results, status) {

            if (status === 'OK') {

                if (results[0]) {
                    // alert(results[0].formatted_address);

                    info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                    $('#direccionpersona_delito').val(results[0].formatted_address);
                    info2.open(persona, marker_delito);

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
    marker_delito.setMap(null);

}
