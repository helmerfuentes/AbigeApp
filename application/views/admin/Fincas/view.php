<td><?php echo $finca->idfinca;?></td>
<td><?php echo $finca->nombreFinca;?></td>
<td><?php echo $finca->ubicacion;?></td>
<td><?php echo $finca->latitud;?></td>
<td><?php echo $finca->longitud;?></td>
<td><?php echo $finca->descripcion;?></td>
<td>
<?php if($finca->estado == 1): ?>
    <strong class='label label-success'>Activo</strong >
<?php else: ?>
    <strong class='label label-danger'>Inactivo</strong >
<?php endif; ?>
</td>
<td>
    <button type="button" class="btn btn-info btn-finca-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $finca->idfinca;?>">
        <span class="fa fa-search"></span>
    </button>
    <a href="<?php echo base_url()?>fincas/modificar/<?php echo $finca->idfinca;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
<?php if($finca->estado == 1):?>
    <button type="button" class="btn btn-danger btn-finca-delete" data-toggle="modal" data-target="#modal-danger-desactivar" value="<?php echo $finca->idfinca;?>"><span class="fa fa-ban"></span>
<?php else: ?>
    <button type="button" class="btn btn-success btn-finca-active" data-toggle="modal" data-target="#modal-danger-activar" value="<?php echo $finca->idfinca;?>"><span class="fa fa-check"></span>
<?php endif; ?>
</td>