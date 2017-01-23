<?php 
	require_once("../../Panel-admin/model/Envios_model.php");
	$id = $_GET['parametro'];
	$existencia = new Envios();
	echo "<strong>[ Disponibles en Existencias: ".$existencia->ValidaNuevaExistencia($id)." ]</strong>";
 ?>