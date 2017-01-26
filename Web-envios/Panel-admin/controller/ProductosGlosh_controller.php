<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../../index.php"));
	}

	require_once("../../Panel-admin/model/ProductosGlosh_model.php");
	$obj = new ProductosGlosh();
	$objeto = new ProductosGlosh();
	// CRUD
	if(isset($_POST['insertar']))
	{
		$producto = $_POST['nombre'];
		$precio = $_POST['precio'];
		$descripcion = $_POST['descripcion'];
		$existencia = $_POST['existencia'];

		echo $comprobar = $obj->insertar($producto,$precio,$descripcion,$existencia);
			if($comprobar)
			{
				echo "<script>alert('Registro Almacenado Correctamente');";
				echo "window.location.href='ProductosGlosh_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('No se inserto ningún registro');</script>";
				//echo "<script>window.location.href='Productos_controller.php'</script>";
			}
	}

	if(isset($_POST['actualizar'])){
		 $id = $_POST['idProducto'];
		 $producto = $_POST['nombre'];
		 $precio = $_POST['precio'];
		 $descripcion = $_POST['descripcion'];
		 $existencia = $_POST['existencia'];

		 echo $verifica = $objeto->editar($id,$producto,$precio,$descripcion,$existencia);
			if($verifica)
			{
				echo "<script>alert('Registro Actualizado Correctamente');";
				echo "window.location.href='ProductosGlosh_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('Error No se Actualizao el registro');";
				echo "window.location.href='ProductosGlosh_controller.php'</script>";
			}		
		
	}
	
	if(isset($_GET['accion']))
	{
		//echo "Entre al borrar";
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idProducto = $_GET['idProducto'];

			echo $bool = $obj->eliminar($idProducto);
			if ($bool) {
				echo "<script>alert('Registro Borrado Correctamente');";
				echo "window.location.href='ProductosGlosh_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');";
			}
		}
	}


	// búsqueda
	$buscar = "";
	if(isset($_POST['buscar']))
	{
	 	$buscar = $_POST['buscar'];
	}

	// Inicia paginación
	$cant_filas = new ProductosGlosh();
	$pagination = new ProductosGlosh();	
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina'] == 1)
		{
			header("Location:ProductosGlosh_controller.php");
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
	$productos = $pagination->getProductos($buscar,$nuevo_inicio,$no_registros);
	
	$total_registros = $cant_filas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	
	require_once("../../Panel-admin/pages/ProductosGlosh.php");
 ?>