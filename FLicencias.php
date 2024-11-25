<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario</title>
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
                <button class="btn-logout" onclick="location.href='FAcceso.html'"><img src="Cerrarse.png" alt="cerrarsesion" class="cerrar-icon"></button>
            </div>
        </div>
    </nav>

    <!-- Mensaje de confirmación -->
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;'>
                " . htmlspecialchars($_GET['mensaje']) . "
              </div>";
    }
    ?>

    <h1>Licencias</h1>
    <h2>Registro</h2>
    <form method="post" action="ILicencias.php" enctype="multipart/form-data"> 
        <label>No. de licencia</label>
        <input type="number" name="NoLicencia" id="NoLicencia" required>    
        <br>
        <label>Foto</label>
        <input type="file" name="Foto" id="Foto" required>    
        <br>
        <label>Nombre</label> 
        <input type="text" name="Nombre" id="Nombre" required>
        <br>
        <label>Apellido</label> 
        <input type="text" name="Apellido" id="Apellido" required>
        <br>
        <label>Firma</label>
        <input type="file" name="Firma" id="Firma" required>    
        <br>
        <label>Tipo de licencia</label>
        <select name="TipoLicencia" id="TipoLicencia" required> 
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <br>
        <label>Fecha de expedición</label>
        <input type="date" name="FechaExp" id="FechaExp" required>
        <br>
        <label>Observacion</label>
        <input type="text" name="Observacion" id="Observacion">
        <br>
        <label>Antiguedad</label>
        <input type="number" name="Antiguedad" id="Antiguedad" required>
        <br>
        <label>Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio" required>
        <br>
        <label>Restriccion</label>
        <input type="text" name="Restriccion" id="Restriccion">
        <br>
        <label>Vigencia</label>
        <input type="date" name="Vigencia" id="Vigencia" required>
        <br>
        <label>Conductor</label>
        <input type="number" name="ConductorID" id="ConductorID" required>
        <br>
        <input type="submit" value="Registrar">
    </form>

    <div class="back-button-container">
        <button class="btn-back" onclick="location.href='Menu.php'">Regresar</button>
    </div>
</body>
</html>
