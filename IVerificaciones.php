<?php

$Folio =$_POST['Folio'];
$Vehiculo =$_POST['Vehiculo'];
$Motivo=$_POST['Motivo'];
$Semestre =$_POST['Semestre'];
$Vigencia =$_POST['Vigencia'];
$FolioTarjeta =$_POST['FolioTarjeta'];
$CentroVer =$_POST['CentroVer'];


    $SQL ="INSERT INTO Verificaciones (Folio,Vehiculo,Motivo,Semestre,Vigencia,FolioTarjeta,CentroVer)
    VALUES('$Folio','$Vehiculo','$Motivo','$Semestre','$Vigencia','$FolioTarjeta','$CentroVer')";
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