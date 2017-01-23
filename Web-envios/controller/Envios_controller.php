<?php 
	
	require_once("../model/Envios_model.php");
	
	$boton = $_POST['boton'];
	if($boton==='buscar')
	{
		$inicio = 0;
        $limite = 15;
        if (isset($_POST['pagina'])) {
        	$pagina=$_POST['pagina'];
            $inicio = ($pagina - 1) * $limite;
        }

        $valor=$_POST['valor'];
		
		$inst = new Envios();
		$a= $inst->getEnvios($valor);
		$b=count($a);
		$c= $inst->getEnvios($valor,$inicio,$limite);
		
		echo json_encode($c)."*".$b;
	}


	

 ?>