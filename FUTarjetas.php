<?php
$Folio=$_GET['Folio'];
$SQL ="SELECT * FROM Tarjetas WHERE Folio='$Folio'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Tarjetas de circulación</title>
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
                    <a href="#">Tarjetas de Circulacion</a>
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

<form  method="post" action="UTarjetas.php"> 

<label>Folio Tarjeta Circulacion</label>
    <input type="text" name="Folio" id="Folio"
    value="<?php print($Fila[0]);?>">    
<br>    
<label>RFC Propietario</label>
    <input type="text" name="rfcPropietario" id="rfcPropietario"
    value="<?php print($Fila[1]);?>">    
<br>
<label>Vigencia</label>
    <input type="text" name="Vigencia" id="Vigencia"
    value="<?php print($Fila[2]);?>">    
    <br>
<label>Fecha_Expedicion</label>
    <input type="date" name="FechaExp" id="FechaExp"
    value="<?php print($Fila[3]);?>">
<br>
<label>Oficina Expedicion</label>
        <input type="number" name="OficinaExp" id="OficinaExp"
        value="<?php print($Fila[4]);?>">
        <br>
<label>Movimiento</label>
    <input type="text" name="Movimiento" id="Movimiento"
    value="<?php print($Fila[5]);?>">
    <br>
<label>NIV</label>
    <input type="text" name="NIV" id="NIV"
    value="<?php print($Fila[6]);?>">
    <br>
    <label>ID Propietario</label>
    <input type="text" name="PropietarioID" id="PropietarioID"
    value="<?php print($Fila[7]);?>">
<br>
<label>ID Vehiculo</label>
    <input type="text" name="VehiculoID" id="VehiculoID"
    value="<?php print($Fila[8]);?>">
<br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
