<?php
class Videojuego {
	
	private $id; 
	private $nombre;
	private $precio; 
	private $descripcion;
	private $plataforma;
	private $stock;
	private $instrucciones;
	private $imagen;
		
	

	function __construct($id,$nombre,$precio,$descripcion,$plataforma,$stock,$instrucciones,$imagen) {
		$this->id=$id;
		$this->nombre=$nombre;
		$this->precio=$precio;
		$this->descripcion=$descripcion;
		$this->plataforma=$plataforma;
		$this->stock=$stock;
		$this->instrucciones=$instrucciones;
		$this->imagen=$imagen;
	}
	
	public function guardarVideojuego(){
		$msg="";
		$sql = "insert into videojuegos values(null,'$this->nombre','$this->precio','$this->descripcion','$this->plataforma','$this->stock','$this->instrucciones','$this->imagen')";
		//echo $sql;

		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Videojuego guardado correctamente";
		else{
			$msg="Error al guardar el videojuego";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public static function verVideojuegos($cuantos,$comienzo){
		$videojuegos=[];
		$sql="select * from videojuegos order by id_pro desc limit $comienzo, $cuantos ";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$videojuegos[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $videojuegos;
	}

	public static function totalVideojuegos(){
		$total=0;
		$sql="select count('id_pro') as 'total' from videojuegos";
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$fila=$res->fetch_assoc();
			$total=$fila['total'];
		$res->free();
		Conexion::desconectarBD($conexion);
		return $total;
	}
	
	public static function buscaVideojuego($id_pro){
		$videojuegos=[];
		$sql="select * from videojuegos where id_pro=$id_pro";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0){
			while ($linea=$res->fetch_assoc()){
				$videojuegos[]=$linea;
			}
		}
		$res->free();
		Conexion::desconectarBD($conexion);

		return $videojuegos;
	}
	
	public function borrarVideojuego(){
		$msg="";
		$sql = "delete from videojuegos where id_pro=$this->id";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Videojuego Borrado";
		else{
			$msg="Error al borrar videojuego ";
			$msg.= $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;
		
	}
}
?>
