<?php 
	require_once("../../Panel-admin/model/EnviosGlosh_model.php");
	$id = $_GET['parametro'];
	$existencia = new EnviosGlosh();
	$cantExistencia = $existencia->ValidaNuevaExistencia($id);
	//echo "<strong>[ Disponibles en Existencia: ".$cantExistencia." ]</strong>";
	echo "<input type='hidden' id='existenciaBD' name='existenciaBD' value='".$cantExistencia."'>";
 ?>