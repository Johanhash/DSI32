<?php

session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: FAcceso.php');
    exit;
}
?>

<?php 
include("Controlador.php");

$VehiculoID = $_GET['VehiculoID'];
$SQL = "DELETE FROM Vehiculos WHERE VehiculoID='$VehiculoID'";
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if (mysqli_affected_rows($Con) == 1) {
    // Redirigir con mensaje de éxito
    header("Location: CVehiculos.php?mensaje=Registro+eliminado+correctamente");
    exit();
} else {
    // Redirigir con mensaje de error
    $error = urlencode(mysqli_error($Con));
    header("Location: CVehiculos.php?mensaje=Error:+$error");
    exit();
}

Desconectar($Con);
?>
