	
<?php if(isset($email)){ 
if(isset($_GET['b'])){
	$id_com_borrar=$_GET['b'];
	
	$videojuego=new Videojuego($id_com_borrar,"","","","","","","");
	
	if($tipo_usr=="adm") //el administrador puede borrar todo
		$msg=$videojuego->borrarVideojuego();
	else
		$msg="Solo los administradores puden borrar comentarios";
	echo $msg;
}

?>

   

<?php } ?>
 <div class="testimonial clearfix">

                           
<?php

//codigo de ficheros


	



//FIN codigo de ficheros	


$comienzo=0;
if(isset($_GET['comienzo'])){
  $comienzo= $_GET['comienzo'];
}


?>	 

<?php
	
  $total=Videojuego::totalVideojuegos();
  $videojuegos=Videojuego::verVideojuegos(COMENTxPAG,$comienzo);
  $cuantos=count($videojuegos);
  if($cuantos>0){
	  echo "<h1>Mostrando los videojuegos ". ($comienzo+1) ." a ". (COMENTxPAG+$comienzo)." </h1>";
	 
	    echo "<div class=videojuegos>";
	    
	  for($cont=0;$cont<$cuantos;$cont++){
			  $nombre = $videojuegos[$cont]['nombre'];
			  $precio = $videojuegos[$cont]['precio'];
			  $descripcion=$videojuegos[$cont]['descripcion'];
			  $id_vid=$videojuegos[$cont]['id_pro'];
			  $plataforma = $videojuegos[$cont]['plataforma'];
			  $imagen = $videojuegos[$cont]['imagen'];
			  $entrada="<p> <span><img src='$imagen' width='100%' height='100%'></span> <span><i>$precio</i> €</span>"; 
			  
			  ?>	
			 
			 <div class="desc">
			  <!-- Al darle click al producto envia la id por get para que despliegue una pagina con la informacion del videojuego -->
				 <a <?php if($p=="infoVid") echo 'class="active"' ?> href='<?php echo $_SERVER['PHP_SELF'] ?>?P=infoVid&V=<?php echo $id_vid ?>'> <?php echo $entrada ?> </a>

				<?php
				if($tipo_usr=="adm") echo '<span><a href="index.php?b='.$id_vid.'"><button>Borrar</button></a></span>';

			  echo '</div> ' ;
			
	  }
	   echo "</div> " ;
	  if ($total>COMENTxPAG){
		if ($comienzo+COMENTxPAG< $total){
			$comienzo=$comienzo+COMENTxPAG;
			$verAnteriores="<a href='".$_SERVER['PHP_SELF']."?comienzo=$comienzo'>Siguiente </a>";
		}
		else{
			$verAnteriores="";
		}
		echo '<div id="navbar" class="navbar-collapse collapse">';
		echo "<a href='{$_SERVER['PHP_SELF']}'>Volver Principio </a> &nbsp;&nbsp $verAnteriores";
		echo '</div>';
		
	  }
  }
  else{
	  echo "<h1>No hay videojuegos </h1>";
  }
?>			
</div>