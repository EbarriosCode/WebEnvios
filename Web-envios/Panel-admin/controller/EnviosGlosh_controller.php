<?php
    session_start();
        
    if (!isset($_SESSION['Usuario'])) {
        header("Location:../../../index.php");
    }

    if($_SESSION['acceso'] != 1)
        header("Location:../../../index.php?rol=fail"); 
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

	// Cargando combos departamento y producto del modal +
	$inst = new EnviosGlosh();
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
		$producto = $_POST['producto'];
		$cantidad = $_POST['cantidadN']; 
		$precio = $_POST['precio'];
		$fecha = $_POST['fecha']; 
		$estado = $_POST['status'];

		$insertar = new EnviosGlosh();
		$descontarExistencia = new EnviosGlosh();
		// objeto para validar que la existencia se mayor que 5
		$existenciaCoherente = new EnviosGlosh();
		$validaExistencia = $existenciaCoherente->ValidaNuevaExistencia($producto);

		if($validaExistencia > $cantidad)
		{
			
			$verificaInsertado = $insertar->insertar($cliente,$telefono,$numeroGuia,$departamento,$direccion,$producto,$cantidad,$precio,$fecha,$estado);	
			
			if($verificaInsertado)
			{	
				$descontarExistencia->descontarExistenciaProductos($producto,$cantidad);
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
			echo "<script>alert('Error No se Guardo el registro Porque la existencia es menor a lo que desea Enviar');";
			echo "window.location.href='EnviosGlosh_controller.php'</script>";
		}				
	}

	// eliminar registros
	$obj = new EnviosGlosh();
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

	// operción de marcar como pagado un envío de kiwi
	$pagar = new EnviosGlosh();

	if(isset($_POST['id']))
	{
		$id = $_POST['id'];

		if(isset($_POST['pagado']))
		{
			$pagado = $_POST['pagado'];
			

			if($pagado)
			{
				//echo $pagado." id: ".$id;
				$pagarlo = $pagar->Pagado($id,$pagado);
				if($pagarlo){
					//echo "<script>alert('Registro Pagado Correctamente');";
					echo "<script>window.location.href='EnviosGlosh_controller.php';</script>";
				}
				else{
					echo "<script>alert('Registro No Pagado ');</script>";
				}
			}

			else
			{
				$pagado=0;
				//echo $pagado." id: ".$id;
				$pagarlo = $pagar->Pagado($id,$pagado);
				if($pagarlo){
					echo "<script>alert('Acaba de Cambiar de Pagado a No pagado este Registro');";
					echo "window.location.href='EnviosGlosh_controller.php'</script>";
				}
				else{
					echo "<script>alert('Registro No Pagado ');</script>";
				}
			}
		}

		else
		{		
			//echo "0 id: ".$id;
			$pagarlo = $pagar->Pagado($id,0);
			if($pagarlo){
					echo "<script>alert('Para marcar como Pagado debera marcar la casilla, el registro aparecerá como no Pagado');";
					echo "window.location.href='EnviosGlosh_controller.php'</script>";
			}
			else{
				echo "<script>alert('Registro No Pagado ');</script>";
			}
			
		}
	}
	require_once("../pages/EnviosGlosh_view.php");
 ?>