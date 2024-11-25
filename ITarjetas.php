<?php

session_start();

$Folio =$_POST['Folio'];
$rfcPropietario =$_POST['rfcPropietario'];
$Vigencia =$_POST['Vigencia'];
$FechaExp =$_POST['FechaExp'];
$OficinaExp =$_POST['OficinaExp'];
$Movimiento =$_POST['Movimiento'];
$rfcPropietario =$_POST['rfcPropietario'];
$NIV =$_POST['NIV'];
$PropietarioID =$_POST['PropietarioID'];
$VehiculoID =$_POST['VehiculoID'];
$Placa =$_POST['Placa'];

    
    $SQL ="INSERT INTO Tarjetas VALUES('$Folio','$rfcPropietario','$Vigencia','$FechaExp','$OficinaExp','$Movimiento','$NIV','$PropietarioID','$VehiculoID','$Placa');";


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