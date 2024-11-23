<?php
require('fpdf.php');

$pdf = new FPDF(); //constructor
$pdf->AddPage(); //orientacion,size,rotation
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!','1','1');//ancho,alto,txt,border,ln,alineacion,
$pdf->Image('descarga.jpeg',100,100,30);//x,y,z
$pdf->Output('');//F es para descargar¿
?>