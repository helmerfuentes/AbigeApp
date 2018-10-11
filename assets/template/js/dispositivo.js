$(document).ready(function () {
    var base="<?php echo base_url(); ?>"; 
    $(".btn-view").on("click",function(){
    var id=$(this).val();
    alert(id);
    $.ajax({
     url: base + "Dispositivo/Dispositivo/infoDispositivo/" + id,
     type: "POST",
     success: function(resp){
        
        $("#modal-default .modal-body").html(resp);
         
     }
    
    });
    
    });

});