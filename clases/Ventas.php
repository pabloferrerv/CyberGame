<?php
class Ventas{
	
	private $id_pro; 
	private $id_usr;
	private $id_venta; 

	function __construct($id_pro,$id_usr,$id_venta) {
		$this->id_pro=$id_pro;
		$this->id_usr=$id_usr;
		$this->id_venta=$id_venta;
	
	}
	
	public function guardarVenta(){ //metodo que guarda el videojeugo 
		$msg="";
		$sql = "insert into vid_usr values('$this->id_pro','$this->id_usr',null)";
		

		//echo $sql;

		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Compra realizada correctamente";
		else{
			$msg="Error al comprar el producto";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public static function verVentas(){
		$ventas=[];
		$sql="select * from vid_usr order by id_venta desc";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$ventas[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $ventas;
	}

	public static function totalVentas(){
		$total=0;
		$sql="select count('id_venta') as 'total' from vid_us";
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$fila=$res->fetch_assoc();
			$total=$fila['total'];
		$res->free();
		Conexion::desconectarBD($conexion);
		return $total;
	}
	
	public static function buscaVenta($id_venta){
		$ventas=[];
		$sql="select * from vid_usr where id_venta=$id_venta";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$ventas[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $ventas;
	}

	public static function buscaVidUsuario($id_usr){ //metodo que devuelve los videojuegos comprados por un usuario
		$ventas=[];
		$sql="select id_pro from vid_usr where id_usr=$id_usr";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$ventas[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $ventas;
	}
	
	public function borrarVenta(){
		$msg="";
		$sql = "delete from vid_usr where id_venta=$this->id_venta";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Venta Borrada";
		else{
			$msg="Error al borrar la vente ";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;
		
	}
}
?>
