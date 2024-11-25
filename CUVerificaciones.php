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
    <title>Consulta de Verificaciones</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style_crear1.css">
    <script src="menu.js"></script>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <img src="Inicio.png" alt="Inicio" class="inicio-icon" onclick="location.href='MenuUsuarios.php'">
            </div>
        
            <div class="session-controls">
                <button class="btn-logout" onclick="location.href='CerrarSesion.php'">
                    <img src="Cerrarse.png" alt="Cerrar Sesión" class="cerrar-icon">
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="main-content">
        <h1 class="text-center">Consulta de Verificaciones</h1>
        <form method="GET" action="CUVerificaciones.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio" required>
            </div>

            <div class="form-group">
                <label class="form-label">Atributo</label>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Folio" > Folio
                    </label>
                </div>
                <div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Vehiculo"> Vehiculo
                    </label>
                </div>
            </div>
                    <label>
                        <input type="radio" name="Atributo" value="Motivo"> Motivo
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Semestre"> Semestre
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Vigencia"> Vigencia
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="FolioTarjeta"> Folio de tarjeta
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="NoCentro"> NoCentro
                    </label>
                </div>
            
            <input type="submit" value="Buscar" class="btn btn-primary">
        </form>

        <?php
        if (isset($_GET['Criterio']) && isset($_GET['Atributo'])) {
            $Criterio = htmlspecialchars($_GET['Criterio']); // Escapar para evitar inyecciones
            $Atributo = htmlspecialchars($_GET['Atributo']); // Validar atributo

            include("Controlador.php");

            $Con = Conectar();
            $SQL = "SELECT * FROM Verificaciones  WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            if (mysqli_num_rows($ResultSet) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>
                        <tr>
                                    <th>Folio</th>
                                    <th>Vehículo</th>
                                    <th>Motivo</th>
                                    <th>Semestre</th>
                                    <th>Vigencia</th>
                                    <th>Folio de tarjeta ID</th>
                                    <th>No de centro</th>
                        </tr>
                      </thead>
                      <tbody>";

                while ($Row = mysqli_fetch_assoc($ResultSet)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['Folio']) . "</td>
                            <td>" . htmlspecialchars($Row['Vehiculo']) . "</td>
                            <td>" . htmlspecialchars($Row['Motivo']) . "</td>
                            <td>" . htmlspecialchars($Row['Semestre']) . "</td>
                            <td>" . htmlspecialchars($Row['Vigencia']) . "</td>
                            <td>" . htmlspecialchars($Row['FolioTarjeta']) . "</td>
                            <td>" . htmlspecialchars($Row['NoCentro']) . "</td>                            
                          </tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p class='text-center'>No se encontraron resultados.</p>";
            }

            Desconectar($Con);
        }
        ?>
    </main>
</body>
</html>