<?php 
	
	class User{
		private $conn,$db,$usuarios;

		public function __construct()
		{
			require_once('../../../Web-envios/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->usuarios = array();
		}

		public function getUsuarios($nombre)
		{
			$sql = "SELECT id,usuario,password,tipo FROM usuarios_sistema WHERE id='$nombre'";


			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[] = $row;
			}

			return $this->usuarios;
			$this->db = null;
		}

		public function setPassword($id,$pass)
		{
			if(strcmp($pass,'') == 0){
				return false;
			}

			else{
				$sql = "UPDATE usuarios_sistema SET password='$pass' WHERE id='$id'";
				$stmt = $this->db->prepare($sql);
				$result = $stmt->execute();

				if($result)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			$this->db = null;
		}
	}

/*$r = new User();
echo json_encode($r->getUsuarios(1));*/
 ?>