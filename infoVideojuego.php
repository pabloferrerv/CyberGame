
    <?php




    if(isset($_GET['V'])){
	$identidad=$_GET['V'];
	

	
}

	?>
	
	<?php
	
	$convideojuego=Videojuego::buscaVideojuego($identidad);
	 
	  
	  			$nombre = $convideojuego[0]['nombre'];
			  $precio = $convideojuego[0]['precio'];
			  $descripcion=$convideojuego[0]['descripcion'];
			  $id_vid=$convideojuego[0]['id_pro'];
			  $plataforma = $convideojuego[0]['plataforma'];
			  $imagen = $convideojuego[0]['imagen'];
			  $stock = $convideojuego[0]['stock'];
  	 ?>
				







		<div id="fondo">
	 <div id="infvideojuego">
	 	<div id="bloqueimagen"> <?php  echo "<a href='$imagen' rel='bloqueimagen' >" ?> <?php  echo "<img src='$imagen' width='100%' rel='bloqueimagen' > </a>" ?>
	 		

	 	</div>
	 	<div id="bloqueinformacion">
	 		<div id="bloqueinfo2">
	 	<span><h1 id="titulo"><?php  echo "<b>$nombre</b>" ?></h1></span>
	 	<span><?php  echo "<b>$descripcion</b>" ?></span>
	 	</div>
	
	<?php if($stock>0){ ?> <!-- si stock es mayor a 0 aparece la opcion de comprar -->
		
	 	<div id="bloquecomprar">
	 	<span><h1><?php  echo "<b>$precio €</b> " ?></h1></span>
	 	<a <?php if($p=="compra") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=compra&c=<?php echo $id_vid ?>"><button class="btn-light">COMPRAR</button></a>

		</div>

	<?php }else{ ?>

<div id="bloquecomprar">
	 	<span><h1><?php  echo "<b>$precio €</b> " ?></h1></span>
	 	<div class="btn-light">AGOTADO</div> 

		</div>



	<?php } ?>

	 	</div>

 

	 </div>
	 </div>