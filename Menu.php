
<!DOCTYPE html> 
<html>
<head>
  <title>Navbar con Menú Deslizable</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/style_crear1.css">
  <script src = "menu.js"></script>
</head>
<body>

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
          <li><a href="FDPropietarios.php">Eliminar</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Conductores</a> 
        <ul class="submenu">
          <li><a href="FConductores.php">Crear</a></li>
          <li><a href="CConductores.php">Leer</a></li>
          <li><a href="FUConductores.php">Actualizar</a></li>
          <li><a href="FDConductores.php">Eliminar</a></li>
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Licencias</a> 
        <ul class="submenu">
          <li><a href="FLicencias.php">Crear</a></li>
          <li><a href="CLicencias.php">Leer</a></li>
          <li><a href="FULicencias.php">Actualizar</a></li>
          <li><a href="FDLicencias.php">Eliminar</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Vehiculos</a> 
        <ul class="submenu">
          <li><a href="FVehiculos.php">Crear</a></li>
          <li><a href="CVehiculos.php">Leer</a></li>
          <li><a href="FUVehiculos.php">Actualizar</a></li>
          <li><a href="FDVehiculos.php">Eliminar</a></li>
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Tarjeta de Circulación</a> 
        <ul class="submenu">
          <li><a href="FTarjetas.php">Crear</a></li>
          <li><a href="CTarjetas.php">Leer</a></li>
          <li><a href="FUTarjetas.php">Actualizar</a></li>
          <li><a href="FDTarjetas.php">Eliminar</a></li>
        </ul>
      </li>
      
   
    
      <li class="dropdown">
        <a href="#">Tenencias</a> 
        <ul class="submenu">
          <li><a href="FTenencias.php">Crear</a></li>
          <li><a href="CTenencias.php">Leer</a></li>
          <li><a href="FUTenencias.php">Actualizar</a></li>
          <li><a href="FDTenencias.php">Eliminar</a></li>
        </ul>
      </li>
     
      <li class="dropdown">
        <a href="#">Verificaciones</a> 
        <ul class="submenu">
          <li><a href="FVerificaciones.php">Crear</a></li>
          <li><a href="CVerificaciones.php">Leer</a></li>
          <li><a href="FUVerificaciones.php">Actualizar</a></li>
          <li><a href="FDVerificaciones.php">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Centros de Verificación</a> 
        <ul class="submenu">
          <li><a href="FCentrosVerificacion.php">Crear</a></li>
          <li><a href="CCentrosVerificacion.php">Leer</a></li>
          <li><a href="FUCentrosVerificacion.php">Actualizar</a></li>
          <li><a href="FDCentrosVerificacion.php">Eliminar</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Multas</a> 
        <ul class="submenu">
          <li><a href="FMultas.php">Crear</a></li>
          <li><a href="CMultas.php">Leer</a></li>
          <li><a href="FUMultas.php">Actualizar</a></li>
          <li><a href="FDMultas.php">Eliminar</a></li>
        </ul>
      </li>
    </ul>
     <div class="session-controls">
        <button class="btn-logout" 
        onclick="location.href='CerrarSesion.php'"><img src="Cerrarse.png" 
        alt="cerrarsesion" class="cerrar-icon"></button>
      </div>
    </div>
  </nav>
  <main class="main-content">
    <img src="LogoV.png" alt="Vehículo" class="background-image">
  </main>
</body>
</html>

