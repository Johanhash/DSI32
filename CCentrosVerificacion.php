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
                    <a href="#">Centros de Verificacion</a>
                    <ul class="submenu">
                        <li><a href="FCentrosVerificacion.php">Crear</a></li>
          
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

    
 
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;'>
                " . htmlspecialchars($_GET['mensaje']) . "
              </div>";
    }
    ?>
    
    <!-- Contenido principal -->
    <main class="main-content">
        <h1 class="text-center">Consulta de Centros de Verificacion</h1>
        <form method="GET" action="CCentrosVerificacion.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="NoCentro">
                    <input type="radio" Id="Atributo" Name="Atributo" value="NoCentro" required> No. de Centro<br>
                    </label>
                </div>
                <div>
                    <label for="NoLinea">
                    <input type="radio" Id="Atributo" Name="Atributo" value="NoLinea"> No. de Línea <br>
                    </label>
                </div>
                <div>
                    <label for="tecnico">
                    <input type="radio" Id="Atributo" Name="Atributo" value="tecnico"> Técnico <br>
                    </label>
                </div>
                <div>
                    <label for="fechaExp">
                    <input type="radio" Id="Atributo" Name="Atributo" value="fechaExp"> Fecha de expedición <br>
                    </label>
                </div>
                <div>
                    <label for="HoraE">
                    <input type="radio" Id="Atributo" Name="Atributo" value="HoraE"> Hora de entrega <br>
                    </label>
                </div>
                <div>
                    <label for="HoraS">
                    <input type="radio" Id="Atributo" Name="Atributo" value="HoraS"> Hora de salida <br>
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
            $SQL = "SELECT * FROM CentrosVerificacion WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
           <tr>
                <th>No. de Centro</th>
                <th>No. de Línea</th>
                <th>Técnico</th>
                <th>Fecha de expedición</th>
                <th>Hora de entrega</th>
                <th>Hora de salida</th>
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
                echo "<td><a href='DCentrosVerificacion.php?NoCentro={$Fila['NoCentro']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FUCentrosVerificacion.php?NoCentro={$Fila['NoCentro']}'><button class='btn-update'>Actualizar</button></a></td>";
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