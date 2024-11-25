<?php
$PropietarioID = $_REQUEST['PropietarioID'];
$RFC = $_REQUEST['RFC'];
$Nombre = $_REQUEST['Nombre'];
$Localidad = $_REQUEST['Localidad'];
$Municipio = $_REQUEST['Municipio'];

$SQL = "UPDATE Propietarios SET Nombre='$Nombre', RFC='$RFC',
Localidad='$Localidad', Municipio='$Municipio' 
WHERE PropietarioID= '$PropietarioID';";

include("controlador.php");

$Con = conectar();
$ResultSet = ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUPropietarios.php?PropietarioID=$PropietarioID&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>
