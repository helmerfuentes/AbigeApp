document.addEventListener('DOMContentLoaded', function(){
    loadDevices();
});
function loadDevices() {
    console.log("Iniciando carga de dispositivos...");
    // Consultamos los perímetros
    loadData(base_url + "dispositivos/getData/").then(response => {
        draw(response);
    }).then(() => {
    }).catch(reason => console.log(reason.message));
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

function draw(data) {
    document.getElementById("total").innerHTML = data.total;
    document.getElementById("in").innerHTML = data.total - data.out;
    document.getElementById("out").innerHTML = data.out;
    data.devices.map( x => {
        if (x.latitud && x.longitud){
            return new google.maps.Marker({
                position: {lat: x.latitud, lng: x.longitud},
                map: map,
                title: x.idanimal
            });
        }
    });
}