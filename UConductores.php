<?php
    $ConductorID=$_GET['ConductorID'];
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
    WHERE ConductorID='$ConductorID'";
    /*print($SQL)*/
    

    //Enviar datos al controlador 
include("Controlador.php"); 
$Con=Conectar();
$ResultSet=Ejecutar($Con,$SQL);
if ($ResultSet == 1){
    print("Registro insertado");
}else{
    print("Error"); 
}
Desconectar($Con); 

?>

