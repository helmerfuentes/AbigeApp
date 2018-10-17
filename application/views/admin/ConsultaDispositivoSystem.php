


<div class="content-wrapper">

    <section class="content-header">
    

  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $dTotal ?></h3>

              <p>Total Dispositivos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $dActivos ?><sup style="font-size: 20px"></sup></h3>

              <p>Cantidad Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $dInactivos ?></h3>

              <p>Cantidad Inactivos</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $dDentro ?></h3>

              <p>Cantidad Dentro</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Informacion<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

    </section>

    <section class="content">
    <div class="box box-solid">
    <div class="box-body">
        <div class="row">
          <div class="col-md-12"> 
        
             <a href="#"><span class="fa fa-2x"></span>Listado Dispositivo</a>
         </div>
        
        </div>
        
 

        
        <div class="row">
        <div class="col-md-12">
         
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





