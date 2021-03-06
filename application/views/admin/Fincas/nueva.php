
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Fincas
        <small>Nueva</small>
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
                        <form action="<?php echo base_url();?>fincas/store" method="POST" id="form_finca">
                            <span id="error_nombre" class="text-danger"></span>
                            <div class="form-group">
                                <label for="nombre">Nombre de la Finca:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="ubicacion">Ubicación(Descriptiva):</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                            </div>
                            <div class="form-group">
                                <label for="latitud">Latitud:</label>
                                <input type="text" class="form-control" id="latitud" name="latitud">
                            </div>
                            <div class="form-group">
                                <label for="longitud">Longitud:</label>
                                <input type="text" class="form-control" id="longitud" name="longitud">
                            </div>
                            <span id="error_departamento" class="text-danger"></span>
                            <div class="form-group">
                                <label for="departamento">Departamento:</label>
                                <select name="departamento" id="departamento" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php foreach($departamentos as $departamento):?>
                                        <option value="<?= $departamento->COD_DPTO?>"><?= $departamento->DESCRIPCION;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <span id="error_municipio" class="text-danger"></span>
                            <div class="form-group">
                                <!-- Municipios -->
                                <label for="municipio">Municipio:</label>
                                <select name="municipio" id="municipio" class="form-control">
                                    <option value="0">Seleccione...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
