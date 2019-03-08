const myForm = document.getElementById("form_finca");

myForm.addEventListener('submit', function(event){
    const nombre = document.getElementById('nombre');
    const departamento = document.getElementById('departamento');
    const municipio = document.getElementById('municipio');
    const error_nombre = document.getElementById('error_nombre');
    const error_departamento = document.getElementById('error_departamento');
    const error_municipio = document.getElementById('error_municipio');
    if (nombre.value.length < 5 || nombre.value.length > 60){
        toogleError(error_nombre, "El nombre debe estar entre 5 y 60 caracteres", true);
        event.preventDefault();
    } else {
        toogleError(error_nombre, "Nombre correcto", false);
    }
    if (departamento.value == 0){
        toogleError(error_departamento, "Seleccione un departamento", true);
        event.preventDefault();
    } else {
        toogleError(error_departamento, "Departamento seleccionado", false);
    }
    if (municipio.value == 0){
        toogleError(error_municipio, "Seleccione un municipio", true);
        event.preventDefault();
    } else {
        toogleError(error_municipio, "Municipio seleccionado", false);
    }
});

const toogleError = (element, message, state = true) => {
    if(state) {
        element.classList.remove("text-success");
        element.classList.add("text-danger");
    } else {
        element.classList.remove("text-danger");
        element.classList.add("text-success");
    }
    element.innerHTML = message;
}

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