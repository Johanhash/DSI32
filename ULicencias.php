<?php
    $NoLicencia=$_REQUEST['NoLicencia'];
    $Foto=$_REQUEST['Foto'];
    $Nombre=$_REQUEST['Nombre'];
    $Apellido=$_REQUEST['Apellido'];
    $Firma=$_REQUEST['Firma'];
    $TipoLicencia=$_REQUEST['TipoLicencia'];
    $FechaExp=$_REQUEST['FechaExp']; 
    $Observacion=$_REQUEST['Observacion'];
    $Antiguedad =$_REQUEST['Antiguedad'];
    $Domicilio =$_REQUEST['Domicilio'];
    $Restriccion =$_REQUEST['Restriccion'];
    $Vigencia =$_REQUEST['Vigencia'];
    $Conductorid =$_REQUEST['Conductorid'];
    

    $SQL ="UPDATE Licencias SET Foto='$Foto',Nombre='$Nombre',Apellido='$Apellido',
    Firma='$Firma',TipoLicencia='$TipoLicencia',FechaExp='$FechaExp',
    Observacion='$Observacion',Antiguedad='$Antiguedad',
    Domicilio='$Domicilio',Restriccion='$Restriccion',
    Vigencia='$Vigencia',Conductorid='$Conductorid'
    WHERE NoLicencia='$NoLicencia'";
    

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FULicencias.php?NoLicencia=$NoLicencia&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>
