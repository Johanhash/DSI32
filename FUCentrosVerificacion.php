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
$NoCentro=$_GET['NoCentro'];
$SQL ="SELECT * FROM CentrosVerificacion WHERE NoCentro='$NoCentro'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar </title>
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
                    <a href="#">Centros de verificacion</a>
                    <ul class="submenu">
                        <li><a href="FVerificaciones.php">Crear</a></li>
                        <li><a href="CVerificaciones.php">Leer</a></li>
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

<form  method="get" action="UCentrosVerificacion.php">
        <label>Numero de centro</label>
        <input type="int" name="NoCentro" id="NoCentro"  
        value="<?php print($Fila[0]);?>">  
    <br>
    <label>Numero de linea</label>
            <input type="text" name="NoLinea" id="NoLinea"
            value="<?php print($Fila[1]);?>">    
    <br>
    <label>Tecnico</label>
        <input type="text" name="Tecnico" id="Tecnico"  
        value="<?php print($Fila[2]);?>"> 
    <br>
    <label>Fecha_Expedicion</label>
        <input type="date" name="FechaExp" id="FechaExp"
                  value="<?php print($Fila[3]);?>">
                  <br>
    <label>Hora de entrada</label>
        <input type="time" name="HoraEntrada" id="HoraEntrada"
        value="<?php print($Fila[4]);?>">
    <br>
    <label>Hora de salida</label>
        <input type="time" name="HoraSalida" id="HoraSalida"
        value="<?php print($Fila[5]);?>">
    <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
