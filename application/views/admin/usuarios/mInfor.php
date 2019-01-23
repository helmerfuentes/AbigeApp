
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Editar Usuario</font></font></h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Perfil</font></font></li>
            </ol>
        </div>
        
    </div>
    
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        
        <div class="col-lg-4 col-xlg-1 col-md-1">
            <div class="card">
                <div class="card-block">
                    <center class="m-t-30"> <img src="<?php echo base_url()?>assets/template/dist/img/users/default.png ?>" class="img-circle" width="150">
                      
                     
                      
                     
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        
        <div class="col-lg-6 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-block">
                    <form role="form" class="form-horizontal form-material" action="<?php echo base_url();?>Usuarios/guardar" method="POST" id="frmUsuario" data-toggle="validator">
                      
                    
                      
                        <div class="form-group">
                            <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Identificación</font></font></label>
                            <div class="col-md-12">
                                <input name="identificacion" id="identificacion" type="text" value="<?= $respuesta->identificacion; ?>" disabled class="form-control form-control-line">
                                <input  name="codigo" id="codigo" type="hidden" value="<?= $respuesta->idusuario; ?>" class="form-control form-control-line">
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombres</font></font></label>
                            <div class="col-md-12">
                                <input type="text" value="<?= $respuesta->nombres; ?>" name="nombres" id="nombres" class="form-control form-control-line">
                                <span class="help-block"></span>
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellidos </font></font></label>
                            <div class="col-md-12">
                                <input type="text" value="<?= $respuesta->primerApellido." ". $respuesta->segundoApellido; ?>" name="apellidos" id="apellidos" class="form-control form-control-line">
                                <span class="help-block"></span>
                                    <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dirección</font></font></label>
                            <div class="col-md-12">
                                <input type="text" value="<?=$respuesta->direccion ?>" class="form-control form-control-line" name="direccion" id="direccion">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefono </font></font></label>
                            <div class="col-md-12">
                                <input type="text" value="<?=$respuesta->telefono ?>" class="form-control form-control-line" name="telefono" id="telefono">
                            </div>
                        </div>
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>