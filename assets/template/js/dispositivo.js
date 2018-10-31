
$(document).ready(function () {
    var base=base_url; 
    
   
    $(".btn-view").on("click",function(){
      
        var id=$(this).val();
       
        $.ajax({
            url: base + "Dispositivos/info/",
            type: "POST",
            data:{
                'idDisp': id,
                'opcion': 1
            },
            success: function(resp){
                
                $("#modal-default .modal-body").html(resp);
            }
        });
    });
    
    

    $(".btn-Edit").on("click",function(){
        var id=$(this).val();
       
       
        $.ajax({
            url: base + "Dispositivos/info",
            data:{
                'idDisp': id,
                'opcion': 2
            },
            type: "POST",
            success: function(resp){
               $("#mEdit .modal-body").html(resp);
                
           //console.log(resp);

            }
        });
    });

    $(".btn-Delete").on("click",function(){
        var id=$(this).val();
      
        $.ajax({
            url: base + "Dispositivos/eliminar/",
            data:{
                'idDisp': id
            },
            type: "POST",
            success: function(resp){
                alertify.set('notifier','position', 'top-center');
                if(resp){
                    alertify.success('Dispositivo Eliminado' );
            
                  }else{
                    alertify.error('ahh ocurrido un Error!!');
                
                  }
                  setTimeout('document.location.reload()',1000);
            }
        });
    });

    
$('#mbtnUpdPerona').click(function(){
    
    var idDis=$('#mCodDispositivo').val();
    var idAnimal=$('#midAnimal').val();
    var estado=$('#mEstado').val();
    var bateria=$('#mbateria').val();

    $.ajax({
        url: base + "Dispositivos/actualizar/",
        data:{
            'dispositivo': idDis,
            'animal': idAnimal,
            'esta': estado,
            'bate':bateria

        },
        type: "POST",
        success: function(resp){
          if(resp==1){
            alertify.success('Dato Actualaizado');
			$('#mbtnCerrarModal').click();
          }else{
            alertify.error('ahh ocurrido un Error!!');
          }
          setTimeout('document.location.reload()',1000);
        }
    });

   
    


});
  
      /*  
    $.post(base + "Dispositivos/actualizar/",	
	{
		idispositivo:idDis,
		idAnimal: idAnimal,
		estado:estado,
		bateria:bateria
		
	},			
	function(data){
		if (data == 1) {
			alert('Dato Actualaizado');
			$('#mbtnCerrarModal').click();

			location.reload();
		}
	});

    */





   


        

});

