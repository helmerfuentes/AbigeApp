$(document).ready(function () {
    $("#frmUsuario").submit(function(ev){
ev.preventDefault();


        $.ajax({
            url:$("form").attr('action'),
            type:$("form").attr('method'),
            data:$("form").serialize(),
            success: function(res){
                if(res==1){
                    alert("Registro Agregado");
                    location.reload();
                }
            }


        });
    });


});