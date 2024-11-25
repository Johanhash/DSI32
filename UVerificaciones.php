<?php
 
$Folio =$_POST['Folio'];
$Vehiculo =$_POST['Vehiculo'];
$Motivo=$_POST['Motivo'];
$Semestre =$_POST['Semestre'];
$Vigencia =$_POST['Vigencia'];
$FolioTarjeta =$_POST['FolioTarjeta'];
$NoCentro=$_POST['NoCentro'];


    $SQL ="UPDATE Verificaciones 
    SET Vehiculo='$Vehiculo',
    Motivo='$Motivo',Semestre='$Semestre',
    Vigencia='$Vigencia',FolioTarjeta='$FolioTarjeta',
    NoCentro='$NoCentro' WHERE Folio='$Folio'";
    

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUVerificaciones.php?NoCentro=$NoCentro&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>





