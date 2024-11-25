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

$NoLicencia=$_GET['NoLicencia'];
    $SQL = "DELETE FROM Licencias WHERE NoLicencia='$NoLicencia'";
    $Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if (mysqli_affected_rows($Con) == 1) {
    // Redirigir con mensaje de éxito
    header("Location: CLicencias.php?mensaje=Registro+eliminado+correctamente");
    exit();
} else {
    // Redirigir con mensaje de error
    $error = urlencode(mysqli_error($Con));
    header("Location: CLicencias.php?mensaje=Error:+$error");
    exit();
}

Desconectar($Con);
?>

