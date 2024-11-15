<?php
session_start();
  // Verificar si el usuario es administrador
  if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'admin') { 
?>
<!DOCTYPE html> 
<html>
<head>
  <title>Navbar con Menú Deslizable</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/style_menu.css">
  <script src = "menu.js"></script>
</head>
<body>

<nav class="navbar"> 
  <div class="navbar-container">
    <ul class="menu">
      <li class="dropdown">
        <a href="#">Conductores</a> 
        <ul class="submenu">
          <li><a href="FConductores.html">Crear</a></li>
          <li><a href="CConductores.php">Leer</a></li>
          <li><a href="FUConductores.php">Actualizar</a></li>
          <li><a href="FDConductores.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Licencias</a> 
        <ul class="submenu">
          <li><a href="FLicencias.html">Crear</a></li>
          <li><a href="CLicencias.php">Leer</a></li>
          <li><a href="FULicencias.php">Actualizar</a></li>
          <li><a href="FDLicencias.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Multas</a> 
        <ul class="submenu">
          <li><a href="FMultas.html">Crear</a></li>
          <li><a href="CMultas.php">Leer</a></li>
          <li><a href="FUMultas.php">Actualizar</a></li>
          <li><a href="FDMultas.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Propietarios</a> 
        <ul class="submenu">
          <li><a href="FPropietarios.html">Crear</a></li>
          <li><a href="CPropietarios.php">Leer</a></li>
          <li><a href="FUPropietarios.php">Actualizar</a></li>
          <li><a href="FDPropietarios.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Tarjeta de Circulación</a> 
        <ul class="submenu">
          <li><a href="FTarjetas.html">Crear</a></li>
          <li><a href="CTarjetas.php">Leer</a></li>
          <li><a href="FUTarjetas.php">Actualizar</a></li>
          <li><a href="FDTarjetas.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Tenencias</a> 
        <ul class="submenu">
          <li><a href="FTenencias.html">Crear</a></li>
          <li><a href="CTenencias.php">Leer</a></li>
          <li><a href="FUTenencias.php">Actualizar</a></li>
          <li><a href="FDTenencias.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Vehiculos</a> 
        <ul class="submenu">
          <li><a href="FVehiculos.html">Crear</a></li>
          <li><a href="CVehiculos.php">Leer</a></li>
          <li><a href="FUVehiculos.php">Actualizar</a></li>
          <li><a href="FDVehiculos.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Verificaciones</a> 
        <ul class="submenu">
          <li><a href="FVerificaciones.html">Crear</a></li>
          <li><a href="CVerificaciones.php">Leer</a></li>
          <li><a href="FUVerificaciones.php">Actualizar</a></li>
          <li><a href="FDVerificaciones.html">Eliminar</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Centros de Verificación</a> 
        <ul class="submenu">
          <li><a href="FCentrosVerficacion.html">Crear</a></li>
          <li><a href="CCentrosVerificacion.php">Leer</a></li>
          <li><a href="FUCentrosVerificacion.php">Actualizar</a></li>
          <li><a href="FDCentrosVerificacion.html">Eliminar</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>

<?php
  } else {
    // Redirigir al usuario si no es administrador
    header("Location: FAcceso.html"); // Aquí se cambió a FAcceso.html
    exit();
  }
?>