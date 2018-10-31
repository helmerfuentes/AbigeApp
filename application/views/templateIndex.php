<!--ESTE TEMPLATE ES PARA INCIAR DESDE EL FRONT-END PARA PODER LOGUIARSE -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="AbigeApp es una aplicación que se encarga de monitorear en tiempo real la posición de los bovinos en tu finca, evita el abigeato en tu finca con AbigeApp" />
    


    <link href="<?php echo base_url();?>assets/template/front-end/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/front-end/css/swipebox.css">

    <script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/jquery/move-top.js"></script>
    <script src="<?php echo base_url();?>assets/template/jquery/easing.js"></script>
    <script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet'
        type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>

    <title>AbigeApp | Tu finca, nuestra prioridad</title>

     <!-- Custom Theme files -->
     <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

     <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
</head>
<body>
   <!--BARRA DE NAVEGACION-->
   <?php
  $this->load->view('layouts/Fron-end/navegacion.php'); ?>
    
   
    <!--FINALIZACIOND DE LA BARRA DE NAVEGACION-->
    
    
    
    <!INICIO DE PRINCIPAL--BANNER>
   <?php
    
    $this->load->view('layouts/Fron-end/principal.php'); ?>
   ?>

    <!--FINALIZACION DE PRINCIPAL //banner-->
    
   
   
    <!--SOMOS NOSOTROS-->
    <?php
   
    $this->load->view('layouts/Fron-end/nosotros.php'); ?>
   ?>

   
   
    <!--//FIN DE SOMOS NOSOTROS-->
    
    <!--INCICIO DE CARACTERISTICAS-->
    
    <?php
   
    $this->load->view('layouts/Fron-end/caracteristica.php'); ?>
   ?>

    <!--//FINALIZACION DE CARACTERISTICA-->


    <!--INCIO DE SERVICIOS-->
    <?php
    
    $this->load->view('layouts/Fron-end/servicios.php'); ?>
   ?>
 
    <!--//FINALIZACION DE SERVICIOS-->

    <!--INICIO DE PORTAFOLIO-->
    <?php
       
        $this->load->view('layouts/Fron-end/portafolio.php'); ?>
    ?>

    <!--//FINALIZACION DE PORTAFOLIO-->
   
   
    <!--INICIO NUESTRO EQUIPO-->
    <?php
     $this->load->view('layouts/Fron-end/equipo.php'); 
        
    ?>
    <!--//FINALIZACION DE NUESTRO EQUIPO-->


    <!--INICIO DE MAPAS-->
    
    <?php
    $this->load->view('layouts/Fron-end/mapas.php'); 
       
    ?>
    <!--//FINALIZACION DE MAPAS-->


    <!--INICIO DE CONTACTENOS-->
   
    <?php
    $this->load->view('layouts/Fron-end/contactenos.php'); 
        
    ?>
    
    <!--//FINALIZACION DE CONTACTENOS-->


    <!--INICIO DE FOOTER-->

     
    <?php
     $this->load->view('layouts/Fron-end/footer.php'); 
        
    ?>
    
    <!--//FINALIZACION DE FOOTER-->


    <!--smooth-scrolling-of-move-up-->
    <script type="text/javascript">
        $(document).ready(function () {
            /
            var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            };
            

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>


    <!--//smooth-scrolling-of-move-up-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <?php if($email or $password): ?>
        <script>
        miLogin = document.getElementById('miFinca');
        console.log(miLogin);
        miLogin.click();
        </script>
    <?php endif ?>
    <?php
    if($_SESSION): ?>
        <script>
        miLogin = document.getElementById('miFinca');
        miLogin.addEventListener('click', function(e){
            console.log(e);
            location.href = "./views";
        });
        </script>
    <?php endif ?>
</body>
</html>