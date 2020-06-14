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

?>

<?php require("pie.php");?>
   