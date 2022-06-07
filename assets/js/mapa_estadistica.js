var map;
var america_lat = -33.6060039;
var america_lng = -70.5846198;
var directionsDisplay = new google.maps.DirectionsRenderer({polylineOptions: {strokeColor: '#2E9AFE'}});
var directionsService = new google.maps.DirectionsService();
var GoogleMap = function () {};
var geocoder = new google.maps.Geocoder;
var circle = null;
var myPolygon = new google.maps.Polygon;

function limpiatexto() {
    var textarea = document.querySelector('#info');
    textarea.value = '';
}

function start_map() {
    circle = null;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 14,

    });


// con esto pongo el panel de herramientas
    var drawingManager = new google.maps.drawing.DrawingManager({
        // drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {

            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ["marker", "circle", "polygon"]
        },

//        markerOptions: {
//            icon:
//                    "http://192.168.8.146:8080/gespol/assets/images/icons/beachflag.png"
//
//        },
        circleOptions: {
            fillColor: "#FF0000",
            fillOpacity: 0.2,
            strokeWeight: 5,
            clickable: true,
            editable: true,
            draggable: true,
            zIndex: 1
        },
        polygonOptions: {

            draggable: true, // turn off if it gets annoying
            editable: true,
            strokeColor: 'blue',
            strokeOpacity: 0.9,
            strokeWeight: 2,
            fillColor: 'blue',
            fillOpacity: 0.1,

        }


    });



    drawingManager.setMap(map);




