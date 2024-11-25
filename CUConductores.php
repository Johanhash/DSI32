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
    <title>Consulta de Conductores</title>
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
        <h1 class="text-center">Consulta de Conductores</h1>
        <form method="GET" action="CUConductores.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio" required>
            </div>

            <div class="form-group">
                <label class="form-label">Atributo</label>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="ConductorID" required> ConductorID
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Nombre"> Nombre
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Apellido"> Apellido
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="FechaNac"> FechaNac
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Domicilio"> Domicilio
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Telefono"> Telefono
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="TipoSangre"> TipoSangre
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="DonadorOrg"> DonadorOrg
                    </label>
                </div>
            </div>
            <input type="submit" value="Buscar" class="btn btn-primary">
        </form>

        <?php
        if (isset($_GET['Criterio']) && isset($_GET['Atributo'])) {
            $Criterio = htmlspecialchars($_GET['Criterio']); // Escapar para evitar inyecciones
            $Atributo = htmlspecialchars($_GET['Atributo']); // Validar atributo

            include("Controlador.php");

            $Con = Conectar();
            $SQL = "SELECT * FROM Conductores WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            if (mysqli_num_rows($ResultSet) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>
                        <tr>
                             <th>ConductorID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>FechaNacimiento</th>
                                <th>Domicilio</th>   
                                <th>Telefono</th>
                                <th>TipoSangre</th>
                                <th>DonadorOrg</th>
                        </tr>
                      </thead>
                      <tbody>";

                while ($Row = mysqli_fetch_assoc($ResultSet)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['ConductorID']) . "</td>
                            <td>" . htmlspecialchars($Row['Nombre']) . "</td>
                            <td>" . htmlspecialchars($Row['Apellido']) . "</td>
                            <td>" . htmlspecialchars($Row['FechaNac']) . "</td>
                            <td>" . htmlspecialchars($Row['Domicilio']) . "</td>
                            <td>" . htmlspecialchars($Row['Telefono']) . "</td>
                            <td>" . htmlspecialchars($Row['TipoSangre']) . "</td>
                            <td>" . htmlspecialchars($Row['DonadorOrg']) . "</td>
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