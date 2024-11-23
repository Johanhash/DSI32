<?php

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




    
    $SQL ="UPDATE Tarjetas
    SET  rfcPropietario='$rfcPropietario', Vigencia='$Vigencia',FechaExp='$FechaExp',
    OficinaExp='$OficinaExp',Movimiento='$Movimiento',
    NIV='$NIV',PropietarioID='$PropietarioID',VehiculoID='$VehiculoID' 
    WHERE Folio='$Folio'"; 
    
    /*($SQL)*/ 

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