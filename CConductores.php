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
                    <a href="#">Conductores</a>
                    <ul class="submenu">
                        <li><a href="FConductores.php">Crear</a></li>
          
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
        <h1 class="text-center">Consulta de Conductores</h1>
        <form method="GET" action="CConductores.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="conductorID">
                    <input type="radio" Id="Atributo" Name="Atributo" value="conductorId" required >ConductorId<br>
                    </label>
                </div>
                <div>
                    <label for="Nombre">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Nombre"> Nombre <br>
                    </label>
                </div>
                <div>
                    <label for="Motivo">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Apellido"> Apellidos <br>
                    </label>
                </div>
                <div>
                    <label for="fechaNac">
                    <input type="radio" Id="Atributo" Name="Atributo" value="fechaNac">Fecha de nacimiento <br>
                    </label>
                </div>
                <div>
                    <label for="TipoSangre">
                    <input type="radio" Id="Atributo" Name="Atributo" value="TipoSangre"> TipoSangre <br>
                    </label>
                </div>
                <div>
                    <label for="Telefono">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Telefono"> Telefono <br>
                    </label>
                </div>
                <div>
                    <label for="domicilio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="domicilio"> Domicilio <br>
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
            $SQL = "SELECT * FROM Conductores WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
             <tr>
                <th>ConductorID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Domicilio</th>   
                <th>Teléfono</th>
                <th>Tipo Sanguineo</th>
                 <th>Donador</th>
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
                echo "<td><a href='DConductores.php?ConductorID={$Fila['ConductorID']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FConductores.php?ConductorID={$Fila['ConductorID']}'><button class='btn-update'>Actualizar</button></a></td>";
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