//
//
//    var cuadrante150 = [new google.maps.LatLng(-33.5942049, -70.5791282), new google.maps.LatLng(-33.5793326, -70.5817889), new google.maps.LatLng(-33.5834085, -70.6105422), new google.maps.LatLng(-33.5845525, -70.6105422), new google.maps.LatLng(-33.5875556, -70.6095123), new google.maps.LatLng(-33.5909875, -70.6079673), new google.maps.LatLng(-33.5925605, -70.6075381), new google.maps.LatLng(-33.5978511, -70.6065082), new google.maps.LatLng(-33.5977081, -70.6024741), new google.maps.LatLng(-33.5972076, -70.5981826), new google.maps.LatLng(-33.5967787, -70.5950069), new google.maps.LatLng(-33.5958493, -70.5905437), new google.maps.LatLng(-33.5952773, -70.5877113), new google.maps.LatLng(-33.5958493, -70.584793), new google.maps.LatLng(-33.5954918, -70.5811023), new google.maps.LatLng(-33.5942049, -70.5791282), ];
//    var cuadrante152 = [new google.maps.LatLng(-33.5981336, -70.5782128), new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.6122163, -70.5695439), new google.maps.LatLng(-33.6114123, -70.5640936), new google.maps.LatLng(-33.6102506, -70.5590726), new google.maps.LatLng(-33.6099202, -70.5550922), new google.maps.LatLng(-33.6100186, -70.5509402), new google.maps.LatLng(-33.6115015, -70.5427218), new google.maps.LatLng(-33.6003855, -70.5557681), new google.maps.LatLng(-33.5964535, -70.557828), new google.maps.LatLng(-33.5981336, -70.5782128), ];
//    var cuadrante151 = [new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.5942049, -70.5791282), new google.maps.LatLng(-33.5954918, -70.5811023), new google.maps.LatLng(-33.5958493, -70.584793), new google.maps.LatLng(-33.5952773, -70.5877113), new google.maps.LatLng(-33.5958493, -70.5905437), new google.maps.LatLng(-33.5967787, -70.5950069), new google.maps.LatLng(-33.5976366, -70.6029891), new google.maps.LatLng(-33.5978511, -70.6065082), new google.maps.LatLng(-33.6066136, -70.6039201), new google.maps.LatLng(-33.6087121, -70.6034728), new google.maps.LatLng(-33.6097613, -70.6032921), new google.maps.LatLng(-33.6112037, -70.6025964), new google.maps.LatLng(-33.6152219, -70.6005858), new google.maps.LatLng(-33.6152219, -70.5992126), new google.maps.LatLng(-33.61465, -70.595436), new google.maps.LatLng(-33.6144356, -70.5911445), new google.maps.LatLng(-33.6141497, -70.5873679), new google.maps.LatLng(-33.6136493, -70.5849647), new google.maps.LatLng(-33.6129345, -70.5800723), new google.maps.LatLng(-33.6123593, -70.5755092), ];
//    var cuadrante153 = [new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.625509, -70.5726657), new google.maps.LatLng(-33.6248301, -70.5693613), new google.maps.LatLng(-33.6252232, -70.5678592), new google.maps.LatLng(-33.6249373, -70.5669151), new google.maps.LatLng(-33.623222, -70.5665289), new google.maps.LatLng(-33.6214709, -70.566958), new google.maps.LatLng(-33.6201844, -70.5653272), new google.maps.LatLng(-33.6200415, -70.5637823), new google.maps.LatLng(-33.6204703, -70.5620657), new google.maps.LatLng(-33.6203989, -70.5596195), new google.maps.LatLng(-33.6208634, -70.5571733), new google.maps.LatLng(-33.6191481, -70.5515943), new google.maps.LatLng(-33.61843339, -70.5493627), new google.maps.LatLng(-33.6186477, -70.5470882), new google.maps.LatLng(-33.6180759, -70.5443845), new google.maps.LatLng(-33.6188979, -70.5424533), new google.maps.LatLng(-33.6115015, -70.5427218), new google.maps.LatLng(-33.6100186, -70.5509402), new google.maps.LatLng(-33.6099202, -70.5550922), new google.maps.LatLng(-33.6102506, -70.5590726), new google.maps.LatLng(-33.6114123, -70.5640936), new google.maps.LatLng(-33.6120718, -70.5685888), new google.maps.LatLng(-33.6123577, -70.5728803), new google.maps.LatLng(-33.6123593, -70.5755092), ];
//    var cuadrante153B = [new google.maps.LatLng(-33.6153291, -70.6002425), new google.maps.LatLng(-33.6381274, -70.5944489), new google.maps.LatLng(-33.6380917, -70.5919169), new google.maps.LatLng(-33.6373056, -70.5904149), new google.maps.LatLng(-33.6353047, -70.5889558), new google.maps.LatLng(-33.6318387, -70.589385), new google.maps.LatLng(-33.6307311, -70.5895566), new google.maps.LatLng(-33.6295877, -70.5896854), new google.maps.LatLng(-33.6286943, -70.5898141), new google.maps.LatLng(-33.627801, -70.5897712), new google.maps.LatLng(-33.6262823, -70.5901145), new google.maps.LatLng(-33.6256569, -70.5902432), new google.maps.LatLng(-33.6247586, -70.5903897), new google.maps.LatLng(-33.6210079, -70.5906154), new google.maps.LatLng(-33.618617, -70.5906724), new google.maps.LatLng(-33.6158294, -70.590887), new google.maps.LatLng(-33.6144356, -70.5911445), new google.maps.LatLng(-33.6146143, -70.5955647), new google.maps.LatLng(-33.6153291, -70.6002425), ];
//    var cuadrante154A = [new google.maps.LatLng(-33.6144356, -70.5911445), new google.maps.LatLng(-33.6177868, -70.5906514), new google.maps.LatLng(-33.6210079, -70.5906154), new google.maps.LatLng(-33.6242194, -70.5904368), new google.maps.LatLng(-33.6262823, -70.5901145), new google.maps.LatLng(-33.627801, -70.5897712), new google.maps.LatLng(-33.6286943, -70.5898141), new google.maps.LatLng(-33.6353047, -70.5889558), new google.maps.LatLng(-33.6344033, -70.5880335), new google.maps.LatLng(-33.6336887, -70.5864457), new google.maps.LatLng(-33.6334743, -70.5851582), new google.maps.LatLng(-33.6341174, -70.5843857), new google.maps.LatLng(-33.634832, -70.5829266), new google.maps.LatLng(-33.6349392, -70.5817679), new google.maps.LatLng(-33.6340817, -70.5805233), new google.maps.LatLng(-33.6320807, -70.5796221), new google.maps.LatLng(-33.6300083, -70.5790213), new google.maps.LatLng(-33.6286862, -70.5781201), new google.maps.LatLng(-33.6273997, -70.5769185), new google.maps.LatLng(-33.626828, -70.5755881), new google.maps.LatLng(-33.6264349, -70.5757168), new google.maps.LatLng(-33.625756, -70.5760172), new google.maps.LatLng(-33.6247197, -70.5754593), new google.maps.LatLng(-33.6238263, -70.5748585), new google.maps.LatLng(-33.6232188, -70.5740431), new google.maps.LatLng(-33.62279, -70.5734852), new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.6129621, -70.5797938), new google.maps.LatLng(-33.6134982, -70.5835703), new google.maps.LatLng(-33.6141497, -70.5873679), new google.maps.LatLng(-33.6144356, -70.5911445), ];
//    var cuadrante155A = [new google.maps.LatLng(-33.6255008, -70.6282514), new google.maps.LatLng(-33.6252864, -70.6264489), new google.maps.LatLng(-33.6260725, -70.6240457), new google.maps.LatLng(-33.6261625, -70.6216012), new google.maps.LatLng(-33.6261267, -70.618168), new google.maps.LatLng(-33.6256265, -70.6148206), new google.maps.LatLng(-33.6251976, -70.6107437), new google.maps.LatLng(-33.6245717, -70.6065362), new google.maps.LatLng(-33.6236426, -70.6051629), new google.maps.LatLng(-33.6234109, -70.5984699), new google.maps.LatLng(-33.6215169, -70.5988561), new google.maps.LatLng(-33.6181934, -70.5994998), new google.maps.LatLng(-33.615656, -70.6004011), new google.maps.LatLng(-33.6137975, -70.6016027), new google.maps.LatLng(-33.6111885, -70.6028901), new google.maps.LatLng(-33.6090441, -70.6035768), new google.maps.LatLng(-33.6066136, -70.6039201), new google.maps.LatLng(-33.6035397, -70.6046926), new google.maps.LatLng(-33.6008947, -70.6058942), new google.maps.LatLng(-33.5978511, -70.6065082), new google.maps.LatLng(-33.598178, -70.6088983), new google.maps.LatLng(-33.6016096, -70.607997), new google.maps.LatLng(-33.604612, -70.6268798), new google.maps.LatLng(-33.6185865, -70.6263219), new google.maps.LatLng(-33.6255008, -70.6282514), ];
//    var cuadrante159 = [new google.maps.LatLng(-33.5964535, -70.557828), new google.maps.LatLng(-33.6003855, -70.5557681), new google.maps.LatLng(-33.6115015, -70.5427218), new google.maps.LatLng(-33.6188979, -70.5424533), new google.maps.LatLng(-33.6200079, -70.5405069), new google.maps.LatLng(-33.6185784, -70.5361295), new google.maps.LatLng(-33.6151476, -70.5294347), new google.maps.LatLng(-33.6170774, -70.5268598), new google.maps.LatLng(-33.6162197, -70.5207658), new google.maps.LatLng(-33.6165771, -70.5192209), new google.maps.LatLng(-33.615219, -70.5177617), new google.maps.LatLng(-33.6132891, -70.5182767), new google.maps.LatLng(-33.6134321, -70.515616), new google.maps.LatLng(-33.6143613, -70.5149293), new google.maps.LatLng(-33.6141469, -70.5119253), new google.maps.LatLng(-33.6135036, -70.5113244), new google.maps.LatLng(-33.613575, -70.5091787), new google.maps.LatLng(-33.6126458, -70.5082345), new google.maps.LatLng(-33.6086429, -70.5077196), new google.maps.LatLng(-33.608214, -70.5064321), new google.maps.LatLng(-33.6081425, -70.5040288), new google.maps.LatLng(-33.6090717, -70.5024839), new google.maps.LatLng(-33.6087858, -70.4993082), new google.maps.LatLng(-33.6071417, -70.4975915), new google.maps.LatLng(-33.605569, -70.4981065), new google.maps.LatLng(-33.6045682, -70.5001665), new google.maps.LatLng(-33.6034959, -70.5012823), new google.maps.LatLng(-33.6021376, -70.5005098), new google.maps.LatLng(-33.6000645, -70.4959608), new google.maps.LatLng(-33.5974908, -70.4962182), new google.maps.LatLng(-33.5841564, -70.4972053), new google.maps.LatLng(-33.5811532, -70.5175043), new google.maps.LatLng(-33.5811175, -70.5200363), new google.maps.LatLng(-33.5799376, -70.543511), new google.maps.LatLng(-33.581046, -70.544498), new google.maps.LatLng(-33.5831911, -70.5460859), new google.maps.LatLng(-33.5838704, -70.5476308), new google.maps.LatLng(-33.5851575, -70.5486608), new google.maps.LatLng(-33.5868443, -70.5474081), new google.maps.LatLng(-33.5884888, -70.5490389), new google.maps.LatLng(-33.590026, -70.5508843), new google.maps.LatLng(-33.5920279, -70.5522147), new google.maps.LatLng(-33.5962461, -70.5550471), new google.maps.LatLng(-33.5964535, -70.557828), ];
//    var cuadrante160 = [new google.maps.LatLng(-33.561981, -70.5642387), new google.maps.LatLng(-33.5669874, -70.5631229), new google.maps.LatLng(-33.5719577, -70.5609342), new google.maps.LatLng(-33.5756087, -70.5599896), new google.maps.LatLng(-33.5796847, -70.5586592), new google.maps.LatLng(-33.5795774, -70.5514495), new google.maps.LatLng(-33.5835817, -70.5468575), new google.maps.LatLng(-33.5831911, -70.5460859), new google.maps.LatLng(-33.5799376, -70.543511), new google.maps.LatLng(-33.5811532, -70.5175043), new google.maps.LatLng(-33.5841564, -70.4972053), new google.maps.LatLng(-33.5780103, -70.4974687), new google.maps.LatLng(-33.5724363, -70.4991052), new google.maps.LatLng(-33.5664372, -70.4975718), new google.maps.LatLng(-33.5633071, -70.4934755), new google.maps.LatLng(-33.5584776, -70.4907766), new google.maps.LatLng(-33.551108, -70.4915588), new google.maps.LatLng(-33.5406618, -70.4993013), new google.maps.LatLng(-33.546957, -70.5308012), new google.maps.LatLng(-33.5494607, -70.5379681), new google.maps.LatLng(-33.5496754, -70.543826), new google.maps.LatLng(-33.5513205, -70.5467657), new google.maps.LatLng(-33.5493534, -70.5481819), new google.maps.LatLng(-33.5482089, -70.5497269), new google.maps.LatLng(-33.547887, -70.5517439), new google.maps.LatLng(-33.5479227, -70.5541043), new google.maps.LatLng(-33.5476008, -70.5681376), new google.maps.LatLng(-33.5608693, -70.5573658), new google.maps.LatLng(-33.561981, -70.5642387), ];
//    var cuadrante268 = [new google.maps.LatLng(-33.5969903, -70.5659986), new google.maps.LatLng(-33.59506, -70.5668569), new google.maps.LatLng(-33.5926292, -70.5663419), new google.maps.LatLng(-33.588452, -70.5676462), new google.maps.LatLng(-33.5854132, -70.5682041), new google.maps.LatLng(-33.5852702, -70.5632689), new google.maps.LatLng(-33.5799788, -70.5635693), new google.maps.LatLng(-33.5759744, -70.5645992), new google.maps.LatLng(-33.5767252, -70.570307), new google.maps.LatLng(-33.5771543, -70.5751993), new google.maps.LatLng(-33.575438, -70.5802633), new google.maps.LatLng(-33.5739363, -70.5806925), new google.maps.LatLng(-33.5740793, -70.5828383), new google.maps.LatLng(-33.5981336, -70.5782128), new google.maps.LatLng(-33.5969903, -70.5659986), ];
//    var cuadrante270 = [new google.maps.LatLng(-33.5756087, -70.5599896), new google.maps.LatLng(-33.5719577, -70.5609342), new google.maps.LatLng(-33.5669874, -70.5631229), new google.maps.LatLng(-33.561981, -70.5642387), new google.maps.LatLng(-33.5656643, -70.5845806), new google.maps.LatLng(-33.5740793, -70.5828383), new google.maps.LatLng(-33.5739363, -70.5806925), new google.maps.LatLng(-33.575438, -70.5802633), new google.maps.LatLng(-33.5771543, -70.5751993), new google.maps.LatLng(-33.5766774, -70.5695173), new google.maps.LatLng(-33.5759744, -70.5645992), new google.maps.LatLng(-33.5756087, -70.5599896), ];
//    var cuadrante271 = [new google.maps.LatLng(-33.5688562, -70.5839347), new google.maps.LatLng(-33.5698932, -70.5922603), new google.maps.LatLng(-33.570215, -70.5924749), new google.maps.LatLng(-33.5676762, -70.5981826), new google.maps.LatLng(-33.5671398, -70.5992984), new google.maps.LatLng(-33.5674258, -70.6008863), new google.maps.LatLng(-33.570358, -70.612688), new google.maps.LatLng(-33.5834085, -70.6105422), new google.maps.LatLng(-33.5822286, -70.6029033), new google.maps.LatLng(-33.5814778, -70.5973672), new google.maps.LatLng(-33.5793326, -70.5817889), new google.maps.LatLng(-33.5688562, -70.5839347), ];
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante150,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//
//    var mapLabel = new MapLabel({
//        text: 'Cuadrante 150',
//        position: new google.maps.LatLng(-33.58813074148068, -70.58449105396728),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//
//
//    myPolygon.setMap(map);
//
//
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante152,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//
//    var mapLabel = new MapLabel({
//        text: 'Cuadrante 152',
//        position: new google.maps.LatLng(-33.604860128798464, -70.55359200611572),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//
//
//    myPolygon.setMap(map);
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante151,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//
//    var mapLabel = new MapLabel({
//        text: 'Cuadrante 151',
//        position: new google.maps.LatLng(-33.60435972412661, -70.58019951954346),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//
//    myPolygon.setMap(map);
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante153,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//    var mapLabel = new MapLabel({
//        text: 'Cuadrante 153',
//        position: new google.maps.LatLng(-33.614367265742054, -70.54912881031494),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//
//    myPolygon.setMap(map);
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante153B,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//    var mapLabel = new MapLabel({
//        text: 'C.153B',
//        position: new google.maps.LatLng(-33.623658942638414, -70.59144333973389),
//        map: map,
//        fontSize: 20,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante154A,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//    var mapLabel = new MapLabel({
//        text: 'Cuadrante 154',
//        position: new google.maps.LatLng(-33.62501687303843, -70.57633713856201),
//        map: map,
//        fontSize: 24,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante155A,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//     var mapLabel = new MapLabel({
//        text: 'Cuadrante 155',
//        position: new google.maps.LatLng(-33.6110792016468, -70.6060345567749),
//        map: map,
//        fontSize: 24,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante159,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//      var mapLabel = new MapLabel({
//        text: 'Cuadrante 159',
//        position: new google.maps.LatLng(-33.59584699253923, -70.5124034603258),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante160,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//       var mapLabel = new MapLabel({
//        text: 'Cuadrante 160',
//        position: new google.maps.LatLng(-33.562781327281286, -70.51401377253494),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante268,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//       var mapLabel = new MapLabel({
//        text: 'Cuadrante 268',
//        position: new google.maps.LatLng(-33.58133797015309, -70.56586579456787),
//        map: map,
//        fontSize: 25,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante270,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//       var mapLabel = new MapLabel({
//        text: 'Cuadrante 270',
//        position: new google.maps.LatLng(-33.570825996469104, -70.56277588978271),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//
//    myPolygon = new google.maps.Polygon({
//        paths: cuadrante271,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//        var mapLabel = new MapLabel({
//        text: 'Cuadrante 271',
//        position: new google.maps.LatLng(-33.574089299975036, -70.5896852675126),
//        map: map,
//        fontSize: 35,
//        align: 'right'
//    });
//    myPolygon.setMap(map);
//
//
//
//
//
//
//
//
//
//


















    var htmlStr = "";
    var coordinates = "";


