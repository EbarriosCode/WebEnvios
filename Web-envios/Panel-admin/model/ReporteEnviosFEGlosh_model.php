<?php 
	class EnviosReporteGlosh{
		private $conn,$db,$envios,$Depto_Prod,$productos;

		public function __construct()
		{
			require_once('../../../Web-envios/model/Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->envios = array();
			$this->Depto_Prod = array();
			$this->productos = array();
		}

		public function getEnviosPorFechas(/*$inicio=false,$no_registros=false,*/$fecha1,$fecha2,$status)
		{
			//if($inicio!==false && $no_registros!==false )
			//{
				if($status==0 || $status==1){
					$sql = "SELECT id_envio,cliente,telefono,numeroGuia,nombreDepartamento,nombreProducto,cantidad,precio_envio,fecha,estado_entrega,pago_cargo FROM enviosglosh E INNER JOIN departamento D ON E.departamento_fk = D.id_departamento INNER JOIN productos P ON E.producto_fk = P.id_producto WHERE fecha>='$fecha1' AND fecha<='$fecha2' AND estado_entrega='$status' ORDER BY id_envio DESC"; //LIMIT $inicio,$no_registros";		
				}

				else{
					$sql = "SELECT id_envio,cliente,telefono,numeroGuia,nombreDepartamento,nombreProducto,cantidad,precio_envio,fecha,estado_entrega,pago_cargo FROM enviosglosh E INNER JOIN departamento D ON E.departamento_fk = D.id_departamento INNER JOIN productos P ON E.producto_fk = P.id_producto WHERE fecha>='$fecha1' AND fecha<='$fecha2' ORDER BY id_envio DESC";     //DESC LIMIT $inicio,$no_registros";
				}		
			//}
			
			$stmt = $this->db->prepare($sql);
			
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->envios[] = $row;
			}

			return $this->envios;
			$this->db = null;	
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM enviosglosh";
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
			$sql = "SELECT * FROM productosglosh";
			$rs = $this->db->prepare($sql);
			
			$rs->execute();

			while($row = $rs->fetch(PDO::FETCH_ASSOC))
			{
				$this->productos[] = $row;
			}

			return $this->productos;
			$this->db = null;
		}

		
	}

	//$r = new EnviosReporte();
	//echo json_encode($r->getEnviosPorFechas(0,15,'2017-01-01','2017-01-30',2));
 ?>