<?php 
    session_start();
        
    if (!isset($_SESSION['Usuario'])) {
        header("Location:../../../index.php");
    }

    if($_SESSION['acceso'] != 1)
        header("Location:../../../index.php?rol=fail"); 

	require_once("../../Panel-admin/model/EnviosEditGlosh_model.php");
	$obj = new EnviosEditGlosh();
	$inst = new EnviosEditGlosh();
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$envios = $inst->getDatosEnvio($id);
	}

	if(isset($_POST['actualizar']))
	{
		$idEdit = $_POST['id'];
		$cliente = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$numeroGuia = $_POST['numeroGuia'];
		$departamento = $_POST['departamento'];
		$producto = $_POST['producto'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$fecha = $_POST['fecha'];
		$estado = $_POST['status'];

		// objeto para validar si la cantidad que viene del form edit es igual a la que ya estaba guarda en al bd
		$cant = new EnviosEditGlosh();
		$num = new EnviosEditGlosh();
		$getCantidadEnvio = $cant->getCantidadEnvio($idEdit);
		//echo "Cantidad que trae el form: ".$cantidad;
		$cantidadAux = $cantidad;
		if($cantidad == $getCantidadEnvio)
		{			
			//echo "son iguales";
			$cantidad = null;
		}

		// validación si la cantidad que viene del form edit es menor a lo que hay en el envio en la bd 
		// se debe devolver lo que sobra a la existencia en la tabla productos de la db
		else if($cantidad < $getCantidadEnvio)
		{			
			//echo "Sumar a existencia: ".$sumar = $getCantidadEnvio-$cantidad;
			//echo "Id: ".$producto;
			$sumar = $getCantidadEnvio-$cantidad;
			$cant->sumarExistenciaProductos($producto,$sumar); 
			$cantidadAux = $getCantidadEnvio-$sumar;
			$cantidad = null;
			//echo "entro donde no tenia que entrar lo que hay es mayor que lo quemando";
		}

		//validación si la cantidad que viene del form edit es mayor a lo que hay en el envio de la bd
		// se debe descontar de la existencia de productos solo la diferencia y no la cantidad completa que viene en el post
		if($cantidad > $getCantidadEnvio)
		{
			/*$diferenciaRestar = $cantidad-$getCantidadEnvio; 
			echo "Diferencia a restar en existencia: ".$diferenciaRestar;
			$cantidadAux = $cantidad;
			echo "Valor a setear en el envio :".$cantidadAux; */
			$cantidadAux = $cantidad;
			$cantidad = $cantidad-$getCantidadEnvio;
			//echo "Esta mandando mas de lo que habia mandado";
		}

		// objetos para descontar y validar la existencia a la hora de hacer un envio
		$descontarExistencia = new EnviosEditGlosh();
		$existencia = new EnviosEditGlosh();
		
		if($existencia->ValidaNuevaExistencia($producto) >= $cantidad)
		{
			$editar = $inst->editar($idEdit,$cliente,$telefono,$numeroGuia,$departamento,$producto,$cantidadAux,$precio,$fecha,$estado);

			if($editar)
			{
				$descontarExistencia->descontarExistenciaProductos($producto,$cantidad);
				echo "<script>alert('Registro Actualizado Correctamente');</script>";
				echo "<script>window.location.href='EnviosGlosh_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('No se Actualizo el registro');</script>";
				echo "<script>window.location.href='EnviosGlosh_controller.php'</script>";
			}  
		}
		else
		{
			echo "<script>alert('Imposible actualizar la existencia es menor a lo que está intentando enviar!');</script>";
				echo "<script>window.location.href='EnviosGlosh_controller.php'</script>";
		} 
	}

	// cargar combos de departamento y producto
	$departamentos = $obj->getDepartamento();
	$productos = $obj->getProductos();
	
	require_once("../pages/EnviosEditGlosh_view.php");
 ?>