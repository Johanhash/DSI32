<?php

$LineaCaptura =$_REQUEST['LineaCaptura'];
$Vehiculo =$_REQUEST['vehiculo'];
$Transaccion =$_REQUEST['Transaccion'];
$FechaLimite =$_REQUEST['FechaLimite'];
$Importe =$_REQUEST['Importe'];
$TipoPago =$_REQUEST['TipoPago'];
$FechaActual =$_REQUEST['FechaActual'];
$Hora =$_REQUEST['Hora'];
$FolioTarjeta =$_REQUEST['FolioTarjeta'];

    $SQL ="UPDATE Tenencias SET vehiculo='$Vehiculo',
    Transaccion='$Transaccion',FechaLimite='$FechaLimite',
    Importe='$Importe',TipoPago='$TipoPago',FechaActual='$FechaActual',
    Hora='$Hora',FolioTarjeta='$FolioTarjeta'
    WHERE LineaCaptura='$LineaCaptura';";

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUTenencias.php?Folio='$LineaCaptura'&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>