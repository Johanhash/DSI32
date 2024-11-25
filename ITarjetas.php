<?php

session_start();

$Folio =$_POST['Folio'];
$rfcPropietario =$_POST['rfcPropietario'];
$Vigencia =$_POST['Vigencia'];
$FechaExp =$_POST['FechaExp'];
$OficinaExp =$_POST['OficinaExp'];
$Movimiento =$_POST['Movimiento'];
$rfcPropietario =$_POST['rfcPropietario'];
$NIV =$_POST['NIV'];
$PropietarioID =$_POST['PropietarioID'];
$VehiculoID =$_POST['VehiculoID'];

    
    $SQL ="INSERT INTO Tarjetas VALUES('$Folio','$rfcPropietario','$Vigencia','$FechaExp','$OficinaExp','$Movimiento','$NIV','$PropietarioID','$VehiculoID')";

// Enviar datos al controlador
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir a la misma página con un mensaje de éxito
    header("Location: FTarjetas.php?mensaje=Registro+exitoso");
    exit();
} else {
    // Redirigir a la misma página con un mensaje de error
    header("Location: FTarjetas.php?mensaje=Error+en+el+registro");
    exit();
}
Desconectar($Con); 

?>