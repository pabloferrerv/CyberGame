  <?php    if(isset($_GET['c'])){
	$id_vid=$_GET['c'];

	$ventas=new Ventas($id_vid,$id_usr,"");
	
	if($tipo_usr=="adm"||$tipo_usr=="usr") {
		$msg=$ventas->guardarVenta();
		$convideojuego=Videojuego::buscaVideojuego($id_vid);//este metodo nos devuelve toso los valores del videojuego,en este caso solo se usa el stock
		$stock = $convideojuego[0]['stock'];
		Videojuego::restaVideojuego($stock,$id_vid);//se pasa el stock y el codigo del videojuego para que reste una unidad al stock
	}else{
		$msg="Tienes que loguearte para poder comprar";
	}
	echo $msg;


if($tipo_usr=="adm"||$tipo_usr=="usr"){ //tiene que estar logueado para poder ver la factura
?>

 <p><a <?php if($p=="factura") echo 'class="active"' ?> href="<?php echo "factura.php" ?>?c=<?php echo $id_vid ?>" target="_blank"><button>Ver factura</button></a></p> <!-- una vez de ha comprado esta la opcion de mostrar la factura,que se abrira en una nueva ventana -->


<?php } } ?>