    <div id="pedidos">
    <?php		
    		
			$ventas=Ventas::buscaVidUsuario($id_usr);//mediante la sesion del numero de identificacion del usuario se sacan los codigos de referencia de los videojuegos comprados
			$numventas=count($ventas); //numero de videojeugos comprados del usuario
			for($cont=0;$cont<$numventas;$cont++){
				$id_pro=$ventas[$cont]['id_pro'];
				$convideojuego=Videojuego::buscaVideojuego($id_pro);//se sacan los datos del videojuego comprado
				$nombre = $convideojuego[0]['nombre'];
			 	 $precio = $convideojuego[0]['precio'];
			 	 $descripcion=$convideojuego[0]['descripcion'];
				 $id_vid=$convideojuego[0]['id_pro'];
			 	 $plataforma = $convideojuego[0]['plataforma'];
			 	 $imagen = $convideojuego[0]['imagen'];
  				 $entrada="<div><div><span><img src='$imagen'  width='100%'</span></div><div id='cajprop'><span>Nombre videojuego: <b>$nombre</b></span><span>Codigo Videojuego: $id_vid </span><span>Precio: $precio  €</span></div> <div id='cajplataf'><span>Plataforma de juego->  $plataforma </span> </div>";
  				 echo $entrada." </div>";
				
			}
		?>
</div>

