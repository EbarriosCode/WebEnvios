<?php 
	$id = $_POST['id'];
	if(isset($_POST['pagado'])){
		$pagado = $_POST['pagado'];
		

		if($pagado)
			echo $pagado." id: ".$id;

		else{
			$pagado=0;
			echo $pagado." id: ".$id;
		}
	}
	else{				
		echo "0 id: ".$id;
	}
	
	
 ?>