<?php 
	class EnviosEdit{
		private $conn,$db,$envios;

		public function __construct()
		{
			require_once('../../../Web-envios/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->envios = array();			
		}

		public function editar($id,$cliente,$telefono,$numeroGuia,$departamento,$producto,$cantidad,$precio,$fecha,$estado)
		{
			$sql = "UPDATE envios SET cliente='$cliente', telefono='$telefono', numeroGuia='$numeroGuia', departamento_fk='$departamento', producto_fk='$producto', cantidad='$cantidad', precio_envio='$precio', fecha='$fecha', estado_entrega='$estado' WHERE id_envio='$id'";

			$result = $this->db->prepare($sql);
			$rs = $result->execute();

			if($rs)
				return 1;
			else
				return 0;

			$this->db = null;
		}

		public function getDatosEnvio($id)
		{
			$sql = "SELECT id_envio,cliente,telefono,numeroGuia,nombreDepartamento,departamento_fk,nombreProducto,producto_fk,cantidad,precio_envio,fecha,estado_entrega,pago_cargo FROM envios E INNER JOIN departamento D ON E.departamento_fk = D.id_departamento INNER JOIN productos P ON E.producto_fk = P.id_producto WHERE id_envio = $id";

			$stmt = $this->db->prepare($sql);
			
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->envios[] = $row;
			}

			return $this->envios;
			$this->db = null;
		}

		public function getDepartamento()
		{
			$sql = "SELECT id_departamento,nombreDepartamento FROM departamento";
			$stmt = $this->db->prepare($sql);
			
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->Depto_Prod[] = $row;
			}

			return $this->Depto_Prod;
			$this->db = null;
		}

		public function getProductos()
		{
			$sql = "SELECT * FROM productos";
			$rs = $this->db->prepare($sql);
			
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$this->productos[] = $row;
			}

			return $this->productos;
			$this->db = null;
		}

		public function descontarExistenciaProductos($id,$resta)
		{
			$sql = "UPDATE productos SET existencia=existencia-'$resta' WHERE id_producto='$id'";
			$rs = $this->db->prepare($sql);
			$descExistencia = $rs->execute();

			if($descExistencia){
				return true;
				$this->db = null;
			}
			else{
				return false;
				$this->db = null;
			}
			
			
		}

		public function ValidaNuevaExistencia($id)
		{
			$sql = "SELECT existencia FROM productos WHERE id_producto='$id'";
			$rs = $this->db->prepare($sql);
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$existencia = $row['existencia'];
			}
			return $existencia;
			$this->db = null;
		}

		// metodo para obtener la cantidad del producto que lleva el envio que se va a editar
		public function getCantidadEnvio($id)
		{
			$sql = "SELECT id_envio,cliente,cantidad FROM envios WHERE id_envio='$id'";
			$rs = $this->db->prepare($sql);
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$existencia = $row['cantidad'];
			}
			return $existencia;
			$this->db = null;
		}
	}

	/*$r = new EnviosEdit();
	echo json_encode($r->getCantidadEnvio(22));*/
 ?>