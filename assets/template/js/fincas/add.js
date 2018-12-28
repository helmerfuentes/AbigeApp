document.addEventListener('DOMContentLoaded', function() {
    getMunicipios();
});

let getMunicipios = () => {
    var departamento = document.getElementById('departamento');
    departamento.addEventListener('change', function() {
        var municipio = document.getElementById('municipio');
        municipio.innerHTML = '<option value="0">Seleccione...</option>';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var municipios = JSON.parse(this.responseText).municipios;
                municipios.map(function(x) {
                    option = document.createElement("option");
                    option.text = x.descripcion;
                    option.value = x.idmunicipio;
                    municipio.add(option);
                });
                console.log(municipios);
            }
        };
        xhttp.open("GET", base_url + "municipios/data/"+departamento.value, true);
        xhttp.send();
    });
};