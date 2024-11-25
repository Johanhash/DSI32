<?php
    $Conductorid=$_GET['Conductorid'];
    $Nombre=$_GET['Nombre'];
    $Apellido=$_GET['Apellido'];
    $FechaNac=$_GET['FechaNac'];
    $Domicilio=$_GET['Domicilio'];
    $Telefono=$_GET['Telefono'];
    $TipoSangre=$_GET['TipoSangre'];
    $DonadorOrg=$_GET['DonadorOrg'];



    $SQL ="UPDATE Conductores SET Nombre='$Nombre',Apellido='$Apellido', FechaNac='$FechaNac',
    Domicilio='$Domicilio',Telefono='$Telefono',
    TipoSangre='$TipoSangre',
    DonadorOrg='$DonadorOrg'
    WHERE Conductorid='$Conductorid';";
    

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    header("Location: FUConductores.php?Conductorid=$Conductorid&mensaje=exito");
    exit();
} else {
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>

