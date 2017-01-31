<?php 
		
    session_start();
        
    if (!isset($_SESSION['Usuario'])) {
        header("Location:../../../index.php");
    }

    if($_SESSION['acceso'] != 1)
        header("Location:../../../index.php?rol=fail"); 

		require_once("../../Panel-admin/pages/GraficaPiramide.php");
 ?>