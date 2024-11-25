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

$LineaCaptura=$_GET['LineaCaptura'];
$SQL ="SELECT * FROM Tenencias WHERE LineaCaptura='$LineaCaptura'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Tenencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style_crear1.css">
    <script src="menu.js"></script>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <img src="Inicio.png" alt="Inicio" class="inicio-icon" onclick="location.href='Menu.php'">
            </div>
            <ul class="menu">
                <li class="dropdown">
                    <a href="#">Tenencias</a>
                    <ul class="submenu">
                        <li><a href="FTarjetas.php">Crear</a></li>
                        <li><a href="CTarjetas.php">Leer</a></li>
                    </ul>
                </li>
            </ul>
            <div class="session-controls">
                <button class="btn-logout" onclick="location.href='FAcceso.html'">
                    <img src="Cerrarse.png" alt="Cerrar Sesión" class="cerrar-icon">
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <h1 class="text-center">Actualizar</h1>

        <!-- Mostrar mensaje de éxito si existe -->
        <?php

        if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exito') {
            echo "<div class='alert alert-success text-center' role='alert'>
                    ¡Actualización exitosa!
                  </div>";
        }
        ?>

<form  method="get" action="UTenencias.php"> 
        <label>Linea de Captura</label>
        <input type="text" name="LineaCaptura" id="LineaCaptura"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Vehiculo</label>
            <input type="text" name="vehiculo" id="vehiculo"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Transaccion</label>
        <input type="text" name="Transaccion" id="Transaccion"
        value="<?php print($Fila[2]);?>">    
    <br>
    <label>Fecha Limite</label>
        <input type="date" name="FechaLimite" id="FechaLimite"
        value="<?php print($Fila[3]);?>">
    <br>
    <label>Importe</label>
    <input type="number" name="Importe" id="Importe"
    value="<?php print($Fila[4]);?>">    
    <br>
    <label>Tipo de pago</label>
            <input type="text" name="TipoPago" id="TipoPago"
            value="<?php print($Fila[5]);?>">
    <br>
    <label>Fecha actual</label>
        <input type="date" name="FechaActual" id="FechaActual"
        value="<?php print($Fila[6]);?>">
    <br>
<label>Hora</label>
    <input type="time" name="Hora" id="Hora"
    value="<?php print($Fila[7]);?>">
<br>
<label>FolioTarjeta</label>
<input type="text" name="FolioTarjeta" id="FolioTarjeta"
value="<?php print($Fila[8]);?>">    
<br>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>