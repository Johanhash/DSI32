<?php
$UserName=$_POST['UserName'];
$Pdw=$_POST['Pdw'];
$Tipo=$_POST['Tipo'];
$Status=$_POST['Status'];
$Bloqueo=$_POST['Bloqueo'];
$Intentos=$_POST['Intentos'];


$SQL = "INSERT INTO Cuentas (UserName,Pdw,Tipo,Status,Bloqueo,Intentos) 
VALUES('$UserName','$Pdw','$Tipo','$Status','$Bloqueo','$Intentos');";

include("controlador.php");

$Con=conectar();
$ResultSet=ejecutar($Con,$SQL);
if($ResultSet==1){
    print("instruccion Ejecutada");
}
else{
    print(mysqli_error($Con));
}
procesar();
desconectar($Con);

?>
