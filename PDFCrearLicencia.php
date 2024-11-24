<?php

require('fpdf.php');
include("controlador.php");

$Con=conectar();

$NoLicencia=$_POST['NoLicencia'];
$SQL="SELECT * FROM datoslicencia WHERE NoLicencia= $NoLicencia;";
$ResultSet=ejecutar($Con, $SQL);
$DatosLicencia=mysqli_fetch_row($ResultSet);

$pdf = new FPDF('P', 'mm', array(85,54));
$pdf->SetMargins(0,68);
$pdf->SetAutoPageBreak(true,1);

$pdf->AddPage();
$pdf->Image('logoq.jpg',9,6,9,9);
$pdf->SetXY(22,7);
$pdf->SetFont('Arial','',3);
$pdf->Cell(0,0,'Estados Unidos Mexicanos');
$pdf->SetXY(22,8);
$pdf->Cell(0,0,'Poder Ejecutivo del Estado de Queretaro',0,1);
$pdf->SetXY(22,10);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(0,0,'Secretaria de Seguridad Ciudadana');
$pdf->SetXY(22,11.7);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(0,0,'Licencia para Conducir');


$pdf->Image('selena.jpg',28,15,20,23);
$pdf->SetXY(22,28.2);
$pdf->SetFont('Arial','',2);
$pdf->Cell(0,0,'No.Licencia');
$pdf->SetXY(17.5,31);
$pdf->SetTextColor(255,0,0);
$pdf->SetFont('Arial','',5);

$pdf->Cell(0,0,''.$DatosLicencia[0].'');
$pdf->SetXY(18,33.8);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',3);
$pdf->Cell(0,0,'AUTOMOVILISTA');


$pdf->SetXY(44.8,39);
$pdf->SetFont('Arial','',2);
$pdf->Cell(0,0,'Nombre');
$pdf->SetXY(30,39);
$pdf->SetFont('Arial','',6);
$pdf->MultiCell(20,3,''.$DatosLicencia[1].'','0','R');



$pdf->SetXY(43,46);
$pdf->SetFont('Arial','',2);
$pdf->Cell(0,0,'Observaciones');
$pdf->SetXY(4,47);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'Fecha de Nacimiento');
$pdf->SetXY(4,49);
$pdf->SetFont('Arial','',5);
$pdf->Cell(0,0,''.$DatosLicencia[2].'');

$pdf->SetXY(4,52);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'Fecha de Expedicion');
$pdf->SetXY(4,54);
$pdf->SetFont('Arial','',5);
$pdf->Cell(0,0,''.$DatosLicencia[3].'');

$pdf->SetXY(4,57);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'Valida  Hasta');
$pdf->SetXY(4,59);
$pdf->SetFont('Arial','',5);
$pdf->Cell(0,0,''.$DatosLicencia[4].'');

$pdf->SetXY(4,62);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'Antiguedad');
$pdf->SetXY(4,64);
$pdf->SetFont('Arial','',5);
$pdf->Cell(0,0,'14');

$pdf->Image('AF.jpg',6.27,65,5,5);
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(6,65);
$pdf->Cell(5.5,5,''.$DatosLicencia[8].'');


$pdf->SetXY(23,55);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(0,0,'Firma');
$pdf->Image('firma.jpg',23,57,5,5);

$pdf->SetXY(12,67);
$pdf->SetFont('Arial','',3);
$pdf->Cell(0,0,'AUTORIZO PARA QUE LA PRESENTE SEA');
$pdf->SetXY(11,68);
$pdf->SetFont('Arial','',3);
$pdf->Cell(0,0,'RECABADA COMO GARANTIA DE INFRACCION');



$pdf->AddPage(); 
$pdf->Image("91.jpg", '6', '3','8','8');
$pdf->SetFont('Arial','B',5);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(0,0,0);
$pdf->SetXY(16,5);
$pdf->Cell('20','4','B211571223','1','0', 'C', true);
$pdf->Image("89.jpg", '39', '4','7','7');
$pdf->SetXY(34,11);
$pdf->SetFont('Arial','B',3);
$pdf->SetTextColor(0,0,0);

