<?php 
$NoLicencia=$_GET['NoLicencia'];
$SQL ="SELECT * FROM Licencias WHERE NoLicencia='$NoLicencia'";
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
                    <a href="#">Licencias</a>
                    <ul class="submenu">
                        <li><a href="FLicencias.php">Crear</a></li>
                        <li><a href="CLicencias.php">Leer</a></li>
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

<form  method="get"  action="ULicencias.php"> 
    <label>No. de Licencia</label>
        <input type="number" name="NoLicencia" id="NoLicencia"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Foto</label>
        <input type="file" name="Foto" id="Foto"
        value="<?php print($Fila[1]);?>">    
        <br>
        <label>Nombre</label>
            <input type="text" name="Nombre" id="Nombre"
            value="<?php print($Fila[2]);?>">
            <br>
            <label>Nombre</label>
            <input type="text" name="Apellido" id="Apellido"
            value="<?php print($Fila[3]);?>">
            <br>
            <input type="file" name="Firma" id="Firma"
        value="<?php print($Fila[4]);?>">    
        <br>
    <label>Tipo_Licencia</label>
        <select name="TipoLicencia" id="TipoLicencia"
        value="<?php print($Fila[5]);?>"> 
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <br>
    <label>Fecha_Expedicion</label>
        <input type="date" name="FechaExp" id="FechaExp"
        value="<?php print($Fila[6]);?>">
        <br>
    <label>Observacion</label>
        <input type="text" name="Observacion" id="Observacion"
        value="<?php print($Fila[7]);?>">
    <br>
    <label>Antiguedad</label>
        <input type="number" name="Antiguedad" id="Antiguedad"
        value="<?php print($Fila[8]);?>">
    <br>
    <label>Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio"
        value="<?php print($Fila[9]);?>">
    <br>
    <label>Restriccion</label>
        <input type="text" name="Restriccion" id="Restriccion"
        value="<?php print($Fila[10]);?>">
    <br>
    <label>Vigencia</label>
        <input type="date" name="Vigencia" id="Vigencia"
        value="<?php print($Fila[11]);?>">
    <br>
    <label>Conductor</label>
        <input type="number" name="Conductorid" id="Conductorid"
        value="<?php print($Fila[12]);?>">
    <br>
       
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
