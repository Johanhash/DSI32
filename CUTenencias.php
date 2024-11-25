<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Tenencias</title>
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
        <h1 class="text-center">Consulta de Tenencias</h1>
        <form method="GET" action="CUTenencias.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio" required>
            </div>

            <div class="form-group">
                <label class="form-label">Atributo</label>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="LineaCaptura" required> LineaCaptura
                    </label>
                </div>
                <div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="vehiculo"> vehiculo
                    </label>
                </div>
            </div>
                    <label>
                        <input type="radio" name="Atributo" value="Transaccion"> Transaccion
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="FechaLimite"> FechaLimite
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Importe"> Importe
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="TipoPago"> TipoPago
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="FechaActual"> FechaActual
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Hora"> Hora
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="FolioTarjeta"> FolioTarjeta
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
            $SQL = "SELECT * FROM Tenencias WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            if (mysqli_num_rows($ResultSet) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>
                        <tr>
                                 <th>Línea Captura</th>
                                <th>Vehiculo</th>
                                <th>Transaccion</th>
                                <th>Fechalimite</th>
                                <th>Importe</th>
                                <th>TipoPago</th>
                                <th>Fecha Actual</th>
                                <th>Hora</th>
                                <th>FolioTarjeta</th>
                        </tr>
                      </thead>
                      <tbody>";

                while ($Row = mysqli_fetch_assoc($ResultSet)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['LineaCaptura']) . "</td>
                            <td>" . htmlspecialchars($Row['vehiculo']) . "</td>
                            <td>" . htmlspecialchars($Row['Transaccion']) . "</td>
                            <td>" . htmlspecialchars($Row['FechaLimite']) . "</td>
                            <td>" . htmlspecialchars($Row['Importe']) . "</td>
                            <td>" . htmlspecialchars($Row['TipoPago']) . "</td>
                            <td>" . htmlspecialchars($Row['FechaActual']) . "</td>
                            <td>" . htmlspecialchars($Row['Hora']) . "</td>
                            <td>" . htmlspecialchars($Row['FolioTarjeta']) . "</td>
                            
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