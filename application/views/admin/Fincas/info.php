
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $finca->nombre ?>
      <small class="label label-default">Información</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!--MAPA DE LA FINCA -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h2 class="box-title"><span class="label label-success">Mapa - Info</span></h2>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="map" style="height: 75vh;"></div>
                  </div>
                </div>
                <div class="col-md-3 col-col-sm-12">
                  <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-green">
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?= base_url()?>assets/template/dist/img/users/<?= $finca->imagen ?>" alt="User Avatar">
                      </div>
                      <!-- /.widget-user-image -->
                      <h4 class="widget-user-desc"><?= $finca->u_nombre." ".$finca->u_apellido ?></h4>
                      <h5 class="widget-user-desc">Dueño de la finca</h5>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="<?= base_url() ?>/departamentos/info/<?= $finca->d_descripcion ?>">Departamento <span class="pull-right badge bg-blue"><?= $finca->d_descripcion ?></span></a></li>
                        <li><a href="<?= base_url() ?>/municipios/info/<?= $finca->m_descripcion ?>">Municipio <span class="pull-right badge bg-aqua"><?= $finca->m_descripcion ?></span></a></li>
                        <li><a href="#">Estado 
                          <?php if($finca->estado == 1): ?>
                            <span class="pull-right badge bg-green">Activa</span>
                          <?php else: ?>
                            <span class="pull-right badge bg-red">Inactiva</span>
                          <?php endif;?>
                        </a></li>
                      </ul>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col (LEFT) -->
        </div>
        <div class="col-md-4">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
        <!-- /.row -->
      </div>
    </div>
  </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->