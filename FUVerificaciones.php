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
$Folio=$_GET['Folio'];
$SQL ="SELECT * FROM Verificaciones WHERE Folio='$Folio'";
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
                    <a href="#">Verificaciones</a>
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

<form  method="post" action="UVerificaciones.php"> 
        <label>Folio</label>
        <input type="text" name="Folio" id="Folio"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Vehiculo</label>
            <input type="text" name="Vehiculo" id="Vehiculo"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Motivo</label>
        <input type="text" name="Motivo" id="Motivo"
        value="<?php print($Fila[2]);?>">    
    <br>
    <label>Semestre</label>
        <input type="text" name="Semestre" id="Semestre"
        value="<?php print($Fila[3]);?>">
    <br>
    <label>Vigencia</label>
            <input type="text" name="Vigencia" id="Vigencia"
            value="<?php print($Fila[4]);?>">
    <br>
    <label>FolioTarjeta</label>
        <input type="text" name="FolioTarjeta" id="FolioTarjeta"
        value="<?php print($Fila[5]);?>">    
    <br>
    <label>CentroVer</label>
        <input type="number" name="NoCentro" id="NoCentro"
        value="<?php print($Fila[6]);?>">
    <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
