<?php

$RFC =$_REQUEST['RFC'];
$Nombre =$_REQUEST['Nombre'];
$Localidad =$_REQUEST['Localidad'];
$Municipio =$_REQUEST['Municipio'];


    $SQL ="UPDATE Propietarios SET Nombre='$Nombre',
    Localidad='$Localidad', Municipio='$Municipio' 
    WHERE RFC= '$RFC' ";
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
