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
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Leer más</a>
                    </li>
                    <li>
                        <h3>LAS NUEVAS TECNOLOGÍAS</h3>
                        <p>Los últimos años han traído avances a la tecnología de la información, AbigeApp hace uso de esos avances para un mayor rendimiento y una mayor confianza.</p>
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Leer más</a>
                    </li>
                    <!-- <li>
                        <h3>BONORUM ET MALORUM LOREM IPSUM </h3>
                        <p>Dignissimos ducimus qui blanditiis at vero eos et accusamus et iusto odio praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
                            provident </p>
                        <a href="#" class="more btn-1b scroll" data-toggle="modal" data-target="#myModal1"> Leer más</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>