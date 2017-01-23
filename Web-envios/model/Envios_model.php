<?php 
	
	class Envios{

		private $db, $conn, $envios;

		public function __construct()
		{
			require_once("Conexion.php");
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();
			$this->envios = array();
		}

		public function getEnvios(/*$valor,$inicio=false,$fin=false*/)
		{			

			//if($inicio!==false && $fin!==false){
				$sql="select envios.id,cliente,telefono,numeroGuia,nombreDepartamento,direccion,nombreProducto,cantidad,envios.precio,fecha,estado_entrega 
	from envios,departamento,productos 
	where envios.departamento_fk=departamento.id 
		and envios.producto_fk=productos.id";
			/*}
			
			else
			{
				$sql = "SELECT  FROM envios,departamento,productos WHERE envios.departamento_fk=departamento.id 
					  	AND envios.producto_fk=productos.id ORDER BY envios.id ASC";
			}*/

			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->envios[] = $row;
			}
			return $this->envios;  
		}
	}


	$obj = new Envios();
	$r = $obj->getEnvios();
	echo json_encode($r);


 ?>