function exit() {
    var formElement = document.getElementById('form');
    console.log(formElement);
    var closeForm = formElement.querySelector('#exit');
    console.log(closeForm);
    document.body.removeChild(formElement);
}

function info(id) {
    var formElement = document.createElement('div');
    const ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                formElement.innerHTML = this.responseText;
            }
        };
        ajax.open('GET', 'update.php?id='+id, true);
        ajax.send(null);
    formElement.id = 'form';
    var newNode = document.importNode(formElement, true);
    console.log(newNode);
    console.log(formElement);
    document.body.appendChild(formElement);
    closeOverlay(formElement);
}

function closeOverlay(formElement) {
    formElement.addEventListener('click', function(e){
        console.log(e);
        var overlay = formElement.querySelector('.overlay');
        console.log(e.path);
        if (e.target == overlay) {
            exit();
        }
    });
}

function validarFormulario() {
    
}