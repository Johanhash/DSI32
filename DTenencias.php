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
$LineaCaptura = $_GET['LineaCaptura'];
    $SQL = "DELETE FROM Tenencias WHERE LineaCaptura='$LineaCaptura'";
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);

if (mysqli_affected_rows($Con) == 1) {
    // Redirigir con mensaje de éxito
    header("Location: CTenencias.php?mensaje=Registro+eliminado+correctamente");
    exit();
} else {
    // Redirigir con mensaje de error
    $error = urlencode(mysqli_error($Con));
    header("Location: CTenencias.php?mensaje=Error:+$error");
    exit();
}

Desconectar($Con);
?>
