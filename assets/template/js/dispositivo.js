
$(document).ready(function () {
    var base="http://localhost/AbigeApp/"; 
    
   
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
            url: base + "Dispositivos/info/",
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
        console.log(id);
        $.ajax({
            url: base + "Dispositivos/eliminar/",
            data:{
                'idDisp': id
            },
            type: "POST",
            success: function(resp){
                if(resp){
                    swal("Hello world!");
                
        
                    location.reload();
                  }else{
                    alert('Error al Eliminar');
                
        
                    location.reload();
                  }
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
            alert('Dato Actualaizado');
			$('#mbtnCerrarModal').click();

			location.reload();
          }
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





    $("#example1").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });


        

});

