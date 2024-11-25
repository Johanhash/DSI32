<?php

require('fpdf.php');

include("Controlador.php");
$Con=Conectar();//conectar
$NoLicencia=$_GET['NoLicencia'];//recibir mediante get
$SQL = "SELECT * FROM DatosLicencia WHERE NoLicencia='$NoLicencia';";//instruccion que se va a ejecutar para recuperar datos 
$ResultSet=ejecutar($Con,$SQL);
$DatosLicencia=mysqli_fetch_row($ResultSet);

class PDF extends FPDF
{
    // Diseño de la tarjeta de conducción (frontal)
    function credencialFrontal( $DatosLicencia)
    {

       
       
        // Fondo blanco de la tarjeta
        $this->SetFillColor(255, 255, 255);
        $this->Rect(0, 0, 53.98, 85.6, 'F'); // Tamaño de tarjeta en mm (vertical)

        // Encabezado
        $this->SetFont('Arial', '', 5);
        $this->SetTextColor(0, 0, 0);
        $this->Text(16, 5, 'Estados Unidos Mexicanos');
        $this->SetFont('Arial', '', 5);
        $this->Text(16, 7, 'Poder Ejecutivo del Estado de Queretaro');
        $this->SetFont('Arial', 'B', 5);
        $this->Text(16, 11, 'Secretaria de Seguridad Ciudadana');
        $this->Text(16, 14, 'Licencia para conducir');

        // Logo en la parte superior izquierda
        $this->Image('logoq.jpg', 5, 3, 10); // Agrega el logo desde el archivo 'logoq.jpeg'
        //$this->Image('<imagenes>/barras.png', 5, 3, 10); // imagen desde una carpeta 

        // Número de licencia en rojo
        $this->SetFont('Arial', 'B', 4);
        $this->SetTextColor(0, 0, 0); // Rojo
        $this->Text(20, 30, 'No. de Licencia');

        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(255, 0, 0); // Rojo
        $this->text(24, 35, ''.$DatosLicencia[0].'');

        // Tipo de licencia en negro
        $this->SetFont('Arial', 'B', 6);
        $this->SetTextColor(0, 0, 0);
        $this->Text(13, 40, 'AUTOMOVILISTA');

        // Espacio para foto del titular
        $this->Image('selena.jpeg',26,20,5,6.75);
        $this->Image('selena.jpeg', 32,20,20,25);

        // Nombre del titular
        $this->SetFont('Arial', '', 5);
        $this->Text(45, 48, 'Nombre');
        $this->SetFont('Arial', 'B', 7);
        $this->Text(42, 51, ''.$DatosLicencia[3].'');
        $this->Text(42, 54, ''.$DatosLicencia[2].'');

        $this->SetFont('Arial', '', 5);
        $this->Text(41,60,'Restricciones');
        $this->SetFont('Arial', 'B', 7);
        $this->Text(40,63,''.$DatosLicencia[8].'');

        // Información adicional (fechas y antigüedad)
        $this->SetFont('Arial', '', 5);
        $this->Text(4, 50, 'Fecha de Nacimiento');
        $this->SetFont('Arial', 'B', 5);
        $this->Text(4, 52, ''.$DatosLicencia[12].'');
        $this->SetFont('Arial', '', 5);
        $this->Text(4, 54, 'Fecha de Expedicion');
        $this->SetFont('Arial', 'B', 5);
        $this->Text(4, 56,''.$DatosLicencia[5].'');
        $this->SetFont('Arial', '', 5);
        $this->Text(4, 58, 'Valida hasta');
        $this->SetFont('Arial', 'B', 5);
        $this->Text(4, 60, ''.$DatosLicencia[6].'');
        $this->SetFont('Arial', '', 5);
        $this->Text(4, 62, 'Antiguedad');
        $this->SetFont('Arial', 'B', 5);
        $this->Text(4, 64, ''.$DatosLicencia[7].'');
        $this->SetFont('Arial', '', 5);
        $this->Text(11, 66, 'Firma');
        $this->Image('firma.jpg', 8, 64, 10); // Firma del titular
        $this->SetFont('Arial', '', 4);
        $this->Text(5, 72, 'Autorizo que la presente');
        $this->Text(4, 74, 'sea recabada como garantia');
        $this->Text(9, 76, 'de infraccion');


        // Cuadro amarillo para la clase de licencia
        $this->SetFillColor(255, 225, 0); // Amarillo
        $this->Rect(4, 78, 5, 5, 'F'); // Cuadro amarillo
        $this->SetFont('Arial', 'B', 7);
        $this->SetTextColor(0, 0, 0);
        $this->Text(5.8, 81.5, ''.$DatosLicencia[4].'');

        $this->Image('caminos.jpg', 44.1, 75, 10); // Logo de la clase de licencia
        $this->Image('vehiculos.jpg', 10, 78.1, 20); // Logo de la secretaría
    }

