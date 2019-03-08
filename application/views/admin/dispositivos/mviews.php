
<?php

if($dis){
	?>
	<p> <strong>Nombre Finca:  </strong> <?php echo $dis->nombreFinca ?></p>
	<p><strong>Codigo Dispositivo: </strong><?php echo $dis->iddispositivo ?></p>
	<p><strong>Bateria: </strong><?php if ($dis->bateriaposicion=="") echo "Sin Datos";echo $dis->bateriaposicion ?></p>

	<p><strong>Mantenimiento Realizado: </strong><?php if($dis->fecha=="")echo "Sin Datos"; echo $dis->fecha ?></p>
	<p><strong>Estado: </strong><?php if($dis->estadodispositivo=="")echo "Sin Datos"; echo $dis->estadodispositivo ?></p>
	<p><strong>Estado Ubicacion: </strong><?php if($dis->posicionestado=="")echo "Sin Datos"; echo $dis->posicionestado ?></p>
	<?php
}else{
	?>
	
	<p><strong>Error Al cargar Informacion</strong></p>
	<?php
}
?>

