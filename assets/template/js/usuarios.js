$(document).ready(function () {

    $("#example1").on("click", ".btn-empleado-desactivar", function(){
        var id = $(this).val();
        
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
                        $("#"+id).html(resp);
                        alertify.error('Usuario Desactivado', 'error', 2);
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
                        $("#"+id).html(resp);
                        alertify.error('Usuario Activado', 'error', 2);
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
                        alertify.error('Usuario Eliminado', 'error', 2);
                    }
                });
            }, oncancel: function(){ alertify.success("¡Eliminacion Cancelada!", 2); 
        }});
    });


    
    $('#mbtnUpdPerona').click(function(){
        
        var cod=$('#codigo').val();
        
        var name=$('#nombres').val();
        var apellido=$('#apellidos').val();
        var dire=$('#direccion').val();
        var emai=$('#email').val();
        var tele=$('#telefono').val();
      
        
        $.ajax({
            url: base_url + "Usuarios/update/",
            data:{
                'nombres': name,
                'apellidos': apellido,
                'direccion': dire,
                'email': emai,
                'telefono': tele,
                'codigo': cod
    
            },
            type: "POST",
            success: function(resp){
                alertify.set('notifier','position', 'top-center');
              
              

                if(resp==1){
               
                alertify.success('Registro Actualizado  ' );

                $('#mbtnCerrarModal').click();
    
                setTimeout('document.location.reload()',1000);
              }else{
                alertify.error('ahh ocurrido un Error!!');
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

        alert(id);
        
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