    // Diseño de la parte trasera de la tarjeta
    function credencialTrasera( $DatosLicencia)
    {
        // Fondo blanco de la tarjeta trasera
        $this->SetFillColor(255, 255, 255);
        $this->Rect(0, 0, 53.98, 85.6, 'F');

        // Número de identificación en negro
        $this->SetFont('Arial', 'B', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Text(19, 8, 'B211571223');

        // Logos en la parte superior
       $this->Image('logoe.jpg',5,3,10,8);
       $this->Image('logod.jpg',40,3,11,8);

        // Residencia y dirección
        $this->SetFont('Arial', '', 5);
        $this->Text(45, 26, 'Domicilio');

        $this->SetFont('Arial','B',5);
        $this->Text(38.5,28, ''.$DatosLicencia[10].'');
        
        // Grupo sanguíneo y donador
        $this->SetFont('Arial', '', 5);
        $this->Text(38, 30, 'Grupo Sanguineo');
        $this->SetFont('Arial','B',5);
        $this->Text(47,32,''.$DatosLicencia[14].'');
        $this->SetFont('Arial', '', 5);
        $this->Text(35, 34, 'Donador de Organos');
        $this->SetFont('Arial','B',5);
        $this->Text(50,36,''.$DatosLicencia[13].'');
        $this->Image('qr.jpg',5,11,18,18);
        $this->Text(2,31,'Observaciones');
        $this->SetFont('Arial', '', 5);
        $this->Text(2,33,''.$DatosLicencia[9].'');
        
        
        $this->SetFont('Arial', '', 5);
        $this->Text(32.5,38, 'Numero de emergencias');
        $this->SetFont('Arial','B',5);
        $this->Text(42,40,'4425500000');

        // Espacio para imagen de autos (vehículos permitidos)
        $this->Image('ssc.jpg', 35, 40.5, 17, 6); // Imagen de auto 1

        // Texto legal en la parte inferior
        $this->SetFont('Arial', '', 4);
        $this->SetXY(5, 48);
        $this->MultiCell(45, 1.5, 'Fundamento Legal: Articulo 19, fraccion XV y 33, fraccion I de la Ley Organica del Poder Ejecutivo del Estado de Queretaro, Articulo 9, fraccion XIV y 56 de la Ley de Transito del Estado de Queretaro. Articulo 134, 135, 136, 137, 138, 140, 141, 142 y 183 del Reglamento de Transito del Estado de Queretaro.', 0, 'L');
        
        // Nombre del secretario en la parte inferior
        $this->SetFont('Arial', 'B', 4);
        $this->Image('firma.jpg', 25, 56, 5); // Firma del secretario
        $this->Text(14, 61, 'CMTE.IOVAN ELIAS PEREZ HERNANDEZ');
        $this->Text(13, 63, 'SECRETARIO DE SEGURIDAD CIUDADANA');

        $this->Image('slogo.jpg', 15, 64, 25); // Logo de la secretaría
    }
}

$pdf = new PDF('P', 'mm', array(53.98, 85.6)); // Orientación vertical
$pdf->AddPage();
$pdf->credencialFrontal($DatosLicencia); // Parte frontal

$pdf->AddPage();
$pdf->credencialTrasera($DatosLicencia); // Parte trasera

$pdf->Output();

desconectar($Con);
?>



