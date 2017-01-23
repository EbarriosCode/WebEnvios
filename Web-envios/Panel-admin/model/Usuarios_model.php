<?php 
	class Usuarios{
		private $conn,$db,$usuarios,$roles,$status;

		public function __construct()
		{
			require_once('../../../Web-envios/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->usuarios = array();
			$this->roles = array();
			$this->status = array();
		}

		public function getUsuarios()
		{
			$sql = "SELECT id,nombre,apellido,usuario,password,tipo,estado,id_rol,nombreRol,id_estado_usuario,nombre_estado_usuarios 
					FROM usuarios_sistema User
					INNER JOIN rol_usuarios Rol ON User.tipo = Rol.id_rol
					INNER JOIN estado_usuarios Estado ON User.estado = Estado.id_estado_usuario ORDER BY User.id ASC";

			$rs = $this->db->prepare($sql);
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[] = $row;
			}

			return $this->usuarios;
			$this->db = null;
		}

		public function getRol()
		{
			$sql = "SELECT id_rol,nombreRol FROM rol_usuarios ORDER BY id_rol DESC";
			$rs = $this->db->prepare($sql);
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$this->roles[] = $row;
			}

			return $this->roles;
			$this->db = null;
		}

		public function getStatusUser()
		{
			$sql = "SELECT id_estado_usuario,nombre_estado_usuarios FROM estado_usuarios";
			$rs = $this->db->prepare($sql);
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$this->status[] = $row;
			}

			return $this->status;
			$this->db = null;
		}

		public function editar($id,$nombre,$apellido,$nick,$password,$rolUsuario,$status)
		{
			$sql = "UPDATE usuarios_sistema SET nombre='$nombre', apellido='$apellido', usuario='$nick', password='$password', tipo='$rolUsuario', estado='$status' WHERE id='$id'";
			$rs = $this->db->prepare($sql);
			$bool = $rs->execute();

			if($bool)
			{
				return true;
				$this->db = null;
			}
			else
			{
				return false;
				$this->db = null;
			}

		}

		public function insertar($nombre,$apellido,$nick,$password,$rolUsuario,$status)
		{
			$sql = "INSERT INTO usuarios_sistema (nombre,apellido,usuario,password,tipo,estado) VALUES('$nombre','$apellido','$nick','$password','$rolUsuario','$status')";
			$rs = $this->db->prepare($sql);
			$bool = $rs->execute();

			if($bool)
			{
				return true;
				$this->db = null;
			}
			else
			{
				return false;
				$this->db = null;
			}
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM usuarios_sistema";
			$resultado = $this->db->query($sql);
			$num = $resultado->fetchColumn();
		
			return $num;
			$this->db = null;
		}
	}

	/*$r = new Usuarios();
	echo json_encode($r->getStatusUser()); */
 ?>