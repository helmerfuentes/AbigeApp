<div class="content-wrapper">
    <section class="content-header">


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
                            <th>ID Dispositivo</th>
                            <th>FINCA</th>
                            <th>FECHA</th>
                            <th>N° MANTENIMIENTO</th>
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


