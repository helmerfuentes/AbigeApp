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

Perimeter.prototype.draw = function() {
    const points = this.coordinates.map( x => {
        return new google.maps.LatLng(
            parseFloat(x.latitude), parseFloat(x.longitude)
        );
    });
    drawPolygon(createPolygon(points, 'red'));
};

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

const drawPositions = (positions) => {
    const color = randomColor(colors);
    positions.forEach(position => {
        const marker = new google.maps.Marker({
            position: position,
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