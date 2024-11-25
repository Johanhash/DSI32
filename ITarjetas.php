<?php
session_start();
include("Controlador.php");
require('fpdf.php');

$Folio = $_POST['Folio'];
$rfcPropietario = $_POST['rfcPropietario'];
$Vigencia = $_POST['Vigencia'];
$FechaExp = $_POST['FechaExp'];
$OficinaExp = $_POST['OficinaExp'];
$Movimiento = $_POST['Movimiento'];
$NIV = $_POST['NIV'];
$PropietarioID = $_POST['PropietarioID'];
$VehiculoID = $_POST['VehiculoID'];
$Placa = $_POST['Placa'];

$SQL = "INSERT INTO Tarjetas (Folio, rfcPropietario, Vigencia, FechaExp, OficinaExp, Movimiento, NIV, PropietarioID, VehiculoID, Placa)
        VALUES ('$Folio', '$rfcPropietario', '$Vigencia', '$FechaExp', '$OficinaExp', '$Movimiento', '$NIV', '$PropietarioID', '$VehiculoID', '$Placa')";

$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);
if ($ResultSet) {
    $_SESSION['mensaje'] = "Registro guardado correctamente.";

    // Obtener los datos de la vista DatosTarjeta
    $SQLVista = "SELECT * FROM datostarjetacirculacion WHERE Folio='$Folio';";
    $ResultSetVista = Ejecutar($Con, $SQLVista);
    $DatosTarjeta = mysqli_fetch_row($ResultSetVista);

    // Generar archivo XML
    $Manejador = fopen("Tarjeta$Folio.xml", "w");
    fwrite($Manejador, '<?xml version="1.0" encoding="UTF-8"?>
<Tarjeta>
    <Folio>'.$Folio.'</Folio>
    <rfcPropietario>'.$rfcPropietario.'</rfcPropietario>
    <Vigencia>'.$Vigencia.'</Vigencia>
    <FechaExp>'.$FechaExp.'</FechaExp>
    <OficinaExp>'.$OficinaExp.'</OficinaExp>
    <Movimiento>'.$Movimiento.'</Movimiento>
    <NIV>'.$NIV.'</NIV>
    <PropietarioID>'.$PropietarioID.'</PropietarioID>
    <VehiculoID>'.$VehiculoID.'</VehiculoID>
    <Placa>'.$Placa.'</Placa>
</Tarjeta>');
    fclose($Manejador);

    // Generar PDF
    class PDF extends FPDF
    {
        // Diseño de la tarjeta de circulación
        function tarjetaCirculacion($DatosCuenta)
        {
            // Nombre
            $this->SetXY(7,10);
            $this->SetFont('Arial','B',3);
            $this->Cell(0,0,' PROPIETARIO');
            $this->SetXY(17,10);
            $this->SetFont('Arial','B',4);
            $this->Cell(0,0,''.$DatosCuenta[9].'');

            // RFC
            $this->SetXY(7,13);
            $this->SetFont('Arial','B',3);
            $this->Cell(0,0,'RFC');
            $this->SetXY(7,14);
            $this->SetFont('Arial','B',4);
            $this->Cell(0,0,''.$DatosCuenta[1].'');

            // NUMERO DE SERIE
            $this->SetXY(24,13);
            $this->SetFont('Arial','B',3);
            $this->Cell(0,0,'NUMERO DE SERIE');
            $this->SetXY(24,14);
            $this->SetFont('Arial','B',5);
            $this->Cell(1,1,''.$DatosCuenta[6].'');

            // Marca/Sublinea
            $this->SetXY(24,16);
            $this->SetFont('Arial','B',3);
            $this->Cell(0,0,'MARCA/LINEA/SUBLINEA');
            $this->SetXY(24,17);
            $this->SetFont('Arial','B',4);
            $this->Cell(1,1,''.$DatosCuenta[14].'/'.$DatosCuenta[15].'/'.$DatosCuenta[16].'');

            // Holograma
            $this->SetXY(27,7);
            $this->SetFont('Arial','B',3);
            $this->Cell(0,0,'HOLOGRAMA');
            $this->SetXY(27,8);
            $this->SetFont('Arial','B',4);

// Folio
$this->SetXY(38,7);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'FOLIO');
$this->SetXY(38,8);
$this->SetFont('Arial','B',4);
$this->Cell(1,1,''.$DatosCuenta[0].'');

// Vigencia
$this->SetXY(51,7);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'VIGENCIA');
$this->SetXY(51,8);
$this->SetFont('Arial','B',4);
$this->Cell(1,1,''.$DatosCuenta[2].'');

// Placa
$this->SetXY(62,7);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'PLACA');
$this->SetXY(62,8);
$this->SetFont('Arial','B',5);
$this->Cell(1,1,''.$DatosCuenta[7].'');

// Localidad
$this->SetXY(7,16);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'LOCALIDAD');
$this->SetXY(7,17);
$this->SetFont('Arial','B',4);
$this->Cell(0,0,''.$DatosCuenta[7].'');


// Municipio
$this->SetXY(7,20);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'MUNICIPIO');
$this->SetXY(7,21);
$this->SetFont('Arial','B',4);
$this->Cell(0,0,''.$DatosCuenta[11].'');

$this->SetXY(7,24);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'NUMERO DE CONSTANCIA');
$this->SetXY(7,25);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'DE INSCRIPCION(NCI)');


$this->SetXY(24,24);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'CILINDRAJE');

$this->SetXY(35,24);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,''.$DatosCuenta[21].'');


$this->SetXY(40,24);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'CVE   VEHICULAR');


