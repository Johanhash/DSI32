<?php

$Folio =$_POST['Folio'];
$Vehiculo =$_POST['Vehiculo'];
$Motivo=$_POST['Motivo'];
$Semestre =$_POST['Semestre'];
$Vigencia =$_POST['Vigencia'];
$FolioTarjeta =$_POST['FolioTarjeta'];
$CentroVer =$_POST['CentroVer'];


    $SQL ="UPDATE Verificaciones 
    SET Vehiculo='$Vehiculo',
    Motivo='$Motivo',Semestre='$Semestre',
    Vigencia='$Vigencia',FolioTarjeta='$FolioTarjeta',
    CentroVer='$CentroVer' WHERE Folio='$Folio'";
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





