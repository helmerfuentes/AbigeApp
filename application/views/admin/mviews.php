
<?php

if($dis){
?>
<p> <strong>Nombre Finca:  </strong> <?php echo $dis->nombreFinca ?></p>
<p><strong>Codigo Dispositivo: </strong><?php echo $dis->iddispositivo ?></p>
<p><strong>Bateria: </strong><?php echo $dis->bateriaposicion ?></p>
<p><strong>Mantenimiento Realizado: </strong><?php echo $dis->fecha ?></p>
<p><strong>Estado: </strong><?php echo $dis->estadodispositivo ?></p>
<p><strong>Estado Ubicacion: </strong><?php echo $dis->posicionestado ?></p>
<?php
}else{
    ?>
   
   <p><strong>Error Al cargar Informacion</strong></p>
    <?php
}
?>

