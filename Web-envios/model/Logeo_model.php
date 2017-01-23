<?php 

	class Usuarios_sistema{

		private $db, $conn;
		private $existeUsuario;

		public function __construct()
		{
			require_once('Conexion.php');
		 	$this->db = new Conexion();
		 	$this->conn = $this->db->Conectar();

		 	$this->existeUsuario = false;
		}
 
		public function entrarSystem($usu,$pass)
		{
			$sql = "SELECT * FROM usuarios_sistema WHERE usuario='$usu' AND password='$pass' ";  

			$resultado = $this->conn->prepare($sql);
			//$resultado->bindValue(":login",$this->usuario);
			//$resultado->bindValue(":pass",$this->password);
			
			$resultado->execute();
			
			$filas = $resultado->fetchAll();
			$numFilas = count($filas);

				if($numFilas)
				{
					$this->existeUsuario = true;
					return $this->existeUsuario;
				}
			
				else
				{
					$this->existeUsuario = false;
					return $this->existeUsuario;
				}	
				$this->db = null;
		}

		public function autenticar($user)
		{
			$sql = "SELECT id,tipo,estado FROM usuarios_sistema WHERE usuario='$user'";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->resultado[] = $row;
			return $this->resultado;
			$this->db = null;
		}

	}
 ?>