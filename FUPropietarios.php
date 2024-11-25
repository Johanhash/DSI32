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
$PropietarioID = $_GET['PropietarioID'];
$SQL = "SELECT * FROM Propietarios WHERE PropietarioID = '$PropietarioID';";
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);
$Fila = mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Propietario</title>
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
                    <a href="#">Propietarios</a>
                    <ul class="submenu">
                        <li><a href="FPropietarios.php">Crear</a></li>
                        <li><a href="CPropietarios.php">Leer</a></li>
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
        <h1 class="text-center">Actualizar Propietario</h1>

        <!-- Mostrar mensaje de éxito si existe -->
        <?php

        if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'exito') {
            echo "<div class='alert alert-success text-center' role='alert'>
                    ¡Actualización exitosa!
                  </div>";
        }
        ?>

<form  method="GET" action="UPropietarios.php"> 
        <label>Propietario</label>
        <input type="text" name="PropietarioID" id="PropietarioID"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Nombre</label>
            <input type="text" name="Nombre" id="Nombre"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Localidad</label>
        <input type="text" name="Localidad" id="Localidad"
        value="<?php print($Fila[2]);?>">    
    <br>
    <label>Municipio</label>
        <input type="text" name="Municipio" id="Municipio"
        value="<?php print($Fila[3]);?>">
    <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
