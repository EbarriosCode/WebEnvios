<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../../index.php"));
	}

	if($_SESSION['acceso'] == 3)
		header(("Location:../../index.php?rol=fail"));
	
	require_once("../model/ReporteEnviosKiwi_model.php");
	$inst = new EnviosReporte();

	// recibir datos por post de rango de fecha
	if(isset($_POST['busqueda-fechas']))
	{
		$desde = $_POST['desde'];
		$hasta = $_POST['hasta'];
		$estado = $_POST['status'];
	}
	

	// Inicia paginación
	$cant_filas = new EnviosReporte();
	$pagination = new EnviosReporte();	
	$no_registros = 10;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina'] == 1)
		{
			header("Location:ReporteEnviosKiwi_controller.php");
		}
		else{
			$inicio = $_GET['pagina'];
			//$nuevo_inicio = ($inicio-1)*$no_registros;
			$desde = $_GET['desde'];
			$hasta = $_GET['hasta'];
			$estado = $_GET['status'];
		}
	}
	
	if(!(isset($_GET['pagina'])))
	{
		$inicio = 1;
	}		
	
	$nuevo_inicio = ($inicio-1)*$no_registros;
	
	$reporte = $inst->getEnviosPorFechas(/*$nuevo_inicio,$no_registros,*/$desde,$hasta,$estado);


	$total_registros = $cant_filas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	// fin de la paginacion
	
	require_once("../view/modules/ReporteEnviosKiwi_view.php");
 ?>