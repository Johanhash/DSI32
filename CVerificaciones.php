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
                    <a href="#">Verificaciones</a>
                    <ul class="submenu">
                        <li><a href="FVerifaciones.php">Crear</a></li>
          
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
        <h1 class="text-center">Consulta de Verificaciones</h1>
        <form method="GET" action="CVerificaciones.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="Folio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Folio" required> Folio<br>
                    </label>
                </div>
                <div>
                    <label for="Vehiculo">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Vehiculo"> Vehiculo <br>
                    </label>
                </div>
                <div>
                    <label for="Motivo">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Motivo"> Motivo <br>
                    </label>
                </div>
                <div>
                    <label for="semestre">
                    <input type="radio" Id="Atributo" Name="Atributo" value="semestre"> Semestre <br>
                    </label>
                </div>
                <div>
                    <label for="vigencia">
                    <input type="radio" Id="Atributo" Name="Atributo" value="vigencia"> Vigencia <br>
                    </label>
                </div>
                <div>
                    <label for="FolioTarjeta">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FolioTarjeta"> Folio Tarjeta de circulación <br>
                    </label>
                </div>
                <div>
                    <label for="NoCentro">
                    <input type="radio" Id="Atributo" Name="Atributo" value="NoCentro"> No.Centro de verificación <br>
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
            $SQL = "SELECT * FROM Verificaciones WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
              <tr>
                <th>Folio</th>
                <th>Vehículo</th>
                <th>Motivo</th>
                <th>Semestre</th>
                <th>Vigencia</th>
                <th>Folio Tarjeta de circulación</th>
                <th>No. Centro de verificación</th>
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
                echo "<td><a href='DVerificaciones.php?Folio={$Fila['Folio']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FVerificaciones.php?Folio={$Fila['Folio']}'><button class='btn-update'>Actualizar</button></a></td>";
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