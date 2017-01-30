<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Envios</title>
	<link rel="stylesheet" href="../../view/css/css-font/fontello.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	<!-- Bootstrap Core CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">


    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href>Web - Envios Admin (Bebe de Rayas)</a>
            </div>


            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['Usuario']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../controller/Perfil_controller.php"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?> </a>
                        </li>
                        <li><a href="../../controller/PrincipalLogeado_controller.php"><i class="fa fa-home fa-fw"></i> Ir al Inicio</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../controller/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar....">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../index.php"><i class="fa fa-dashboard fa-fw"></i> Administración </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reportes Gráficos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Gráficas Kiwi <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="../controller/GraficaPie_controller.php">Gráfica PIE</a>
                                        </li>
                                        <li>
                                            <a href="../controller/GraficaPiramide_controller.php">Gráfica PIRAMIDE</a>
                                        </li>                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Gráficas Glosh <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="../controller/GraficaPieGlosh_controller.php">Gráfica PIE</a>
                                        </li>
                                        <li>
                                            <a href="../controller/GraficaPiramideGlosh_controller.php">Gráfica PIRAMIDE</a>
                                        </li>                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> 
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Mantenimiento de Productos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../controller/Productos_controller.php">Productos Kiwi</a>
                                </li>
                                <li>
                                    <a href="../controller/ProductosGlosh_controller.php">Productos Glosh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>        
                        <li>
                            <a href="#"><i class="icon-truck"></i> Mantenimiento de Envios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../controller/Envios_controller.php"> Envios Kiwi</a>
                                </li>
                                <li>
                                    <a href="../controller/EnviosGlosh_controller.php"> Envios Glosh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <li>
                        <li>
                            <a href="../controller/Usuarios_controller.php"><i class="fa fa-sitemap fa-fw"></i> Administración de Usuarios</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

        </nav>

<div id="page-wrapper">
           

<!--  FORMULARIO PARA EDITAR -->
				<br>	
				<h2 class="text-center">Edición de Registro de Envios <span class="icon-pencil"></span></h2><hr>	
		<div class="row">
			<form action="EnviosEdit_controller.php" method="POST">
			<?php foreach($envios as $item){ ?>
				<div class="form-group col-md-6">				
					<input type="hidden" id="id" name="id" value="<?php echo $item['id_envio']; ?>">
					<label for="nombre">Nombre del Cliente:</label>
					<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $item['cliente']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="telefono">Teléfono:</label>
					<input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $item['telefono']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="numeroGuia">Número de Guía</label>
					<input type="text" id="numeroGuia" name="numeroGuia" class="form-control" value="<?php echo $item['numeroGuia']; ?>">
				</div>

				<div class="form-group col-md-6">
					<label for="departamento">Departamento:</label>
					<select name="departamento" id="departamento" class="form-control">
						<?php 
							foreach ($departamentos as $deptos) {
								echo "<option value='$deptos[id_departamento]'";
									if($deptos['id_departamento']==$item['departamento_fk']){
										echo "selected";
									}
								echo ">".$deptos['nombreDepartamento']."</option>";
							}
						 ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="producto">Producto:</label>
					<select name="producto" id="producto" class="form-control">
						<?php 
							foreach ($productos as $prod) {
								echo "<option value='$prod[id_producto]'";
									if($prod['id_producto']==$item['producto_fk']){
										echo "selected";
									}
								echo ">".$prod['nombreProducto']."</option>";
							}
						 ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="cantidad">Cantidad:</label>
					<input type="number" id="cantidad" name="cantidad" class="form-control" value="<?php echo $item['cantidad']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="precio">Precio:</label>
					<input type="text" id="precio" name="precio" class="form-control" value="<?php echo $item['precio_envio']; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="fecha">Fecha:</label>
					<input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $item['fecha']; ?>">
				</div>
				 <div class="form-group col-md-12">
				 	<label for="status">Estado:</label><br>                   
                    <label class="radio-inline">
                   
                      <input type="radio" name="status" id="Radio1" value="1" <?php if($item['estado_entrega']==1){echo "checked";} ?>> Entregado
                   
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="status" id="Radio2" value="0" <?php if($item['estado_entrega']==0){echo "checked";} ?>> Pendiente
                      
                    </label>

                    <label class="radio-inline">
                      <input type="radio" name="status" id="Radio3" value="2" <?php if($item['estado_entrega']==2){echo "checked";} ?>> Devolución
                      
                    </label>
                </div>
                <!--Validación de no permitir editar si el envío ya esta entregado y pagado pagado por Cargo Expreso-->
                <?php  
                    $dis;

                    if($item['estado_entrega'] == 1 && $item['pago_cargo'] == 1)
                        $dis = "disabled";
                    else
                        $dis = null;
                ?>
                <div class="form-group col-md-12 text-center">
                	<button type="submit" class="btn btn-info" id="actualizar" name="actualizar" <?php echo $dis; ?>>Actualizar <span class="icon-ok"></span></button>
                	<a href="Envios_controller.php" class="btn btn-warning">Cancelar y Regresar<span class="icon-reply-all"></span></a>
                </div>   
			</form>
			<?php } ?>
		</div>
        
        <?php if($dis != null){ ?>
        <div id="alerta-roja" class="elemento">
            <div id="alerta" class="alert alert-danger text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Imposible Editar:</strong> Este Envío es imposible de editar debido a que ya esta entregado y pagado por Cargo Expreso.
            </div>
        </div>
        <?php }  ?>
		<hr>
        <footer>
            <p>&copy; 2017 Kiwi Deals.</p>
        </footer> 
</div>
        

	
	<script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>