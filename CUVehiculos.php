<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Vehiculos</title>
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
        <h1 class="text-center">Consulta de Vehiculos</h1>
        <form method="GET" action="CUVehiculos.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio" required>
            </div>

            <div class="form-group">
                <label class="form-label">Atributo</label>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="VehiculoID" required> VehiculoID
                    </label>
                </div>
                <div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="NIV">NIV
                    </label>
                </div>
            </div>
                    <label>
                        <input type="radio" name="Atributo" value="Marca"> Marca
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Linea"> Linea
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Sublinea"> Sublinea
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="Atributo" value="Color"> Color
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Cilindro"> Cilindro
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Origen"> Origen
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Capacidad"> Capacidad
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Puertas"> Puertas
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Asientos"> Asientos
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Combustible"> Combustible
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Transmision"> Transmision
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Clase"> Clase
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Tipo"> Tipo
                    </label>
                </div>
            </div>
            <div>
                    <label>
                        <input type="radio" name="Atributo" value="Uso"> Uso
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
            $SQL = "SELECT * FROM Vehiculos  WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            if (mysqli_num_rows($ResultSet) > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>";
                echo "<thead>
                        <tr>
                                <th>VehiculoID</th>
                                <th>NIV</th>
                                <th>Marca</th>
                                <th>Línea</th>
                                <th>Sublínea</th>
                                <th>Color</th>
                                <th>Cilindraje</th>
                                <th>Origen</th>
                                <th>Capacidad</th>
                                <th>Puertas</th>
                                <th>Asientos</th>
                                <th>Combustible</th>
                                <th>Transmisión</th>
                                <th>Clase</th>
                                <th>Tipo</th>
                                <th>Uso</th>
                        </tr>
                      </thead>
                      <tbody>";

                while ($Row = mysqli_fetch_assoc($ResultSet)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($Row['VehiculoID']) . "</td>
                            <td>" . htmlspecialchars($Row['NIV']) . "</td>
                            <td>" . htmlspecialchars($Row['Marca']) . "</td>
                            <td>" . htmlspecialchars($Row['Linea']) . "</td>
                            <td>" . htmlspecialchars($Row['Sublinea']) . "</td>
                            <td>" . htmlspecialchars($Row['Color']) . "</td>
                            <td>" . htmlspecialchars($Row['Cilindro']) . "</td>
                            <td>" . htmlspecialchars($Row['Origen']) . "</td>
                            <td>" . htmlspecialchars($Row['Capacidad']) . "</td>
                            <td>" . htmlspecialchars($Row['Puertas']) . "</td>
                            <td>" . htmlspecialchars($Row['ASientos']) . "</td>
                            <td>" . htmlspecialchars($Row['Combustible']) . "</td>
                            <td>" . htmlspecialchars($Row['Transmision']) . "</td>
                            <td>" . htmlspecialchars($Row['Clase']) . "</td>
                            <td>" . htmlspecialchars($Row['Tipo']) . "</td>
                            <td>" . htmlspecialchars($Row['Uso']) . "</td>
                            
                            
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