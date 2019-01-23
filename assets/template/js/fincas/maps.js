function Perimeter(idproperty, id, type, description) {
    this.property = idproperty;
    this.id = id;
    this.type = type;
    this.description = description;
    this.coordinates = [];
    this.polygon = [];
}

function Coordinate(id,number_point,latitude,longitude) {
    this.id = id;
    this.point =number_point;
    this.latitude = latitude;
    this.longitude = longitude;
}

Perimeter.prototype.getCoords = function() {
    loadData(base_url + "perimetros/points/"+this.id).then(data => {
        this.coordinates = data.coordenadas.map(coordinate => {
            return new Coordinate(coordinate.id,coordinate.numeroPunto,coordinate.latitud,coordinate.longitud);
        });
        this.draw();
    })
    .catch(reason => console.log('Error al obtener coordenadas: ',reason.message));
};

// Perimeter.prototype.

Perimeter.prototype.draw = function() {
    const points = this.coordinates.map( x => {
        return new google.maps.LatLng(
            parseFloat(x.latitude), parseFloat(x.longitude)
        );
    });
    // pointsMaps(points);
};

/*
function newMap() {
    map = new google.maps.Map(document.getElementById('map-farm'), {
        center: new google.maps.LatLng(10.4580324096611200, -73.2695370702638200),
        zoom: 15
    });
    google.maps.event.addListener(map, 'click', function(e) {
        document.getElementById('lat').value = e.latLng.lat();
        document.getElementById('lng').value = e.latLng.lng();
    });
}
*/

function cleanMap() {
    // for(var p in arrayMarkers){
    //     arrayMarkers[p].setMap(null);
    // }
    // for(var c in arrayPerimeters){
    //     arrayPerimeters[c].setMap(null);
    // }
}

function loadPerimeters() {
    console.log("Iniciando carga de perímetros...");
    // Consultamos los perímetros
    loadData(base_url + "perimetros/data/"+idFinca).then(response => {
        arrayPerimeters = response.perimetros.map(perimeter => {
            return new Perimeter(idFinca, perimeter.id, perimeter.tipo, perimeter.descripcion);
        });
    }).then(() => {
        arrayPerimeters.forEach(perimeter => {
            perimeter.getCoords();
        });
    }).catch(reason => console.log(reason.message));

        // arrayPerimeters = loadData(base_url + "perimetros/data/"+idFinca).map(perimeter => {
        //     return new Perimeter(idFinca, perimeter.id, perimeter.tipo, perimeter.descripcion);
        // });
/*
    downloadUrl(base_url +'perimetros/data/'+idFinca, function (data) {
        console.log(data);
        // var xml2 = data.responseXML;
        // var coords = xml2.documentElement.getElementsByTagName('marker');
        // console.log(coords);
        Array.prototype.forEach.call(coords, function (markerElem) {
            var coord = markerElem.getAttribute('name');
            var perim = markerElem.getAttribute('address');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));
            triangleCoords.push(point);
        });
        console.log(triangleCoords);
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
        loadPoints(bermudaTriangle);
    }); 
*/
}

// function loadPoints(perimetro) {
//     console.log('Iniciando carga de puntos...');
//     let points = [];
//     // console.log(map);
//     // var infoWindow = new google.maps.InfoWindow();
//     const xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             points = JSON.parse(this.responseText).coordenadas.map(x => {

//             });
//             // console.log(arrayPoints);
//             points.forEach( x => {
//                 const point = new google.maps.LatLng(
//                     parseFloat(x.latitud), parseFloat(x.longitud)
//                 );
//                 points.push(point);
//             });
//             drawPoints(points);
//         } else {
//             console.log('Error al obtener datos: ', this.statusText);
//         }
//     };
//     xhttp.open("GET", base_url + "perimetros/points/"+perimetro.id, true);
//     xhttp.send();
//     /*
//     downloadUrl('coords.php', function (data) {
//     //     var xml = data.responseXML;
//     //     var markers = xml.documentElement.getElementsByTagName('marker');
//     //     // console.log(markers);
//     //     Array.prototype.forEach.call(markers, function (markerElem) {
//     //         var name = markerElem.getAttribute('id');
//     //         var address = markerElem.getAttribute('dat');
//     //         var type = markerElem.getAttribute('est');
//     //         var point = new google.maps.LatLng(
//     //             parseFloat(markerElem.getAttribute('lat')),
//     //             parseFloat(markerElem.getAttribute('lng')));
//     //         var infowincontent = document.createElement('div');
//     //         var strong = document.createElement('strong');
//     //         strong.textContent = name;
//     //         infowincontent.appendChild(strong);
//     //         infowincontent.appendChild(document.createElement('br'));
//     //         var text = document.createElement('text');
//     //         text.textContent = address;
//     //         infowincontent.appendChild(text);
            
