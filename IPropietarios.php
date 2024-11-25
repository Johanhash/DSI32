<?php

$PropietarioID =$_REQUEST['PropietarioID'];
$RFC =$_REQUEST['RFC'];
$Nombre =$_REQUEST['Nombre'];
$Localidad =$_REQUEST['Localidad'];
$Municipio =$_REQUEST['Municipio'];





    $SQL ="INSERT INTO Propietarios (PropietarioID,RFC,Nombre,Localidad,Municipio) VALUES('$PropietarioID','$RFC','$Nombre','$Localidad','$Municipio')";
  
// Enviar datos al controlador
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir a la misma página con un mensaje de éxito
    header("Location: FPropietarios.php?mensaje=Registro+exitoso");
    exit();
} else {
    // Redirigir a la misma página con un mensaje de error
    header("Location: FPropietarios.php?mensaje=Error+en+el+registro");
    exit();
}
Desconectar($Con); 
  
?>
