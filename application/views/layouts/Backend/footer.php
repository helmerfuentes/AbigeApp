        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->



    <!-- jQuery 3 -->
    <script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>

    <!-- Script para usar la variable global en scripts  -->
    <script> var base_url = "<?php echo base_url() ?>"
    $("#example1").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
</script>

<?php if($this->uri->segment(1) == 'dispositivos'){?>
    <script src="<?php echo base_url();?>assets/template/js/dispositivo.js"></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'usuarios'){?>
    <script src="<?php echo base_url();?>assets/template/js/validacion.js"></script>
    <script src="<?php echo base_url();?>assets/template/js/usuarios.js"></script>
<?php } ?>



<!-- include the style -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/template/alertify/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/template/alertify/css/themes/default.min.css" />
<!-- include semantic ui theme  -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/template/alertify/css/themes/semantic.css">
<script src="<?php echo base_url();?>assets/template/alertify/alertify.min.js"></script>

<?php if($this->uri->segment(1) == 'fincas'): ?>
    <script src="<?php echo base_url();?>assets/template/js/fincas.js"></script>
    <?php if($this->uri->segment(2) == 'info'): ?>
        <script>var idFinca = "<?php echo $this->uri->segment(3) ?>"</script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4IEb95P9DieOSrXns34Ao2URyFTGCLNI&libraries=geometry&callback=initMap"></script>
        <script src="<?php echo base_url();?>assets/template/js/maps.js"></script>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>