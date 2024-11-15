<?php

$RFC =$_REQUEST['RFC'];
$Nombre =$_REQUEST['Nombre'];
$Localidad =$_REQUEST['Localidad'];
$Municipio =$_REQUEST['Municipio'];





    $SQL ="INSERT INTO Propietarios (RFC,Nombre,Localidad,Municipio) VALUES('$RFC','$Nombre','$Localidad','$Municipio')";
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
