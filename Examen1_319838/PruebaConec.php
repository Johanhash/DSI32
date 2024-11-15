<?php

$Servidor= "127.0.0.1";
$Usuario="root";
$Password="";
$BD="Examen1";
$Con=mysqli_connect($Servidor,$Usuario,$Password,$BD);
print_r($Con);

?>