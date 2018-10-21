
<div class="content-wrapper">
<section class="content-header">
      <div class="box-header with-border">
          <h3 class="box-title">Listado Dueños Finca</h3>
          
        </div><!-- /.box-header -->

              <?php
              foreach ($lista as $key => $value) {
              ?>
<div class="box box-default collapsed-box">
        <div class="box-header with-border">
        <table class="table no-margin">
        <!--nombre principal-->
        <thead>
        <tr border="3">
                <td colspand="1" class="col-lg-5" >
                <h5><strong> IDENTIFICACION: </strong> <?php echo $value->identduenio ?> </h5>
                <h5><strong>NOMBRE: </strong><?php echo $value->duenio?></h5>
                <h5><strong>FINCA: </strong><?php echo $value->finca ?></h5>
                <h5><strong>EMPLEADOS:</strong> <?php echo $value->empleados?></h5>
                <h5><strong>DISPOSITIVOS:</strong> <?php echo $value->dispositivos?></h5>

                <div class="row">
                  <div class="col-md-10"> 
                          <a href="#"><span class="fa fa-2x"></span>Mas Información>></a>
                   </div>
                </div>
                </td>
                <td>
                <div class="col-lg-2 col-xlg-1 col-md-1">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="<?php echo base_url()?>assets/template/dist/img/users/<?php echo $value->imagen ?>" class="img-circle" width="150">
                                  
                               
                                  
                                   
                                </center>
                            </div>
                        </div>
                    </div>
                </td>
              
          </tr>

         </thead>
        </table>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado</th>
              </tr>
              </thead>
              <tbody>

                   <?php
              foreach ($empleados as  $emp) {
                if($value->idfinca==$emp->idfinca){
              ?>
                 <tr>
                <td><a value="<?php echo $emp->identificacion ?>" href="#"><?php echo $emp->identificacion ?></a></td>
                <td><?php echo $emp->nombres ?></td>
                <td><?php echo $emp->primerApellido." ".$emp->segundoApellido?></td>
                <?php if($emp->estado=="A"){

                    ?>
                      <td><span class="label label-success">Activo</span></td>
                    <?php

                }else{
                  ?>
                    <td><span class="label label-danger">Inactivo</span></td>
                  <?php

                } ?>
                
                
              </tr>

              <?php
                }
              }
              ?>

             
              </tbody>
            </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->


                <?php
            }
            ?>



        
          
        <!-- ******************************************************************************************** -->
         
 
</section>
</div>


        



         
    
              
              
            



