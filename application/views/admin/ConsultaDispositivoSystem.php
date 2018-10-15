<div class="content-wrapper">
<section class="content-header">


</section>

    <section class="content">
    <div class="box box-solid">
    <div class="box-body">
        <div class="row">
          <div class="col-md-12"> 
        
             <a href="#"><span class="fa fa-2x"></span>Listado Dispositivo</a>
         </div>
        
        </div>
        <hr>
        <div class="row">
        <div class="col-md-12">
         <a href="<?php echo base_url();?>dispositivos/nuevo" class="btn btn-primary btn-flat"><span class="fa fa-plus">Agregar Dispositivo</span></a>
        <br><br>
        <table id="example1" class="table table-bordered btn-hover">
            <thead>
            
            <tr>
            <th>#</th>
            <th>ID Dispositivo</th>
            <th>BATERIA</th>
            <th>FINCA</th>
            <th>Estado</th>
            <th>OPCIÓNES</th>
            </tr>
            </thead>

            <tbody>
           <?php if(!empty($dispositivos)){
                    $i=1;
                  
                foreach ($dispositivos as  $value) {
                ?>

                <tr>
                 
                <td><?php echo $i?>
                </td>
                            <td><?php echo $value->iddispositivo?></td>
                            <td><?php echo $value->bateria?></td>
                            <td><?php echo $value->nombreFinca?></td>
                            <td><?php echo $value->estado?></td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info  btn-view" data-toggle="modal" data-target="#modal-default" value="<?php  echo $value->iddispositivo; ?>">
                                    <span class="fa fa-search"></span>
                                </button>

                                <button type="button" class="btn btn-warning  btn-Edit" data-toggle="modal" data-target="#mEdit" value="<?php echo $value->iddispositivo ;?>">
                                    <span class="fa fa-pencil"></span>
                                </button>

                                <button type="button" class="btn btn-danger  btn-Delete" data-toggle="modal" data-target="#mDelete" value="<?php echo $value->iddispositivo; ?>">
                                    <span class="fa fa-remove"></span>
                                </button>

                                </div>
                            </td>
                </tr>
            <?php
                
            }
                $i++;
            }
            ?>
               


         
            
            </tbody>
        
        </table>
        
        </div>
        </div>
    </div>
    </div>
    </section>

</div>




<div class="modal fade" id="modal-default">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Informacion Detallada Dispositivo</h4>
                    </div> 
                    <div class="modal-body">
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal --


-->



<div class="modal fade" id="mEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
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





