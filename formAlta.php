
    <?php
		$nombre="";
		$email="";
		$pass="";
		$pass2="";
		$msg="";
		if(isset($_POST['enviar_alta'])){
			$nombre=$_POST['nombre'];
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$pass2=$_POST['pass2'];
			$tipo=$_POST['tipo'];
			if(!empty($nombre) and !empty($email)and !empty($pass)and !empty($pass2)){
				if(correoCorrecto($email)){
					if($pass==$pass2){
						$usr=new Usuario("",$nombre,$email,$pass,$tipo);
						if(!$usr->buscarUsuario()){
							$msg=$usr->guardarUsuario();
						}
						else
							$msg="imposible crear usuario, el e-mail $email ya existe en la tabla usuarios";
					}
					else
						$msg="Los password no coinciden";
				}
				else
					$msg="Correo incorrecto";
			}
			else
				$msg="Algún campo está vacio";
			
		}
		echo $msg;
	?>
	
	
      
            <div class="section-title text-center">
                <h3>ALTA NUEVO USUARIO</h3>
                <p class="lead">Completa los campos con los datos del nuevo usuario</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="altaform" class="row" action="index.php?P=alta" name="altaform" method="post" onsubmit="return validarForm2();">
                            <fieldset class="row-fluid">
                            	  <div id="mensaje1" class="errores">Nombre incorrecto</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                                  
                                </div>
                                 <div id="mensaje2" class="errores">email incorrecto</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="email usuario">
                                    
                                </div>
									 
                                 <div id="mensaje3" class="errores">Contraseña incorrecta</div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
                                    
                                </div>
                                <div id="mensaje4" class="errores">Contraseña incorrecta</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Repite Password">
                                     
                                </div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								Tipo usuario:
								<select name="tipo">
									<option value="usr" selected="selected">Usuario</option>
									<option value="adm" >Administrador</option>
								</select>
								</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
                                    <button type="submit" value="enviar_alta" id="enviar_alta" name="enviar_alta" class="btn btn-light btn-radius btn-brd grd1 btn-block">Alta Usuario</button>
                                </div>
								
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
			
		