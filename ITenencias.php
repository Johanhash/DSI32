<?php


$LineaCaptura =$_REQUEST['LineaCaptura'];
$Vehiculo =$_REQUEST['Vehiculo'];
$Transaccion =$_REQUEST['Transaccion'];
$FechaLimite =$_REQUEST['FechaLimite'];
$Importe =$_REQUEST['Importe'];
$TipoPago =$_REQUEST['TipoPago'];
$FechaActual =$_REQUEST['FechaActual'];
$Hora =$_REQUEST['Hora'];
$FolioTarjeta =$_REQUEST['FolioTarjeta'];


    $SQL ="INSERT INTO Tenencias (LineaCaptura,Vehiculo,Transaccion,FechaLimite,Importe,TipoPago,FechaActual,Hora,FolioTarjeta)
    VALUES('$LineaCaptura','$Vehiculo','$Transaccion','$FechaLimite','$Importe','$TipoPago','$FechaActual','$Hora','$FolioTarjeta')";

   /* print($SQL)*/;

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