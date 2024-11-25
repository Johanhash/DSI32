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




    $SQL ="INSERT INTO Multas VALUES('$Folio','$Fecha','$Lugar','$Propietario','$Nombre','$Domicilio','$Vehiculo','$Motivo','$ObjRetenido','$Solucion','$Oficial','$LugarPago','$FolioVerifcacion','$NoLicencia','$FolioTarjeta')";


// Enviar datos al controlador
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    header("Location: FMultas.php?mensaje=Registro+exitoso");
    exit();
} else {
    header("Location: FMultas.php?mensaje=Error+en+el+registro");
    exit();
}
Desconectar($Con); 


?>