//    
    google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {


        var coordinates = (polygon.getPath().getLength());


        for (var i = 0; i < coordinates; i++) {
            htmlStr += "new google.maps.LatLng(" + polygon.getPath().getAt(i).toUrlValue(5) + "), ";
            //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
            //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
        }

        google.maps.event.addListener(myPolygon.getPath(), "insert_at", coordinates);
        //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
        google.maps.event.addListener(myPolygon.getPath(), "set_at", coordinates);
        document.getElementById('infopoligono').innerHTML = htmlStr;


        google.maps.event.addListener(polygon.getPath(), "insert_at", getPolygonCoords);
        google.maps.event.addListener(polygon.getPath(), "remove_at", getPolygonCoords);
        google.maps.event.addListener(polygon.getPath(), "set_at", getPolygonCoords);

        //Display Coordinates below map
        function getPolygonCoords() {
            var len = polygon.getPath().getLength();
            var htmlStr = "";
            for (var i = 0; i < len; i++) {
                htmlStr += "new google.maps.LatLng(" + polygon.getPath().getAt(i).toUrlValue(5) + "), ";
                //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
                //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
            }
            document.getElementById('infopoligono').innerHTML = htmlStr;
        }
        function copyToClipboard(text) {
            window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
        }


    });


    var triangleCoords = [

        new google.maps.LatLng(-33.58136, -70.58524), new google.maps.LatLng(-33.59023, -70.58455), new google.maps.LatLng(-33.58844, -70.5679), new google.maps.LatLng(-33.58115, -70.56781),
    ];
    myPolygon = new google.maps.Polygon({
        paths: triangleCoords,
        draggable: true, // turn off if it gets annoying
        editable: true,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });


    myPolygon.setMap(map);
