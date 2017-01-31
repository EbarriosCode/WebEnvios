<?php 
    session_start();
        
    if (!isset($_SESSION['Usuario'])) {
        header("Location:../../../index.php");
    }

    if($_SESSION['acceso'] != 1)
        header("Location:../../../index.php?rol=fail"); 
    
	require_once("../../Panel-admin/model/ReporteEnviosFE_model.php");
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
			header("Location:ReporteEnviosFE_controller.php");
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
	
	require_once("../pages/ReporteEnviosFE_view.php");
 ?>