
    <?php
    if(isset($_GET['V'])){
	$identidad=$_GET['V'];
	
	
}
	
	
	
	$convideojuego=Videojuego::buscaVideojuego($identidad);
	 
	  
	  			$nombre = $convideojuego[0]['nombre'];
			  $precio = $convideojuego[0]['precio'];
			  $descripcion=$convideojuego[0]['descripcion'];
			  $id_vid=$convideojuego[0]['id_pro'];
			  $plataforma = $convideojuego[0]['plataforma'];
			  $imagen = $convideojuego[0]['imagen'];
  			 $entrada="<p><b>$nombre</b>$descripcion<img src='$imagen'>  Tiene un precio de <i>$precio</i> €";
  			 echo $entrada ?></p> 

 			<?php
  			 if($tipo_usr=="adm"||$tipo_usr=="usr") echo '<p><a href="index.php?b='.$id_vid.'"><button>Comprar</button></a></p>';
			
		?>