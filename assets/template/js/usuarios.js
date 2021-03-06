
$(document).ready(function () {
    var base=base_url;
    $("#example1").on("click", ".btn-empleado-desactivar", function(){
        var id = $(this).val();
        alert();
        var eliminar = alertify.confirm('¿Deseas Desactivar este Usuario?', '¡Podrás revertir el cambio más tarde!').setting({
            title: "Desactivación de Usuario",
            onok: function(){
                $.ajax({
                    url: base_url + "Usuarios/updateEstado/",
                    data:{
                        'id':id,
                        'opcion': "I"
                    },
                    type:"POST",
                    success:function(resp){
                        
                        if(resp == -1){
                            alertify.error('Ahh ocurrido un error', 'error', 2);
                        }else{
                            $("#"+id).html(resp);
                            alertify.success('Usuario Desactivado', 'error', 2);
                        }
                       
                    }
                });
            }, oncancel: function(){ alertify.success("¡Desactivacion Cancelada!", 2); 
        }});
    });

    $("#example1").on("click", ".btn-empleado-activar", function(){
        var id = $(this).val();
        
        var eliminar = alertify.confirm('¿Deseas Activar este Usuario?', '¡Podrás revertir el cambio más tarde!').setting({
            title: "Activación de Usuario",
            onok: function(){
                $.ajax({
                    url: base_url + "Usuarios/updateEstado/",
                    data:{
                        'id':id,
                        'opcion': "A"
                    },
                    type:"POST",
                    success:function(resp){
                        
                        if(resp == -1){
                            alertify.error('Ahh ocurrido un error', 'error', 2);     
                        }else{
                            $("#"+id).html(resp);
                            alertify.success('Usuario Desactivado', 'error', 2);
                        }
                    }
                });
            }, oncancel: function(){ alertify.success("¡Activacion Cancelada!", 2); 
        }});
    });

    $("#example1").on("click", ".btn-empleado-delete", function(){
        var id = $(this).val();
        
        var eliminar = alertify.confirm('¿Deseas Eliminar este Usuario?', '¡Podrás revertir el cambio más tarde!').setting({
            title: "Activación de Usuario",
            onok: function(){
                $.ajax({
                    url: base_url + "Usuarios/updateEstado/",
                    data:{
                        'id':id,
                        'opcion': "E"
                    },
                    type:"POST",
                    success:function(resp){
                        $("#"+id).html(resp);
                        alertify.success('Usuario Eliminado', 'error', 2);
                    }
                });
            }, oncancel: function(){ alertify.success("¡Eliminacion Cancelada!", 2); 
        }});
    });


    
    $('#mbtnUpdPerona').click(function(){

        var cod=$('#codigo').val();
        
        var name=$('#nombres').val();
        var primerApellido=$('#primerApellido').val();
        var segundoApellido=$('#segundoApellido').val();
        var dire=$('#direccion').val();
        var emai=$('#email').val();
        var tele=$('#telefono').val();

        
       
        $.ajax({
            url: base + "Usuarios/update/",
            data:{
                'nombres': name,
                'primerApellido': primerApellido,
                'segundoApellido':segundoApellido,
                'direccion': dire,
                'email': emai,
                'telefono': tele,
                'codigo': cod

            },
            type: "POST",
            success:function(res){
              
                alertify.set('notifier','position', 'top-center');
                    
               
                
                    if(res==1){
                        alertify.success('Dato Actualaizado'),
                        $('#mbt nCerrarModal').click(),
                        setTimeout('document.location.reload()',1000)
                    }else{
                        if(res==0)
                        alertify.error('ahh ocurrido un Error!!');
                        else
                        alertify.error(res);
                    }

                   
                   
                

            
            }
        });


        


    });


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

    $(".hview").on("click",function(ev){

        var id=$(this).val();

            
        
        $.ajax({
            url: base_url + "Usuarios/buscar",
            data:{
                'identificacion': id
            },
            type: "POST",
            success: function(resp){

               $("#mUsuarios .modal-body").html(resp);

        //   console.log(resp);

    }
});
        

    });



    




});

