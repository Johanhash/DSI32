<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'U') {
    header("Location: FAcceso.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Navbar con Menú Deslizable</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/style_menu1.css">
  <script src = "menu.js"></script>
</head>
<body>

<nav class="navbar"> 
  <div class="navbar-container">
    <ul class="menu">
      <li class="dropdown">
        <a href="#">Conductores</a> 
        <ul class="submenu">
          <li><a href="CConductores.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Licencias</a> 
        <ul class="submenu">
          <li><a href="CLicencias.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Multas</a> 
        <ul class="submenu">
          <li><a href="CMultas.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Propietarios</a> 
        <ul class="submenu">
          <li><a href="CPropietarios.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Tarjeta de Circulación</a> 
        <ul class="submenu">
          <li><a href="CTarjetas.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Tenencias</a> 
        <ul class="submenu">
          <li><a href="CTenencias.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Vehiculos</a> 
        <ul class="submenu">
          <li><a href="CVehiculos.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Verificaciones</a> 
        <ul class="submenu">
          <li><a href="CVerificaciones.php">Leer</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Centros de Verificación</a> 
        <ul class="submenu">
          <li><a href="CCentrosVerificacion.php">Leer</a></li>
        </ul>
      </li>
    </ul>
    <div class="session-controls">
        <button class="btn-logout" 
        onclick="location.href='FAcceso.html'"><img src="Cerrarse.png" 
        alt="cerrarsesion" class="cerrar-icon"></button>
      </div>
  </div>
</nav>
  <main class="main-content">
    <img src="LogoV.png" alt="Vehículo" class="background-image">
  </main>
</body>
</html>
