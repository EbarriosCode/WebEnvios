<?php 
	require_once("../model/EnviosGlosh_model.php");
	$id = $_GET['parametro'];
	$existencia = new Envios();
	$cantExistencia = $existencia->ValidaNuevaExistencia($id);
	echo "<strong>[ Disponibles en Existencia: ".$cantExistencia." ]</strong>";
	echo "<input type='hidden' id='existenciaBD' name='existenciaBD' value='".$cantExistencia."'>";
 ?>