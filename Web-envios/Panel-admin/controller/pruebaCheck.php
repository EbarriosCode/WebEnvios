<?php 
	
	if(isset($_POST['pago'])){
		$pagado = $_POST['pago'];
		
	}
	if(!isset($_POST['pago'])){
		$pagado = 0;
		
	}

	echo $pagado;		
 ?>