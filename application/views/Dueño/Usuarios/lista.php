
<div class="content-wrapper">
  <section class="content-header ">


   
   <div class="row " >
    <div class="col-md-10  ">
      
      <table id="example1" class="table table-bordered btn-hover ">
        <thead>
          
          <tr>
            <th></th>
            
          </tr>
        </thead>

        <tbody>
          
          <?php if(!empty($empleados)){
            
            foreach ($empleados as $key => $value) {
              ?>
              <tr id="<?php echo $value->idusuario ?>">
                <td >
                  
                  <div>
                    <div class="box box-default collapsed-box">
                      <div class="box-header with-border">
                        <h3 class="box-title"><?=$value->nombres." ".$value->primerApellido." ".$value->segundoApellido; ?></h3>
                        <div class="col-lg-6">
                          <div class="card">
                            <div >
                              <center > <img src="<?php echo base_url()?>assets/template/dist/img/users/<?php echo $value->imagen ?>" class="img-circle" width="70">
                               
                                
                              </center>
                              
                            </div>
                            
                            
                            
                          </div>
                          
                          
                        </div>
                        <div >
                          <?php if($value->estado=="A"){
                            echo '<button type="button" class="btn btn-danger btn-empleado-desactivar" value='."$value->idusuario".' data-toggle="modal" data-target="#modal-danger-desactivar" ><span class="fa fa-ban"></span>
                            ';
                          }else{
                            echo '<button type="button" class="btn btn-success btn-empleado-activar" value='."$value->idusuario".' data-toggle="modal" data-target="#modal-danger-activar" ><span class="fa fa-check"></span>
                            ';
                          }  ?>
                          
                          <button type="button" class="btn btn-warning btn-empleado-update hview" value="<?php echo $value->idusuario ?>" data-toggle="modal" data-target="#mUsuarios" ><span class="fa fa-pencil"></span>
                           <button type="button" class="btn btn-danger btn-empleado-delete" value="<?php echo $value->idusuario ?>" data-toggle="modal" data-target="#modal-danger-eliminar" ><span class="fa fa-user-times"></span>
                            
                            
                            
                            
                            
                           </div>
                           <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                         <table class="col-md-10  ">

                           <tr>
                             <td><h5><strong> IDENTIFICACIÓN:  </strong> <?php echo $value->identificacion ?> </h5></td>
                             <td> <h5><strong> EMAIL:  </strong> <?php echo $value->email ?> </h5></td>
                           </tr>
                           <tr>
                             <td><h5><strong> TELEFONO:  </strong> <?php echo $value->telefono ?> </h5></td>
                             <td><h5><strong> DIRECCIÓN:  </strong> <?php echo $value->direccion ?> </h5></td>
                             
                           </tr>
                           <tr>
                             <td> <h5><strong> CLAVE:  </strong> <?php echo $value->clave ?> </h5></td>
                             <td>
                               <?php
                               if($value->estado=='A'){
                                echo "<h5><strong> ESTADO:  </strong> Activo</h5>";
                              }else{

                                echo "<h5><strong> ESTADO:  </strong> Inactivo </h5>";
                              }
                              ?>
                            </td></tr>
                          </table>
                          
                          
                          
                          
                          
                          
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                  </td>
                </tr>
                <!-- hasta aqui llega el tr -->

                <?php
              }
            }
            ?>
            
            
            
            
            
            

            
            
          </tbody>
          
        </table>
      </center>
      
    </div>
  </div>







  
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






