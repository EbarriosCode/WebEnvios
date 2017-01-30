<?php 
	
	$usu = htmlentities(addslashes($_POST['usu']));
	$pass = htmlentities(addslashes($_POST['pass']));
	
	require_once('../model/Logeo_model.php');
	
	$usersLogeados = new Usuarios_sistema(); 

		//$usersLogeados->setUsuario();
		
			if ($usersLogeados->entrarSystem($usu,$pass))
			{
				$verificacion = $usersLogeados->autenticar($usu);
				foreach($verificacion as $autenticado)
				{
					$id = $autenticado['id'];
					$type = $autenticado['tipo'];
					$status = $autenticado['estado'];
					$acceso = $autenticado['acceso'];
				}
				//echo "Existe -- Usuario";
				session_start();
				$_SESSION['Usuario'] = $_POST['usu'];
				$_SESSION['tipo'] = $type;
				$_SESSION['estado'] = $status;
				$_SESSION['idUser'] = $id;
				$_SESSION['acceso'] = $acceso;
				//echo $_SESSION['Usuario'];

				header("Location:PrincipalLogeado_controller.php?boolean=true&user=$usu&tipo=$type&estado=$status");		
			}

			else
			{
				header("Location:../../index.php?boolean=false");
			}		

 ?>