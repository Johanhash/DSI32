<?php 
$Folio=$_GET['Folio'];
$SQL ="SELECT * FROM Multas WHERE Folio='$Folio'";
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
                    <a href="#">Multas</a>
                    <ul class="submenu">
                        <li><a href="FMultas.php">Crear</a></li>
                        <li><a href="CMultas.php">Leer</a></li>
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

<form  method="post"   action="UMultas.php"> 
        <label>Folio Multas</label>
       <input type="text" name="Folio" id="Folio" 
       value="<?php print($Fila[0]);?>">
       <br>
       <label>Fecha</label>
           <input type="date" name="Fecha" id="Fecha"
           value="<?php print($Fila[1]);?>">    
           <br>
       <label>Lugar</label>
           <input type="text" name="Lugar" id="Lugar"
           value="<?php print($Fila[2]);?>">
       <br>
       <label>Propietario</label>
               <input type="text" name="Propietario" id="Propietario"
               value="<?php print($Fila[3]);?>">
               <br>
       <label>Nombre</label>
           <input type="text" name="Nombre" id="Nombre"
           value="<?php print($Fila[4]);?>">
           <br>
       <label>Domicilio</label>
           <input type="text" name="Domicilio" id="Domicilio"
           value="<?php print($Fila[5]);?>">
       <br>
       <label>Vehiculo</label>
           <input type="text" name="Vehiculo" id="Vehiculo"
           value="<?php print($Fila[6]);?>">
           <br> 
       <label>Motivo</label>
               <input type="text" name="Motivo" id="Motivo"
               value="<?php print($Fila[7]);?>">
               <br>
       <label>Objeto_Retenido</label>
           <input type="text" name="ObjRetenido" id="ObjRetenido"
           value="<?php print($Fila[8]);?>">
           <br>
       <label>Solucion</label>
           <input type="text" name="Solucion" id="Solucion"
           value="<?php print($Fila[9]);?>">
       <br>
       <label>Oficial       </label>
           <input type="text" name="Oficial" id="Oficial"
           value="<?php print($Fila[10]);?>">
           <br>
       <label>Lugar de pago</label>
           <input type="text" name="LugarPago" id="LugarPago"
           value="<?php print($Fila[11]);?>">
           <br>
       <label>Folio de verificacion</label>
       <input type="text" name="FolioVerifcacion" id="FolioVerifcacion"
       value="<?php print($Fila[12]);?>">
       <br>
       <label>Numero de Licencia</label>
       <input type="number" name="NoLicencia" id="NoLicencia"
       value="<?php print($Fila[13]);?>">
       <br>
       <label>Folio de FolioTarjeta</label>
       <input type="number" name="FolioTarjeta" id="FolioTarjeta"
       value="<?php print($Fila[14]);?>">
       <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>