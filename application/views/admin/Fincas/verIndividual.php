        <p><strong>Nombre: </strong><?= $finca->nombreFinca?></p>
        <p><strong>Ubicación: </strong><?=$finca->ubicacion?></p>
        <p><strong>Latitud: </strong><?= $finca->latitud?></p>
        <p><strong>Longitud: </strong><?= $finca->longitud?></p>
        <p><strong>Municipio: </strong><?= $finca->DESCRIPCION?></p>
        <?php if($finca->estado == 1): ?>
            <p><strong>Estado: </strong><strong class='label label-success'>Activo</strong >
        <?php else: ?>
            <p><strong>Estado: </strong><strong class='label label-danger'>Inactivo</strong >
        <?php endif; ?>
        <p><a href="info/<?= $finca->idfinca ?>">Ver Más...</a></p>