<?php

$Folio =$_POST['Folio'];
$Vigencia =$_POST['Vigencia'];
$FechaExp =$_POST['FechaExp'];
$OficinaExp =$_POST['OficinaExp'];
$Movimiento =$_POST['Movimiento'];
$rfcPropietario =$_POST['rfcPropietario'];
$NIV =$_POST['NIV'];



    
    $SQL ="UPDATE Tarjetas
    SET  Vigencia='$Vigencia',FechaExp='$FechaExp',
    OficinaExp='$OficinaExp',Movimiento='$Movimiento',
    rfcPropietario='$rfcPropietario',NIV='$NIV'  
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