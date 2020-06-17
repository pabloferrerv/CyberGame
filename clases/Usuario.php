<?php
class Usuario {
	
	private $id_usr; 
	private $nombre;
	private $pass; 
	private $email;
	private $tipo;
	

	function __construct($id_usr,$nombre,$email,$pass,$tipo) {
		$this->id_usr=$id_usr;
		$this->nombre=$nombre;
		$this->pass=$pass;
		$this->email=$email;
		$this->tipo=$tipo;
	}
	
	public function guardarUsuario(){
		$msg="";
		$sql = "insert into usuarios values(null,'$this->nombre','$this->email','$this->pass','$this->tipo')";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Usuario $this->email guardado correctamente";
		else{
			$msg="Error al guardar usuario en la  BD". $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}

	public function modificaUsuario(){
		$msg="";
		$sql = "update usuarios set nombre='$this->nombre', pass='$this->pass' , tipo='$this->tipo' where  id_usr='$this->id_usr'";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		if ($conexion->query($sql))
			$msg="Usuario $this->nombre modificado correctamente";
		else{
			$msg="Error al modificar usuario en la  BD". $conexion->error;
		}
		Conexion::desconectarBD($conexion);

		return $msg;

	}
	
	public function buscarUsuario(){
		//busca un usuario a partir de su email, si lo encuentra devuelve un array con los datos del usuario, sino false
		$sql="select * from usuarios where email='$this->email'";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$linea=$res->fetch_assoc();
		else
			$linea=false;
		$res->free();
		Conexion::desconectarBD($conexion);

		return $linea;
	}
	
	public function buscarUsuarioPass(){
		//busca un usuario a partir de su email y password, si lo encuentra devuelve un array con los datos del usuario, sino false
		$sql="select * from usuarios where email='$this->email' and pass='$this->pass'";
		//echo $sql;
		$linea=NULL;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		if ($res->num_rows >0)
			$linea=$res->fetch_assoc();
		$res->free();
		Conexion::desconectarBD($conexion);

		return $linea;
	}
	
	public function borrarUsuario(){
		//borra un usuario a partir de su mail
		$email=$this->email;
		// si el usuario tiene comentarios, no se puede borrar.
		$linea_usr=$this->buscarUsuario();
		$comentarios_usr=Comentario::buscaComentariosUsr($linea_usr['id_usr']);
		if(count($comentarios_usr)>0){
			$msg="El usuario $email tiene comentarios y no se puede borrar";
		}
		else{
			
			$sql="delete from usuarios where email='$email'";
			//echo $sql;
			$conexion=Conexion::conectarBD();
			
			if ($conexion->query($sql))
				$msg="usuario $email borrado correctamente";
			else
				$msg="error al borrar al usuario $email";
			Conexion::desconectarBD($conexion);
		}
		return $msg;

		return $linea;
	}
	
	

}
?>
