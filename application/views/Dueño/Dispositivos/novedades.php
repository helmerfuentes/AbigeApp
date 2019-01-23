



<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tablero
      <small>Control Novedades</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>

    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?= $total?></h3>

            <p>Total </p>
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
            <h3><?= $collar?><sup style="font-size: 20px"></sup></h3>

            <p>Collar</p>
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
            <h3><?= $localizacion?></h3>

            <p>Localización</p>
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
            <h3><?= $hoy?></h3>

            <p>Hoy</p>
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
              
              <a href="#"><span class="fa fa-2x"></span><h4>Listado Novedades <strong><?php echo date("d-m-Y")?></strong> </h4></a>
            </div>
            
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              
              <table id="example1" class="table table-bordered btn-hover">
                <thead>
                  
                  <tr>
                    <th>#</th>
                    <th>ID Dispositivo</th>
                    <th>ID Animal</th>
                    <th>Fecha/Hra</th>
                    <th>Novedad</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <?php if(!empty($novedades)){
                    $i=1;
                    
                    foreach ($novedades as  $value) {
                      if(date("d-m-Y",strtotime($value->fecha))==date("d-m-Y")){
                        ?>

                        <tr>
                         
                          <td><?php echo $i?>
                        </td>
                        <td><?php echo $value->iddispositivo?></td>
                        <td><?php echo $value->idanimal?></td>
                        <td><?php echo $value->fecha?></td>
                        <td><?php echo $value->novedad?></td>
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