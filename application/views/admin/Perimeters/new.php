
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Perimetros
        <small>Nuevo</small>
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
                        <form action="#" method="POST" id="form_store_perimeter">
                            <div class="form-group">
                                <label for="finca">Finca:</label>
                                <select name="finca" id="finca" class="form-control">
                                    <option value="0">Seleccione...</option>
                                    <?php foreach($fincas as $finca):?>
                                        <option value="<?= $finca->idfinca?>"><?= $finca->nombreFinca ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="General">General</option>
                                    <option value="Interno">Interno</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="latitud">Descripción:</label>
                                <textarea required class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <!-- Map will be created here -->
                                <div id="map" style="height: 75vh;"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="latitud">Latitud:</label>
                                    <input class="form-control" type="number" name="latitud" id="latitud" step="any">
                                </div>
                                <div class="col-md-6">
                                    <label for="longitud">Longitud</label>
                                    <input class="form-control" type="number" name="longitud" id="longitud" step="any">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="button" class="btn btn-default" value="Agregar" onclick="add()">
                                </div>
                                <div class="col-md-8">
                                    <div id="coordenadas">
                                        <span class="pull-center badge bg-orange">Sin Coordenadas...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <button disabled id="submit_form_perimeter" type="submit" class="btn btn-success btn-block">Guardar</button>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="btn btn-danger btn-block">Cancelar</a>
                                </div>
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
