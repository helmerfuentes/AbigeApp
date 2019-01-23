
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categorias
            <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                            </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>fincas/update" method="POST">
                            <input type="hidden" name="idfinca" value="<?= $finca->idfinca?>>">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $finca->nombre ?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Ubicación:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $finca->ubicacion ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Latitud:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $finca->latitud ?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Longitud:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $finca->longitud ?>">
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento:</label>
                                <select name="departamento" id="departamento" class="form-control">
                                    <?php foreach($departamentos as $departamento):?>
                                        <option value="<?php echo $departamento->COD_DPTO?>" <?php echo $departamento->COD_DPTO == $finca->COD_DPTO ? "selected='selected'" : ""; ?>><?php echo $departamento->DESCRIPCION;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="municipio">municipio:</label>
                                <select name="municipio" id="municipio" class="form-control">
                                    <?php foreach($municipios as $municipio):?>
                                        <option value="<?php echo $municipio->idmunicipio?>" <?php echo $municipio->idmunicipio == $finca->idmunicipio ? "selected='selected'" : ""; ?>><?php echo $municipio->descripcion;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a href="<?php echo base_url() ?>fincas/lista" class="btn btn-danger btn-flat">Cancelar</a>
                            </div>
                        </form>
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
