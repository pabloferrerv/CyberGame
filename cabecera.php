<?php 
session_start();
if(isset($_COOKIE['PUBLICAR'])) //para evitar publicar seguido, cuando se publica una cookie que desaparece al pasar 10 segundos
	$publicar=false;
else
	$publicar=true;

require_once("lib/conexion.php");
require("lib/varios.php");
require_once("clases/Usuario.php");
require_once("clases/Videojuego.php");

define("COMENTxPAG", 6);
define("ESPERA", 10); //TIEMPO A ESPERAR ANTES DE PUBLICAR OTRA VEZ
$msg="";
if (isset($_POST['publicar'])){
	setcookie("PUBLICAR","NO",time()+ESPERA);
}
if(isset($_POST['enviar_login'])){
	$usr=new Usuario("","",$_POST['email'],$_POST['pass'],"");
	$res=$usr->buscarUsuarioPass();
	if($res==NULL)
		$msg= "LOGIN INCORRECTO";
	else{
		$_SESSION['email']=$res['email'];
		$_SESSION['nombre']=$res['nombre'];
		$_SESSION['id_usr']=$res['id_usr'];
		$_SESSION['tipo']=$res['tipo'];
	}
}

if(isset($_SESSION['email']))
	$email=$_SESSION['email']; //si no está establecida la variable $email, no hay sesión activa
if(isset($_SESSION['nombre']))
	$nombre=$_SESSION['nombre'];
else
	$nombre="";
if(isset($_SESSION['id_usr']))
	$id_usr=$_SESSION['id_usr'];
else
	$id_usr="";
if(isset($_SESSION['tipo']))
	$tipo_usr=$_SESSION['tipo'];
else
	$tipo_usr="";

if(isset($_GET['a'])){
	$accion=$_GET['a'];
	if($accion=="logout"){
		unset($_SESSION['email']);
		unset($_SESSION['nombre']);
		unset($_SESSION['id_usr']);
		unset($_SESSION['tipo']);
		unset($email);
		$nombre="";
		$id_usr="";
		$tipo_usr="";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Cyber Game</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
	$p="home";
	if(isset($_GET['P'])){
		$p=$_GET['P'];
	}
?>

<body>

    <!-- LOADER -->
     <!-- <div id="preloader">
        <div class="loader">
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__bar"></div>
			<div class="loader__ball"></div>
		</div>
	QUITAR ESTO
    </div> --> <!-- end loader -->
    <!-- END LOADER -->
    
	<div class="top-bar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="left-top">
						<div class="email-box">
							<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> youremail@gmail.com</a>
						</div>
						<div class="phone-box">
							<a href="tel:1234567890"><i class="fa fa-phone" aria-hidden="true"></i> +1 234 567 890</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="right-top">
						<div class="social-box">
							<ul>
								<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-rss-square" aria-hidden="true"></i></a></li>
							<ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logos/logo.png" alt="image"></a>
					<?php if(isset($email)) echo "Usario actual: $nombre"?>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a <?php if($p=="home") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=home">Inicio</a></li>
						<?php if(!isset($email)){ ?>
							<li><a <?php if($p=="login") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=login">Loguearse</a></li>
						<?php }else{ ?>
							<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?a=logout">Salir</a></li>
						<?php } ?>
						<?php if(isset($email) and $tipo_usr=="adm"){ ?>
                        <li><a <?php if($p=="alta") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=alta">alta usuario</a></li>
                        <li><a <?php if($p=="modif") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=modif">modifica usuario</a></li>
                        <li><a <?php if($p=="borra") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=borra">baja usuario</a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
	