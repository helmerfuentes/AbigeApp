<div class="content-wrapper">
<section class="content-header">
<h1>Nuevo Dispositivo</h1>

</section>

    <section class="content">
    <div class="box box-solid">
    <div class="box-body">
        <div class="row">
        <div class="col-md-12">
        
            <form action="<?php echo base_url();?>Dispositivo/Dispositivo/add" method="POST">
            <DIV class="form-group">
            <label for="codigoDispositivo">Codigo Dispositivo</label>
            <input type="text" class="form-control" id="codigoDispositivo" name="codigoDispositivo">

            <label for="codigoDispositivo">Selecione Finca</label>
            <select name="finca" id="finca" class="form-control">
                <?php
                if(is_array($perimetro) || is_object($perimetro)){
                foreach ($perimetro as $key => $value) {
                    
                    ?>
                    <option value="volvo"><?php echo $value->nombreFinca ?> </option>
                    <?php
                        }
                        }
                        ?>
                
            </select>

            <label for="codigoAnimal">Codigo Animal</label>
            <input type="text" class="form-control" id="codigoAnimal" name="codigoAnimal">
            <br>
            <button type="submit" class="btn btn-success btn-flat">Registrar</button>
            </DIV>
            </form>
        </div>
        </div>
    </div>
    </div>
    </section>

</div>