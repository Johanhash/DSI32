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

    $SQL ="UPDATE Tenencias SET Vehiculo='$Vehiculo',
    Transaccion='$Transaccion',FechaLimite='$FechaLimite',
    Importe='$Importe',TipoPago='$TipoPago',FechaActual='$FechaActual',
    Hora='$Hora',FolioTarjeta='$FolioTarjeta'
    WHERE LineaCaptura='$LineaCaptura'";

   /* print($SQL)*/

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