$pdf->Cell('14','3','Domicilio','0','0','R');
$pdf->SetFont('Arial','',4);

$pdf->SetXY(34,13);
$pdf->MultiCell(14,2.5,''.$DatosLicencia[9].'','0','R');
$pdf->Image("carros.jpg", '5', '21','45','6');

$pdf->SetXY(6,26);
$pdf->SetFont('Arial','B',3);
$pdf->Cell('14','3','Restricciones','0','0','L');
$pdf->SetFont('Arial','',4);

$pdf->SetXY(6,28);
$pdf->Cell('15','3','NINGUNA','0','0','L');
$pdf->SetXY(34,26);
$pdf->SetFont('Arial','B',3);
$pdf->Cell('14','3','Grupo Sanguineo','0','0','R');
$pdf->SetFont('Arial','',4);

$pdf->SetXY(34,28);
$pdf->Cell('15','3',''.$DatosLicencia[7].'','0','0','R');

$pdf->SetXY(34,30);
$pdf->SetFont('Arial','B',3);
$pdf->Cell('14','3','Dondaor de organos','0','0','R');
$pdf->SetFont('Arial','',4);
$pdf->SetXY(34,32);
$pdf->Cell('15','3','SI ','0','0','R');

$pdf->SetXY(34,34);
$pdf->SetFont('Arial','B',3);
$pdf->Cell('14','3','Numero de Emergencia','0','0','R');
$pdf->SetFont('Arial','',4);
$pdf->SetXY(34,36);
$pdf->Cell('15','3','000-442-572-7080 ','0','0','R');
$pdf->Image("firma.jpg", '36', '39','10','10');
$pdf->SetXY(25,50);
$pdf->SetFont('Arial','B',3);
$pdf->Cell('25','3','MTRO. EN GPA. MIGUEL ANGEL CONTRERAS ALVAREZ','0','0','R');
$pdf->SetXY(25,51);
$pdf->Cell('25','3','SECRETARIO DE SEGURIDAD CIUDADANA','0','0','R');
$pdf->SetXY(5,52);
$pdf->SetFont('Arial','B',3);
$pdf->Cell('14','3','Fundamento Legal','0','0','L');
$pdf->SetFont('Arial','',3);
$pdf->SetXY(5,53);
$pdf->Cell('45','3','Articulo 19 fraccion xly33 fraccion de la ley Organica del Poder Ejecutivo de Estado de ','0','0','L');
$pdf->SetXY(5,54);

$pdf->Cell('45','3','Queretaro, articulo9 graccion Xly55 de la Ley de Transito del Estado de Queretaro','0','0','L');
$pdf->SetXY(5,55);
$pdf->Cell('45','3','articulo4 de la Ley de Procedimientos Administrativo del Estado de Queretaro','0','0','L');
$pdf->SetXY(5,56);
$pdf->Cell('45','3',', artiuclo134,135,136,137,138,138,140,141,142 y 143 del Reglamento de Transito','0','0','L');
$pdf->SetXY(5,57);
$pdf->Cell('45','3',',de Estado de Queretaro, artiuclo9 fraccion, inciso 20 de la Secretaria de Seguirdad.','0','0','L');

$pdf->SetXY(38,67);
$pdf->SetFont('Arial','B',4);

$pdf->Cell('29','4','SECRETARIA','L','L','L');
$pdf->SetXY(38,69);
$pdf->Cell('29','4','DE SEGURIDAD','L','L','L');
$pdf->SetXY(38,71);
$pdf->Cell('29','4','CIUDADANA','L','L','L');
$pdf->SetXY(30,73);
$pdf->Image("qror.jpg", '29','66','8','10');

$pdf->Output();
desconectar($Con);

?>