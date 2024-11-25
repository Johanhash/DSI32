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
$VehiculoID=$_GET['VehiculoID'];
$SQL ="SELECT * FROM Vehiculos WHERE VehiculoID='$VehiculoID'";
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
                    <a href="#">Vehiculos</a>
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

<form  method="get" action="UVehiculos.php"> 
<label>ID Vehiculo</label>
    <input type="text" name="VehiculoID" id="VehiculoID"
    value="<?php print($Fila[0]);?>">
    <br>
        <label>NIV</label>
    <input type="text" name="NIV" id="NIV"
    value="<?php print($Fila[1]);?>">
    <br>
    <label>Marca</label>
        <input type="text" name="Marca" id="Marca"
        value="<?php print($Fila[2]);?>">    
        <br>
    <label>Linea</label>
        <input type="text" name="Linea" id="Linea"
        value="<?php print($Fila[3]);?>">
    <br>
    <label>Sublinea</label>
            <input type="text" name="Sublinea" id="Sublinea"
            value="<?php print($Fila[4]);?>">
            <br>
    <label>Color</label>
        <input type="text" name="Color" id="Color"
        value="<?php print($Fila[5]);?>">
        <br>
    <label>Cilindro</label>
        <input type="number" name="Cilindro" id="Cilindro"
        value="<?php print($Fila[6]);?>">
    <br>
    <label>Origen</label>
        <input type="text" name="Origen" id="Origen"
        value="<?php print($Fila[7]);?>">
        <br> <br>
    <label>Capacidad</label>
            <input type="number" name="Capacidad" id="Capacidad"
            value="<?php print($Fila[8]);?>">
            <br>
    <label>Puertas</label>
        <input type="number" name="Puertas" id="Puertas"
        value="<?php print($Fila[9]);?>">
        <br>
    <label>Asientos</label>
        <input type="number" name="Asientos" id="Asientos"
        value="<?php print($Fila[10]);?>">
    <br>
    <label>Combustible</label>
        <input type="number" name="Combustible" id="Combustible"
        value="<?php print($Fila[11]);?>">
        <br>
    <label>Transmision</label>
        <input type="text" name="Transmision" id="Transmision"
        value="<?php print($Fila[12]);?>">
    <label>Clase</label>
    <input type="number" name="Clase" id="Clase"
    value="<?php print($Fila[13]);?>">
    <br>
    <label>Tipo</label>
    <input type="number" name="Tipo" id="Tipo"
    value="<?php print($Fila[14]);?>">
    <br>
    <label>Uso</label>
    <input type="number" name="Uso" id="Uso"
    value="<?php print($Fila[15]);?>"
    >
    <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>