//     //         // var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
//     //         // var icons = {
//     //         //   parking: {
//     //         //     icon: iconBase + 'parking_lot_maps.png'
//     //         //   },
//     //         //   library: {
//     //         //     icon: iconBase + 'library_maps.png'
//     //         //   },
//     //         //   info: {
//     //         //     icon: iconBase + 'info-i_maps.png'
//     //         //   }
//     //         // };
//     //         var icon = customLabel[type] || {};
//     //         var marker = new google.maps.Marker({
//     //             map: map,
//     //             position: point,
//     //             // label: icon.label,
//     //             // icon: icons[type].icon,
//     //         });
//     //         // if (google.maps.geometry.poly.containsLocation(point, bermudaTriangle)){
//     //         //     dentro ++;
//     //         // } else {
//     //         //     notif ++;
//     //         // }
//     //         if (type == 'Fuera') {
//     //             notif ++;
//     //         } else {
//     //             dentro ++;
//     //         }
//     //         // console.log(type);
//     //         total ++;
//     //         arrayMarkers.push(marker);
//     //         // var resultColor = google.maps.geometry.poly.containsLocation(point, bermudaTriangle) ? 'blue' : 'red';
//     //         // var marker = new google.maps.Marker({
//     //         //     position: point,
//     //         //     map: map,
//     //         //     label: {
//     //         //         path: google.maps.SymbolPath.CIRCLE,
//     //         //         fillColor: resultColor,
//     //         //         fillOpacity: 0.2,
//     //         //         strokeColor: 'white',
//     //         //         strokeWeight: 0.5,
//     //         //         scale: 10
//     //         //     }
//     //         // });
//     //         marker.addListener('click', function () {
//     //             infoWindow.setContent(infowincontent);
//     //             infoWindow.open(map, marker);
//     //         });
//     //     });
//     //     if (notif > 0) {
//     //         tempAlert(notif, 7000);
//     //     }
//     //     // if(notif > 0) {
//     //     //     console.log('Si hay notificacion');
//     //     //     document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fa fa-ban"></i>¡Alerta! '+notif+' bovinos fuera</h5></div>';
//     //     //     document.getElementById('activate').click();
//     //     //     setTimeout(function(){ document.getElementById('activate').click(); }, 5000);
//     //     //     console.log(document.getElementById('alert'));
//     //     // }
//     //     var elemento1 = document.getElementById('bovinosFuera');
//     //     var elemento2 = document.getElementById('bovinosDentro');
//     //     var elemento3 = document.getElementById('totalBovinos');
//     //     if(elemento1 != null && elemento2 != null && elemento3 != null) {
//     //         // console.log('Estoy dentro del index');
//     //         elemento1.innerText = notif;
//     //         elemento2.innerText = dentro;
//     //         elemento3.innerText = total;
//     //     }
//     //     document.getElementById('notifs').innerText = notif;
//     //     document.getElementById('fueraNotif').innerText = notif;
//     //     document.getElementById('notifBarra').innerText = notif;
//     //     // console.log(notif);
//     //     // console.log(document.getElementById('notifs'));
//     // });
//     */ 
// }

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

const loadData = async (url) => {
    const response = await fetch(url);
    switch(response.status) {
        case STATUS_OK:
            const data = await response.json();
            return data;
        case STATUS_NOTFOUND:
            console.log('No se encontraron los datos.');
            break;
        default:
            console.log('Error al obtener datos: '+ response.statusText);
            break;
    }
    return ;
};

function doNothing() {}

