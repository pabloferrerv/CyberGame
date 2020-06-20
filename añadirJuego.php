<div id="contact" class="section wb">
<div class="container">
	<div class="section-title text-center">
		<h3>Añadir videojuego</h3>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="contact_form">
				<div id="message"></div>
				<form id="loginform" class="row" action="<?php $_SERVER['PHP_SELF']?>" name="loginform" method="post" onsubmit="return validarForm();" enctype="multipart/form-data">
					<fieldset class="row-fluid">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="nombre" size="15" id="nombre" class="form-control" placeholder="Nombre"  ><br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="precio" id="precioo" size="15" class="form-control" placeholder="Precio"  ><br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<textarea cols="70" rows="4" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion"  ></textarea><br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="plataforma" id="plataforma" size="15" class="form-control" placeholder="Plataforma"  ><br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="number" name="stock" id="stock" size="15" class="form-control" placeholder="Stock"  ><br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<textarea cols="70" rows="4" name="instrucciones" id="instrucciones" class="form-control" placeholder="Instrucciones"  ></textarea><br>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
							<input type="file" name="imagen" required /><br/>
							</div>
					

							   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button type="submit" value="Publicar" id="añadir_juego" name="publicar" class="btn btn-light btn-radius btn-brd grd1 btn-block">Publicar</button>
                                </div>
						
					</fieldset>
				</form>
			</div>
		</div><!-- end col -->
	</div><!-- end row -->
</div>	
</div>	





<?php  


if (isset($_POST['publicar'])){
  if($publicar){
	  if (isset($_POST['descripcion']) and trim($_POST['descripcion'])!="") { 

	  	if (isset($_POST['publicar'])){
			if(isset($_FILES["imagen"])){//si le has dado al boton seleciionar archivo entra aquí
				
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