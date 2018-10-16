<p><strong>Nombre:</strong> <?php echo $finca->nombreFinca; ?></p>
<p><strong>Ubicación:</strong> <?php echo $finca->ubicacion; ?></p>
<p><strong>Latitud:</strong> <?php echo $finca->latitud; ?></p>
<p><strong>Longitud:</strong> <?php echo $finca->longitud; ?></p>
<p><strong>Municipio:</strong> <?php echo $finca->DESCRIPCION; ?></p>
<p><strong>Estado:</strong> <?php echo $finca->estado == 1 ? '<span class="label-success">Activa</span>' : '<span class="label-danger">Inactiva</span>' ; ?></p>