// CAPACIDAD
$this->SetXY(24,25);
$this->SetFont('Arial','B',3);
$this->Cell(0.5,0.5,'CAPACIDAD');

// CAPACIDAD
$this->SetXY(35,25);
$this->SetFont('Arial','B',3);
$this->Cell(0.5,0.5,''.$DatosCuenta[20].'');

// PUERTAS
$this->SetXY(24,26);
$this->SetFont('Arial','B',3);
$this->Cell(1,1,'PUERTAS');


$this->SetXY(40,26);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'CLASE    2');

// PUERTAS
$this->SetXY(35,26);
$this->SetFont('Arial','B',3);
$this->Cell(1,1,''.$DatosCuenta[21].'');

// ASIENTOS
$this->SetXY(24,27);
$this->SetFont('Arial','B',3);
$this->Cell(1.5,1.5,'ASIENTOS');


$this->SetXY(40,27);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'TIPO        9');


// ASIENTOS
$this->SetXY(35,27);
$this->SetFont('Arial','B',3);
$this->Cell(1.5,1.5,''.$DatosCuenta[22].'');

// ORIGEN
$this->SetXY(7,27);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'ORIGEN');
$this->SetXY(7,28);
$this->SetFont('Arial','B',4);
$this->Cell(0,0,'EXTRANJERO');
$this->SetXY(7,29);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'COLOR');
$this->SetXY(7,30);
$this->SetFont('Arial','B',4);
$this->Cell(0,0,''.$DatosCuenta[17].'');



// COMBUSTIBLE
$this->SetXY(24,28);
$this->SetFont('Arial','B',3);
$this->Cell(1.5,1.5,'COMBUSTIBLE');


$this->SetXY(40,28);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'USO        36');

// COMBUSTIBLE
$this->SetXY(35,28);
$this->SetFont('Arial','B',3);
$this->Cell(1.5,1.5,''.$DatosCuenta[23].'');

// TRANSMISION
$this->SetXY(24,29);
$this->SetFont('Arial','B',3);
$this->Cell(1.5,1.5,'TRANSMISION');
$this->SetXY(24,30);
$this->SetFont('Arial','B',5);
$this->Cell(1,2,''.$DatosCuenta[24].'');


$this->SetXY(40,29);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'RPA');


// Operacion
$this->SetXY(53,15);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'OPERACION');
$this->SetXY(53,16);
$this->SetFont('Arial','B',4);
$this->Cell(0,0,'2018/1056773');

// Folio
$this->SetXY(53,17);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'FOLIO');
$this->SetXY(53,18);
$this->SetFont('Arial','B',4);
$this->Cell(1,1,'A');
$this->SetXY(55,18);
$this->SetFont('Arial','B',4);
$this->Cell(1,1,'1679305');

// PLACA ANT
$this->SetXY(53,19);
$this->SetFont('Arial','B',3);
$this->Cell(1.5,1.5,'PLACA ANT.');

// Fecha de Expedición
$this->SetXY(53,23);
$this->SetFont('Arial','B',3);
$this->Cell(0,0,'FECHA DE EXPEDICION');
$this->SetXY(53,24);
$this->SetFont('Arial','B',4);
$this->Cell(0.5,0.5,''.$DatosCuenta[3].'');

// OFICINA EXPENDEDORA
$this->SetXY(53,25);
$this->SetFont('Arial','B',3);
$this->Cell(1,1,'OFICINA EXPENDEDORA');
$this->SetXY(53,26);
$this->SetFont('Arial','B',3);
$this->Cell(1,01,'MOVIMIENTO');

// ALTA DE PLACA
$this->SetXY(53,27);
$this->SetFont('Arial','B',4);
$this->Cell(2,2,'ALTA DE PLACA');

// ALTA DE PLACA
$this->SetXY(53,28);
$this->SetFont('Arial','B',3);
$this->Cell(2,2,'NUMERO DE MOTOR');

// ALTA DE PLACA
$this->SetXY(53,29);
$this->SetFont('Arial','B',4);
$this->Cell(2.5,2.5,'HECHO EN USA');


//$pdf->Image('QR.png',65,29,14,14);  

$this->Image('logoq.jpg',24,33,9,9); 

$this->Image('queretaro.png',12,31,10,10); 



$this->SetXY(35,33);
$this->SetFont('Arial','B',5.5);
$this->Cell(0,0,'PODER EJECUTIVO DEL');
$this->SetXY(35,34);
$this->SetFont('Arial','B',5.5);
$this->Cell(1,2,'ESTADO DE QUERETARO');

$this->SetXY(35,36);
$this->SetFont('Arial','B',3.5);
$this->Cell(1,1,'SECRETARIA DE PLANEACION Y FINANZAS');




$this->SetFillColor(0, 0, 255); // Azul


$this->SetTextColor(255, 255, 255); // Blanco


$this->SetXY(16, 42.5);

$this->SetFont('Arial','B',6);

$this->Cell(50, 4.5, 'TARJETA DE CIRCULACION VEHICULAR', 0, 1, 'C', true); 

        }
    }

    $pdf = new PDF('L', 'mm', array(85, 48)); // Orientación horizontal
    $pdf->SetMargins(0,68);
    $pdf->SetAutoPageBreak(true,1);
    $pdf->AddPage();
    $pdf->tarjetaCirculacion($DatosTarjeta); // Parte frontal

    $pdf->Output('F', "Tarjeta$Folio.pdf");

    // Redirigir al usuario para descargar el PDF
    header("Location: Tarjeta$Folio.pdf");
    exit();
} else {
    $_SESSION['mensaje'] = "Error al guardar el registro: " . mysqli_error($Con);
}
Desconectar($Con);

header("Location: FTarjetas.php");
exit();
?>