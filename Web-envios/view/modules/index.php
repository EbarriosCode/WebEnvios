<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio</title>

        <!-- CSS -->
        <link rel="stylesheet" href="assets/fonts/fonts.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/css-font/fontello.css">
        <link rel="stylesheet" href="assets/css/select2.css">
        <link rel="stylesheet" href="assets/css/gray.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/buttons.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Favicon and touch icons
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">  -->

        <style>
            nav{
                margin-top:0px;
                position: fixed;
            }

            nav ul li{

                text-decoration: none;
                list-style: none;
                display: inline-block;
                position: relative;
            }

            nav ul li ul li{
                text-decoration: none;
                list-style: none;
                display: none;
            }

            nav ul li:hover > ul li{
                text-decoration: none;
                list-style: none;
                display: block;
            }
            .color{
                font-family: 'signikabold', sans-serif;
                font-size: 20px;
                color: #fff;
                line-height: 28px;
                text-transform: uppercase;
                text-shadow: 0 1px 0 rgba(8, 8, 8, 0.2);
            }

        </style>

    </head>
        
<body>
	<!-- Top menu   

        <nav>
            <div class="container">
                

                <div class="row">
                    
                    <div class="col-sm-10 nav-links">

                        <ul>
                            <li><a class="scroll-link button-1 active" href="#top-content"><span class="icon-home"></span>Home</a></li>
                            
                            <li>
                                <a class="scroll-link button-1" href="#"><span class="icon-cogs"></span>Mantenimiento</a>
                                <ul>
                                    <li><a class="scroll-link button-1" href="#">Productos Kiwi</a></li>
                                    <li><a class="scroll-link button-1" href="#">Productos Glosh</a></li>
                                </ul>
                            </li>
                            
                            <li><a class="scroll-link button-1" href="#portfolio"><span class="icon-truck"></span>Consulta de Envios</a></li>
                            <li><a class="scroll-link button-1" href="../../Panel-admin"><span class="icon-chart-line"></span>P-Admin</a></li>
                            <li><a class="scroll-link button-1" href="#portfolio"><span class="icon-reply-all"></span>  Salir</a></li>
                        </ul>  
                        
                        <div class="show-menu"><span></span></div>


                    </div>
                </div>
            </div>
        </nav> 
        --> 
        <!-- Top content -->
        <div class="top-content-container">
        <?php require_once("header-Index.php"); ?>
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 top-content-text">
                        	<h1>
                        		Sistema de Envios Kiwi por mayor y Glosh<br>
                        		<span class="top-content-text-big">Control de Envíos y Productos</span>
                        	</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 top-content-computer">
                        	<p class="color">Conectado(a) como: <?php echo $_SESSION['Usuario']; ?></p>
                            <div class="top-content-computer-container">

                        		<img src="assets/img/macbook.png" alt="">
                        		<div class="top-content-video">
                                    <img src="assets/img/icons/play.png" alt="">
                        			<p>Monitoreo de Envios</p>
                        			<p>Consulta de Productos</p>
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-4 services-box">
	                	<div class="services-box-icon"><img src="assets/img/icons/services-1.png" alt=""></div>
	                    <h3>Seguridad de la Información</h3>
	                    <p></p>
	                </div>
	                <div class="col-sm-4 services-box">
	                	<div class="services-box-icon"><img src="assets/img/icons/services-2.png" alt=""></div>
	                    <h3>Monitoreo de Envíos</h3>
	                    <p></p>
	                </div>
	                <div class="col-sm-4 services-box">
	                	<div class="services-box-icon"><img src="assets/img/icons/services-3.png" alt=""></div>
	                    <h3>Alertas de Existencias a Tiempo</h3>
	                    <p></p>
	                </div>
	            </div>
	        </div>
        </div>
        


		<!-- Map -->
        <div class="map-container">
	        <div class="map"></div>
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-12 address-container">
	                    <div class="address">
	                    	<h3>Desarrollado por:</h3>
	                    	<p>Eduardo Barrios <br> Desarrollador<br> De Software</p>
	                    	<p>guayoswing@gmail.com<br> (502) 54441004</p>
	                    	<div class="address-box-social">
		                		<a class="button-social-1 button-facebook-1" href="http://facebook.com/eduardo.barrios.140193"></a>
		                		<a class="button-social-1 button-google-plus-1" href="https://plus.google.com/u/0/102772522038399101212"></a>
		                		<a class="button-social-1 button-twitter-1" href="#"></a>		                		
		                	</div>
						</div>
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Footer -->
        <footer>
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 footer">
	                	<div class="footer-left">Copyright 2017 Kiwi Deals. Derechos Reservados.</div>
	                	<div class="footer-right">
	                		<a class="button-social-2 button-facebook-2" href="https://www.facebook.com/profile.php?id=100003442677775&fref=ts"><span>Facebook</span></a>		                
	                	</div>
	                </div>
	            </div>
	        </div>
        </footer>
        

        <!-- Javascript -->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/js/jquery.ui.map.min.js"></script>
        <script src="http://a.vimeocdn.com/js/froogaloop2.min.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/jquery.gray.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        
		<!--[if lt IE 10]>-->
            <script src="assets/js/placeholder.js"></script>
        <!--[endif]  -->

</body>

</html>

