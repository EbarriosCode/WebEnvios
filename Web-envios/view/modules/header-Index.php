<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="view/images/php1.jpg" type="image/x-icon"/>

	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../view/css/css-font/fontello.css">
	<link rel="stylesheet" type="text/css" href="../view/css/jquery.littlelightbox.css" >
	<link rel="stylesheet" type="text/css" href="../view/css/validarFormEmpresasCliente.css">
	<style>
		.dropdown-menu{
			background: #9ccbc0;
		}

		#navbar-1{
			font-family: 'signikalight', sans-serif;			
			color: #fff;
			line-height: 40px;
			font-size: 1.1em;
			padding-right: 200px;
		}

		.back-nav{
			background: #9ccbc0;			
		}

		.navbar-default .navbar-brand{
			color: #ffffff;
			padding-left: 200px;
			font-size: 2em;
		}

		.navbar-default .navbar-nav > li > a{
			color: #ffffff;	
		}

		.hovered:hover{
			background-color: rgb(53, 140, 140);
		}

		.hovered:active{
			background: rgb(53, 140, 140);
		} 

		.dis{
				pointer-events:none;
				opacity: .3;
				cursor: url("../images/fail.png");
				
			}
	</style>
	<?php 
		if(isset($_SESSION['tipo']) &&  $_SESSION['tipo']== 1)
      { 
     ?>
       		
       		<style>.dis{pointer-events:auto;opacity:1;cursor: pointer;}</style> 
      <?php } ?>	
</head>
<body>
	<div class="row">
	<br>	
		<header>
			<nav class="navbar navbar-default navbar-fixed-top back-nav">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<div class=""><strong href="#" class="navbar-brand">Web - Envios</strong></div>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
				
						<ul class="nav navbar-nav navbar-right" >
							
							<li class="hovered"> <a href="../../controller/PrincipalLogeado_controller.php">Inicio<span class="icon-home"></span></a></li>
					<!-- Acceso si es Admin -->
					<?php if(isset($_SESSION['tipo']) &&  $_SESSION['tipo']== 1){ ?>
							<!-- empieza dropdown -->
							<li class="dropdown hovered">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento<span class="icon-cogs"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="../../controller/ProductosKiwi_controller.php">Productos Kiwi<span class="icon-basket"></span></a></li>
					            <li><a href="../../controller/ProductosGlosh_controller.php">Productos Glosh<span class="icon-flag"></span></a></li>					        
					          </ul>
					        </li>
							<li class="dropdown hovered">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta de Envios<span class="icon-truck"></span></a>
								<ul class="dropdown-menu">
									<li class="hovered "> <a href="../../controller/EnviosKiwi_controller.php">Filtrar Envios Kiwi<span class="icon-search"></span></a></li>
									<li class="hovered "> <a href="../../controller/EnviosGlosh_controller.php">Filtrar Envios Glosh<span class="icon-tripadvisor"></span></a></li>
								</ul>
							</li>
							<li class=" hovered dis ">
                                <a href="../../Panel-admin">P-admin<span class="icon-chart-line"></span></a>
                            </li>
					<?php } ?>
					<!-- Fin  Acceso si es Usuario Admin -->
					
					<!-- Acceso si es Usuario Kiwi -->
                    <?php if(isset($_SESSION['tipo']) &&  $_SESSION['tipo']== 0 && $_SESSION['acceso'] == 2){ ?>       
							<!-- empieza dropdown -->
							<li class="dropdown hovered">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento<span class="icon-cogs"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="../../controller/ProductosKiwi_controller.php">Productos Kiwi<span class="icon-basket"></span></a></li>
					          </ul>
					        </li>
							<li class="dropdown hovered">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta de Envios<span class="icon-truck"></span></a>
								<ul class="dropdown-menu">
									<li class="hovered "> <a href="../../controller/EnviosKiwi_controller.php">Filtrar Envios Kiwi<span class="icon-search"></span></a></li>
								</ul>
							</li>	
                    <?php } ?>
					<!-- Fin Acceso si es Usuario Kiwi -->

					<!-- Acceso si es Usuario Glosh -->
                    <?php if(isset($_SESSION['tipo']) &&  $_SESSION['tipo']== 0 && $_SESSION['acceso'] == 3){ ?>       
							<!-- empieza dropdown -->
							<li class="dropdown hovered">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento<span class="icon-cogs"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="../../controller/ProductosGlosh_controller.php">Productos Glosh<span class="icon-basket"></span></a></li>
					          </ul>
					        </li>
							<li class="dropdown hovered">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta de Envios<span class="icon-truck"></span></a>
								<ul class="dropdown-menu">
									<li class="hovered "> <a href="../../controller/EnviosGlosh_controller.php">Filtrar Envios Glosh<span class="icon-search"></span></a></li>
								</ul>
							</li>	
                    <?php } ?>
					<!-- Fin Acceso si es Usuario Glosh -->					
							<li class="hovered"><a href="../../controller/cerrar_sesion.php">Salir<span class="icon-reply-all"></span></a></li>
						</ul>

					</div>
				</div>
				
			</nav>
		</header>
	</div>
	
	<script type="text/javascript" src="../view/js/jquery.min.js"></script>
	<script type="text/javascript" src="../view/js/ajaxGoogle.js"></script>
	<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.littlelightbox.js"></script>
	<script>
		$(document).ready(function(){                       
            $(".dropdown-menu").blur(function(){
            	 alert("saliendo");
            });
        });


	</script>
</body>
</html>