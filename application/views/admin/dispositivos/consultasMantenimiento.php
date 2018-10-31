







<!-- *******************************************************  -->
<div class="content-wrapper">
<section class="content-header">
    

  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo "123" ?></h3>

              <p>Total Mantenimientos</p>
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
              <h3><?php echo "45" ?><sup style="font-size: 20px"></sup></h3>

              <p>Mantenimientos del Mes</p>
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
              <h3><?php echo "30" ?></h3>

              <p>Mantenimientos Año</p>
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
              <h3><?php echo "10" ?></h3>

              <p>Sin Mantenimientos</p>
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
        
             <a href="#"><span class="fa fa-2x"></span><h4>Listado General Mantenimientos</h4></a>
         </div>
        
        </div>
        <hr>
        <div class="row">
        <div class="col-md-12">
      
        <table id="example1" class="table table-bordered btn-hover">
            <thead>
            
            <tr>
            <th>#</th>
            <th>DUEÑO</th>
            <th>FINCA</th>
            <th>N° DISPOSITIVOS</th>
            <th>ULTIMOS REGISTROS</th>
            <th></th>
            </tr>
            </thead>

            <tbody>
           <?php if(!empty($mantenimiento)){
                    $i=1;
                  
                foreach ($mantenimiento as  $value) {
                ?>

                <tr>
                 
                <td><?php echo $i?>
                </td>
                            <td><?php echo $value->iddispositivo?></td>
                            <td><?php echo $value->nombreFinca?></td>
                            <td><?php echo $value->fecha?></td>
                            <td><?php echo $value->cantidad?></td>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info  btn-view" data-toggle="modal" data-target="#modal-default" value="<?php  echo $value->iddispositivo; ?>">
                                    <span class="fa fa-search"></span>
                                </button>

                               

                                </div>
                            </td>
                </tr>
            <?php
                 $i=$i+1;
            }
               
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


