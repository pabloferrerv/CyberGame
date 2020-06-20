	
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<div id="reloj">
<span class="clock"></span>
</div>


		<div id="carga"> <!-- barra de carga java script -->
				<div 	style="border:1px solid green;margin:10px;width:400px;">
  <div id="box" style="background:#98bf21;height:50px;width:1px;border:1px solid green;"></div>
</div>

<p id="demo"></p>
</div>
<?php
	
  $total=Videojuego::totalVideojuegos();
  $videojuegos=Videojuego::verVideojuegos(COMENTxPAG,$comienzo);
  $cuantos=count($videojuegos);
  if($cuantos>0){
	
	 
	    echo "<div class=videojuegos>";
	    
	  for($cont=0;$cont<$cuantos;$cont++){
			  $nombre = $videojuegos[$cont]['nombre'];
			  $precio = $videojuegos[$cont]['precio'];
			  $descripcion=$videojuegos[$cont]['descripcion'];
			  $id_vid=$videojuegos[$cont]['id_pro'];
			  $plataforma = $videojuegos[$cont]['plataforma'];
			  $imagen = $videojuegos[$cont]['imagen'];
			  $entrada="<span><img src='$imagen' width='100%' height='100%'></span> "; 
			  
			  ?>	
			
			 <div class="desc">
			  <!-- Al darle click al producto envia la id por get para que despliegue una pagina con la informacion del videojuego -->
				 <a <?php if($p=="infoVid") echo 'class="active"' ?> href='<?php echo $_SERVER['PHP_SELF'] ?>?P=infoVid&V=<?php echo $id_vid ?>'> <?php echo $entrada ?> </a>

				<?php
				echo "<div id='precyborrar' ><span id='precio'><i>$precio</i> €</span>";
				if($tipo_usr=="adm") echo '<a href="index.php?b='.$id_vid.'"><span>Borrar</span></a>';
				 echo '</div>';
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
		echo '<div id="nextpagi">';
		echo "<a href='{$_SERVER['PHP_SELF']}'>Volver Principio </a> &nbsp;&nbsp $verAnteriores";
		echo '</div>';
		
	  }
  }
  else{
	  echo "<h1>No hay videojuegos </h1>";
  }
?>			
</div>