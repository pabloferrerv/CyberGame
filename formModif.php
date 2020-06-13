<?php
	if(isset($_POST['modif_usr'])){
		$usr=new Usuario("","",$_POST['usr_modif'],"","");
		$linea_usr=$usr->buscarUsuario();
		$nombre=$linea_usr['nombre'];
		$pass=$linea_usr['pass'];
		$pass2=$linea_usr['pass'];
		$tipo=$linea_usr['tipo'];
		$id= $linea_usr['id_usr']
	?>
	 <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>MODIFICAR DATOS USUARIO</h>
            </div><!-- end title -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="loginform" class="row" action="index.php?P=modif" name="loginform" method="post">
                            <fieldset class="row-fluid">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" value="<?php echo $nombre ?>" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" value="<?php echo $pass ?>" name="pass" id="pass" class="form-control" placeholder="Password">
                                </div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" value="<?php echo $pass2 ?>" name="pass2" id="pass2" class="form-control" placeholder="Repite Password">
                                </div>
								Tipo usuario:
								<select name="tipo">
									<option value="usr" <?php if($tipo=='usr') echo 'selected="selected"' ?> >Usuario</option>
									<option value="adm" <?php if($tipo=='adm') echo 'selected="selected"' ?>>Administrador</option>
								</select>
								</div>
								
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
									<input type="hidden" value="<?php echo $id ?>" name="id" id="id">
                                    <button type="submit" value="enviar_modif" id="enviar_modif" name="enviar_modif" class="btn btn-light btn-radius btn-brd grd1 btn-block">Modifica Usuario</button>
                                </div>
								
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
		</div>
	</div>
	<?php
		} else {
			if(isset($_POST['enviar_modif'])){
				$nombre=$_POST['nombre'];
				$pass=$_POST['pass'];
				$pass2=$_POST['pass2'];
				$tipo=$_POST['tipo'];
				$id=$_POST['id'];
				if($id==$id_usr and $tipo=="usr"){ //un usuario administrador no puede hace que el mismo deje de ser administrador
				//evita que nos quedemos sin usuario administrador
					$msg="Solo otro administrador puede hacer que tu no lo seas";
				}
				else{
					if(!empty($nombre) and !empty($email)and !empty($pass)and !empty($pass2)){
						if($pass==$pass2){
							$usr=new Usuario($id,$nombre,$email,$pass,$tipo);
							$msg=$usr->modificaUsuario();
						}
						else
							$msg="Los password no coinciden";
					}
					else
						$msg="Algún campo está vacio";
				}
			
			}
			echo $msg;
	?>
	
	<div id="contact" class="section wb">
	 <div class="container">
            <div class="section-title text-center">
                <h3>MODIFICAR DATOS USUARIO</h3>
				<form id="loginform" class="row" action="index.php?P=modif" name="loginform" method="post">
                <p class="lead">Selecciona usuario: <?php echo dibuja_select("usr_modif","usuarios","email",false) ?></p>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                       <button type="submit" value="modif_usr" id="modif_usr" name="modif_usr" class="btn btn-light btn-radius btn-brd grd1 btn-block">Envia Datos Seleccionados</button>
                </div>
				</form>
            </div><!-- end title -->
	  </div>
	</div>
	
   
	<?php
		}
	?>
			
		