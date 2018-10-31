        <p><strong>Nombre: </strong><?= $finca->nombreFinca?></p>
        <p><strong>Ubicación: </strong><?=$finca->ubicacion?></p>
        <p><strong>Latitud: </strong><?= $finca->latitud?></p>
        <p><strong>Longitud: </strong><?= $finca->longitud?></p>
        <p><strong>Municipio: </strong><?= $finca->DESCRIPCION?></p>
        <?php if($finca->estado == 1): ?>
            <p><strong>Estado: </strong><span class='label-success'>Activa</span>
        <?php else: ?>
            echo "<p><strong>Estado: </strong><span class='label-danger'>Inactiva</span>
        <?php endif; ?>