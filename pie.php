 <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h1 id="titulop">CYBERGAME</h1>
                        </div>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                        <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Páginas</h3>
                        </div>

                        <ul class="footer-links hov">
                <li><a <?php if($p=="home") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=home">Inicio</a></li>
                        <?php if(!isset($email)){ ?>
                            <li><a <?php if($p=="login") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=login">Loguin</a></li>
                        <?php }else{ ?>
                            <li><a <?php if($p=="misPed") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=misPed">Mis Pedidios</a></li>
                        <?php } ?>
                        <?php if(isset($email) and $tipo_usr=="adm"){ ?>
                        <li><a <?php if($p=="alta") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=alta">alta usuario</a></li>
                        <li><a <?php if($p=="modif") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=modif">modifica usuario</a></li>
                        <li><a <?php if($p=="borra") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=borra">baja usuario</a></li>
                          <li><a <?php if($p=="añad") echo 'class="active"' ?> href="<?php echo $_SERVER['PHP_SELF'] ?>?P=añad">Añadir Juego</a></li>
                        
                        <?php } ?>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-distributed widget clearfix">
                        <div class="widget-title">
                            <h3>Contacto</h3>
							<p>Esto es una aplicación de proyecto de fin de superior DAW,no es una tienda real por lo que espero que se tenga en cuenta,ya que no dispone de funciones de compra reales. Gracias por leer el mensaje y un humilde saludo de mi parte :)</p>
                        </div>
						
						<div class="footer-right">
							 
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss-square" aria-hidden="true"></i></a></li>
                            <ul>
                                
                        </div>
						</div>                        
                    </div><!-- end clearfix -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                   
                    <p class="footer-company-name">Todos los derechos reservados. &copy; 2020 <a href="#">CyberGame</a> Design By : Pablo Ferrer Vicente
					<a href="https://html.design/">html design</a></p>
                </div>

                
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>    

</body>
</html>