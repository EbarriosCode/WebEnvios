<?php 
	class Productos{
		private $db, $conn, $envios;

		public function __construct()
		{
			require_once("Conexion.php");
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();
			$this->envios = array();
		}

		public function getProductos($valor,$inicio=FALSE,$limite=FALSE){

			if ($inicio!==FALSE && $limite!==FALSE) {
				$sql="SELECT * FROM productos WHERE nombreProducto LIKE '%".$valor."%' OR precio LIKE '%".$valor."%'
												    OR descripcion LIKE '%".$valor."%' OR existencia LIKE '%".$valor."%' ORDER BY id_producto ASC LIMIT $inicio,$limite";
				 
			}
			else{
				$sql="SELECT * FROM productos WHERE nombreProducto LIKE '%".$valor."%' OR precio LIKE '%".$valor."%'
												    OR descripcion LIKE '%".$valor."%' OR existencia LIKE '%".$valor."%' ORDER BY id_producto ASC";
			}
			
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->envios[] = $row;
			}

			return $this->envios;
		}

		public function insertar($nombre, $precio, $descripcion, $existencia)
		{
			$sql = "INSERT INTO productos (nombreProducto,precio,descripcion,existencia) VALUES ('".$nombre."','".$precio."','".$descripcion."','".$existencia."')";
				
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();

				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function editar($id, $nombre, $precio, $descripcion)
		{
			$sql = "UPDATE productos SET nombreProducto='$nombre', precio='$precio', descripcion='$descripcion' WHERE id='$id'";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();

				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function elimina($id)
		{
		  $sql = "DELETE FROM productos WHERE id_productos = '$id'";
		  $rs = $this->conn->prepare($sql);
		  $result = $rs->execute();

 				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}
	}
		
	/*$r = new Productos();
	echo $r->borrar(11); */

 ?>