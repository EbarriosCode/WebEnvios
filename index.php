<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Kiwi Deals Retalhuleu</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minium-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="shortcut icon" href="images/kiwi.jpg" type="image/x-icon"/>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/css-font/fontello.css">
	<!--<link rel="stylesheet" type="text/css" href="css/fontello.css"> -->
	<link rel="stylesheet" type="text/css" href="css/animate.css" />
</head>

<style>
		.elemento{
			display: none;
		}

		.inactivo{
			display: none;
		}

		.sinPermisos{
			display: none;
		}
	</style>
	
	<?php 
		
		if(isset($_GET['boolean'])){
			//$ingreso = $_GET['boolean'];	
			echo "<style>.elemento{display:inline;}</style>";
		}


		if(isset($_GET['status'])){
			if($_GET['status'] == 'disabled')
				echo "<style>.inactivo{display:inline;}</style>";

		}

		if(isset($_GET['rol']))
		{
			if(strcmp($_GET['rol'],'fail')==0)
				echo "<style>.sinPermisos{display:inline;}</style>";
				//header("Location:Web-envios/controller/cerrar_sesion.php?rol=fail");		
		}
	 ?>

<body>
	<br><br>
	<div class="container">
	<div id="alerta-roja" class="elemento">
		<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
			  </span></button>
			  <strong>Error de Autenticación:</strong> Usuario y / o Contraseña incorrectos.
		</div>
	</div>


	<div id="alerta-roja" class="inactivo">
		<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
			  </span></button>
			  <strong>Error de Autenticación:</strong> Usuario Inactivo Comuniquese con el Administrador del Sistema.
		</div>
	</div>

	<div id="alerta-roja" class="sinPermisos">
		<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
			  </span></button>
			  <strong>Error de Autenticación:</strong> No tiene los permisos suficientes para ver el contenido del Sistema.
		</div>
	</div>
	</div>
		<img src="images/kiwi.jpg" class="animated rubberBand " id="image" />
		<div class="col-md-3 center-block quitar-float text-center espacio-arriba">
			
			<h1 class="pacifico grande verde animated bounceInLeft retraso">En Retalhuleu</h1>
			

			<div class="animated fadeInDown retraso2">
				
				<h3>Ahora puedes lucir bien!</h3>
				<h4>Relojes, Billeteras, Gorras, Carteras, Joyeria, Monopods, etc..</h4>

			</div>

			</nav>
		</div>
	<br>
	<div class="container">
		<div class="row">
		<header>
			<nav id="header" class="animated fadeInDown retraso2">

			<ul class="nav">				
				<li><a href="#" class="icon-basket ">Productos</a>
						<ul>
							<li class=""><a href="productos-mujer.html">Mujeres</a></li>
							<li class=""><a href="productos.html">Hombres</a></li>
						</ul>
				</li>

				<li><a href="contacto.html" class="icon-mail-1">  Contacto</a></li>

				<li><a href="acerca.html" class="icon-info-circled">Acerca de</a></li>
				<li><a href="#modal-insertar" data-toggle="modal"><span class="icon-archive"></span>Portal</a></li>

			</ul>

			</nav>
		</header>
		</div>
	</div>
				<!-- <div class="centrar animated fadeInDown retraso2 center-block">
							
							<article>
								<iframe width="480" height="320" src="https://www.youtube.com/embed/5DvKgfEG96A" frameborder="0" allowfullscreen></iframe>
							</article>


					</div>   -->

			<footer>
				
				<div class="contenedor animated fadeInDown retraso2 ">
					
					<p class="copy">Kiwi Deals &copy 2016</p>	
						<div class="sociales">
							<a  href="https://www.facebook.com/profile.php?id=100003442677775&fref=ts"><span class="icon-facebook-squared"></span></a>
							<a href="https://www.instagram.com/kiwideals/"><span class="icon-instagram"></span></a>
							<a href="https://youtu.be/5DvKgfEG96A"><span class="icon-youtube"></span></a>
						</div>
				</div>
			</footer>


			<!-- CODIGO MODAL LOGIN  -->
			
    						<div class="modal fade" id="modal-insertar">
								<div class="modal-dialog">
									<div class="modal-content">
										
										<!-- CONTENIDO DEL HEAD - MODAL -->
										
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h2 class="text-center "><strong>Ingresar <span class="icon-users"></span></strong></h2>
										</div>
										
										<!-- Contenido de la ventana -->
										<div class="modal-body">
											
											<form action="Web-envios/controller/Logeo_controller.php" method="POST" onSubmit="return validar();">
																	
											<div class="form-group">
													<label for="usuario" class="sr-only">Usuario</label>
														<div class="input-group">
															<span class="input-group-addon"><span class="icon-user"></span></span>
															<input value="" class="form-control" type="text" id="usu" name="usu" placeholder="Usuario" required autofocus>
														</div>	
											</div>

											<div class="form-group">
													<label for="password" class="sr-only">Contraseña</label>
														<div class="input-group">
															<span class="input-group-addon"><span class="icon-lock-open"></span></span>
															<input value="" class="form-control" type="password" id="pass" name="pass" placeholder="Contraseña" required>
														</div>
											</div>
											

										<div class="modal-footer">
												<input type="submit" class="btn btn-primary" id="insertar" name="insertar"  value="Ingresar">
                                                <!--<input type="reset" class="btn btn-danger" value="Limpiar Formulario">-->
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										</div>
 
										</form>
									</div>
								</div>
							</div>


	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
		
</body>
</html> 