	
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

 <div id="contact" class="section wb">
<div class="container">
	<div class="section-title text-center">
		<h3>Añadir videojuego</h3>
		Máximo 300 caracteres. El resto se cortará.
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="contact_form">
				<div id="message"></div>
				<form id="loginform" class="row" action="index.php" name="loginform" method="post" enctype="multipart/form-data">
					<fieldset class="row-fluid">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							Nombre videojuego:<br>
							<input type="text" name="nombre" size="15"><br>
							Precio videojuego:<br>
							<input type="text" name="precio" size="15"><br>
							Descripción videojuego:<br>
							<textarea cols="86" rows="4" name="descripcion"  ></textarea><br>
							Plataforma videojuego:<br>
							<input type="text" name="plataforma" size="15"><br>
							Stock videojuego:<br>
							<input type="text" name="stock" size="15"><br>
							Instrucciones videojuego:<br>
							<textarea cols="86" rows="4" name="instrucciones"  ></textarea><br>
							Insertar imagen:<br>
							<input type="file" name="imagen" /><br/>
							
							<div id="navbar" class="navbar-collapse collapse">
								<ul class="nav navbar-nav navbar-right">
									<li><input type="submit" value="Publicar" name="publicar" /></li>
								</ul>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div><!-- end col -->
	</div><!-- end row -->
</div>	
</div>	  

<?php } ?>
 <div class="testimonial clearfix">

                           
<?php

//codigo de ficheros


	



//FIN codigo de ficheros	


$comienzo=0;
if(isset($_GET['comienzo'])){
  $comienzo= $_GET['comienzo'];
}

if (isset($_POST['publicar'])){
  if($publicar){
	  if (isset($_POST['descripcion']) and trim($_POST['descripcion'])!="") { 

	  	if (isset($_POST['publicar'])){
			if(isset($_FILES["imagen"])){//si le has dado al boton seleciionar archivo entra aquí
				echo "hola que tal estas";
				$imagen=$_FILES["imagen"]["name"];
				$imagenTemp=$_FILES["imagen"]["tmp_name"];
				$imagend=$_FILES['imagen']['name'];
				if (!move_uploaded_file($imagenTemp, "img/".$imagen)) {
                	$imagen="";
            	}
            	
            }

        }
       	$imagen= "img/".$imagend;
        $nombre = trim($_POST['nombre']);
        $precio = trim($_POST['precio']);
		$descripcion = trim($_POST['descripcion']);
		$instrucciones = trim($_POST['instrucciones']);
		$descripcion = substr(stripslashes(nl2br(htmlspecialchars($descripcion))),0,299);
		$instrucciones = substr(stripslashes(nl2br(htmlspecialchars($instrucciones))),0,299);
		$plataforma = trim($_POST['plataforma']);
		$stock = trim($_POST['stock']);
		$fecha = date("Y-m-d:H:i:s");




		$videojuego= new Videojuego("",$nombre,$precio,$descripcion,$plataforma,$stock,$instrucciones,$imagen);
		$msg=$videojuego->guardarVideojuego();

		//setcookie("PUBLICAR","NO",time()+ESPERA); //está en cabecera
	   
	  }
	  else
		$msg="Faltan datos";
  }
	else
		$msg="Ahora no puedes publicar espera ".ESPERA." segundos ";
}



echo $msg;
?>	 

<?php
	
  $total=Videojuego::totalVideojuegos();
  $videojuegos=Videojuego::verVideojuegos(COMENTxPAG,$comienzo);
  $cuantos=count($videojuegos);
  if($cuantos>0){
	  echo "<h1>Mostrando los videojuegos ". ($comienzo+1) ." a ". (COMENTxPAG+$comienzo)." </h1>";
	  //var_dump($comentarios);
	    echo "<div class=videojuegos>";
	  for($cont=0;$cont<$cuantos;$cont++){
			  $nombre = $videojuegos[$cont]['nombre'];
			  $precio = $videojuegos[$cont]['precio'];
			  $descripcion=$videojuegos[$cont]['descripcion'];
			  $id_vid=$videojuegos[$cont]['id_pro'];
			  $plataforma = $videojuegos[$cont]['plataforma'];
			  $imagen = $videojuegos[$cont]['imagen'];
			  $entrada="<p><b>$nombre</b> <img src='$imagen'>  Tiene un precio de <i>$precio</i> €"; 
			  echo '<div class="desc">';
				echo '<p class="lead">'.$entrada.'</p>';
				if($tipo_usr=="adm") echo '<p><a href="index.php?b='.$id_vid.'"><button>Borrar</button></a></p>';

			  echo '</div>';
			  echo '<div class="testi-meta">';
					
					
			  echo '</div>';	 
	  }
	   echo "</div>";
	  if ($total>COMENTxPAG){
		if ($comienzo+COMENTxPAG< $total){
			$comienzo=$comienzo+COMENTxPAG;
			$verAnteriores="<a href='".$_SERVER['PHP_SELF']."?comienzo=$comienzo'>Ver Anteriores </a>";
		}
		else
			$verAnteriores="";
		
		echo '<div id="navbar" class="navbar-collapse collapse">';
		echo "$verAnteriores &nbsp;&nbsp;<a href='{$_SERVER['PHP_SELF']}'>Volver Principio </a>";
		echo '</div>';
		
	  }
  }
  else
	  echo "<h1>No hay comentarios </h1>";
?>			
</div>