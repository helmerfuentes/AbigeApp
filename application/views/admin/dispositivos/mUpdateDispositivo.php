





<form class="form-horizontal">
	<!-- parametros ocultos -->
	<input type="hidden" id="mhdnIdPersona">
	
	<div class="box-body">
		<div class="form-group">
			<label class="col-sm-3 control-label">Codigo Dispositivo</label>
			<div class="col-sm-9"> 
				<input type="text" name="mCodDispositivo" class="form-control" readonly="readonly"  id="mCodDispositivo" placeholder="" value="<?php echo $dis->iddispositivo; ?>">
				<?php echo form_error("mCodDispositivo","<span class='help-block'>","</span>");?>
			</div>
		</div>



		<div class="form-group">
			<label class="col-sm-3 control-label">Codigo Animal</label>
			<div class="col-sm-9"> 
				<input type="text" name="midAnimal" class="form-control" id="midAnimal" value="<?php echo $dis->idanimal; ?>" >
				<span class="help-block"></span>
                 <?php echo form_error("animal","<span class='help-block'>","</span>");?>
			</div>
		</div>



		<div class="form-group">
			<label class="col-sm-3 control-label">Bateria</label>
			<div class="col-sm-9"> 
				<input type="text" name="mbateria" class="form-control" readonly="readonly"  id="mbateria"  value="<?php echo $dis->bateria; ?>">
				<span class="help-block"></span>
                 <?php echo form_error("bate","<span class='help-block'>","</span>");?>
			</div>
		</div>

		

		<div class="form-group">
			<label class="col-sm-3 control-label">Estado</label>
			<div class="col-sm-9">
				<select class="form-control" id="mEstado" name="mEstado">
					<?php
					if($dis->estadodispositivo=="1"){
						?>
						<option value="1">Activo</option>
						<option value="0">Inactivo </option>
						<?php

					}else{
						?>
						
						<option value="0">Inactivo</option>
						<option value="1">Activo</option>
						<?php
						
					}


					?>
				</select>
				<span class="help-block"></span>
                 <?php echo form_error("esta","<span class='help-block'>","</span>");?>
			</div>
		</div>


		


	</div>
</form>
</div>