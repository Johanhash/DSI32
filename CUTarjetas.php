<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Tarjetas</title>
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
        <h1 class="text-center">Consulta de Tarjetas</h1>
        <form method="GET" action="CUTarjetas.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio" required>
            </div>

            <div class="form-group">
                <label class="form-label">Atributo</label>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Folio" required> Folio
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="rfcPropietario"> rfcPropietario
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Vigencia"> Vigencia
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="FechaExp"> FechaExp
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="OficinaExp"> OficinaExp
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Movimiento"> Movimiento
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="NIV"> NIV
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="PropietarioID"> PropietarioID
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="VehiculoID"> VehiculoID
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
            $SQL = "SELECT * FROM Tarjetas WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            if (mysqli_num_rows($ResultSet) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>
                        <tr>
                               <<th>Folio</th>
                               <th>RFC Propietario</th>
                                <th>Vigencia</th>
                                <th>Fecha Expedicion</th>
                                <th>Oficina Expedicion</th>
                                <th>Movimiento</th>
                                <th>NIV</th>
                                <th>Propietario ID</th>
                                <th>Vehiculo ID</th>
                        </tr>
                      </thead>
                      <tbody>";

                while ($Row = mysqli_fetch_assoc($ResultSet)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['Folio']) . "</td>
                            <td>" . htmlspecialchars($Row['rfcPropietario']) . "</td>
                            <td>" . htmlspecialchars($Row['Vigencia']) . "</td>
                            <td>" . htmlspecialchars($Row['FechaExp']) . "</td>
                            <td>" . htmlspecialchars($Row['OficinaExp']) . "</td>
                            <td>" . htmlspecialchars($Row['Movimiento']) . "</td>
                            <td>" . htmlspecialchars($Row['NIV']) . "</td>
                            <td>" . htmlspecialchars($Row['PropietarioID']) . "</td>
                            <td>" . htmlspecialchars($Row['VehiculoID']) . "</td>
                            
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