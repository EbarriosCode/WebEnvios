<?php 

	class Conexion{
		
		private $host,$db,$user,$pass;
		// Constructor para el Servidor
		/*public function __construct(){
			$this->host = "mysql:host=mysql.hostinger.es;";
			$this->db = "dbname=u748899411_kiwi";
			$this->user = "u748899411_admin";
			$this->pass = "admin2212";
		}*/


		// constructor para localhost
		public function __construct(){
			$this->host = "mysql:host=127.0.0.1;";
			$this->db = "dbname=webenvios";
			$this->user = "root";
			$this->pass = "";
		}

		public function Conectar()
		{
			try {
				$base = new PDO($this->host.$this->db ,$this->user,$this->pass);
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				if($base){
					//echo "Exito";
					return $base;
					$base = null;
				}
			
				} catch (Exception $e) {
				die("Error: ".$e->getMessage());
			}
		}
	}
/*
	$conn = new Conexion();
	$bd = $conn->Conectar();

	$sql = "CALL SP_listaEnviosPag('fer',0,5)";
	$stmt = $bd->prepare($sql);
	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['cliente']." ".$row['nombreDepartamento']."<br>";
	}
	


	$sql = "CALL SP_listaEnviosSinPag('ed')";
	$stmt = $bd->prepare($sql);
	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['cliente']." ".$row['nombreDepartamento']."<br>";
	}
	*/
 ?>