//
    myPolygon.addListener('dragend', function (event) {


        var coordinates = (myPolygon.getPath().getLength());


        for (var i = 0; i < coordinates; i++) {
            htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(5) + "), ";

        }


        google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
        google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
        google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);

        //Display Coordinates below map
        function getPolygonCoords() {
            var len = myPolygon.getPath().getLength();
            var htmlStr = "";
            for (var i = 0; i < len; i++) {
                htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(5) + "), ";
                //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
                //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
            }
            document.getElementById('infocirculo').innerHTML = htmlStr;
        }
        function copyToClipboard(text) {
            window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
        }


    });
//
//myPolygon.addListener('click', function (event){
// var coordinates = (myPolygon.getPath().getLength());
//
//
//        for (var i = 0; i < coordinates; i++) {
//            htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(5) + "), ";
//            //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
//            //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
//        }
//        
//    
//        google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
//        google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
//        google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
//        
//         //Display Coordinates below map
//        function getPolygonCoords() {
//            var len = myPolygon.getPath().getLength();
//            var htmlStr = "";
//            for (var i = 0; i < len; i++) {
//                htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(5) + "), ";
//                //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
//                //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
//            }
//            document.getElementById('infopoligono').innerHTML = htmlStr;
//        }
//        function copyToClipboard(text) {
//            window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
//        }
//});


//    
//      google.maps.event.addListener(drawingManager, 'polygondragend', function (polygon) {
//
//alert("llega");
//        var coordinates = (polygon.getPath().getLength());
//
//
//        for (var i = 0; i < coordinates; i++) {
//            htmlStr += "new google.maps.LatLng(" + polygon.getPath().getAt(i).toUrlValue(5) + "), ";
//            //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
//            //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
//        }
//
//
//        document.getElementById('info').innerHTML = htmlStr;
//        
//         
//    });
//    


    //google.maps.event.addListener(myPolygon, "dragend", getPolygonCoords);
//

//
//    google.maps.event.addDomListener(document.getElementById('CoordsButton'), 'click', getCoordinates);


//    var triangleCoords = [
//       new google.maps.LatLng(-33.59257,-70.6079), new google.maps.LatLng(-33.58305,-70.61048), new google.maps.LatLng(-33.57934,-70.58191), new google.maps.LatLng(-33.59432,-70.579), new google.maps.LatLng(-33.59459,-70.58007), new google.maps.LatLng(-33.59541,-70.58101), new google.maps.LatLng(-33.59575,-70.58401), new google.maps.LatLng(-33.59543,-70.5853), new google.maps.LatLng(-33.59528,-70.5868), new google.maps.LatLng(-33.59568,-70.59027), new google.maps.LatLng(-33.59601,-70.5924), new google.maps.LatLng(-33.59646,-70.59401), new google.maps.LatLng(-33.59673,-70.59506), new google.maps.LatLng(-33.5969,-70.59612), new google.maps.LatLng(-33.59697,-70.59713), new google.maps.LatLng(-33.59712,-70.59984), new google.maps.LatLng(-33.59795,-70.6065), 
//    ];
//    myPolygon = new google.maps.Polygon({
//        paths: triangleCoords,
//        draggable: true, // turn off if it gets annoying
//        editable: true,
//        strokeColor: 'blue',
//        strokeOpacity: 0.8,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.35
//    });
//    myPolygon.setMap(map);
//



//
//    var triangleCoords = [
//
//        new google.maps.LatLng(-33.58136,-70.58524), new google.maps.LatLng(-33.59023,-70.58455), new google.maps.LatLng(-33.58844,-70.5679), new google.maps.LatLng(-33.58115,-70.56781), 
//    
//    
//    ];
//    myPolygon = new google.maps.Polygon({
//        paths: triangleCoords,
//        draggable: false, // turn off if it gets annoying
//        editable: false,
//        strokeColor: 'blue',
//        strokeOpacity: 0.9,
//        strokeWeight: 2,
//        fillColor: 'blue',
//        fillOpacity: 0.1
//    });
//    myPolygon.setMap(map);
//
//
//
//







//
//
//
//    google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
//    //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
//    google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
//
//
//
//
//
    google.maps.event.addDomListener(drawingManager, 'overlaycomplete', function (event) {
//
        if (event.type === 'circle') {

            var center = event.overlay.getCenter();


//            alert(event.overlay.getRadius());
//            alert(center.lat());
//            alert(center.lng());


            circle = {
                radius: event.overlay.getRadius(),
                center: {
                    lat: center.lat(),
                    lng: center.lng()
                }
            },
                    alert(center + "-" + event.overlay.getRadius());

            document.getElementById('infocirculo').innerHTML = center + "-" + event.overlay.getRadius();
        }



    });



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
//    var info = new google.maps.InfoWindow();
//    /*Obtengo texto buscado*/
//    var texto = document.getElementById('direccionpersona');
//    const marcador = new google.maps.Marker({
//        map: map,
//        draggable: true,
//        animation: google.maps.Animation.DROP,
//        mapTypeId: google.maps.MapTypeId.ROADMAP}
//    );
//    marcador.setIcon('../assets/images/fondos/almacen.png');
//    /*creo variable para busqueda google*/
////    const busca = new google.maps.places.Autocomplete(texto);
//    /*posiciono la busqueda en el mapa*/
//    busca.bindTo("bounds", map);
//    /*posiciono la busqueda en el mapa*/
//    busca.addListener('place_changed', function () {
//
//        var place = busca.getPlace();
//        if (!place.geometry.viewport) {
//            windows.alert("Error al mostrar el lugar");
//        }
//        if (place.geometry.viewport) {
//            map.fitBounds(place.geometry.viewport);
//        } else {
//            map.setCenter(place.geometry.location);
//            map.setZoom(18);
//        }
//        /*geneero marcardor del lugar*/
//        marcador.setPosition(place.geometry.location);
//
////        marcador.addListener('click', function () {
////            info.open(persona, marcador);
////        });
//
//
//
//
//        var address = "";
//        /*obtengo detalles de la direccion*/
//        if (place.address_components) {
//            address = [
//                (place.address_components[0] && place.address_components[0].short_name || ''),
//                (place.address_components[1] && place.address_components[1].short_name || ''),
//                (place.address_components[2] && place.address_components[2].short_name || ''),
//            ];
//        }
//
////        /*asigno a variables*/
////        $('#latitudpersona').val(place.geometry.location.lat());
////        $('#longitudpersona').val(place.geometry.location.lng());
//
//        /*muestro informacion*/
//        info.setContent('<div><strong>' + place.name + '</strong><br>' + address);
//        info.open(map, marcador);
//    });
//
//    marcador.addListener('dragend', function (event)
//    {
//
//
//        var my_lat = this.getPosition().lat();
//        var my_lng = this.getPosition().lng();
//
//        var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};
//
//        geocoder.geocode({'location': latlng}, function (results, status) {
//
//            if (status === 'OK') {
//
//                if (results[0]) {
//                    // alert(results[0].formatted_address);
//
//                    info.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');
//
//                    $('#direccionpersona').val(results[0].formatted_address);
//
//
//                    info.open(map, marcador);
//
//
//                } else {
//                    window.alert('No results found');
//                }
//            } else {
//                window.alert('Geocoder failed due to: ' + status);
//            }
//        });
//
//
//    });
//
//



















}





