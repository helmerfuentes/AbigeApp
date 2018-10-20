<div class="content-wrapper">
<section class="content-header">


</section>

    <section class="content">
    <div class="box box-solid">
    <div class="box-body">
        <div class="row">
          <div class="col-md-12"> 
        
             <a href="#"><span class="fa fa-2x"></span><h4>Listado Dueños Fincas</h4></a>
         </div>
        
        </div>
        <hr>
        <div class="row">
        <div class="col-md-12">
      
        <table id="example1" class="table table-bordered btn-hover">
            <thead>
            
            <tr>
            <th>#</th>
            <th>IDENTIFICACION</th>
            <th>FINCA</th>
            <th>NOMBRE DUEÑO</th>
            <th>N° EMPLEADOS</th>
            <th>N° DISPOSITIVOS</th>
            
            <th></th>
            </tr>
            </thead>

            <tbody>
           <?php if(!empty($lista)){
                    $i=1;
                  
                foreach ($lista as  $value) {
                ?>

                <tr>
                 
                <td><?php echo $i?>
                </td>
                            <td><?php echo $value->identduenio?></td>
                            <td><?php echo $value->finca?></td>
                            <td><?php echo $value->duenio?></td>
                            <td><?php echo $value->empleados?></td>
                            <td><?php echo $value->dispositivos?></td>
                            <td>
                            <div class="btn-group">
                                <a  href='<?php echo base_url()."fincas/descripcion/$value->identduenio"?>' type="button" class="btn btn-info "   value="<?php  echo $value->identduenio; ?>">
                                    <span class="fa fa-search"></span>
                                </a>

                               

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


