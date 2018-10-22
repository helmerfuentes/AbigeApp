$(document).ready(function () {
    // Eliminar finca
    $("#dataFincas").on("click", ".btn-finca-delete", function(){
        var id = $(this).val();
        alertify.confirm('¿Deseas eliminar esta finca?', '¡Podrás revertir el cambio más tarde!').setting({
            title: "Eliminación de finca",
            onok: function(){
                $.ajax({
                    url: base_url + "fincas/desactivar/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#"+id).html(resp);
                        alertify.error('Finca eliminada', 'error', 2);
                    }
                });
            }, oncancel: function(){ alertify.success("¡Eliminación cancelada!", 2); 
        }});
    });
    // Activar finca
    $("#dataFincas").on("click", ".btn-finca-active", function(){
        var id = $(this).val();
        alertify.confirm('¿Deseas activar esta finca?', '¡Podrás revertir el cambio más tarde!').setting({
            title: "Activación de finca",
            onok: function(){
                $.ajax({
                    url: base_url + "fincas/activar/" + id,
                    type:"POST",
                    success:function(resp){
                        $("#"+id).html(resp);
                        alertify.success('Finca activada', 'success', 2);
                    }
                });
            },
            oncancel: function(){ alertify.error("¡Activación cancelada!", 2); 
        }});
    });
    // Visualizar finca
    $("#dataFincas").on("click", ".btn-finca-view", function(){
        var id = $(this).val();
        alertify.confirm().destroy();
        $.ajax({
            url: base_url + "fincas/ver/" + id,
            type:"POST",
            success:function(resp){
                alertify.alert()
                .setting({
                    title: "Información de finca",
                    message: resp,
                    transition: 'flipx',
                    basic: false,
                }).show();
            }
        });
    });
});