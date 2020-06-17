<?php require("cabecera.php");
?>
<?php
	//$p esta en cabecera
	if($p=="home") 
		include("home.php");
	if($p=="login") 
		include("formLogin.php");
	if($p=="alta") 
		include("formAlta.php");
	if($p=="modif") 
		include("formModif.php");
	if($p=="borra"){
		include("formBaja.php");
	}
	if($p=="infoVid"){
		include("infoVideojuego.php");
	}
		if($p=="misPed"){
		include("misPedidos.php");
	}

			if($p=="añad"){
		include("añadirJuego.php");
	}



		if($p=="compra"){
		include("compra.php");
	}

		if($p=="factura"){
		include("factura.php");
	}

?>

<?php require("pie.php");?>
   