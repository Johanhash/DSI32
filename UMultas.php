<?php
     $Folio =$_POST['Folio'];
     $Fecha =$_POST['Fecha'];
     $Lugar =$_POST['Lugar'];
     $Propietario =$_POST['Propietario'];
     $Nombre =$_POST['Nombre'];
     $Domicilio =$_POST['Domicilio'];
     $Vehiculo =$_POST['Vehiculo'];
     $Motivo =$_POST['Motivo'];
     $ObjRetenido =$_POST['ObjRetenido'];
     $Solucion =$_POST['Solucion'];
     $Oficial =$_POST['Oficial'];
     $LugarPago =$_POST['LugarPago'];
     $FolioVerifcacion =$_POST['FolioVerifcacion'];
     $NoLicencia =$_POST['NoLicencia'];   
     $FolioTarjeta =$_POST['FolioTarjeta'];
 
 
     $SQL ="UPDATE Multas SET Fecha='$Fecha',Lugar='$Lugar',Propietario='$Propietario',
     Nombre='$Nombre',Domicilio='$Domicilio',Vehiculo='$Vehiculo',Motivo='$Motivo',
     ObjRetenido='$ObjRetenido',Solucion='$Solucion',Oficial='$Oficial',
     LugarPago='$LugarPago',FolioVerificacion='$FolioVerifcacion',
     NoLicencia='$NoLicencia',FolioTarjeta='$FolioTarjeta' WHERE Folio='$Folio';";

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUMultas.php?Folio=$Folio&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>
