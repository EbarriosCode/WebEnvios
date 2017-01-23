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
	<div class="container">
	<br>	
		<header>
			<nav class="navbar navbar-default nabar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
							<span class="sr-only">Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<strong href="#" class="navbar-brand">Web - Envios</strong>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
				
						<ul class="nav navbar-nav navbar-right" >
							
							<li class="hovered"> <a href="../../index.php">Inicio<span class="icon-home"></span></a></li>
							<!-- empieza dropdown -->
							<li class="dropdown hovered">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento<span class="icon-cogs"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="../view/modules/EmpresasClientebuscar_vista.php">Productos<span class="icon-users"></span></a></li>					        
					          </ul>
					        </li>
							<li class="dropdown hovered">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta de Envios<span class="icon-pencil"></span></a>
								<ul class="dropdown-menu">
									<li class="hovered "> <a href="ControlService_controlador.php">Filtrar Envios<span class="icon-search"></span></a></li>
								</ul>
							</li>

                            <li class=" hovered dis ">
                                <a href="../Panel-admin">P-admin<span class="icon-chart-line"></span></a>
                            </li>
							
							<li class="hovered"><a href="../controller/cerrar_sesion.php">Salir<span class="icon-reply-all"></span></a></li>
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
	
</body>
</html>