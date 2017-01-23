<?php 
	session_start();
		//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
	}

	require_once("../model/Productos_model.php");
	$obj = new Productos();
	$inst = new Productos();


	if(isset($_POST['boton'])){
		$boton = $_POST['boton'];
		if($boton==='buscar')
		{
			$inicio = 0;
	        $limite = 3;
	        if (isset($_POST['pagina'])) {
	        	
	        	$inicio=$_POST['pagina'];
	            $nuevo_inicio = ($inicio - 1) * $limite;
	        }

	        $valor = $_POST['valor'];
			
			$inst = new Productos();
			$a= $inst->getProductos($valor);
			$b=count($a);
			$c= $inst->getProductos($valor,$nuevo_inicio,$limite);
			
			echo json_encode($c)."*".$b;
		}
	}


	if (isset($_POST['insertar'])) 
	{
		$nombre = htmlentities(addslashes($_POST['nombre']));
		$precio = htmlentities(addslashes($_POST['precio']));
		$descripcion = htmlentities(addslashes($_POST['descripcion']));
		$existencia = htmlentities(addslashes($_POST['existencia']));

		$boll = $obj->insertar($nombre,$precio,$descripcion,$existencia);

			if ($boll) {
				header("Location:../view/modules/Productos_view.php");
			}

			else{
				header("Location:../view/modules/Productos_view.php");
			}
	}
	
	
	if (isset($_POST['actualizar'])) {
		
		$id = $_POST['idProducto'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$descripcion = $_POST['descripcion'];

		$res = $obj->editar($id, $nombre, $precio, $descripcion);
		
			if($res){
				echo "<script>alert('Se Edito correctamente :)');</script>;";
				echo "<script>window.location.href='../view/modules/Productos_view.php'</script>";
			}

			else{
				echo "<script>alert('No se edito ningún registro :(');</script>;";
				echo "<script>window.location.href='../view/modules/Productos_view.php'</script>";
			}
	}

	else{	
			$idProducto = $_GET['idProducto'];
		
			$borrar = $inst->eliminar($idProducto);

			if ($borrar) {
				//echo "Registro Eliminado Correctamente";
				header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
				


			else{
				echo "No se elimino ningún Registro";
				//header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
				
		}
 ?>