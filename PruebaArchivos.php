<?php
//abrir el archi 
$Manejador = fopen("Archivo1.txt","a");



/*Leer 
$Cadena=fgets($Manejador); 
print($Cadena); 
*/

//Escribir 
fwrite($Manejador, "Este es otro texto");


//Cerrar
fclose($Manejador); 




?> 