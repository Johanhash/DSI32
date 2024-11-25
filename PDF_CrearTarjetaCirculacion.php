<?php
include("controlador.php");


$Placa=$_GET['Placa'];
$Con=conectar();
$SQL="SELECT * FROM Datos_licencia WHERE placa= '$Placa';";
$ResultSet=ejecutar($Con, $SQL);
$DatosCuenta=mysqli_fetch_row($ResultSet);

require('fpdf.php');

$pdf = new FPDF('L', 'mm', array(85,48));
$pdf->SetMargins(0,68);
$pdf->SetAutoPageBreak(true,1);

$pdf->AddPage();

// Nombre
$pdf->SetXY(7,10);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,' PROPIETARIO');
$pdf->SetXY(17,10);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,''.$DatosCuenta[0].'');

// RFC
$pdf->SetXY(7,13);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'RFC');
$pdf->SetXY(7,14);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,''.$DatosCuenta[5].'');

// NUMERO DE SERIE
$pdf->SetXY(24,13);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'NUMERO DE SERIE');
$pdf->SetXY(24,14);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(1,1,'1FTCR14A6TPA47038');

// Marca/Sublinea
$pdf->SetXY(24,16);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'MARCA/LINEA/SUBLINEA');
$pdf->SetXY(24,17);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,''.$DatosCuenta[8].'/RANGER/XLT');



// Tipo de servicio
$pdf->SetXY(7,7);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'TIPO DE SERVICIO');
$pdf->SetXY(7,8);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,''.$DatosCuenta[1].'');

// Holograma
$pdf->SetXY(27,7);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'HOLOGRAMA');
$pdf->SetXY(27,8);
$pdf->SetFont('Arial','B',4);

// Folio
$pdf->SetXY(38,7);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'FOLIO');
$pdf->SetXY(38,8);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,'178935050');

// Vigencia
$pdf->SetXY(51,7);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'VIGENCIA');
$pdf->SetXY(51,8);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,''.$DatosCuenta[3].'');

// Placa
$pdf->SetXY(62,7);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'PLACA');
$pdf->SetXY(62,8);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(1,1,''.$DatosCuenta[4].'');

$pdf->SetXY(80,13);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(-3,-3,'A');
$pdf->SetXY(80,14);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(2,2,'1');
$pdf->SetXY(80,15);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(3,3,'6');
$pdf->SetXY(80,16);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(4,4,'7');
$pdf->SetXY(80,17);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(5,5,'9');
$pdf->SetXY(80,18);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(6,6,'3');
$pdf->SetXY(80,19);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(7,7,'0');
$pdf->SetXY(80,20);
$pdf->SetFont('Arial','B',4.5);
$pdf->Cell(8,8,'5');

// Localidad
$pdf->SetXY(7,16);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'LOCALIDAD');
$pdf->SetXY(7,17);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,''.$DatosCuenta[7].'');


// Municipio
$pdf->SetXY(7,20);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'MUNICIPIO');
$pdf->SetXY(7,21);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,'CADEREYTA DE');
$pdf->SetXY(7,22);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,'MONTES');

// Serie
$pdf->SetXY(7,24);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'NUMERO DE CONSTANCIA');
$pdf->SetXY(7,25);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'DE INSCRIPCION(NCI)');

// CILINDRAJE
$pdf->SetXY(24,24);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'CILINDRAJE');

// CILINDRAJE
$pdf->SetXY(35,24);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,''.$DatosCuenta[10].'');

// CILINDRAJE
$pdf->SetXY(40,24);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'CVE   VEHICULAR');


// CAPACIDAD
$pdf->SetXY(24,25);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0.5,0.5,'CAPACIDAD');

// CAPACIDAD
$pdf->SetXY(35,25);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0.5,0.5,''.$DatosCuenta[11].'');

// PUERTAS
$pdf->SetXY(24,26);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1,1,'PUERTAS');


$pdf->SetXY(40,26);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'CLASE    2');

