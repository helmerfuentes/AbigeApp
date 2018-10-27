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
function tempAlert(msg, duration) {
    opacidad = 0;
    clearInterval(animar);
    el = document.getElementById('notificacionMensaje');
    if (el != null) el.parentNode.removeChild(el);
    var el = document.createElement("div");
    el.setAttribute("style","position:absolute;top:10%;left:44%;opacity: "+opacidad+";");
    el.innerHTML = '<div id="content"><div id="column-left" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fa fa-ban"></i><br>¡Alerta!<br> '+msg+' bovinos fuera</h5></div></div>'
    el.id = 'notificacionMensaje';
    let repit = true;
    document.body.appendChild(el);
    el = document.getElementById('notificacionMensaje');
    let increment = 0.01;
    var animar = setInterval(opacar, 10);
    function opacar() {
        opacidad += increment;
        el.style.opacity = opacidad;
        // console.log(opacidad);
        if(opacidad >= 1) {
            clearInterval(animar);
        }
    }
    // setTimeout(function() {
    //     el.parentNode.removeChild(el);
    // }, duration);
    // setInterval(function(){
    //     opacity+=0.05;
    //     el.style.opacity = opacity;
    //     if(opacity==1){ 
    //         clearInterval(); 
    //     }
    // },1000);
    // setInterval(function(){
    //     opacity-=0.05;
    //     el.style.opacity = opacity;
    //     if(opacity==0){ 
    //         clearInterval(); 
    //     }
    // },1000);

}

function newMap() {
    var mapa = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(10.4580324096611200, -73.2695370702638200),
        zoom: 20
    });
    google.maps.event.addListener(mapa, 'click', function(e) {
        document.getElementById('lat').value = e.latLng.lat();
        document.getElementById('lng').value = e.latLng.lng();
    });
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(10.4580324096611200, -73.2695370702638200),
        zoom: 15
    });
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
    downloadUrl('perimetro.php', function (data) {
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