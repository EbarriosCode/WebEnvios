<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../../index.php"));
	}
	require_once("../../Panel-admin/model/Usuarios_model.php");
	$obj = new Usuarios();
	$Usuarios = $obj->getUsuarios();
	$Roles = $obj->getRol();
	$status = $obj->getStatusUser();

	$crud = new Usuarios();

	if(isset($_POST['actualizar']))
	{
		$id = $_POST['idUsuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nick = $_POST['nick'];
		$password = $_POST['password'];
		$rolUsuario = $_POST['rol'];
		$status = $_POST['status'];

		$editar = $crud->editar($id,$nombre,$apellido,$nick,$password,$rolUsuario,$status);
		if($editar)
			{
				echo "<script>alert('Registro Actualizado Correctamente');";
				echo "window.location.href='Usuarios_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('No se Actualizo el registro');</script>";
				echo "<script>window.location.href='Usuarios_controller.php'</script>";
			}
	}

	if(isset($_POST['insertar']))
	{
		$id = $_POST['idUsuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nick = $_POST['nick'];
		$password = $_POST['password'];
		$rolUsuario = $_POST['rol'];
		$status = $_POST['status'];

		$insertar = $crud->insertar($nombre,$apellido,$nick,$password,$rolUsuario,$status);
		if($insertar)
			{
				echo "<script>alert('Registro Guardado Correctamente');";
				echo "window.location.href='Usuarios_controller.php'</script>";
			}
			else
			{
				echo "<script>alert('No se Guardo el registro');</script>";
				echo "<script>window.location.href='Usuarios_controller.php'</script>";
			}
	}

	require_once("../pages/Usuarios_view.php");
 ?>