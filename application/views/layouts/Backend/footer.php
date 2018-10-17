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
<script href="<?php echo base_url();?>assets/template/jquery/alertify.js"> </script>	
<script src="<?php echo base_url();?>assets/template/js/dispositivo.js"></script>	


<script>
$(document).ready(function () {
    $('.sidebar-menu').tree();
    })
    var base_url= "<?php echo base_url();?>";
    $(document).ready(function () {	
        $(".btn-finca-view").on("click", function(){	
            var id = $(this).val();	
            $.ajax({	
                url: base_url + "fincas/ver/" + id,	
                type:"POST",	
                success:function(resp){	
                    $("#modal-default .modal-body").html(resp);	
                    //alert(resp);	
                }	
            });	
        });	
    });	
    
     /**	
     *  Función para desactivar/activar	
     */	
    $(document).ready(function () {	
        $(".btn-finca-delete").on("click", function(){	
            var id = $(this).val();	
            $.ajax({	
                url: base_url + "fincas/desactivar/" + id,	
                type:"POST",	
                success:function(resp){	
                    $("#modal-danger-desactivar .modal-body").html(resp);	
                }	
            });	
            setTimeout(() => {	
                location.reload(true);	
            }, 3000);	
        });	
        $(".btn-finca-active").on("click", function(){	
            var id = $(this).val();	
            $.ajax({	
                url: base_url + "fincas/activar/" + id,	
                type:"POST",	
                success:function(resp){	
                    $("#modal-danger-activar .modal-body").html(resp);	
                }	
            });	
            setTimeout(() => {	
                location.reload(true);	
            }, 3000);	
        });	
    });
</script>




</body>
</html>
