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
         <a href="<?php echo base_url();?>Dispositivo/Dispositivo/VistaRegistrarDispositivo" class="btn btn-primary btn-flat"><span class="fa fa-plus">Agregar Dispositivo</span></a>
        <br><br>
        <table id="example1" class="table table-bordered btn-hover">
            <thead>
            
            <tr>
            <th>#</th>
            <th>ID Dispositivo</th>
            <th>BATERIA</th>
            <th>FINCA</th>
            <th>OPCIÓNES</th>
            </tr>
            </thead>

            <tbody>
           <?php if(!empty($dispositivos)){
               $i=1;
         foreach ($dispositivos as  $value) {
            ?>

                <tr>
                 
                <td><?php echo $i?></td>
                            <td><?php echo $value->iddispositivo?></td>
                            <td><?php echo $value->bateria?></td>
                            <td><?php echo $value->nombreFinca?></td>
                            <td>
                            <div class="btn-group">
            
                            <a href="#" class="btn btn-info"><span class="fa fa-eye"></span></a>
                            <a href="#" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                            <a href="#" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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