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
                    <a href="#">Tenencias</a>
                    <ul class="submenu">
                        <li><a href="FTenencias.php">Crear</a></li>
          
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
        <h1 class="text-center">Consulta de Tenencias</h1>
        <form method="GET" action="CTenencias.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="LineaCaptura">
                    <input type="radio" Id="Atributo" Name="Atributo" value="LineaCaptura" required> Línea Captura<br>
                    </label>
                </div>
                <div>
                    <label for="Vehiculo">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Vehiculo"> Vehiculo <br>
                    </label>
                </div>
                <div>
                    <label for="Transaccion">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Transaccion"> Transacción <br>
                    </label>
                </div>
                <div>
                    <label for="FechaLimite">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FechaLimite"> Fecha Límite <br>
                    </label>
                </div>
                <div>
                    <label for="Importe">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Importe"> Importe <br>
                    </label>
                </div>
                <div>
                    <label for="tipoPago">
                    <input type="radio" Id="Atributo" Name="Atributo" value="tipoPago"> Tipo de pago <br>
                    </label>
                </div>
              
                <div>
                    <label for="fechaActual">
                    <input type="radio" Id="Atributo" Name="Atributo" value="fechaActual"> Fecha actual <br>
                    </label>
                </div>
                <div>
                    <label for="PropietarioID">
                    <input type="radio" Id="Atributo" Name="Atributo" value="hora"> Hora <br>
                    </label>
                </div>
                <div>
                    <label for="FolioTarjeta">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FolioTarjeta"> Folio de tarjeta <br>
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
            $SQL = "SELECT * FROM Tenencias WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
                <tr>
                <th>Línea de captura</th>
                <th>Vehiculo</th>
                <th>Transacción</th>
                <th>Fecha limite</th>
                 <th>Importe</th>
                <th>Tipo de pago</th>
                <th>Fecha actual</th>
                <th>Hora</th>
                <th>Folio de tarjeta</th>
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
                echo "<td><a href='DTenencias.php?LineaCaptura={$Fila['LineaCaptura']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FUTenencias.php?LineaCaptura={$Fila['LineaCaptura']}'><button class='btn-update'>Actualizar</button></a></td>";
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
