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
$ConductorID=$_GET['ConductorID'];
$SQL ="SELECT * FROM Conductores WHERE ConductorID='$ConductorID';";
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
                    <a href="#">Conductores</a>
                    <ul class="submenu">
                        <li><a href="FConductores.php">Crear</a></li>
                        <li><a href="CConductores.php">Leer</a></li>
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

<form  method="get"  action="UConductores.php"> 
        <label>Conductor ID</label>
        <input type="number" name="Conductorid" id="Conductorid"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Nombre</label>
            <input type="text" name="Nombre" id="Nombre"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Apellido</label>
            <input type="text" name="Apellido" id="Apellido"
            value="<?php print($Fila[2]);?>">
    <br>
    <label>Fecha_nacimiento</label>
        <input type="date" name="FechaNac" id="FechaNac"
        value="<?php print($Fila[3]);?>">    
    <br>
    <label>Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio"
        value="<?php print($Fila[4]);?>">
    <br>
    <label>Telefono</label>
        <input type="number" name="Telefono" id="Telefono"
        value="<?php print($Fila[5]);?>">
    <br>
    <label>Grupo Sanguineo</label>
    <select name="TipoSangre" id="TipoSangre"
    value="<?php print($Fila[6]);?>"> 
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        </select>
    <br>
    
    <label>Donador</label>
    <input type="radio" name="DonadorOrg" id="DonadorOrg" value="Si" value="<?php print($Fila[7]);?>">SI
    <input type="radio" name="DonadorOrg" id="DonadorOrg" value="No" value="<?php print($Fila[7]);?>">NO
    <br> 
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>

