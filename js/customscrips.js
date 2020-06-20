
 
$(document).ready(function(){

 $(".videojuegos").ready(function(){   //animacion que muestra una pantalla de cargado
var div=$(".videojuegos");
	
 
     div.animate({opacity: '1'},1500); //animacion para que aparezcan los videojuegos en 1 segundo

  $("#box").animate({ //animacion de proceso de carga
      width: "400px" 
    }, {
      duration: 1000,
      easing: "linear",
      step: function(x) {
        $("#demo").text(Math.round(x * 100 / 400)  + "%");  
      }
    });

  $("#carga").animate({opacity: '0'},2000);

});




  $("body").ready(function(){  

  $("body").animate({opacity: '1'},500);//animacion que muestra toda la aplciacion cada vez que carga el body

});


  	

  		
  		  	$(".desc").mouseenter(function(){ //al pasar por encima de la caja de videojuego,se hace mas pequeña
  		
				
				$(this).animate({padding: '2%'},400); 
				
			});


				$(".desc").mouseleave(function(){ //al salir de la caja de videojuego,vuelve a la normalidad
			
			
				$(this).animate({padding: '0%'},400); 
			
			});





	

//------------------FUNCION PARA VALIDAR FORMULARIOS DE AÑADIR JUEGO-------------------

  $("#añadir_juego").click(function validarForm(){ 

       var nombre=$("#nombre").val();
       var precio=$("#precioo").val();
       var descripcion=$("#descripcion").val();
       var plataforma=$("#plataforma").val();
       var stock=$("#stock").val();
       var instrucciones=$("#instrucciones").val();

       var expreg = /\w{1,5}/;//expresion regular que comprueba que sean de 1 a 5 digitos de cualquier caracter
    var expprecio = /\d{1,3}/;//expresion regular que comprueba el precio
    var expdescrip = /\w{1,50}/;//expresion regular que comprueba la descripcion
    var expplat = /\w{1,5}/;//expresion regular que comprueba la plataforma
    var expstock = /\d{1,3}/;//expresion regular que comprueba el stock
    var expinstr = /\w{1,50}/;//expresion regular que comprueba las instrucciones
    

if(expreg.test(nombre)){
        
                   
        if (expprecio.test(precio)) {
         
            if (expreg.test(descripcion)) {
                
                
            if (expreg.test(plataforma)) {
                 
                
            if (expstock.test(stock)) { //una vez que se comprueba que todo este correcto se genera un span con un formulario
   


                   if (expinstr.test(instrucciones)) { //una vez que se comprueba que todo devuelve true a al funcion onsubmit valdiar formularios
               
                return true;
               
   

                

            }else{

        alert("Instrucciones Incorrectas"); return false;}  
   

                

            }else{

        alert("Stock Incorrecto"); return false;}   
            
            }else{
       alert("Plataforma Incorrectas"); return false;}   

            }else{
        alert("Descripción incorrecta"); return false;}   

            
        }else{
       alert("Precio Incorrecto"); return false;}   

        
    }else{
       alert("Usuario Incorrecto"); return false;
        
    }

    });//-----------------FIN FORMULARIOS DE AÑADIR JUEGO--------------------






//------------------FUNCION PARA VALIDAR FORMULARIOS ALTA NUEVO USUARIO-------------------

  $("#enviar_alta").click(function validarForm2(){ 

       var nombre=$("#nombre").val();
       var email=$("#email").val();
       var pass=$("#pass").val();
       var pass2=$("#pass2").val();
     
       var expreg = /\w{1,5}/;//expresion regular que comprueba que sean de 1 a 5 digitos de cualquier caracter
    var expregcorr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;//expresion regular que comprueba el correo electronico
    var expcont = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,20}/;//expresion regular para contraseñas
   //expresion para contraseña que tiene que tener Minimo 8 caracteres,Maximo 15,Al menos una letra mayúscula,Al menos una letra minucula,Al menos un dígito,
   //No espacios en blanco

    

if(expreg.test(nombre)){
        
                   
        if (expregcorr.test(email)) {
         
            if (expcont.test(pass)) {
                
                
            if (expcont.test(pass2)) {
                 
          return true;
            
            }else{
       alert("Pass2 Incorrecto"); return false;}   

            }else{
        alert("Pass1 incorrecta (debe tener minimo 8 caracteres,una letra mayuscula,y un caracter especial)"); return false;}   

            
        }else{
       alert("Email Incorrecto"); return false;}   

        
    }else{
       alert("Nombre Incorrecto"); return false;
        
    }

    });//-----------------FIN FORMULARIOS ALTA NUEVO USUARIO--------------------




			
	
		});

// ---------------------RELOJ 24 HOTAS CON AJAX------------------ 
setInterval(function() {

  var currentTime = new Date();
  var hours = currentTime.getHours();
  var minutes = currentTime.getMinutes();
  var seconds = currentTime.getSeconds();

  // Añade los zeros
  hours = (hours < 10 ? "0" : "") + hours;
  minutes = (minutes < 10 ? "0" : "") + minutes;
  seconds = (seconds < 10 ? "0" : "") + seconds;

  // Junta todo para mostrarlo
  var currentTimeString = hours + ":" + minutes + ":" + seconds;
  $(".clock").html(currentTimeString);

}, 1000);


// ---------------------FIN RELOJ 24 HOTAS CON AJAX------------------ 


	


  $(document).ready(function(){
      
      
        
        $("#bloqueimagen a").fancybox({
          'opacity'  :true,
          'overlayShow'  :false,
          'transitionIn' :'elastic',
          'transitionOut' : 'none'
            


          
                
      }); // Fin de la función FancyBox



    }); // Fin de la funcion JQuery

  