<?php 

	class Envios{
		private $conn,$db,$envios,$Depto_Prod,$productos;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->envios = array();
			$this->Depto_Prod = array();
			$this->productos = array();
		}
		// metodo para obtener envios con filtros y paginacion 
		public function getEnvios($valor,$inicio=false,$no_registros=false)
		{	

			if($inicio!==false && $no_registros!==false)
			{
				
				$sql = "SELECT id_envio,cliente,telefono,numeroGuia,nombreDepartamento,nombreProducto,cantidad,precio_envio,fecha,estado_entrega,nombreEstado,pago_cargo FROM envios E 
				INNER JOIN departamento D ON E.departamento_fk = D.id_departamento 
				INNER JOIN productos P ON E.producto_fk = P.id_producto 
				INNER JOIN estado_envios S ON E.estado_entrega = S.id_estado
														WHERE cliente LIKE '%".$valor."%'											
														  OR telefono LIKE '%".$valor."%'
														  OR numeroGuia LIKE '%".$valor."%'
														  OR nombreDepartamento LIKE '%".$valor."%'
														  OR direccion LIKE '%".$valor."%'
														  OR nombreProducto LIKE '%".$valor."%'
														  OR fecha LIKE '%".$valor."%'
														  OR nombreEstado LIKE '%".$valor."%'
				ORDER BY id_envio DESC LIMIT $inicio,$no_registros";				
			}

			//if(!$inicio && !$no_registros && !$fecha1 && !$fecha2)
			else
			{ 
			 $sql = "SELECT * FROM envios ORDER BY id_envio DESC";
			}
			
			$stmt = $this->db->prepare($sql);
			
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->envios[] = $row;
			}

			return $this->envios;
			$this->db = null;
		}		

		public function insertar($cliente,$telefono,$numeroGuia,$departamento,$direccion,$producto,$cantidad,$precio,$fecha,$estado)
		{
			$sql = "INSERT INTO envios(cliente,telefono,numeroGuia,departamento_fk,direccion,producto_fk,cantidad,precio_envio,fecha,estado_entrega) VALUES('$cliente','$telefono','$numeroGuia','$departamento','$direccion','$producto','$cantidad','$precio','$fecha','$estado')";
			
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
			$sql = "DELETE FROM envios WHERE id_envio='$id'";
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
			$sql = "UPDATE productos SET nombreProducto='$producto',precio=$precio,descripcion='$descripcion',existencia=$existencia WHERE id='$id'";
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
			//$result->closeCursor();

		}  

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM envios";
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;
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
		// metodo para descontar la existencia cuando se haga un envio de un producto
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

		public function Pagado($id,$pagado)
		{
			$sql = "UPDATE envios SET pago_cargo='$pagado' WHERE id_envio='$id'";
			$rs = $this->db->prepare($sql);
			$verificador = $rs->execute();

			if($verificador){
				return true;
				$this->db = null;
			}
			else{
				return false;
				$this->db = null;
			}
		}
	}

 ?>