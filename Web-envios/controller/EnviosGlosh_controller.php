<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../../index.php"));
	}

	if($_SESSION['acceso'] == 2)
		header(("Location:../../index.php?rol=fail"));

	require_once("../model/EnviosGlosh_model.php");
	$obj = new Envios();
	$objeto = new Envios();

	// búsqueda
	$buscar = "";
	if(isset($_POST['buscar']))
	{
	 	$buscar = htmlentities(addslashes($_POST['buscar']));
	}

	// Inicia paginación
	$cant_filas = new Envios();
	$pagination = new Envios();	
	$no_registros = 25;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina'] == 1)
		{
			header("Location:EnviosGlosh_controller.php");
		}
		else{
			$inicio = $_GET['pagina'];
			//$nuevo_inicio = ($inicio-1)*$no_registros;
		}
	}
	
	if(!(isset($_GET['pagina'])))
	{
		$inicio = 1;
	}		
	
	$nuevo_inicio = ($inicio-1)*$no_registros;
	//echo $buscar;
	$envios = $pagination->getEnvios($buscar,$nuevo_inicio,$no_registros);

	// esta es una mala practica lo hice y funciono volvi a verificar si busqueda existe :(
	if(isset($_POST['buscar']))
	{
		$num_registrosBusqueda = count($envios);
	}

	$total_registros = $cant_filas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	// fin de la paginacion y envios de kiwiPor mayor

	// Cargando combos departamento y producto del modal +
	$inst = new Envios();
	$Departamentos = $inst->getDepartamento();
	$Productos = $inst->getProductos();

	// insertar registros
	if(isset($_POST['insertar']))
	{
		$cliente = $_POST['nombre'];
		$telefono = $_POST['telefono']; 
		$numeroGuia = $_POST['numeroGuia'];
		$departamento = $_POST['departamento'];
		$direccion = $_POST['direccion'];
		
		$producto = $_POST['productos'];  // array
		$cantidad = $_POST['cantidadN'];  // array
		
		$precio = $_POST['precio'];
		$fecha = $_POST['fecha']; 
		$estado = $_POST['status'];

		$insertar = new Envios();
		$descontarExistencia = new Envios();
		// objeto para validar que la existencia se mayor que 5
		$existenciaCoherente = new Envios();
		
		for($i=0; $i<sizeof($producto); ++$i)
		{
			$validaExistencia[$i] = $existenciaCoherente->ValidaNuevaExistencia($producto[$i]);
		

			if($validaExistencia[$i] > $cantidad[$i])
			{
			
				$verificaInsertado = $insertar->insertar($cliente,$telefono,$numeroGuia,$departamento,$direccion,$producto[$i],$cantidad[$i],$precio,$fecha,$estado);	
			
			
				if($verificaInsertado)
				{	
					$descontarExistencia->descontarExistenciaProductos($producto[$i],$cantidad[$i]);
					echo "<script>alert('Registro Guardado Correctamente');";
					echo "window.location.href='EnviosGlosh_controller.php'</script>";
				}

				else
				{
					echo "<script>alert('Error No se Guardo el registro');</script>";
					//echo "window.location.href='Envios_controller.php'</script>";
				}

			}

			else
			{
				echo "<script>alert('Error No se Guardo el registro Porque la existencia es menor a lo que desea Enviar');</script>";
				//echo "window.location.href='Envios_controller.php'</script>";
			}
		}	   				
	}
	// eliminar registros
	if(isset($_GET['accion']))
	{
		//echo "Entre al borrar";
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idEnvio = $_GET['idEnvio'];

			echo $bool = $obj->eliminar($idEnvio);
			if ($bool) {
				echo "<script>alert('Registro Borrado Correctamente');";
				echo "window.location.href='EnviosGlosh_controller.php?true'</script>";
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');";
			}
		}
	}

	require_once("../view/modules/EnviosGlosh_view.php");
 ?>