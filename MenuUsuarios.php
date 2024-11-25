<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: FAcceso.php');
    exit;
}

// Obtener el rol del usuario
$role = $_SESSION['role'];
?>
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
                <img src="Inicio.png" alt="Inicio" class="inicio-icon" onclick="location.href='MenuUsuarios.php'">
            </div>
  
    <ul class="menu">

    <li class="dropdown">
        <a href="#">Propietarios</a> 
        <ul class="submenu">
          <li><a href="CUPropietarios.php">Leer</a></li>
          
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Conductores</a> 
        <ul class="submenu">
          <li><a href="CUConductores.php">Leer</a></li>

        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Licencias</a> 
        <ul class="submenu">
          <li><a href="CULicencias.php">Leer</a></li>
   
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Vehiculos</a> 
        <ul class="submenu">
          <li><a href="CUVehiculos.php">Leer</a></li>
       
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Tarjeta de Circulación</a> 
        <ul class="submenu">
          <li><a href="CUTarjetas.php">Leer</a></li>
     
        </ul>
      </li>
      
   
    
      <li class="dropdown">
        <a href="#">Tenencias</a> 
        <ul class="submenu">
          <li><a href="CUTenencias.php">Leer</a></li>
      
        </ul>
      </li>
     
      <li class="dropdown">
        <a href="#">Verificaciones</a> 
        <ul class="submenu">
          <li><a href="CUVerificaciones.php">Leer</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Centros de Verificación</a> 
        <ul class="submenu">
          <li><a href="CUCentrosVerificacion.php">Leer</a></li>

        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Multas</a> 
        <ul class="submenu">
          <li><a href="CUMultas.php">Leer</a></li>
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
