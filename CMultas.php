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
                    <a href="#">Multas</a>
                    <ul class="submenu">
                        <li><a href="FMultas.php">Crear</a></li>
          
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
 
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;'>
                " . htmlspecialchars($_GET['mensaje']) . "
              </div>";
    }
    ?>
    
    <!-- Contenido principal -->
    <main class="main-content">
        <h1 class="text-center">Consulta de Multas</h1>
        <form method="GET" action="CMultas.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="folio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="folio" required> Folio <br>
                    </label>
                </div>
                <div>
                    <label for="Fecha">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Fecha"> Fecha <br>
                    </label>
                </div>
                <div>
                    <label for="Lugar">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Lugar"> Lugar <br>
                    </label>
                </div>
                <div>
                    <label for="Propietario">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Propietario">Propietario<br>
                    </label>
                </div>
                <div>
                    <label for="Nombre">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Nombre"> Nombre <br>
                    </label>
                </div>
                <div>
                    <label for="Domicilio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Domicilio"> Domicilio <br>
                    </label>
                </div>
                <div>
                    <label for="Vehiculo">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Vehiculo"> Vehiculo  <br>
                    </label>
                </div>
                <div>
                    <label for="Motivo">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Motivo"> Motivo <br>
                    </label>
                </div>
                <div>
                    <label for="ObjRetenido">
                    <input type="radio" Id="Atributo" Name="Atributo" value="ObjRetenido"> Objeto Retenido <br>
                    </label>
                </div>
                <div>
                    <label for="Solucio">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Solucion"> Solución <br>
                    </label>
                </div>
              
                <div>
                    <label for="Oficial">
                    <input type="radio" Id="Atributo" Name="Atributo" value="Oficial"> Oficial <br>
                    </label>
                </div>
                <div>
                    <label for="LugarPago">
                    <input type="radio" Id="Atributo" Name="Atributo" value="LugarPago"> Lugar de pago <br>
                    </label>
                </div>
                <div>
                    <label for="FolioVerificacion">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FolioVerificacion"> Folio de verificacion <br>
                    </label>
                </div>
                <div>
                    <label for="NoLicencia">
                    <input type="radio" Id="Atributo" Name="Atributo" value="NoLicencia"> No.Licencia <br>
                    </label>
                </div>
                <div>
                    <label for="FolioTarjeta">
                    <input type="radio" Id="Atributo" Name="Atributo" value="FolioTarjeta"> Folio Tarjeta <br>
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
            $SQL = "SELECT * FROM Multas WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

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
                <th>Folio de verificacion</th>
                <th>No.Licencia</th>
                <th>Folio de tarjeta</th>
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
                echo "<td><a href='DMultas.php?Folio={$Fila['Folio']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FUMultas.php?Folio={$Fila['Folio']}'><button class='btn-update'>Actualizar</button></a></td>";
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