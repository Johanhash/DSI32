<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: FAcceso.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
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
                    <a href="#">Licencias</a>
                    <ul class="submenu">
                        <li><a href="FLicencias.php">Crear</a></li>
          
                    </ul>
                </li>
            </ul>
            <div class="session-controls">
                <button class="btn-logout" onclick="location.href='FAcceso.php'">
                    <img src="Cerrarse.png" alt="Cerrar Sesión" class="cerrar-icon">
                </button>
            </div>
        </div>
    </nav>

    
    <!-- Contenido principal -->
    <main class="main-content">
        <h1 class="text-center">Consulta de Licencias</h1>
        <form method="GET" action="CLicencias.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="Folio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="NoLicencia" required> No. de Licencia<br>
                    </label>
                </div>
                <div>
                    <label for="Foto">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Foto"> Foto <br>
                    </label>
                </div>
                <div>
                    <label for="Nombre">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Nombre"> Nombre <br>
                    </label>
                </div>
                <div>
                    <label for="Apellido">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Apellido"> Apellido <br>
                    </label>
                </div>
                <div>
                    <label for="Firma">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Firma"> Firma <br>
                    </label>
                </div>
                <div>
                    <label for="TipoLicencia">
                    <input type="radio" Id="Atributo" Name="Atributo" value="TipoLicencia"> Tipo de licencia <br>
                    </label>
                </div>
                <div>
                    <label for="FechaExp">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FechaExp"> Fecha de expedición <br>
                    </label>
                </div>
                <div>
                    <label for="Observacion">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Observacion"> Observación <br>
                    </label>
                </div>
                <div>
                    <label for="Antiguedad">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Antiguedad"> Antigüedad <br>
                    </label>
                </div>
                <div>
                    <label for="Domicilio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Domicilio"> Domicilio <br>
                    </label>
                </div>
                <div>
                    <label for="Restriccion">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Restriccion"> Restriccion <br>
                    </label>
                </div>
                <div>
                    <label for="Vigencia">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Vigencia"> Vigencia <br>
                    </label>
                </div>  <div>
                    <label for="Conductor">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Conductor"> Conductor <br>
                    </label>
                </div>
       
            </div>
            <input type="submit" value="Buscar" class="btn btn-primary">
        </form>

        <?php
        if (isset($_GET['Criterio'])) {
            $Criterio = $_GET['Criterio'];
            $Atributo = $_GET['Atributo'];

            include("Controlador.php");

            $Con = Conectar();
            $SQL = "SELECT * FROM Licencias WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
             <tr>
                <th>No. de Licencia</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Firma</th>
                <th>Tipo de licencia</th>
                <th>Fecha de expedición</th>
                <th>Observación</th>
                <th>Antigüedad</th>
                <th>Domicilio</th>
                <th>Restricción</th>
                <th>Vigencia</th>
                <th>ID Conductor</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
               </tr>
               </thead>
                  <tbody>";

            while ($Fila = mysqli_fetch_assoc($ResultSet)) {
                echo "<tr>";
                foreach ($Fila as $Valor) {
                    echo "<td>$Valor</td>";
                }
                echo "<td><a href='DLicencias.php?NoLicencia={$Fila['NoLicencia']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FULicencias.php?NoLicencia={$Fila['NoLicencia']}'><button class='btn-update'>Actualizar</button></a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";

            Desconectar($Con);
        }
        ?>
    </main>
</body>
</html>
