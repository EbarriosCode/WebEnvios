<?php

$para = "guayobarrios@kiwideals.esy.es";
$asunto = $_POST["asunto"];
$nombre = $_POST["nombre"];
$mensaje = $_POST["mensaje"];

$de = $_POST["correo"];

$headers = "MINE-Version:1.0;\r\n";
$headers .= "Content-type: text\html; \r\n charset=utf-8; \r\n";
$headers .= "From: $de \r\n";
$headers .= "To: $para; \r\n Subject:$asunto \r\n ";

	if(mail($para, $asunto, $mensaje, $headers))
	{
		echo "Mensaje enviado correctamente";
	}  

	else
	{
		echo "Mensaje no enviado";
	}

?>