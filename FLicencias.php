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
          
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Conductores</a> 
        <ul class="submenu">
          <li><a href="FConductores.php">Crear</a></li>
          <li><a href="CConductores.php">Leer</a></li>
          
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Licencias</a> 
        <ul class="submenu">
          <li><a href="FLicencias.php">Crear</a></li>
          <li><a href="CLicencias.php">Leer</a></li>
         
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Vehiculos</a> 
        <ul class="submenu">
          <li><a href="FVehiculos.php">Crear</a></li>
          <li><a href="CVehiculos.php">Leer</a></li>
          
        </ul>
      </li>
  
      <li class="dropdown">
        <a href="#">Tarjeta de Circulación</a> 
        <ul class="submenu">
          <li><a href="FTarjetas.php">Crear</a></li>
          <li><a href="CTarjetas.php">Leer</a></li>
          
        </ul>
      </li>
      
   
    
      <li class="dropdown">
        <a href="#">Tenencias</a> 
        <ul class="submenu">
          <li><a href="FTenencias.php">Crear</a></li>
          <li><a href="CTenencias.php">Leer</a></li>
          
        </ul>
      </li>
     
      <li class="dropdown">
        <a href="#">Verificaciones</a> 
        <ul class="submenu">
          <li><a href="FVerificaciones.php">Crear</a></li>
          <li><a href="CVerificaciones.php">Leer</a></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Centros de Verificación</a> 
        <ul class="submenu">
          <li><a href="FCentrosVerificacion.php">Crear</a></li>
          <li><a href="CCentrosVerificacion.php">Leer</a></li>
          
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Multas</a> 
        <ul class="submenu">
          <li><a href="FMultas.php">Crear</a></li>
          <li><a href="CMultas.php">Leer</a></li>
          
        </ul>
      </li>
    </ul>
    <div class="session-controls">
                <button class="btn-logout" onclick="location.href='CerrarSesion.php'">
                    <img src="Cerrarse.png" alt="Cerrar Sesión" class="cerrar-icon">
                </button>
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

    <h1>Licencias</h1>
    <h2>Registro</h2>
    <form  method="post"  action="ILicencias.php"> 
        <label>No. de licencia</label>
            <input type="number" name="NoLicencia" id="NoLicencia">    
        <br>
    
        
        <label>Foto</label>
            <input type="file" name="Foto" id="Foto">    
            <br>
        <label>Nombre</label> 
                <input type="text" name="Nombre" id="Nombre">
                <br>
        <label>Apellido</label> 
                <input type="text" name="Apellido" id="Apellido">
        <br>
        <label>Firma </label>
            <input type="file" name="Firma" id="Firma">    
            <br>
        <label>Tipo de licencia</label>
            <select name="TipoLicencia" id="TipoLicencia"> 
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
            <br>
        <label>Fecha de expedición</label>
            <input type="date" name="FechaExp" id="FechaExp">
            <br>
        <label>Observacion</label>
            <input type="text" name="Observacion" id="Observacion">
        <br>
        <label>Antiguedad</label>
            <input type="number" name="Antiguedad" id="Antiguedad">
        <br>
        <label>Domicilio</label>
            <input type="text" name="Domicilio" id="Domicilio">
        <br>
        <label>Restriccion</label>
            <input type="text" name="Restriccion" id="Restriccion">
        <br>
        <label for="Vigencia">Selecciona Vigencia:</label>
        <select name="Vigencia" required>
          <option value="3">3 años</option>
          <option value="5">5 años</option>
        </select>
        <br>
        <label>Conductor</label>
        <input type="number" name="Conductor" id="Conductor">
    <br>
            <input type="submit">
        </form>
    
   
</body>
</html>