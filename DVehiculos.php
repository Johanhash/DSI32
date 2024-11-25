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
    $NIV = $_GET['NIV'];
    $SQL = "DELETE FROM Vehiculos WHERE NIV='$NIV'";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro de Vehículo Eliminado");
    } else {
        print(mysqli_error($Con));
    }

    Desconectar($Con);
?>
