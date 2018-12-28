document.addEventListener('DOMContentLoaded', function() {
    var dpto = document.getElementById('departamento');
    dpto.addEventListener('change', function() {
        var mnpo = document.getElementById('municipio');
        mnpo.innerHTML = '<option value="0">Seleccione...</option>';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var municipios = JSON.parse(this.responseText).municipios;
                municipios.map(function(x) {
                    option = document.createElement("option");
                    option.text = x.descripcion;
                    option.value = x.idmunicipio;
                    mnpo.add(option);
                });
                console.log(municipios);
            }
        };
        xhttp.open("GET", base_url + "municipios/data/"+dpto.value, true);
        xhttp.send();
    });
});