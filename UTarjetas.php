<?php

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
$Placa =$_POST['Placa'];


    $SQL ="UPDATE Tarjetas
    SET  rfcPropietario='$rfcPropietario', Vigencia='$Vigencia',FechaExp='$FechaExp',
    OficinaExp='$OficinaExp',Movimiento='$Movimiento',
    NIV='$NIV',PropietarioID='$PropietarioID',VehiculoID='$VehiculoID',Placa='$Placa' 
    WHERE Folio='$Folio';"; 
    

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUTarjetas.php?Folio=$Folio&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>
