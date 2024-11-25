<?php
 $NoCentro =$_GET['NoCentro'];
 $NoLinea =$_GET['NoLinea'];
 $Tecnico =$_GET['Tecnico'];
 $FechaExp =$_GET['FechaExp'];
 $HoraEntrada =$_GET['HoraEntrada'];
 $HoraSalida =$_GET['HoraSalida'];

    $SQL ="UPDATE CentrosVerificacion 
    SET NoLinea='$NoLinea',Tecnico='$Tecnico',
    FechaExp='$FechaExp',HoraEntrada='$HoraEntrada',
    HoraSalida='$HoraSalida'
   WHERE  NoCentro='$NoCentro';";

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUCentrosVerificacion.php?NoCentro=$NoCentro&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>
