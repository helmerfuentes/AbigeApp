const STATUS_OK = 200;
const STATUS_UNAUTHORIZED = 401;
const STATUS_NOTFOUND = 404;
const STATUS_INTERNALSERVERERROR = 500;

var map;
var arrayObjects = [];
var arrayPerimeters = [];
var perimeterPolygon = [];
const colors = ['#2185C5', '#7ECEFD', '#FFF6E5', '#FF7F66'];

function randomColor(colors) {
    return colors[Math.floor(Math.random() * colors.length)]
}

function createPolygon(points, color) {
    return new google.maps.Polygon({
        paths: points,
        strokeColor: color,
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: color,
        fillOpacity: 0.35,
    });
}

function drawPolygon(polygon) {
    polygon.setMap(map);
}

function sendData(url, data) {
    fetch(url, {
    method: 'POST',
    body: JSON.stringify(data),
    }).then(res => res.json())
    .catch(error => console.log(error))
    .then(response => {
        alertify.success('Datos insertados correctamente', 'success', 2);
    });
}

function erasePolygon(polygon) {
    polygon.setMap(null);
}

function initMap() {
    perimeterPolygon = new google.maps.Polygon();
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
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 10.458681, lng: -73.269462},
        zoom: 11,
        mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
        }
    });
    //Associate the styled map with the MapTypeId and set it to display.
    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
    if (isFarm) {
        setTimeout(loadPerimeters(), 2000);
        // setInterval(function loadMap() {
        //     cleanMap();
        //     // cargarPoligono();
        // }, 5000);
        // pointsMaps(myPoints);
        // loadPositions();
    }
}