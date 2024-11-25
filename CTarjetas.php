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
                    <a href="#">Tarjetas de circulación</a>
                    <ul class="submenu">
                        <li><a href="FTarjetas.php">Crear</a></li>
          
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
        <h1 class="text-center">Consulta de Tarjetas de circulación</h1>
        <form method="GET" action="CTarjetas.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="Folio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="folio" required> Folio<br>
                    </label>
                </div>
                <div>
                    <label for="rfcpropietario">
                    <input type="radio" Id="Atributo" Name="Atributo" value="rfcPropietario"> RFC Propietario <br>
                    </label>
                </div>
                <div>
                    <label for="Vigencia">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Vigencia"> Vigencia <br>
                    </label>
                </div>
                <div>
                    <label for="FechaExp">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FechaExp"> Fecha de expedición <br>
                    </label>
                </div>
                <div>
                    <label for="OficinaExp">
                    <input type="radio" Id="Atributo" Name="Atributo" value="OficinaExp"> Oficina de expedición <br>
                    </label>
                </div>
                <div>
                    <label for="movimiento">
                    <input type="radio" Id="Atributo" Name="Atributo" value="movimiento"> Movimiento <br>
                    </label>
                </div>
              
                <div>
                    <label for="NIV">
                    <input type="radio" Id="Atributo" Name="Atributo" value="rfcPropietario"> NIV <br>
                    </label>
                </div>
                <div>
                    <label for="PropietarioID">
                    <input type="radio" Id="Atributo" Name="Atributo" value="PropietarioID"> ID Propietario<br>
                    </label>
                </div>
                <div>
                    <label for="VehiculoID">
                    <input type="radio" Id="Atributo" Name="Atributo" value="VehiculoID"> ID Vehiculo <br>
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
            $SQL = "SELECT * FROM Tarjetas WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

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
                <th>ID Propietario</th>
                <th>ID Vehiculo</th>
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
                echo "<td><a href='DTarjetas.php?Folio={$Fila['Folio']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FTarjetas.php?Folio={$Fila['Folio']}'><button class='btn-update'>Actualizar</button></a></td>";
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