function start_estadistica() {
    circle = null;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 14,

    });


//    var triangleCoords = [
//        new google.maps.LatLng(-33.59257, -70.6079), new google.maps.LatLng(-33.58305, -70.61048), new google.maps.LatLng(-33.57934, -70.58191), new google.maps.LatLng(-33.59432, -70.579), new google.maps.LatLng(-33.59459, -70.58007), new google.maps.LatLng(-33.59541, -70.58101), new google.maps.LatLng(-33.59575, -70.58401), new google.maps.LatLng(-33.59543, -70.5853), new google.maps.LatLng(-33.59528, -70.5868), new google.maps.LatLng(-33.59568, -70.59027), new google.maps.LatLng(-33.59601, -70.5924), new google.maps.LatLng(-33.59646, -70.59401), new google.maps.LatLng(-33.59673, -70.59506), new google.maps.LatLng(-33.5969, -70.59612), new google.maps.LatLng(-33.59697, -70.59713), new google.maps.LatLng(-33.59712, -70.59984), new google.maps.LatLng(-33.59795, -70.6065),
//    ];
//    



    var cuadrante150 = [new google.maps.LatLng(-33.5942049, -70.5791282), new google.maps.LatLng(-33.5793326, -70.5817889), new google.maps.LatLng(-33.5834085, -70.6105422), new google.maps.LatLng(-33.5845525, -70.6105422), new google.maps.LatLng(-33.5875556, -70.6095123), new google.maps.LatLng(-33.5909875, -70.6079673), new google.maps.LatLng(-33.5925605, -70.6075381), new google.maps.LatLng(-33.5978511, -70.6065082), new google.maps.LatLng(-33.5977081, -70.6024741), new google.maps.LatLng(-33.5972076, -70.5981826), new google.maps.LatLng(-33.5967787, -70.5950069), new google.maps.LatLng(-33.5958493, -70.5905437), new google.maps.LatLng(-33.5952773, -70.5877113), new google.maps.LatLng(-33.5958493, -70.584793), new google.maps.LatLng(-33.5954918, -70.5811023), new google.maps.LatLng(-33.5942049, -70.5791282), ];
    var cuadrante152 = [new google.maps.LatLng(-33.5981336, -70.5782128), new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.6122163, -70.5695439), new google.maps.LatLng(-33.6114123, -70.5640936), new google.maps.LatLng(-33.6102506, -70.5590726), new google.maps.LatLng(-33.6099202, -70.5550922), new google.maps.LatLng(-33.6100186, -70.5509402), new google.maps.LatLng(-33.6115015, -70.5427218), new google.maps.LatLng(-33.6003855, -70.5557681), new google.maps.LatLng(-33.5964535, -70.557828), new google.maps.LatLng(-33.5981336, -70.5782128), ];
    var cuadrante151 = [new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.5942049, -70.5791282), new google.maps.LatLng(-33.5954918, -70.5811023), new google.maps.LatLng(-33.5958493, -70.584793), new google.maps.LatLng(-33.5952773, -70.5877113), new google.maps.LatLng(-33.5958493, -70.5905437), new google.maps.LatLng(-33.5967787, -70.5950069), new google.maps.LatLng(-33.5976366, -70.6029891), new google.maps.LatLng(-33.5978511, -70.6065082), new google.maps.LatLng(-33.6066136, -70.6039201), new google.maps.LatLng(-33.6087121, -70.6034728), new google.maps.LatLng(-33.6097613, -70.6032921), new google.maps.LatLng(-33.6112037, -70.6025964), new google.maps.LatLng(-33.6152219, -70.6005858), new google.maps.LatLng(-33.6152219, -70.5992126), new google.maps.LatLng(-33.61465, -70.595436), new google.maps.LatLng(-33.6144356, -70.5911445), new google.maps.LatLng(-33.6141497, -70.5873679), new google.maps.LatLng(-33.6136493, -70.5849647), new google.maps.LatLng(-33.6129345, -70.5800723), new google.maps.LatLng(-33.6123593, -70.5755092), ];
    var cuadrante153 = [new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.625509, -70.5726657), new google.maps.LatLng(-33.6248301, -70.5693613), new google.maps.LatLng(-33.6252232, -70.5678592), new google.maps.LatLng(-33.6249373, -70.5669151), new google.maps.LatLng(-33.623222, -70.5665289), new google.maps.LatLng(-33.6214709, -70.566958), new google.maps.LatLng(-33.6201844, -70.5653272), new google.maps.LatLng(-33.6200415, -70.5637823), new google.maps.LatLng(-33.6204703, -70.5620657), new google.maps.LatLng(-33.6203989, -70.5596195), new google.maps.LatLng(-33.6208634, -70.5571733), new google.maps.LatLng(-33.6191481, -70.5515943), new google.maps.LatLng(-33.61843339, -70.5493627), new google.maps.LatLng(-33.6186477, -70.5470882), new google.maps.LatLng(-33.6180759, -70.5443845), new google.maps.LatLng(-33.6188979, -70.5424533), new google.maps.LatLng(-33.6115015, -70.5427218), new google.maps.LatLng(-33.6100186, -70.5509402), new google.maps.LatLng(-33.6099202, -70.5550922), new google.maps.LatLng(-33.6102506, -70.5590726), new google.maps.LatLng(-33.6114123, -70.5640936), new google.maps.LatLng(-33.6120718, -70.5685888), new google.maps.LatLng(-33.6123577, -70.5728803), new google.maps.LatLng(-33.6123593, -70.5755092), ];
    var cuadrante153B = [new google.maps.LatLng(-33.6153291, -70.6002425), new google.maps.LatLng(-33.6381274, -70.5944489), new google.maps.LatLng(-33.6380917, -70.5919169), new google.maps.LatLng(-33.6373056, -70.5904149), new google.maps.LatLng(-33.6353047, -70.5889558), new google.maps.LatLng(-33.6318387, -70.589385), new google.maps.LatLng(-33.6307311, -70.5895566), new google.maps.LatLng(-33.6295877, -70.5896854), new google.maps.LatLng(-33.6286943, -70.5898141), new google.maps.LatLng(-33.627801, -70.5897712), new google.maps.LatLng(-33.6262823, -70.5901145), new google.maps.LatLng(-33.6256569, -70.5902432), new google.maps.LatLng(-33.6247586, -70.5903897), new google.maps.LatLng(-33.6210079, -70.5906154), new google.maps.LatLng(-33.618617, -70.5906724), new google.maps.LatLng(-33.6158294, -70.590887), new google.maps.LatLng(-33.6144356, -70.5911445), new google.maps.LatLng(-33.6146143, -70.5955647), new google.maps.LatLng(-33.6153291, -70.6002425), ];
    var cuadrante154A = [new google.maps.LatLng(-33.6144356, -70.5911445), new google.maps.LatLng(-33.6177868, -70.5906514), new google.maps.LatLng(-33.6210079, -70.5906154), new google.maps.LatLng(-33.6242194, -70.5904368), new google.maps.LatLng(-33.6262823, -70.5901145), new google.maps.LatLng(-33.627801, -70.5897712), new google.maps.LatLng(-33.6286943, -70.5898141), new google.maps.LatLng(-33.6353047, -70.5889558), new google.maps.LatLng(-33.6344033, -70.5880335), new google.maps.LatLng(-33.6336887, -70.5864457), new google.maps.LatLng(-33.6334743, -70.5851582), new google.maps.LatLng(-33.6341174, -70.5843857), new google.maps.LatLng(-33.634832, -70.5829266), new google.maps.LatLng(-33.6349392, -70.5817679), new google.maps.LatLng(-33.6340817, -70.5805233), new google.maps.LatLng(-33.6320807, -70.5796221), new google.maps.LatLng(-33.6300083, -70.5790213), new google.maps.LatLng(-33.6286862, -70.5781201), new google.maps.LatLng(-33.6273997, -70.5769185), new google.maps.LatLng(-33.626828, -70.5755881), new google.maps.LatLng(-33.6264349, -70.5757168), new google.maps.LatLng(-33.625756, -70.5760172), new google.maps.LatLng(-33.6247197, -70.5754593), new google.maps.LatLng(-33.6238263, -70.5748585), new google.maps.LatLng(-33.6232188, -70.5740431), new google.maps.LatLng(-33.62279, -70.5734852), new google.maps.LatLng(-33.6123593, -70.5755092), new google.maps.LatLng(-33.6129621, -70.5797938), new google.maps.LatLng(-33.6134982, -70.5835703), new google.maps.LatLng(-33.6141497, -70.5873679), new google.maps.LatLng(-33.6144356, -70.5911445), ];
    var cuadrante155A = [new google.maps.LatLng(-33.6255008, -70.6282514), new google.maps.LatLng(-33.6252864, -70.6264489), new google.maps.LatLng(-33.6260725, -70.6240457), new google.maps.LatLng(-33.6261625, -70.6216012), new google.maps.LatLng(-33.6261267, -70.618168), new google.maps.LatLng(-33.6256265, -70.6148206), new google.maps.LatLng(-33.6251976, -70.6107437), new google.maps.LatLng(-33.6245717, -70.6065362), new google.maps.LatLng(-33.6236426, -70.6051629), new google.maps.LatLng(-33.6234109, -70.5984699), new google.maps.LatLng(-33.6215169, -70.5988561), new google.maps.LatLng(-33.6181934, -70.5994998), new google.maps.LatLng(-33.615656, -70.6004011), new google.maps.LatLng(-33.6137975, -70.6016027), new google.maps.LatLng(-33.6111885, -70.6028901), new google.maps.LatLng(-33.6090441, -70.6035768), new google.maps.LatLng(-33.6066136, -70.6039201), new google.maps.LatLng(-33.6035397, -70.6046926), new google.maps.LatLng(-33.6008947, -70.6058942), new google.maps.LatLng(-33.5978511, -70.6065082), new google.maps.LatLng(-33.598178, -70.6088983), new google.maps.LatLng(-33.6016096, -70.607997), new google.maps.LatLng(-33.604612, -70.6268798), new google.maps.LatLng(-33.6185865, -70.6263219), new google.maps.LatLng(-33.6255008, -70.6282514), ];
    var cuadrante159 = [new google.maps.LatLng(-33.5964535, -70.557828), new google.maps.LatLng(-33.6003855, -70.5557681), new google.maps.LatLng(-33.6115015, -70.5427218), new google.maps.LatLng(-33.6188979, -70.5424533), new google.maps.LatLng(-33.6200079, -70.5405069), new google.maps.LatLng(-33.6185784, -70.5361295), new google.maps.LatLng(-33.6151476, -70.5294347), new google.maps.LatLng(-33.6170774, -70.5268598), new google.maps.LatLng(-33.6162197, -70.5207658), new google.maps.LatLng(-33.6165771, -70.5192209), new google.maps.LatLng(-33.615219, -70.5177617), new google.maps.LatLng(-33.6132891, -70.5182767), new google.maps.LatLng(-33.6134321, -70.515616), new google.maps.LatLng(-33.6143613, -70.5149293), new google.maps.LatLng(-33.6141469, -70.5119253), new google.maps.LatLng(-33.6135036, -70.5113244), new google.maps.LatLng(-33.613575, -70.5091787), new google.maps.LatLng(-33.6126458, -70.5082345), new google.maps.LatLng(-33.6086429, -70.5077196), new google.maps.LatLng(-33.608214, -70.5064321), new google.maps.LatLng(-33.6081425, -70.5040288), new google.maps.LatLng(-33.6090717, -70.5024839), new google.maps.LatLng(-33.6087858, -70.4993082), new google.maps.LatLng(-33.6071417, -70.4975915), new google.maps.LatLng(-33.605569, -70.4981065), new google.maps.LatLng(-33.6045682, -70.5001665), new google.maps.LatLng(-33.6034959, -70.5012823), new google.maps.LatLng(-33.6021376, -70.5005098), new google.maps.LatLng(-33.6000645, -70.4959608), new google.maps.LatLng(-33.5974908, -70.4962182), new google.maps.LatLng(-33.5841564, -70.4972053), new google.maps.LatLng(-33.5811532, -70.5175043), new google.maps.LatLng(-33.5811175, -70.5200363), new google.maps.LatLng(-33.5799376, -70.543511), new google.maps.LatLng(-33.581046, -70.544498), new google.maps.LatLng(-33.5831911, -70.5460859), new google.maps.LatLng(-33.5838704, -70.5476308), new google.maps.LatLng(-33.5851575, -70.5486608), new google.maps.LatLng(-33.5868443, -70.5474081), new google.maps.LatLng(-33.5884888, -70.5490389), new google.maps.LatLng(-33.590026, -70.5508843), new google.maps.LatLng(-33.5920279, -70.5522147), new google.maps.LatLng(-33.5962461, -70.5550471), new google.maps.LatLng(-33.5964535, -70.557828), ];
    var cuadrante160 = [new google.maps.LatLng(-33.561981, -70.5642387), new google.maps.LatLng(-33.5669874, -70.5631229), new google.maps.LatLng(-33.5719577, -70.5609342), new google.maps.LatLng(-33.5756087, -70.5599896), new google.maps.LatLng(-33.5796847, -70.5586592), new google.maps.LatLng(-33.5795774, -70.5514495), new google.maps.LatLng(-33.5835817, -70.5468575), new google.maps.LatLng(-33.5831911, -70.5460859), new google.maps.LatLng(-33.5799376, -70.543511), new google.maps.LatLng(-33.5811532, -70.5175043), new google.maps.LatLng(-33.5841564, -70.4972053), new google.maps.LatLng(-33.5780103, -70.4974687), new google.maps.LatLng(-33.5724363, -70.4991052), new google.maps.LatLng(-33.5664372, -70.4975718), new google.maps.LatLng(-33.5633071, -70.4934755), new google.maps.LatLng(-33.5584776, -70.4907766), new google.maps.LatLng(-33.551108, -70.4915588), new google.maps.LatLng(-33.5406618, -70.4993013), new google.maps.LatLng(-33.546957, -70.5308012), new google.maps.LatLng(-33.5494607, -70.5379681), new google.maps.LatLng(-33.5496754, -70.543826), new google.maps.LatLng(-33.5513205, -70.5467657), new google.maps.LatLng(-33.5493534, -70.5481819), new google.maps.LatLng(-33.5482089, -70.5497269), new google.maps.LatLng(-33.547887, -70.5517439), new google.maps.LatLng(-33.5479227, -70.5541043), new google.maps.LatLng(-33.5476008, -70.5681376), new google.maps.LatLng(-33.5608693, -70.5573658), new google.maps.LatLng(-33.561981, -70.5642387), ];
    var cuadrante268 = [new google.maps.LatLng(-33.5969903, -70.5659986), new google.maps.LatLng(-33.59506, -70.5668569), new google.maps.LatLng(-33.5926292, -70.5663419), new google.maps.LatLng(-33.588452, -70.5676462), new google.maps.LatLng(-33.5854132, -70.5682041), new google.maps.LatLng(-33.5852702, -70.5632689), new google.maps.LatLng(-33.5799788, -70.5635693), new google.maps.LatLng(-33.5759744, -70.5645992), new google.maps.LatLng(-33.5767252, -70.570307), new google.maps.LatLng(-33.5771543, -70.5751993), new google.maps.LatLng(-33.575438, -70.5802633), new google.maps.LatLng(-33.5739363, -70.5806925), new google.maps.LatLng(-33.5740793, -70.5828383), new google.maps.LatLng(-33.5981336, -70.5782128), new google.maps.LatLng(-33.5969903, -70.5659986), ];
    var cuadrante270 = [new google.maps.LatLng(-33.5756087, -70.5599896), new google.maps.LatLng(-33.5719577, -70.5609342), new google.maps.LatLng(-33.5669874, -70.5631229), new google.maps.LatLng(-33.561981, -70.5642387), new google.maps.LatLng(-33.5656643, -70.5845806), new google.maps.LatLng(-33.5740793, -70.5828383), new google.maps.LatLng(-33.5739363, -70.5806925), new google.maps.LatLng(-33.575438, -70.5802633), new google.maps.LatLng(-33.5771543, -70.5751993), new google.maps.LatLng(-33.5766774, -70.5695173), new google.maps.LatLng(-33.5759744, -70.5645992), new google.maps.LatLng(-33.5756087, -70.5599896), ];
    var cuadrante271 = [new google.maps.LatLng(-33.5688562, -70.5839347), new google.maps.LatLng(-33.5698932, -70.5922603), new google.maps.LatLng(-33.570215, -70.5924749), new google.maps.LatLng(-33.5676762, -70.5981826), new google.maps.LatLng(-33.5671398, -70.5992984), new google.maps.LatLng(-33.5674258, -70.6008863), new google.maps.LatLng(-33.570358, -70.612688), new google.maps.LatLng(-33.5834085, -70.6105422), new google.maps.LatLng(-33.5822286, -70.6029033), new google.maps.LatLng(-33.5814778, -70.5973672), new google.maps.LatLng(-33.5793326, -70.5817889), new google.maps.LatLng(-33.5688562, -70.5839347), ];


    myPolygon = new google.maps.Polygon({
        paths: cuadrante150,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });

    var mapLabel = new MapLabel({
        text: '150',
        position: new google.maps.LatLng(-33.58813074148068, -70.58449105396728),
        map: map,
        fontSize: 35,
        align: 'right'
    });


    myPolygon.setMap(map);




    myPolygon = new google.maps.Polygon({
        paths: cuadrante152,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });

    var mapLabel = new MapLabel({
        text: '152',
        position: new google.maps.LatLng(-33.604860128798464, -70.55359200611572),
        map: map,
        fontSize: 35,
        align: 'right'
    });


    myPolygon.setMap(map);

    myPolygon = new google.maps.Polygon({
        paths: cuadrante151,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });

    var mapLabel = new MapLabel({
        text: '151',
        position: new google.maps.LatLng(-33.60435972412661, -70.58019951954346),
        map: map,
        fontSize: 35,
        align: 'right'
    });

    myPolygon.setMap(map);

    myPolygon = new google.maps.Polygon({
        paths: cuadrante153,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
    var mapLabel = new MapLabel({
        text: '153',
        position: new google.maps.LatLng(-33.614367265742054, -70.54912881031494),
        map: map,
        fontSize: 35,
        align: 'right'
    });

    myPolygon.setMap(map);

    myPolygon = new google.maps.Polygon({
        paths: cuadrante153B,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
    var mapLabel = new MapLabel({
        text: '153B',
        position: new google.maps.LatLng(-33.623658942638414, -70.59144333973389),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);


    myPolygon = new google.maps.Polygon({
        paths: cuadrante154A,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
    var mapLabel = new MapLabel({
        text: '154',
        position: new google.maps.LatLng(-33.62501687303843, -70.57633713856201),
        map: map,
        fontSize:35,
        align: 'right'
    });
    myPolygon.setMap(map);



    myPolygon = new google.maps.Polygon({
        paths: cuadrante155A,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
     var mapLabel = new MapLabel({
        text: '155',
        position: new google.maps.LatLng(-33.6110792016468, -70.6060345567749),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);

    myPolygon = new google.maps.Polygon({
        paths: cuadrante159,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
      var mapLabel = new MapLabel({
        text: '159',
        position: new google.maps.LatLng(-33.59584699253923, -70.5124034603258),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);


    myPolygon = new google.maps.Polygon({
        paths: cuadrante160,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
       var mapLabel = new MapLabel({
        text: '160',
        position: new google.maps.LatLng(-33.562781327281286, -70.51401377253494),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);

    myPolygon = new google.maps.Polygon({
        paths: cuadrante268,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
       var mapLabel = new MapLabel({
        text: '268',
        position: new google.maps.LatLng(-33.58133797015309, -70.56586579456787),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);


    myPolygon = new google.maps.Polygon({
        paths: cuadrante270,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
       var mapLabel = new MapLabel({
        text: '270',
        position: new google.maps.LatLng(-33.570825996469104, -70.56277588978271),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);


    myPolygon = new google.maps.Polygon({
        paths: cuadrante271,
        draggable: false, // turn off if it gets annoying
        editable: false,
        strokeColor: 'blue',
        strokeOpacity: 0.9,
        strokeWeight: 2,
        fillColor: 'blue',
        fillOpacity: 0.1
    });
        var mapLabel = new MapLabel({
        text: '271',
        position: new google.maps.LatLng(-33.574089299975036, -70.5896852675126),
        map: map,
        fontSize: 35,
        align: 'right'
    });
    myPolygon.setMap(map);


















//
//
//
//    google.maps.event.addListener(myPolygon.getPath(), "insert_at", getPolygonCoords);
//    //google.maps.event.addListener(myPolygon.getPath(), "remove_at", getPolygonCoords);
//    google.maps.event.addListener(myPolygon.getPath(), "set_at", getPolygonCoords);
//
//
//
//
//
    google.maps.event.addDomListener(drawingManager, 'overlaycomplete', function (event) {
//
        if (event.type === 'circle') {

            var center = event.overlay.getCenter();


//            alert(event.overlay.getRadius());
//            alert(center.lat());
//            alert(center.lng());


            circle = {
                radius: event.overlay.getRadius(),
                center: {
                    lat: center.lat(),
                    lng: center.lng()
                }
            },
                    alert(center + "-" + event.overlay.getRadius());

            document.getElementById('infocirculo').innerHTML = center + "-" + event.overlay.getRadius();
        }



    });



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
//    var info = new google.maps.InfoWindow();
//    /*Obtengo texto buscado*/
//    var texto = document.getElementById('direccionpersona');
//    const marcador = new google.maps.Marker({
//        map: map,
//        draggable: true,
//        animation: google.maps.Animation.DROP,
//        mapTypeId: google.maps.MapTypeId.ROADMAP}
//    );
//    marcador.setIcon('../assets/images/fondos/almacen.png');
//    /*creo variable para busqueda google*/
////    const busca = new google.maps.places.Autocomplete(texto);
//    /*posiciono la busqueda en el mapa*/
//    busca.bindTo("bounds", map);
//    /*posiciono la busqueda en el mapa*/
//    busca.addListener('place_changed', function () {
//
//        var place = busca.getPlace();
//        if (!place.geometry.viewport) {
//            windows.alert("Error al mostrar el lugar");
//        }
//        if (place.geometry.viewport) {
//            map.fitBounds(place.geometry.viewport);
//        } else {
//            map.setCenter(place.geometry.location);
//            map.setZoom(18);
//        }
//        /*geneero marcardor del lugar*/
//        marcador.setPosition(place.geometry.location);
//
////        marcador.addListener('click', function () {
////            info.open(persona, marcador);
////        });
//
//
//
//
//        var address = "";
//        /*obtengo detalles de la direccion*/
//        if (place.address_components) {
//            address = [
//                (place.address_components[0] && place.address_components[0].short_name || ''),
//                (place.address_components[1] && place.address_components[1].short_name || ''),
//                (place.address_components[2] && place.address_components[2].short_name || ''),
//            ];
//        }
//
////        /*asigno a variables*/
////        $('#latitudpersona').val(place.geometry.location.lat());
////        $('#longitudpersona').val(place.geometry.location.lng());
//
//        /*muestro informacion*/
//        info.setContent('<div><strong>' + place.name + '</strong><br>' + address);
//        info.open(map, marcador);
//    });
//
//    marcador.addListener('dragend', function (event)
//    {
//
//
//        var my_lat = this.getPosition().lat();
//        var my_lng = this.getPosition().lng();
//
//        var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};
//
//        geocoder.geocode({'location': latlng}, function (results, status) {
//
//            if (status === 'OK') {
//
//                if (results[0]) {
//                    // alert(results[0].formatted_address);
//
//                    info.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');
//
//                    $('#direccionpersona').val(results[0].formatted_address);
//
//
//                    info.open(map, marcador);
//
//
//                } else {
//                    window.alert('No results found');
//                }
//            } else {
//                window.alert('Geocoder failed due to: ' + status);
//            }
//        });
//
//
//    });
//
//



















}









//
//
//
//
//
//function getCoordinates() {
//    console.log(polygon.getPath().getArray());
//}
//
//
//
//
////Display Coordinates below map
//function getPolygonCoords() {
//
//    var len = myPolygon.getPath().getLength();
//    var htmlStr = "";
//    for (var i = 0; i < len; i++) {
//        htmlStr += "new google.maps.LatLng(" + myPolygon.getPath().getAt(i).toUrlValue(5) + "), ";
//        //Use this one instead if you want to get rid of the wrap > new google.maps.LatLng(),
//        //htmlStr += "" + myPolygon.getPath().getAt(i).toUrlValue(5);
//    }
//    document.getElementById('info').innerHTML = htmlStr;
//}
function copyToClipboard(text) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}









function start_mapreg() {
    circle = null;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: america_lat, lng: america_lng},
        zoom: 5,

    });


}


function obtieneubicacion() {
    var info2 = new google.maps.InfoWindow();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {

            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            map2 = new google.maps.Map(document.getElementById('map'), {
                center: {lat: position.coords.latitude, lng: position.coords.longitude},
                zoom: 16

            });

            const marker = new google.maps.Marker({
                map: map2,
                draggable: true,
                animation: google.maps.Animation.DROP,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                position: pos

            });


            geocoder.geocode({'location': pos}, function (results, status) {

                if (status === 'OK') {

                    if (results[0]) {
                        // alert(results[0].formatted_address);

                        info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

//                        $('#direccionpersona').val(results[0].formatted_address);
//                        $('#latitud').val(position.coords.latitude);
//                        $('#longitud').val(position.coords.longitude);
                        info2.open(map2, marker);

                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });





            marker.addListener('dragend', function (event)
            {


                var my_lat = this.getPosition().lat();
                var my_lng = this.getPosition().lng();
                var latlng = {lat: parseFloat(my_lat), lng: parseFloat(my_lng)};

                geocoder.geocode({'location': latlng}, function (results, status) {

                    if (status === 'OK') {

                        if (results[0]) {
                            // alert(results[0].formatted_address);

                            info2.setContent('<div><strong>' + results[0].formatted_address + '</strong><br>');

                            $('#direccionpersona').val(results[0].formatted_address);


                            info2.open(map2, marker);


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





$(document).ready(function () {



    $('#cbxregion').change(function () {

        if (this.value == "") {
            map = new google.maps.Map(document.getElementById('map3'), {
                center: {lat: america_lat, lng: america_lng},
                zoom: 5

            });


        } else {
            var parametros = {
                "idregion": this.value
            };
            $.ajax({
                data: parametros,
                url: 'ctr_listas/consulta_listas',
                type: 'post',
                async: false,
                beforeSend: function () {
                },
                success: function (data) {
                    var resultado = JSON.parse(data);



                    var latlng = {lat: parseFloat(resultado.td_latitud), lng: parseFloat(resultado.td_longitud)};
                    map = new google.maps.Map(document.getElementById('map3'), {
                        center: latlng,
                        zoom: parseFloat(resultado.td_zoom)

                    });






                }
            });
        }




    });



    $("#btnlupa").click(function () {

        $(".lupa").slideToggle();
    });
});