const myPoints = [
    [1,10.478767,-73.254501,1,0.9],
    [1,10.478767,-73.254501,1,1.0],
    [1,10.478788,-73.254508,1,0.9],
    [1,10.478800,-73.254547,1,1.0],
    [1,10.478799,-73.254570,1,0.9],
    [1,10.478792,-73.254585,1,1.0],
    [1,10.478803,-73.254600,1,1.0],
    [1,10.478812,-73.254600,1,1.0],
    [1,10.478816,-73.254600,1,1.0],
    [1,10.478819,-73.254600,1,1.0],
    [1,10.478824,-73.254600,1,1.0],
    [1,10.478828,-73.254592,1,0.9],
    [1,10.478825,-73.254592,1,1.0],
    [1,10.478832,-73.254592,1,1.0],
    [1,10.478825,-73.254577,1,0.9],
    [1,10.478830,-73.254585,1,0.9],
    [1,10.478834,-73.254585,1,1.0],
    [1,10.478833,-73.254585,1,0.9],
    [1,10.478834,-73.254585,1,1.0],
    [1,10.478832,-73.254592,1,0.9],
    [1,10.478824,-73.254585,1,1.0],
    [1,10.478823,-73.254592,1,1.0],
    [1,10.478821,-73.254600,1,1.0],
    [1,10.478827,-73.254615,1,1.0],
    [1,10.478832,-73.254615,1,1.0],
    [1,10.478839,-73.254623,1,1.0],
    [1,10.478844,-73.254623,1,1.0],
    [1,10.478842,-73.254623,1,0.9],
    [1,10.478837,-73.254623,1,0.9],
    [1,10.478839,-73.254615,1,0.9],
    [1,10.478841,-73.254615,1,0.9],
    [1,10.478841,-73.254608,1,1.0],
    [1,10.478842,-73.254600,1,0.9],
    [1,10.478842,-73.254600,1,0.9],
    [1,10.478845,-73.254600,1,1.0],
    [1,10.478852,-73.254600,1,0.9],
    [1,10.478853,-73.254608,1,1.0],
    [1,10.478847,-73.254600,1,1.0],
    [1,10.478845,-73.254600,1,1.0],
    [1,10.478836,-73.254600,1,1.0],
    [1,10.478830,-73.254600,1,1.0],
    [1,10.478821,-73.254600,1,1.0],
    [1,10.478820,-73.254600,1,1.0],
    [1,10.478806,-73.254592,1,0.9],
    [1,10.478796,-73.254577,1,0.9],
    [1,10.478786,-73.254570,1,1.0],
    [1,10.478775,-73.254562,1,0.9],
    [1,10.478770,-73.254562,1,0.9],
    [1,10.478779,-73.254562,1,1.0],
    [1,10.478791,-73.254570,1,1.0],
    [1,10.478800,-73.254577,1,1.0],
    [1,10.478816,-73.254592,1,1.0],
    [1,10.478824,-73.254592,1,1.0],
    [1,10.478827,-73.254585,1,1.0],
    [1,10.478849,-73.254592,1,1.0],
    [1,10.478857,-73.254585,1,1.0],
    [1,10.478839,-73.254608,1,0.9],
    [1,10.478843,-73.254623,1,1.0],
    [1,10.478839,-73.254623,1,1.0],
    [1,10.478823,-73.254615,1,0.9],
    [1,10.478809,-73.254615,1,1.0],
    [1,10.478810,-73.254608,1,1.1],
    [1,10.478838,-73.254608,1,0.9],
    [1,10.478846,-73.254608,1,1.0],
    [1,10.478844,-73.254615,1,1.1],
    [1,10.478850,-73.254631,1,1.1],
    [1,10.478843,-73.254653,1,1.1],
    [1,10.478831,-73.254638,1,1.0],
    [1,10.478830,-73.254623,1,1.0],
    [1,10.478830,-73.254615,1,1.0],
    [1,10.478835,-73.254608,1,1.0],
    [1,10.478830,-73.254623,1,0.9],
    [1,10.478855,-73.254638,1,1.0],
    [1,10.478853,-73.254646,1,0.9],
    [1,10.478865,-73.254646,1,0.9],
    [1,10.478863,-73.254646,1,0.9],
    [1,10.478880,-73.254638,1,1.0],
    [1,10.478887,-73.254638,1,0.9],
    [1,10.478892,-73.254631,1,1.0],
    [1,10.478904,-73.254623,1,1.0],
    [1,10.478899,-73.254615,1,0.9],
    [1,10.478894,-73.254600,1,0.9],
    [1,10.478899,-73.254608,1,1.0],
    [1,10.478918,-73.254592,1,1.0],
    [1,10.478917,-73.254608,1,1.0],
    [1,10.478900,-73.254608,1,0.9],
    [1,10.478896,-73.254600,1,1.0],
];

const pointsMaps = (points) => {
    const polys = points.map(point => {
        return new Coordinate(point[0],point[3],parseFloat(point[1]),parseFloat(point[2]));
    });
    const pointsM = polys.map( x => {
        return new google.maps.LatLng(
            parseFloat(x.latitude), parseFloat(x.longitude)
        );
    });
    drawPoints(pointsM);
};

const loadPositions = () => {
    console.log("Iniciando carga de posiciones...");
    // Consultamos los perímetros
    loadData("http://localhost/posiciones/posiciones.php").then(response => {
        arrayPositions = response.map(position => {
            return { 'lat' : parseFloat(position.latitud), 'lng' : parseFloat(position.longitud) };
        });
    }).then(() => {
        console.log(arrayPositions);
        drawPositions(arrayPositions);
    }).catch(reason => console.log(reason.message));
};

const drawPositions = (positions) => {
    positions.forEach(position => {
        const color = randomColor(colors);
        const marker = new google.maps.Marker({
            position: {lat: position.lat, lng: position.lng},
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                fillColor: color,
                fillOpacity: 0.8,
                scale: 2,
                strokeColor: color,
                strokeWeight: 5
            },
            draggable: true,
        });
        marker.setMap(map);
    });
};