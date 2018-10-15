
     



       
	      <form class="form-horizontal">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdPersona">
	      	
			<div class="box-body">
		        <div class="form-group">
		            <label class="col-sm-3 control-label">Codigo Dispositivo</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="mCodDispositivo" class="form-control" readonly="readonly"  id="mCodDispositivo" placeholder="" value="<?php echo $dis->iddispositivo; ?>">
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Codigo Animal</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="midAnimal" class="form-control" id="midAnimal" value="<?php echo $dis->idanimal; ?>" >
		            </div>
		        </div>

		    

		        <div class="form-group">
		            <label class="col-sm-3 control-label">Estado</label>
		            <div class="col-sm-9">
		            	<select class="form-control" id="mEstado" name="mEstado">
                        <?php
                        if($dis->estadodispositivo=="Activo"){
                            ?>
                            <option value="Activo">Activo</option>
		            		<option value="Inactivo">Inactivo</option>
                            <?php

                        }else{
                            ?>
                               
		            		<option value="Inactivo">Inactivo</option>
                            <option value="Activo">Activo</option>
                            <?php
                            
                        }


                        ?>
		            	</select>
		            </div>
		        </div>


                <div class="form-group">
		            <label class="col-sm-3 control-label">Bateria</label>
		            <div class="col-sm-9">
		            	<select class="form-control" id="mbateria" name="mbateria">
                        <?php 
                        if($dis->bateria=="Alta"){

                            ?>
                            <option value="Alta">Alta</option>
		            		<option value="Media">Media</option>
		            		<option value="Baja">Baja</option>
                                <?php
                        }else if($dis->bateria=="Media"){
                            ?>
                            <option value="Media">Media</option>
		            		<option value="Baja">Baja</option>
                            <option value="Alta">Alta</option>
                            <?php
                        }else{
                            ?>
                            <option value="Baja">Baja</option>
                            <option value="Media">Media</option>
                            <option value="Alta">Alta</option>
                            <?php
                        }
		            		?>
		            	
		            	</select>
		            </div>
		        </div>


			</div>
		  </form>
      </div>