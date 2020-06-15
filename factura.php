<?php
//require('db_abstract_model.php');
//require("productos_model.php");
require_once("lib/conexion.php");
require("lib/varios.php");
require("pdf/fpdf.php");
require_once("clases/Videojuego.php");
class PDF extends FPDF
{
// Cabecera de página
function Header() //una funcion del objeto pdf que establecera un encabezado
{
	// Logo
	//$this->Image('logoIES.jpg',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',20);
	$this->Cell(0,10,'FACTURA',"B",0,'C');
	// Salto de línea
	$this->Ln(20);
}

// Pie de página
function Footer()//una funcion del objeto pdf que establecera un pie para el pdf
{

	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}

// Creación del objeto de la clase heredada
 if(isset($_GET['c'])){
	$id_vid=$_GET['c'];
	$convideojuego=Videojuego::buscaVideojuego($id_vid);
	  		 $nombre = $convideojuego[0]['nombre'];
			 $precio = $convideojuego[0]['precio'];
			 $descripcion=$convideojuego[0]['descripcion'];
			 $id_vid=$convideojuego[0]['id_pro'];
			 $plataforma = $convideojuego[0]['plataforma'];
			 $imagen = $convideojuego[0]['imagen'];
	}

//con este metodo creamos un array llamado rows[] el cual contendra todos los productos de la base de datos

	$importe_total=0;


	$pdf = new PDF();//se crea un objeto pdf
	$pdf->AliasNbPages();//Define un alias para el número total de páginas. Se sustituira en el momento que el documento se cierre.
	$pdf->AddPage();//crea una pagina nueva de pdf donde se metera el contenido
	
	$pdf->SetFont('Arial','',14); //la fuente de todo el pdf
	$pdf->SetTextColor(255,255,255);//el color del texto de las barras
	$pdf->SetFillColor(84, 21, 32 );//el color de las barras de la tabla
	$pdf->cell(45,8,"CODIGO",0,0,"L",true);//el alto y ancho del cuadrado que contienlas letras de codigo
	$pdf->cell(2); //la sepracion entre las columnas,los cuadrados
	$pdf->cell(50,8,"NOMBRE",0,0,"L",true);
	$pdf->cell(2);
	$pdf->cell(45,8,"PLATAFORMA",0,0,"L",true);
	$pdf->cell(2);
	$pdf->cell(45,8,"VALOR",0,0,"L",true);
	$pdf->ln(10); //el margen de abajo a arriba
	$pdf->SetTextColor(0,0,0);//el color de las letras del pdf	 

	$pdf->cell(45,8,$id_vid,0,0,"L");
	$pdf->cell(2);//hace un margen de izquierda a derecha
	$pdf->cell(50,8,$nombre,0,0,"L");
	$pdf->cell(2);//hace un margen de izquierda a derecha
	$pdf->cell(45,8,$plataforma,0,0,"L");
	$pdf->cell(2);//hace un margen de izquierda a derecha
	$pdf->cell(45,8,$precio,0,1,"L");
	$importe_total+=$precio;//se hace un calculo del 
	$pdf->ln(10);
	 if($imagen!=""){
        $pdf->Image($imagen,75,null,70);
    }else{
        $pdf->SetFont('Arial','I',8);
        $pdf->Cell(10,10,utf8_decode("No hay foto disponible"));
    }

	$pdf->ln(15);//salto de linea
	$pdf->cell(25,8,"TOTAL: ".$importe_total,0,1,"L");

	$pdf->Output();//cierra el pdf




?>