// PUERTAS
$pdf->SetXY(35,26);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1,1,'2');

// ASIENTOS
$pdf->SetXY(24,27);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1.5,1.5,'ASIENTOS');


$pdf->SetXY(40,27);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'TIPO        9');


// ASIENTOS
$pdf->SetXY(35,27);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1.5,1.5,''.$DatosCuenta[13].'');

// ORIGEN
$pdf->SetXY(7,27);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'ORIGEN');
$pdf->SetXY(7,28);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,'EXTRANJERO');
$pdf->SetXY(7,29);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'COLOR');
$pdf->SetXY(7,30);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,'VERDE');



// COMBUSTIBLE
$pdf->SetXY(24,28);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1.5,1.5,'COMBUSTIBLE');


$pdf->SetXY(40,28);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'USO        36');

// COMBUSTIBLE
$pdf->SetXY(35,28);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1.5,1.5,''.$DatosCuenta[14].'');

// TRANSMISION
$pdf->SetXY(24,29);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1.5,1.5,'TRANSMISION');
$pdf->SetXY(24,30);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(1,2,''.$DatosCuenta[16].'');


$pdf->SetXY(40,29);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'RPA');

// Modelo
$pdf->SetXY(53,13);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'MODELO');
$pdf->SetXY(53,14);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,''.$DatosCuenta[6].'');

// Operacion
$pdf->SetXY(53,15);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'OPERACION');
$pdf->SetXY(53,16);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,'2018/1056773');

// Folio
$pdf->SetXY(53,17);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'FOLIO');
$pdf->SetXY(53,18);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,'A');
$pdf->SetXY(55,18);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1,1,'1679305');

// PLACA ANT
$pdf->SetXY(53,19);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1.5,1.5,'PLACA ANT.');

// Fecha de Expedición
$pdf->SetXY(53,23);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'FECHA DE EXPEDICION');
$pdf->SetXY(53,24);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0.5,0.5,''.$DatosCuenta[15].'');

// OFICINA EXPENDEDORA
$pdf->SetXY(53,25);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1,1,'OFICINA EXPENDEDORA');
$pdf->SetXY(53,26);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(1,01,'MOVIMIENTO');

// ALTA DE PLACA
$pdf->SetXY(53,27);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(2,2,'ALTA DE PLACA');

// ALTA DE PLACA
$pdf->SetXY(53,28);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(2,2,'NUMERO DE MOTOR');

// ALTA DE PLACA
$pdf->SetXY(53,29);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(2.5,2.5,'HECHO EN USA');

$pdf->SetDrawColor(0, 0, 255); // Azul
$pdf->SetXY(1,29);
$pdf->Cell(0,0,'',1,1,'L');

$pdf->Image('QR.png',65,29,14,14);  

$pdf->Image('QRO.png',24,31,10,10); 

$pdf->Image('QRONOSOTROS.JPG',12,31,10,10); 


// PODER EJECUTIVO EL ESTADO DE QUERETARO
$pdf->SetXY(35,33);
$pdf->SetFont('Arial','B',5.5);
$pdf->Cell(0,0,'PODER EJECUTIVO DEL');
$pdf->SetXY(35,34);
$pdf->SetFont('Arial','B',5.5);
$pdf->Cell(1,2,'ESTADO DE QUERETARO');

$pdf->SetXY(35,36);
$pdf->SetFont('Arial','B',3.5);
$pdf->Cell(1,1,'SECRETARIA DE PLANEACION Y FINANZAS');




$pdf->SetFillColor(0, 0, 255); // Azul

// Configurar el color del texto
$pdf->SetTextColor(255, 255, 255); // Blanco

// Posicionar el texto
$pdf->SetXY(16, 42.5);

$pdf->SetFont('Arial','B',6);
// Crear una celda con fondo
$pdf->Cell(50, 4.5, 'TARJETA DE CIRCULACION VEHICULAR', 0, 1, 'C', true); // 70mm ancho, 10mm alto

$pdf->Output();

desconectar($Con);

?>
