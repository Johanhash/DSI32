<?php
$ConductorID = $_GET['ConductorID'];
$Nombre = $_GET['Nombre'];
$Apellido = $_GET['Apellido'];
$FechaNac = $_GET['FechaNac'];
$Domicilio = $_GET['Domicilio'];
$Telefono = $_GET['Telefono'];
$TipoSangre = $_GET['TipoSangre'];
$DonadorOrg = $_GET['DonadorOrg'];

$SQL = "INSERT INTO Conductores VALUES('$ConductorID', '$Nombre', '$Apellido', '$FechaNac', '$Domicilio', '$Telefono', '$TipoSangre', '$DonadorOrg')";

// Enviar datos al controlador
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir a la misma página con un mensaje de éxito
    header("Location: FConductores.php?mensaje=Registro+exitoso");
    exit();
} else {
    // Redirigir a la misma página con un mensaje de error
    header("Location: FConductores.php?mensaje=Error+en+el+registro");
    exit();
}

Desconectar($Con); 
?>
