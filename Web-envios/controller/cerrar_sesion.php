<?php 
	
	session_start();
	session_destroy();
	header("Location:../../index.php");
	/*if(isset($_GET['rol']))
	{	
		$rol = $_GET['rol'];
		session_start();
		session_destroy();
		header("Location:../../index.php?rol=$rol");
	}

	else
	{
		session_start();
		session_destroy();
		header("Location:../../index.php");
	}
		*/
 
 ?>