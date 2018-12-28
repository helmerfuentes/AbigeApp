<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Fincas
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box --> 
        <div class="box box-solid ">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>fincas/nuevo" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Fincas</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="dataFincas" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Ubicación</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Municipio</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($fincas)):?>
                                    <?php foreach($fincas as $finca):?>
                                        <tr class="fila" id="<?php echo $finca->idfinca ?>">
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
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Inicio de modal para información detallada -->
<!-- <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Finca</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div> -->
    <!-- /.modal-content -->
  <!-- </div> -->
  <!-- /.modal-dialog -->
<!-- </div> -->