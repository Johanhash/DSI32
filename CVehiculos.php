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
                    <a href="#">Vehiculos</a>
                    <ul class="submenu">
                        <li><a href="FVehiculos.php">Crear</a></li>
          
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
        <h1 class="text-center">Consulta de Vehiculos</h1>
        <form method="GET" action="CVehiculos.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="VehiculoID">
                    <input type="radio" Id="Atributo" Name="Atributo" value="VehiculoID" required> ID Vehiculo<br>
                    </label>
                </div>
                <div>
                    <label for="NIV">
                    <input type="radio" Id="Atributo" Name="Atributo" value="NIV" > NIV<br>
                    </label>
                </div>
                <div>
                    <label for="Marca">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Marca"> Marca <br>
                    </label>
                </div>
                <div>
                    <label for="linea">
                    <input type="radio" Id="Atributo" Name="Atributo" value="linea"> Línea <br>
                    </label>
                </div>
                <div>
                    <label for="sublinea">
                    <input type="radio" Id="Atributo" Name="Atributo" value="sublinea"> Sublínea <br>
                    </label>
                </div>
                <div>
                    <label for="color">
                    <input type="radio" Id="Atributo" Name="Atributo" value="color"> Color <br>
                    </label>
                </div>
                <div>
                    <label for="cilindraje">
                    <input type="radio" Id="Atributo" Name="Atributo" value="cilindraje"> Cilindraje <br>
                    </label>
                </div>
              
                <div>
                    <label for="origen">
                    <input type="radio" Id="Atributo" Name="Atributo" value="origen"> Origen <br>
                    </label>
                </div>
                <div>
                    <label for="capacidad">
                    <input type="radio" Id="Atributo" Name="Atributo" value="capacidad"> Capacidad <br>
                    </label>
                </div>
                <div>
                    <label for="puertas">
                    <input type="radio" Id="Atributo" Name="Atributo" value="puertas"> Puertas <br>
                    </label>
                </div>
 
            <div>
                    <label for="asientos">
        <input type="radio" Id="Atributo" Name="Atributo" value="asiento"> Asientos <br>
                    </label>
                </div>
            <div>
                    <label for="combustible">
                    <input type="radio" Id="Atributo" Name="Atributo" value="combustible"> Combustible <br>
                    </label>
                </div>
            <div>
                <label for="transmision">
                <input type="radio" Id="Atributo" Name="Atributo" value="transmision"> Transmisión <br>
                </label>
                </div>
            <div>
                <label for="clase">
                <input type="radio" Id="Atributo" Name="Atributo" value="clase"> Clase <br>
                </label>
                </div>
            <div>
                <label for="tipo">
                <input type="radio" Id="Atributo" Name="Atributo" value="tipo"> Tipo <br>
                </label>
                </div>
                <div>
                <label for="uso">
                <input type="radio" Id="Atributo" Name="Atributo" value="uso"> Uso <br>
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
            $SQL = "SELECT * FROM Vehiculos WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
              <tr>
                <th>ID Vehiculo</th>
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
                echo "<td><a href='DVehiculos.php?VehiculoID={$Fila['VehiculoID']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FVehiculos.php?VehiculoID={$Fila['VehiculoID']}'><button class='btn-update'>Actualizar</button></a></td>";
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