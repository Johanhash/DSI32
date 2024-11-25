<?php


$LineaCaptura =$_REQUEST['LineaCaptura'];
$Vehiculo =$_REQUEST['Vehiculo'];
$Transaccion =$_REQUEST['Transaccion'];
$FechaLimite =$_REQUEST['FechaLimite'];
$Importe =$_REQUEST['Importe'];
$TipoPago =$_REQUEST['TipoPago'];
$FechaActual =$_REQUEST['FechaActual'];
$Hora =$_REQUEST['Hora'];
$FolioTarjeta =$_REQUEST['FolioTarjeta'];


    $SQL ="INSERT INTO Tenencias (LineaCaptura,Vehiculo,Transaccion,FechaLimite,Importe,TipoPago,FechaActual,Hora,FolioTarjeta)
    VALUES('$LineaCaptura','$Vehiculo','$Transaccion','$FechaLimite','$Importe','$TipoPago','$FechaActual','$Hora','$FolioTarjeta')";

// Enviar datos al controlador
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir a la misma página con un mensaje de éxito
    header("Location: FTenencias.php?mensaje=Registro+exitoso");
    exit();
} else {
    // Redirigir a la misma página con un mensaje de error
    header("Location: FTenencias.php?mensaje=Error+en+el+registro");
    exit();
}
Desconectar($Con); 

?>