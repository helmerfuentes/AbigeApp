<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
require './app/config.php';
include './models/users.php';
session_start();
// if($_SESSION) {
//     header('Location: ./views');
//     die();
// }

$errores = [];
$email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : false;
$password = isset($_POST['password']) ? trim(htmlspecialchars($_POST['password'])) : false;
if ($email != "" and $password != "" and $email and $password){
    $miLogin = new Users();
    $miLogin->setEmail($email);
    $miLogin->setClave($password);
    if ($miLogin->Auth()){
        $_SESSION['usuario'] = $miLogin;
        header('Location: ./views');
        die();
    } else {
        array_push($errores,'Usuario o Contraseña Inválida');
    }
} else {
    if(!$email or $email == ""){
        array_push($errores,'Ingrese un email');
    }
    if($password or $password == ""){
        array_push($errores,'Ingrese una contraseña');
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>AbigeApp | Tu finca, nuestra prioridad</title>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="AbigeApp es una aplicación que se encarga de monitorear en tiempo real la posición de los bovinos en tu finca, evita el abigeato en tu finca con AbigeApp" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Custom Theme files -->
    <link href="views/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="views/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="views/css/swipebox.css">
    <!-- js -->
    <script src="views/js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet'
        type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
    <!--//web-fonts-->
    <!-- start-smooth-scrolling-->
    <script type="text/javascript" src="views/js/move-top.js"></script>
    <script type="text/javascript" src="views/js/easing.js"></script>
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
    <!--//end-smooth-scrolling-->
</head>

<body>
    <!--top-navigation-->
    <div class="top-nav">
        <nav class="navbar navbar-default">
            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menú
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="hvr-bounce-to-bottom active">
                            <a href="index.html">Principal</a>
                        </li>
                        <li class="hvr-bounce-to-bottom">
                            <a href="#about" class="scroll">¿Quiénes somos?</a>
                        </li>
                        <li class="hvr-bounce-to-bottom">
                            <a href="#services" class="scroll">Servicios</a>
                        </li>
                        <li class="hvr-bounce-to-bottom">
                            <a href="#portfolio" class="scroll">Portafolio</a>
                        </li>
                        <li class="hvr-bounce-to-bottom">
                            <a href="#team" class="scroll">Nuestro Equipo</a>
                        </li>
                        <li class="hvr-bounce-to-bottom">
                            <a href="#contact" class="scroll">Contáctenos</a>
                        </li>
                        <li class="hvr-bounce-to-bottom">
                            <a id="miFinca" href="#" class="scroll" data-toggle="modal" data-target="#myModal2">Mi Finca</a>
                        </li>
                    </ul>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </nav>
    </div>
    <!--//top-navigation-->
    <!--banner-->
    <div class="banner">
        <!--header-->
        <div class="header">
            <div class="container">
                <div class="header-left">
                    <h1>
                        <a href="index.html">AbigeApp</a>
                    </h1>
                </div>
                <div class="header-right">
                    <ul>
                        <li>
                            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+57 314 509 6908</li>
                        <li>
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <a href="mailto:abigeapp@gmail.com">abigeapp@gmail.com</a>
                        </li>
                        <li>
                            <span class="glyphicon glyphicon-hd-video" aria-hidden="true"></span>
                            <a href="https://www.youtube.com/channel/UC2vMN11MMmwTxgFVud_q9Ng">YouTube</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="banner-text">
            <h2>Bienvenido</h2>
            <!-- banner Slider starts Here -->
            <script src="views/js/responsiveslides.min.js"></script>
            <script>
                // You can also use "$(window).load(function() {"
                $(function () {
                    // Slideshow 3
                    $("#slider3").responsiveSlides({
                        auto: false,
                        pager: true,
                        nav: true,
                        speed: 500,
                        namespace: "callbacks",
                        before: function () {
                            $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                        }
                    });
                });
            </script>
            <!--//End-slider-script -->
            <div id="top" class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <h3>PROTÉJASE DEL ABIGEATO</h3>
                        <p>En el año 2017 la Dirección de Carabineros, DICAR, registró el hurto de 3.000 cabezas de ganado bovino a lo largo y ancho del territorio colombiano.</p>
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Leer más</a>
                    </li>
                    <li>
                        <h3>EL ABIGEATO EN COLOMBIA</h3>
                        <p>En Colombia, las zonas del país más afectadas por el abigeato son: Sucre, Magdalena, Cesar, Guajira, Atlántico y Bolívar.</p>
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Read More</a>
                    </li>
                    <li>
                        <h3>LAS NUEVAS TECNOLOGÍAS</h3>
                        <p>Los últimos años han traído avances a la tecnología de la información, AbigeApp hace uso de esos avances para un mayor rendimiento y una mayor confianza.</p>
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Read More</a>
                    </li>
                    <!-- <li>
                        <h3>BONORUM ET MALORUM LOREM IPSUM </h3>
                        <p>Dignissimos ducimus qui blanditiis at vero eos et accusamus et iusto odio praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                            provident </p>
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Read More</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!--//banner-->
    <!--modal-sign-->
    <div class="modal bnr-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <section>
                    <div class="modal-body modal-spa">
                        <img class="img-responsive" src="views/images/img1.jpg" alt="">
                        <p>En el año 2017 la Dirección de Carabineros, DICAR, registró el hurto de 3.000 cabezas de ganado bovino a lo largo y ancho del territorio colombiano.
                        En Colombia, las zonas del país más afectadas por el abigeato son: Sucre, Magdalena, Cesar, Guajira, Atlántico y Bolívar.
                        Los últimos años han traído avances a la tecnología de la información, AbigeApp hace uso de esos avances para un mayor rendimiento y una mayor confianza.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="modal bnr-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <section>
                    <div class="modal-body modal-spa">
                        <img class="img-responsive" src="views/images/cowsfiltro.png" alt="">
                        <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body">
                                <p class="login-box-msg">Sign in to start your session</p>
                            
                                <form action="./" method="post">
                                    <div class="form-group has-feedback">
                                    <input name="email" type="email" class="form-control" placeholder="Email" <?php if($email and $email != "") echo 'value="'.$email.'"'; ?>>
                                    <span class="fa fa-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                    <input name="password" type="password" class="form-control" placeholder="Password" <?php if($password and $password != "") echo 'value="'.$password.'"'; ?>>
                                    <span class="fa fa-lock form-control-feedback"></span>
                                    </div>
                                    <div class="row">
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
                                    </div>
                                    <!-- /.col -->
                                    </div>
                                </form>
                                </div>
                                <?php if(count($errores) > 0): ?>
                                    <?php foreach($errores as $error): ?>
                                    <p class="login-box-msg"><?php echo $error ?></p>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <!-- /.login-card-body -->
                            </div>
                            </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!--//modal-sign-->
    <!--about-->
    <div id="about" class="about">
        <div class="container">
            <h3 class="title">ACERCA DE NOSOTROS</h3>
            <p>Como empresa, venimos trabajando desde el 2018 con un enfoque en la teconología, en este caso orientada al campo. Nuestro software "AbigeApp" que se dedica a monitorear en tiempo real las posiciones de los bovinos en una finca, permite controlar el abigeato.
            Tenemos un pensamiento innovador que busca solucionar los diferentes problemas que afectan a la población. Nos encargamos de prestar los mejores servicios implementando las herramientas más innovadoras, dispositivos de la última generación y tecnologías de punta.
            </p>
        </div>
    </div>
    <!--//about-->
    <!--features-->
    <div class="features">
        <div class="container">
            <h3 class="title">Características</h3>
            <div class="col-md-6 features-left">
                <div class="video-img">
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-play"></span>
                    </a>
                </div>
                <!--modal-video-->
                <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <section>
                                <div class="modal-body ">
                                    <!-- <iframe src="https://player.vimeo.com/video/96957728" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
                                    <iframe src="https://www.youtube.com/embed/qnoAAwetG54?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <!--//modal-video-->
            </div>
            <div class="col-md-6 features-right bar_group">
                <div class='bar_group__bar thin' label='Mejor Precio' value='200'></div>
                <div class='bar_group__bar thin' label='Calidad' value='250'></div>
                <div class='bar_group__bar thin' label='Confianza & Seguridad' value='300'></div>
                <div class='bar_group__bar thin' label='Planeación de Crecimineto' value='220'></div>
            </div>
            <!--bar-js-->
            <script src="views/js/bars.js"></script>
            <!--bar-js-->
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--//features-->
    <!--services-->
    <div id="services" class="services">
        <div class="container">
            <h3 class="title">Servicios</h3>
            <div class="service-row">
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                    </div>
                    <h5>Monitoreo</h5>
                    <p>Monitoreo en tiempo real de lo que sucede en tu finca.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                    </div>
                    <h5>Notificaciones</h5>
                    <p>Notificaciones en caso de irregularidades con el monitoreo de sus bovinos.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    </div>
                    <h5>24 hrs</h5>
                    <p>Estaremos vigilando tus bovinos las 24 horas del día, confía en nosotros, estaremos ahí.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
                    </div>
                    <h5>Largo alcance</h5>
                    <p>Los mejores dispositivos a tu alcance, grandes extensiones de tierra no serán un problema.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                    </div>
                    <h5>Usa tu movil</h5>
                    <p>Desde tu dispositivo android podrás tener acceso a la vigilancia de tus bovinos.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </div>
                    <h5>Observa</h5>
                    <p>Con AbigeApp puedes observar la posición real y precisa de tus bovinos.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </div>
                    <h5>Gestiona Empleados</h5>
                    <p>Asigna empleados a tu finca, los empleados tendrás acceso a el monitoreo de los bovinos.</p>
                </div>
                <div class="col-md-3 srvc-grids">
                    <div class="srvc-img">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    </div>
                    <h5>Estamos para ti</h5>
                    <p>Estaremos gustosos de atenderlos, no dude en comunicarse con nuestro equipo si necesita algo.</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//services-->
    <!--portfolio-->
    <div id="portfolio" class="portfolio">
        <h3 class="title">Nuestro Portafolio</h3>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item">
                        <span>All</span>
                    </li>
                    <li class="resp-tab-item">
                        <span>category 1</span>
                    </li>
                    <li class="resp-tab-item">
                        <span>category 2</span>
                    </li>
                    <li class="resp-tab-item">
                        <span>category 3</span>
                    </li>
                    <li class="resp-tab-item">
                        <span>category 4</span>
                    </li>
                </ul>
                <div class="clearfix"> </div>
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g1.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g2.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g2.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g3.jpg" class="swipebox" title="Consectetur adipiscing elit. Duis maximus tortor diam,Lorem ipsum dolor sit amet, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g3.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g4.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g4.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g5.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g5.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g6.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g6.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g7.jpg" class="swipebox" title="Consectetur adipiscing elit. Duis maximus tortor diam, Lorem ipsum dolor sit amet, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g7.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g8.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g8.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g3.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g1.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g5.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g8.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g8.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g2.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g2.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g4.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g4.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g5.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g6.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g6.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g7.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g7.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="tab-1 resp-tab-content">
                        <div class="tab_img">
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g8.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g8.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3 portfolio-grids grid">
                                <div class="hover ehover14">
                                    <a href="views/images/g2.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
                                        <img src="views/images/g2.jpg" alt="" class="img-responsive" />
                                        <div class="overlay">
                                            <h4>Portfolio</h4>
                                            <button class="info nullbutton" data-toggle="modal" data-target="#modal14">Show More
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--ResponsiveTabs-->
            <script src="views/js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion           
                        width: 'auto', //auto or any width like 600px
                        fit: true // 100% fit in a container
                    });
                });
            </script>
            <!--//ResponsiveTabs-->
            <!-- swipe box js -->
            <script src="views/js/jquery.swipebox.min.js"></script>
            <script type="text/javascript">
                jQuery(function ($) {
                    $(".swipebox").swipebox();
                });
            </script>
            <!-- //swipe box js -->
        </div>
    </div>
    <!--//portfolio-->
    <!--team-->
    <div class="team" id="team">
        <div class="container">
            <h3 class="title">Nosotros</h3>
            <div class="team-row">
                <div class="col-md-3 team-grids">
                    <div class="team-img">
                        <img class="img-responsive" src="views/images/t1.jpg" alt="">
                        <div class="captn">
                            <p>Mi nombre es <span>Iván Contreras</span>, desde que trabajo en este proyecto me doy cuenta lo fabuloso que es cuando tus ideas pueden transformarse en soluciones.</p>
                            <div class="social-icons">
                                <ul>
                                    <!-- <li>
                                        <a href="#"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="pin"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="in"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="be"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="vimeo"> </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h4>Iván Contreras</h4>
                    <h6>CEO-Fundador</h6>
                </div>
                <div class="col-md-3 team-grids">
                    <div class="team-img">
                        <img class="img-responsive" src="views/images/t2.jpg" alt="">
                        <div class="captn">
                            <p>Mi nombre es
                                <span>Angélica Morales</span>, estoy aquí para hacer del mundo un lugar mejor.</p>
                            <div class="social-icons">
                                <ul>
                                    <!-- <li>
                                        <a href="#"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="pin"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="in"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="be"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="vimeo"> </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h4>Angélica Morales</h4>
                    <h6>Diseñadora</h6>
                </div>
                <div class="col-md-3 team-grids">
                    <div class="team-img">
                        <img class="img-responsive" src="views/images/t3.jpg" alt="">
                        <div class="captn">
                            <p>Soy <span>Ramiro González</span>, integrante de este maravilloso equipo de trabajo, estamos cada día esforzándonos por dar soluciones eficaces a problemas reales.</p>
                            <div class="social-icons">
                                <ul>
                                    <li>
                                        <a href="//facebook.com/rmrgnzlzlpz"> </a>
                                    </li>
                                    <!-- <li>
                                        <a href="#" class="pin"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="in"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="be"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="vimeo"> </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h4>Ramiro González</h4>
                    <h6>CEO-Programador</h6>
                </div>
                <div class="col-md-3 team-grids">
                    <div class="team-img">
                        <img class="img-responsive" src="views/images/g1.jpg" alt="">
                        <div class="captn">
                            <p>Hola, soy
                                <span>Helmer Fuentes</span>; recuerda que buenos resultados requieren de un buen trabajo.</p>
                            <div class="social-icons">
                                <ul>
                                    <!-- <li>
                                        <a href="#"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="pin"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="in"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="be"> </a>
                                    </li>
                                    <li>
                                        <a href="#" class="vimeo"> </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h4>Helmer Fuentes</h4>
                    <h6>Fundador-Scrum Master</h6>
                </div>
                <div class="cearfix"> </div>
            </div>
        </div>
    </div>
    <!--//team-->
    <!--map-->
    <div class="map">
        <!-- <iframe data-wow-delay=".5s" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.9503398796587!2d-73.9940307!3d40.719109700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1441710758555"></iframe> -->
        <iframe iframe data-wow-delay=".5s" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7847.2749074414105!2d-73.2635684438721!3d10.450316613478188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x67acd0380303e569!2sUniversidad+Popular+del+Cesar!5e0!3m2!1ses-419!2sco!4v1528330020810"></iframe>
    </div>
    <!--//map-->
    <!--contact-->
    <div class="contact" id="contact">
        <div class="container">
            <h3 class="title">Contáctenos</h3>
            <div class="contact-grids">
                <div class="col-md-4 address">
                    <h4>Nuestra Oficina</h4>
                    <p class="cnt-p">Estaremos esperando con los brazos abiertos. No dude en comunicarse con nosotros.</p>
                    <p>Colombia, Cesar, Valledupar</p>
                    <p>Teléfono : +57 314 509 6908</p>
                    <p>Email :
                        <a href="mailto:abigeapp@gmail.com">abigeapp@gmail.com</a>
                    </p>
                </div>
                <div class="col-md-7 contact-form">
                    <form action="#" method="post">
                        <input type="text" name="Name" placeholder="Nombre" required="">
                        <input class="email" type="text" name="Email" placeholder="Email" required="">
                        <textarea placeholder="Mensaje" name="Message" required=""></textarea>
                        <input type="submit" value="ENVIAR">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//contact-->
    <!--footer-->
    <div class="footer">
        <div class="container">
            <p>© 2016 Cropping . All rights reserved | Design by
                <a href="http://w3layouts.com/"> W3layouts</a>
            </p>
        </div>
        <div class="container">
            <p>© 2018<a href="https://abigeeapp.000webhostapp.com"> AbigeApp</a>
            </p>
        </div>
    </div>
    <!--//footer-->
    <!--smooth-scrolling-of-move-up-->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
            var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--//smooth-scrolling-of-move-up-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="views/js/bootstrap.js"></script>
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