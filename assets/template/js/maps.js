var map;
var opacidad = 0;
var arrayMarkers = [];
var arrayPerimeters = [];
var customLabel = {
    dentro: {
        label: 'D'
    },
    fuera: {
        label: 'X'
    }
};

function newMap() {
    var mapa = new google.maps.Map(document.getElementById('map-farm'), {
        center: new google.maps.LatLng(10.4580324096611200, -73.2695370702638200),
        zoom: 15
    });
    google.maps.event.addListener(mapa, 'click', function(e) {
        document.getElementById('lat').value = e.latLng.lat();
        document.getElementById('lng').value = e.latLng.lng();
    });
}
function initMap() {

// Create a new StyledMapType object, passing it an array of styles,
// and the name to be displayed on the map type control.
var styledMapType = new google.maps.StyledMapType(
    [
        {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
        {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
        {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
        {
        featureType: 'administrative',
        elementType: 'geometry.stroke',
        stylers: [{color: '#c9b2a6'}]
        },
        {
        featureType: 'administrative.land_parcel',
        elementType: 'geometry.stroke',
        stylers: [{color: '#dcd2be'}]
        },
        {
        featureType: 'administrative.land_parcel',
        elementType: 'labels.text.fill',
        stylers: [{color: '#ae9e90'}]
        },
        {
        featureType: 'landscape.natural',
        elementType: 'geometry',
        stylers: [{color: '#dfd2ae'}]
        },
        {
        featureType: 'poi',
        elementType: 'geometry',
        stylers: [{color: '#dfd2ae'}]
        },
        {
        featureType: 'poi',
        elementType: 'labels.text.fill',
        stylers: [{color: '#93817c'}]
        },
        {
        featureType: 'poi.park',
        elementType: 'geometry.fill',
        stylers: [{color: '#a5b076'}]
        },
        {
        featureType: 'poi.park',
        elementType: 'labels.text.fill',
        stylers: [{color: '#447530'}]
        },
        {
        featureType: 'road',
        elementType: 'geometry',
        stylers: [{color: '#f5f1e6'}]
        },
        {
        featureType: 'road.arterial',
        elementType: 'geometry',
        stylers: [{color: '#fdfcf8'}]
        },
        {
        featureType: 'road.highway',
        elementType: 'geometry',
        stylers: [{color: '#f8c967'}]
        },
        {
        featureType: 'road.highway',
        elementType: 'geometry.stroke',
        stylers: [{color: '#e9bc62'}]
        },
        {
        featureType: 'road.highway.controlled_access',
        elementType: 'geometry',
        stylers: [{color: '#e98d58'}]
        },
        {
        featureType: 'road.highway.controlled_access',
        elementType: 'geometry.stroke',
        stylers: [{color: '#db8555'}]
        },
        {
        featureType: 'road.local',
        elementType: 'labels.text.fill',
        stylers: [{color: '#806b63'}]
        },
        {
        featureType: 'transit.line',
        elementType: 'geometry',
        stylers: [{color: '#dfd2ae'}]
        },
        {
        featureType: 'transit.line',
        elementType: 'labels.text.fill',
        stylers: [{color: '#8f7d77'}]
        },
        {
        featureType: 'transit.line',
        elementType: 'labels.text.stroke',
        stylers: [{color: '#ebe3cd'}]
        },
        {
        featureType: 'transit.station',
        elementType: 'geometry',
        stylers: [{color: '#dfd2ae'}]
        },
        {
        featureType: 'water',
        elementType: 'geometry.fill',
        stylers: [{color: '#b9d3c2'}]
        },
        {
        featureType: 'water',
        elementType: 'labels.text.fill',
        stylers: [{color: '#92998d'}]
        }
    ],
    {name: 'Personalizado'});

    // Create a map object, and include the MapTypeId to add
    // to the map type control.
    var map = new google.maps.Map(document.getElementById('map-farm'), {
        center: {lat: 55.647, lng: 37.581},
        zoom: 11,
        mapTypeControlOptions: {
        mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
        }
    });
    //Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
    setTimeout(cargarPoligono(), 2000);
    setInterval(function loadMap() {
        cleanMap();
        cargarPoligono();
    }, 5000);
}

function cleanMap() {
    for(var p in arrayMarkers){
        arrayMarkers[p].setMap(null);
    }
    for(var c in arrayPerimeters){
        arrayPerimeters[c].setMap(null);
    }
}

function cargarPoligono() {
    var bermudaTriangle = [];
    var triangleCoords = [];
    downloadUrl(base_url +'perimetros/data/'+idFinca, function (data) {
        var xml2 = data.responseXML;
        var coords = xml2.documentElement.getElementsByTagName('marker');
        // console.log(coords);
        Array.prototype.forEach.call(coords, function (markerElem) {
            var coord = markerElem.getAttribute('name');
            var perim = markerElem.getAttribute('address');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));
            triangleCoords.push(point);
        });
        bermudaTriangle = new google.maps.Polygon({
            paths: triangleCoords,
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map
        });
        arrayPerimeters.push(bermudaTriangle);
        //     var resultColor = google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle) ? 'blue' : 'red';
        //     new google.maps.Marker({
        //         position: e.latLng,
        //         map: map,
        //         icon: {
        //             path: google.maps.SymbolPath.CIRCLE,
        //             fillColor: resultColor,
        //             fillOpacity: 0.2,
        //             strokeColor: 'white',
        //             strokeWeight: 0.5,
        //             scale: 10
        //         }
        //     });
        // });
        cargarCoordenadas(bermudaTriangle);
    });
}

function cargarCoordenadas(bermudaTriangle) {
    var notif = 0;
    var dentro = 0;
    var total = 0;
    // console.log(bermudaTriangle);
    var infoWindow = new google.maps.InfoWindow();
    // Change this depending on the name of your PHP or XML file
    downloadUrl('coords.php', function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        // console.log(markers);
        Array.prototype.forEach.call(markers, function (markerElem) {
            var name = markerElem.getAttribute('id');
            var address = markerElem.getAttribute('dat');
            var type = markerElem.getAttribute('est');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));
            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name;
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));
            var text = document.createElement('text');
            text.textContent = address;
            infowincontent.appendChild(text);
            
            // var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
            // var icons = {
            //   parking: {
            //     icon: iconBase + 'parking_lot_maps.png'
            //   },
            //   library: {
            //     icon: iconBase + 'library_maps.png'
            //   },
            //   info: {
            //     icon: iconBase + 'info-i_maps.png'
            //   }
            // };
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                // label: icon.label,
                // icon: icons[type].icon,
            });
            // if (google.maps.geometry.poly.containsLocation(point, bermudaTriangle)){
            //     dentro ++;
            // } else {
            //     notif ++;
            // }
            if (type == 'Fuera') {
                notif ++;
            } else {
                dentro ++;
            }
            // console.log(type);
            total ++;
            arrayMarkers.push(marker);
            // var resultColor = google.maps.geometry.poly.containsLocation(point, bermudaTriangle) ? 'blue' : 'red';
            // var marker = new google.maps.Marker({
            //     position: point,
            //     map: map,
            //     label: {
            //         path: google.maps.SymbolPath.CIRCLE,
            //         fillColor: resultColor,
            //         fillOpacity: 0.2,
            //         strokeColor: 'white',
            //         strokeWeight: 0.5,
            //         scale: 10
            //     }
            // });
            marker.addListener('click', function () {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
        });
        if (notif > 0) {
            tempAlert(notif, 7000);
        }
        // if(notif > 0) {
        //     console.log('Si hay notificacion');
        //     document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fa fa-ban"></i>¡Alerta! '+notif+' bovinos fuera</h5></div>';
        //     document.getElementById('activate').click();
        //     setTimeout(function(){ document.getElementById('activate').click(); }, 5000);
        //     console.log(document.getElementById('alert'));
        // }
        var elemento1 = document.getElementById('bovinosFuera');
        var elemento2 = document.getElementById('bovinosDentro');
        var elemento3 = document.getElementById('totalBovinos');
        if(elemento1 != null && elemento2 != null && elemento3 != null) {
            // console.log('Estoy dentro del index');
            elemento1.innerText = notif;
            elemento2.innerText = dentro;
            elemento3.innerText = total;
        }
        document.getElementById('notifs').innerText = notif;
        document.getElementById('fueraNotif').innerText = notif;
        document.getElementById('notifBarra').innerText = notif;
        // console.log(notif);
        // console.log(document.getElementById('notifs'));
    });
}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };
    request.open('GET', url, true);
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    request.send(null);
}

function doNothing() {}