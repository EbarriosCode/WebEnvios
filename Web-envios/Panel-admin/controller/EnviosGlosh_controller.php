<?php
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../../index.php"));
	} 
	// de aquí para abajo inician operaciones a la tabla de envios de Glosh
	//Inician los envios de glosh
	require_once("../../Panel-admin/model/EnviosGlosh_model.php");

	// búsqueda
	$buscar = "";
	if(isset($_POST['buscar']))
	{
	 	$buscar = htmlentities(addslashes($_POST['buscar']));
	}

	$glosh = new EnviosGlosh();
	$cant_filasGlosh = new EnviosGlosh();
	$paginationGlosh = new EnviosGlosh();	
	$cant_registros = 15;

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
	
	$nuevo_inicio = ($inicio-1)*$cant_registros;
	//echo $buscar;
	$enviosGlosh = $paginationGlosh->getEnvios($buscar,$nuevo_inicio,$cant_registros);

	// esta es una mala practica lo hice y funciono volvi a verificar si busqueda existe :(
	if(isset($_POST['buscar']))
	{
		$num_registrosBusqueda = count($enviosGlosh);
	}

	$total_registrosGlosh = $cant_filasGlosh->numRegistros();
	$total_paginasGlosh = ceil($total_registrosGlosh/$cant_registros);
	
	// fin de la paginación y envios de glosh

	require_once("../pages/EnviosGlosh_view.php");
 ?>