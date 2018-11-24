
<div class="content-wrapper">
<section class="content-header">
      <div class="box-header with-border">
          <h3 class="box-title">Listado Fincas | Dueños</h3>
          
        </div><!-- /.box-header -->

              <?php
              foreach ($lista as $key => $value) {
              ?>
<div class="box box-default collapsed-box">
        <div class="box-header with-border">
        <table class="table no-margin">
        <!--nombre principal-->
        <thead>
        <tr >
                <td colspand="1" class="col-lg-5" >
                <h5><strong> IDENTIFICACION: </strong> <?php echo $value->identduenio ?> </h5>
                <h5><strong>NOMBRE: </strong><?php echo $value->duenio?></h5>
                <h5><strong>FINCA: </strong><?php echo $value->finca ?></h5>
                <h5><strong>EMPLEADOS:</strong> <?php echo $value->empleados?></h5>
                <h5><strong>DISPOSITIVOS:</strong> <?php echo $value->dispositivos?></h5>

                <div class="row">
                  <div   class="col-md-10"> 
                  <button type="button" data-toggle="modal" data-target="#mUsuarios" value="<?=$value->idusuario ?>" class="btn btn-link hview">Mas Informacion>></button>
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
                <td><button type="button" data-toggle="modal" data-target="#mUsuarios" value="<?=$emp->idusuario ?>" class="btn btn-link hview"><?=$emp->identificacion ?></button>
                   </td>
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


        



         
   



  
  <div class="modal fademodal fade bd-example-modal-lg" id="mUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

     <div class="modal-header bg-blue">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Persona</h4>
      </div>

            <div class="modal-body">
            

            </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-info" id="mbtnUpdPerona">Actualizar</button>
      </div>

    </div>
  </div>
</div>

              
            



