$(document).ready(function () {
    // Eliminar finca
    $(".btn-finca-delete").on("click", function(){
        swal({
            title: '¿Desea eliminar esta finca?',
            text: "¡Podrás revertir el cambio más tarde!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!'
        }).then((result) => {
            if (result.value) {
                var id = $(this).val();
                $.ajax({
                    url: base_url + "fincas/desactivar/" + id,
                    type:"POST",
                    success:function(resp){
                        swal({
                            type: 'success',
                            title: '¡Finca eliminada con éxito!',
                            html: resp,
                            showConfirmButton: false,
                            timer: 1500,
                            onClose: () => {
                                location.reload(true);
                            }
                        });
                    }
                });
            }
        });
    });
    // Activar finca
    $(".btn-finca-active").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "fincas/activar/" + id,
            type:"POST",
            success:function(resp){
                swal({
                    type: 'success',
                    title: '¡Finca activada con éxito!',
                    html: resp,
                    showConfirmButton: false,
                    timer: 1500,
                    onClose: () => {
                        location.reload(true);
                    }
                });
            }
        });
    });
    // Visualizar finca
    $(".btn-finca-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "fincas/ver/" + id,
            type:"POST",
            success:function(resp){
                swal({
                    title: '<strong>Información de la finca</strong>',
                    type: 'info',
                    html: resp,
                    showCloseButton: true,
                    confirmButtonText: 'Ver más &rarr;',
                    focusConfirm: false,
                    preConfirm: () => {
                        location.href = base_url + "fincas/info/" + id;
                    }
                });
            }
        });
    });
});