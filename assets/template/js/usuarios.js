$(document).ready(function () {

    
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