<?php 
	require_once("../../Panel-admin/model/Envios_model.php");
	$id = $_GET['parametro'];
	$existencia = new Envios();
	$cantExistencia = $existencia->ValidaNuevaExistencia($id);
	//echo "<strong>[ En Existencia: ".$cantExistencia." ]</strong>";
	echo "<input type='hidden' id='existenciaBD' name='existenciaBD' value='".$cantExistencia."'>";
 ?>