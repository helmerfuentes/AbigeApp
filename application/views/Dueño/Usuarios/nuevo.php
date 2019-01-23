

<div class="content-wrapper">

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ingreso Empleado</font></font></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Incio</font></font></a></li>
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
                        <!--  onsubmit ="return validarUsuario()"-->
                        

                        <?php if($this->session->flashdata("success")): ?>
                            <div class="alert alert-success">
                                <p><?php echo $this->session->flashdata("success")?></p>
                            </div>
                        <?php endif; ?>

                        <form role="form" class="form-horizontal form-material" action="<?php echo base_url();?>Usuarios/guardar" method="POST" onsubmit ="return validarUsuario()" >

                            <div class="form-group <?php echo !empty(form_error("identificacion"))? 'has-error':''; ?>" >

                                <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Identificación*</font></font></label>

                                <div class="col-md-12">
                                    <input name="identificacion" id="identificacion" type="numeric" placeholder="1034567432" class="form-control form-control-line"
                                    value="<?php echo set_value("identificacion"); ?>">
                                    <span class="help-block"></span>

                                    <?php echo form_error("identificacion","<span class='help-block'>","</span>");?>

                                </div>
                                
                            </div>

                            <div class="form-group <?php echo !empty(form_error("nombres"))? 'has-error':''; ?>" >
                                <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre completo</font></font></label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" value="<?php echo set_value("nombres"); ?>" name="nombres" id="nombres" class="form-control form-control-line">
                                    <span class="help-block"></span>
                                    <?php echo form_error("nombres","<span class='help-block'>","</span>");?>
                                </div>
                                
                            </div>

                            <div class="form-group <?php echo !empty(form_error("apellidos"))? 'has-error':''; ?>" >
                                <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellidos completo</font></font></label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" name="apellidos" id="apellidos" value="<?php echo set_value("apellidos"); ?>" class="form-control form-control-line">
                                    <span class="help-block"></span>
                                    <?php echo form_error("apellidos","<span class='help-block'>","</span>");?>
                                </div>
                                
                            </div>

                            <div class="form-group  <?php echo !empty(form_error("email"))? 'has-error':''; ?>" >

                                <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email*</font></font></label>

                                <div class="col-md-12">
                                    <input name="email" id="email" type="email" placeholder="johnathan@admin.com" class="form-control form-control-line"
                                    value="<?php echo set_value("email"); ?>">
                                    <span class="help-block"></span>

                                    <?php echo form_error("email","<span class='help-block'>","</span>");?>

                                </div>

                            </div>



                            <div class="form-group <?php echo !empty(form_error("direccion"))? 'has-error':''; ?>" >
                                <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dirección</font></font></label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="calle 16B 34-09 berilia alta" class="form-control form-control-line" name="direccion" id="direccion"
                                    value="<?php echo set_value("direccion"); ?>">
                                    <span class="help-block"></span>
                                    <?php echo form_error("direccion","<span class='help-block'>","</span>");?>
                                </div>
                                
                            </div>
                            <div class="form-group <?php echo !empty(form_error("telefono"))? 'has-error':''; ?>" >
                                <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefono </font></font></label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line" 
                                    value="<?php echo set_value("telefono"); ?>" name="telefono" id="telefono">
                                    <span class="help-block"></span>
                                    <?php echo form_error("telefono","<span class='help-block'>","</span>");?>
                                </div>
                                
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar</font></font></button>
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
</div>