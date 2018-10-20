<div class="content-wrapper">
<section class="content-header">
<h1>Nuevo Dispositivo</h1>
<br> <br><br>
</section>

    <section class="content col-md-8 " >
    <div class="box box-solid col-md-12 col-md-offset-3">
    <div class="box-body ">
        <div class="row">
        <div class="col-md-8">
             <?php if($this->session->flashdata("error")): ?>   
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error") ?></p>
               
              </div>
                <?php endif; ?>
            <form action="<?php echo base_url();?>Dispositivos/guardar" method="POST">
          <div class="col-sm-12 col-md-offset-5">  
                 <div class="form-group">
                                        <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Dispositivo</font></font></label>
                                        <div class="col-md-8">
                                            <input name="codigoDispositivo" id="codigoDispositivo" type="text" placeholder="1034567432" class="form-control form-control-line">
                                        </div>
                </div>
              
                <div class="form-group">
                           <label class="col-sm-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Seleccionar Finca</font></font></label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-line" name="finca" id="finca">
                                <?php
                                    if(is_array($perimetro) || is_object($perimetro)){
                                        foreach ($perimetro as  $value) {                                                    
                                                ?>
                                                <option value="<?php echo $value->idperimetro?>"><?php echo $value->nombreFinca ?> </option>
                                                <?php
                                                }
                                                }
                                                ?>
                            </select>
                        </div>
                </div>



                <div class="form-group">
                                        <label class="col-md-12"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Codigo Animal</font></font></label>
                                        <div class="col-md-8">
                                            <input name="codigoAnimal" id="codigoAnimal" type="text" placeholder="1034567432" class="form-control form-control-line">
                                        </div>
                </div>
             
                <div class="form-group">
                    <div class="col-sm-12 col-md-offset-1" >
                        <br> 
                        <button type="submit" class="btn btn-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar Usuario</font></font></button>
                    </div>
                 </div>
                 
            </div>
            
            </form>
        </div>
        </div>
    </div>
    </div>
    </section>

</div>