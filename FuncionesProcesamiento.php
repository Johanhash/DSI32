<?php

include ("Controlador.php"); 
$Con=Conectar();
$SQL="SELECT * FROM multas";
$ResultSet=Ejecutar($Con,$SQL); 

/////
$Carac=mysql_set_charset($Con); 
print($Carac); 
//////

Desconectar($Con);

?>

