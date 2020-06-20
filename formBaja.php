<?php
	$msg="";
	if(isset($_POST['usr_baja'])){
		if($_POST['usr_baja']!=$email){
			$usr=new Usuario("","",$_POST['usr_baja'],"","");
			$msg= $usr->borrarUsuario();
		}
		else
			$msg="Un usuario no puede borrarse a si mismo";
	}
	echo $msg;
	
?>
	
	<div id="contact" class="section wb">
	 <div class="container">
            <div class="section-title text-center">
                <h3>BORRAR DATOS USUARIO</h3>
				<form id="loginform" class="row" action="index.php?P=borra" name="loginform" method="post">
                <p class="lead">Selecciona usuario: <?php echo dibuja_select("usr_baja","usuarios","email",false) ?></p>
				<div class="lead" id="btusr">
                       <button type="submit" value="borra_usr" id="modif_usr" name="borra_usr" class="btn btn-light btn-radius btn-brd grd1 btn-block">Envia Datos Seleccionados</button>
                </div>
				</form>
            </div><!-- end title -->
	  </div>
	</div>	