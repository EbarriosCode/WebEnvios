<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../../index.php"));
	}
	require_once("../../Panel-admin/model/EnviosEdit_model.php");
	$obj = new EnviosEdit();
	$inst = new EnviosEdit();
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

		$editar = $inst->editar($idEdit,$cliente,$telefono,$numeroGuia,$departamento,$producto,$cantidad,$precio,$fecha,$estado);

		if($editar)
			{
				echo "<script>alert('Registro Actualizado Correctamente');";
				echo "window.location.href='Envios_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('No se Actualizo el registro');</script>";
				echo "<script>window.location.href='Envios_controller.php'</script>";
			}
	}

	// cargar combos de departamento y producto
	$departamentos = $obj->getDepartamento();
	$productos = $obj->getProductos();
	
	require_once("../pages/EnviosEdit_view.php");
 ?>