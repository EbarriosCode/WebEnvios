<?php 

	class Productos{
		private $conn,$db,$productos;

		public function __construct()
		{
			require_once('../../../Web-envios/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->productos = array();
		}

		public function getProductos($valor,$inicio=false,$no_registros=false)
		{	
			if($inicio!==false && $no_registros!==false)
			{
				
				$sql = "SELECT * FROM productos WHERE nombreProducto LIKE '%".$valor."%' 
												   OR precio LIKE '%".$valor."%'
												   OR descripcion LIKE '%".$valor."%'
												   OR existencia LIKE '%".$valor."%'
						ORDER BY id_producto DESC LIMIT $inicio,$no_registros";
			}

			else
			{
				$sql = "SELECT * FROM productos ORDER BY id_producto ASC";
			}

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->productos[] = $row;
			}

			return $this->productos;
			$this->db = null;
		}


		public function insertar($producto,$precio,$descripcion,$existencia)
		{		
			$sql = "INSERT INTO productos(nombreProducto,precio,descripcion,existencia) VALUES('$producto',$precio,'$descripcion',$existencia)";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
			$this->db = null;
		}

		public function eliminar($id)
		{
			$sql = "DELETE FROM productos WHERE id_producto='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}

			$this->db = null;
		}

		public function editar($id,$producto,$precio,$descripcion,$existencia)
		{
			$sql = "UPDATE productos SET nombreProducto='$producto',precio=$precio,descripcion='$descripcion',existencia=$existencia WHERE id_producto='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
			$this->db = null;
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM productos";
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;

			$this->db = null;
		}
	}

	/*$r = new Productos();
	echo json_encode(intval($r->numRegistros()));
	$r = new Productos();
	echo json_encode($r->getProductos(0,1));
	$r = new Productos();
	echo json_encode($r->insertar('no funciona',3,'ola k ase',3));
	$r = new Productos();
	echo $r->eliminar(15);*/

 ?>