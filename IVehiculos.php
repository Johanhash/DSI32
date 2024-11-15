<?php

$NIV =$_REQUEST['NIV'];
$Marca =$_REQUEST['Marca'];
$Linea =$_REQUEST['Linea'];
$Sublinea =$_REQUEST['Sublinea'];
$Color =$_REQUEST['Color'];
$Cilindro =$_REQUEST['Cilindro'];
$Origen =$_REQUEST['Origen'];
$Capacidad =$_REQUEST['Capacidad'];
$Puertas =$_REQUEST['Puertas'];
$Asientos =$_REQUEST['Asientos'];
$Combustible =$_REQUEST['Combustible'];
$Transmision =$_REQUEST['Transmision'];
$Clase =$_REQUEST['Clase'];
$Tipo =$_REQUEST['Tipo'];
$Uso =$_REQUEST['Uso'];


    $SQL ="INSERT INTO VEHICULOS VALUES('$NIV','$Marca','$Linea','$Sublinea','$Color','$Cilindro',
    '$Origen','$Capacidad','$Puertas','$Asientos','$Combustible','$Transmision','$Clase','$Tipo','$Uso')";
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
