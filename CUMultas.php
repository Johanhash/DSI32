<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Multas</title>
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
        <h1 class="text-center">Consulta de Multas</h1>
        <form method="GET" action="CUMultas.php" class="mb-4">
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
                        <input type="radio" name="Atributo" value="Fecha"> Fecha
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Lugar"> Propietario
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Nombre"> Nombre
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
                        <input type="radio" name="Atributo" value="Vehiculo"> Vehiculo
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Motivo"> Motivo
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="ObjRetenido"> ObjRetenido
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Solucion"> Solucion
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Oficial"> Oficial
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="LugarPago"> LugarPago
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="FolioVerificacion"> FolioVerificacion
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="NoLicencia"> NoLicencia
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
            $SQL = "SELECT * FROM Multas WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            if (mysqli_num_rows($ResultSet) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>
                        <tr>
                       <th>Folio</th>
                        <th>Fecha</th>
                        <th>Lugar</th>
                        <th>Propietario</th>
                        <th>Nombre</th>
                        <th>Domicilio</th>
                        <th>Vehiculo</th>
                        <th>Motivo</th>
                        <th>Objeto Retenido</th>
                        <th>Solucion</th>
                        <th>Oficial</th>
                        <th>Lugar de pago</th>
                        <th>Folio verificacion</th>
                        <th>No.Licencia</th>
                        <th>Folio de tarjeta</th>
                        </tr>
                      </thead>
                      <tbody>";

                while ($Row = mysqli_fetch_assoc($ResultSet)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['Folio']) . "</td>
                            <td>" . htmlspecialchars($Row['Fecha']) . "</td>
                            <td>" . htmlspecialchars($Row['Lugar']) . "</td>
                            <td>" . htmlspecialchars($Row['Propietario']) . "</td>
                            <td>" . htmlspecialchars($Row['Nombre']) . "</td>
                            <td>" . htmlspecialchars($Row['Domicilio']) . "</td>
                            <td>" . htmlspecialchars($Row['Vehiculo']) . "</td>
                            <td>" . htmlspecialchars($Row['Motivo']) . "</td>
                            <td>" . htmlspecialchars($Row['ObjRetenido']) . "</td>
                            <td>" . htmlspecialchars($Row['Solucion']) . "</td>
                            <td>" . htmlspecialchars($Row['Oficial']) . "</td>
                            <td>" . htmlspecialchars($Row['LugarPago']) . "</td>
                            <td>" . htmlspecialchars($Row['FolioVerificacion']) . "</td>
                            <td>" . htmlspecialchars($Row['NoLicencia']) . "</td>
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