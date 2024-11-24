<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulario</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/style_crear1.css">
  <script src = "menu.js"></script>
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
          <li><a href="FUPropietarios.php">Actualizar</a></li>
          <li><a href="FDPropietarios.html">Eliminar</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Conductores</a> 
        <ul class="submenu">
          <li><a href="FConductores.php">Crear</a></li>
          <li><a href="CConductores.php">Leer</a></li>
          <li><a href="FUConductores.php">Actualizar</a></li>
          <li><a href="FDConductores.html">Eliminar</a></li>
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Licencias</a> 
        <ul class="submenu">
          <li><a href="FLicencias.php">Crear</a></li>
          <li><a href="CLicencias.php">Leer</a></li>
          <li><a href="FULicencias.php">Actualizar</a></li>
          <li><a href="FDLicencias.html">Eliminar</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Vehiculos</a> 
        <ul class="submenu">
          <li><a href="FVehiculos.php">Crear</a></li>
          <li><a href="CVehiculos.php">Leer</a></li>
          <li><a href="FUVehiculos.php">Actualizar</a></li>
          <li><a href="FDVehiculos.html">Eliminar</a></li>
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Tarjeta de Circulación</a> 
        <ul class="submenu">
          <li><a href="FTarjetas.php">Crear</a></li>
          <li><a href="CTarjetas.php">Leer</a></li>
          <li><a href="FUTarjetas.php">Actualizar</a></li>
          <li><a href="FDTarjetas.html">Eliminar</a></li>
        </ul>
      </li>
    
      <li class="dropdown">
        <a href="#">Tenencias</a> 
        <ul class="submenu">
          <li><a href="FTenencias.php">Crear</a></li>
          <li><a href="CTenencias.php">Leer</a></li>
          <li><a href="FUTenencias.php">Actualizar</a></li>
          <li><a href="FDTenencias.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Centros de Verificación</a> 
        <ul class="submenu">
          <li><a href="FCentrosVerificacion.php">Crear</a></li>
          <li><a href="CCentrosVerificacion.php">Leer</a></li>
          <li><a href="FUCentrosVerificacion.php">Actualizar</a></li>
          <li><a href="FDCentrosVerificacion.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Verificaciones</a> 
        <ul class="submenu">
          <li><a href="FVerificaciones.php">Crear</a></li>
          <li><a href="CVerificaciones.php">Leer</a></li>
          <li><a href="FUVerificaciones.php">Actualizar</a></li>
          <li><a href="FDVerificaciones.html">Eliminar</a></li>
        </ul>
      </li>
  

      <li class="dropdown">
        <a href="#">Multas</a> 
        <ul class="submenu">
          <li><a href="FMultas.php">Crear</a></li>
          <li><a href="CMultas.php">Leer</a></li>
          <li><a href="FUMultas.php">Actualizar</a></li>
          <li><a href="FDMultas.html">Eliminar</a></li>
        </ul>
    </li>
         
            <div class="session-controls">
        <button class="btn-logout" 
        onclick="location.href='FAcceso.html'"><img src="Cerrarse.png" 
        alt="cerrarsesion" class="cerrar-icon"></button>
      </div>
    </div>
  </nav>
    

<!--Mensaje confirmacion-->
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;'>
                " . htmlspecialchars($_GET['mensaje']) . "
              </div>";
    }
    ?>

    <h1>Conductores</h1>
    <h2>Registro</h2>
    <form method="get" action="IConductores.php"> 
        <label for="ConductorID">Conductor</label>
        <input type="number" name="ConductorID" id="ConductorID">    

        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre">

        <label for="Apellido">Apellido</label>
        <input type="text" name="Apellido" id="Apellido">

        <label for="FechaNac">Fecha de nacimiento</label>
        <input type="date" name="FechaNac" id="FechaNac">    

        <label for="Domicilio">Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio">

        <label for="Telefono">Teléfono</label>
        <input type="number" name="Telefono" id="Telefono">

        <label for="TipoSangre">Grupo Sanguíneo</label>
        <select name="TipoSangre" id="TipoSangre"> 
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <label>Donador</label>
        <input type="radio" name="DonadorOrg" id="DonadorOrgSi" value="Si">SI
        <input type="radio" name="DonadorOrg" id="DonadorOrgNo" value="No">NO

        <div><div><input type="submit" value="Enviar"> </div></div>
        
     <!-- Botón de regresar -->
    
    </form>
    <div class="back-button-container">
        <!-- Aquí colocarás la funcionalidad del botón de regresar -->
        <button class="btn-back" onclick="location.href='Menu.php'">Regresar</button>
    </div>
    
</body>
</html>
