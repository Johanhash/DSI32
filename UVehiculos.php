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


    $SQL ="UPDATE Vehiculos SET Marca='$Marca',Linea='$Linea',
    Sublinea='$Sublinea',Color='$Color',Cilindro='$Cilindro',
    Origen='$Origen',Capacidad='$Capacidad',Puertas='$Puertas',
    Asientos='$Asientos',Combustible='$Combustible',
    Transmision='$Transmision',Clase='$Clase',Tipo='$Tipo',Uso='$Uso'
    WHERE NIV='$NIV'";
    
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
