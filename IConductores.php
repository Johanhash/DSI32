<?php
    $ConductorID=$_GET['ConductorID'];
    $Nombre=$_GET['Nombre'];
    $FechaNac=$_GET['FechaNac'];
    $Domicilio=$_GET['Domicilio'];
    $Telefono=$_GET['Telefono'];
    $TipoSangre=$_GET['TipoSangre'];
    $DonadorOrg=$_GET['DonadorOrg'];

    $SQL ="INSERT INTO Conductores VALUES('$ConductorID','$Nombre','$FechaNac','$Domicilio','$Telefono',
    '$TipoSangre','$DonadorOrg')";
    /*print($SQL)*/;
    
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

