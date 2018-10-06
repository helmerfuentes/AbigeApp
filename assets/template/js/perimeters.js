function ubicacionActual() {
    var actual = navigator.geolocation.getCurrentPosition(function(position) {
        console.log(position.coords.latitude);
        document.getElementById('lat').value = position.coords.latitude;
        document.getElementById('lng').value = position.coords.longitude;
    });
}