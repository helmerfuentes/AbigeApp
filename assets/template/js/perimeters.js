console.log("Cargando scripts de perímetros.");

var arrayPoints = [];
var number = 0;

function Point(lat,lng) {
    this.latitude = lat;
    this.longitude = lng;
    this.number = 0;
}

function current() {
    return navigator.geolocation.getCurrentPosition(function(position) {
        return position.coords;
    });
}

function dropPoint(index) {
    console.log("Eliminando", index);
    arrayPoints.splice(index,1);
    updateCoordinates(arrayPoints);
    draw();
}

function editLat(index) {
    console.log('Editando', index);
    var point = arrayPoints[index];
    var alertLat = alertify.prompt( 'Nuevo Valor de Latitud', point.latitude, function(evt, value) {
        value = parseFloat(value);
        console.log(value);
        point.latitude = value;
        arrayPoints[index] = point;
        draw();
        updateCoordinates(arrayPoints);
        console.log(point);
    }, function() { alertify.error('Cancelado'); });
    alertLat.show();
}

function editLng(index) {
    console.log('Editando', index);
    var point = arrayPoints[index];
    var alertLng = alertify.prompt( 'Nuevo Valor de Longitud', point.longitude, function(evt, value) {
        value = parseFloat(value);
        console.log(value);
        point.longitude = value;
        arrayPoints[index] = point;
        draw();
        updateCoordinates(arrayPoints);
        console.log(point);
    }, function() { alertify.error('Cancelado'); });
    alertLng.show();
}

function drag() {
    marker = new google.maps.Marker(
    {
        map:map,
        draggable:true,
        animation: google.maps.Animation.DROP,
        position: {lat: 10.4573418, lng: -73.2692601}
    });
    google.maps.event.addListener(marker, 'dragend', function(event) {
        console.log(event.latLng.lat());
        console.log(event.latLng.lng());
    });
    marker.addListener('click', toggleBounce);

    google.maps.event.addListener(marker, 'drag', function(event) {
        var latitud = document.getElementById('latitud');
        var longitud = document.getElementById('longitud');
        latitud.value = event.latLng.lat();
        longitud.value = event.latLng.lng();
    });
}

function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}

function updateCoordinates(coords) {
    var myContent = document.getElementById('coordenadas');
    myContent.innerHTML = '';
    var container = document.createElement('div');
    coords.forEach((coord, index) => {
        const noticiaHtml = `<div>
            <span class="pull-center badge bg-orange" style="cursor:pointer" onclick="editLat(${index})">${coord.latitude}</span>
            <span class="pull-center badge bg-blue" style="cursor:pointer" onclick="editLng(${index})">${coord.longitude}</span>
            <span class="pull-right badge bg-red" style="cursor:pointer" onclick="dropPoint(${index})">X</span>
            <span class="pull-right badge bg-blue" style="cursor:pointer" onclick="ascend(${index})">Subir</span>
            <span class="pull-right badge bg-orange" style="cursor:pointer" onclick="descend(${index})">Bajar</span></div>`;
        container.insertAdjacentHTML('beforeend', noticiaHtml);
    });
    myContent.appendChild(container);
}

function add() {
    var latitude = document.getElementById('latitud').value;
    var longitude = document.getElementById('longitud').value;
    number += 1;
    arrayPoints.push(new Point(latitude,longitude));
    draw();
    updateCoordinates(arrayPoints);
}

function draw() {
    erasePolygon(perimeterPolygon);
    const points = arrayPoints.map( x => {
        return new google.maps.LatLng(
            parseFloat(x.latitude), parseFloat(x.longitude)
        );
    });
    perimeterPolygon = createPolygon(points, 'blue');
    drawPolygon(perimeterPolygon);
}

function ascend(index) {
    console.log('Ascendiendo.', index);
    if (index > 0) {
        [arrayPoints[index], arrayPoints[index - 1]] = [arrayPoints[index - 1], arrayPoints[index]];
    }
    draw();
    updateCoordinates(arrayPoints);
}

function descend(index) {
    console.log('Descendiendo.', index);
    if (index < arrayPoints.length - 1) {
        [arrayPoints[index], arrayPoints[index + 1]] = [arrayPoints[index + 1], arrayPoints[index]];
    }
    draw();
    updateCoordinates(arrayPoints);
}

document.addEventListener('DOMContentLoaded', function(){
    map.addListener('click', drag);
    prepareForm();
});

function prepareForm() {
    var myForm = document.getElementById('form_store_perimeter');
    myForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var finca = document.getElementById('finca');
        var tipo = document.getElementById('tipo');
        var descripcion = document.getElementById('descripcion');
        arrayPoints.forEach(function(point, index){
            point.number = index+1;
        });
        var data = {idfinca: finca.value, tipo: tipo.value, descripcion: descripcion.value, coordenadas: arrayPoints};
        if(finca.value && tipo.value && descripcion.value.length && arrayPoints.length) {
            sendData(base_url+"perimetros/store", data);
            cleanAll();
        } else {
            alertify.error("Ingrese los datos correctamente.", 2);
        }
    });
}

function cleanAll() {
    arrayPoints = [];
    updateCoordinates(arrayPoints);
    document.getElementById('finca').value = '0';
    document.getElementById('descripcion').value = '';
}