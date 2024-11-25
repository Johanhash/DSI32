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
                    <a href="#">Propietarios</a>
                    <ul class="submenu">
                        <li><a href="FPropietarios.php">Crear</a></li>
          
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
        <h1 class="text-center">Consulta de Propietarios</h1>
        <form method="GET" action="CPropietarios.php" class="mb-4">
            <div class="form-group">
                <label for="Criterio" class="form-label">Criterio de búsqueda</label>
                <input type="text" id="Criterio" name="Criterio" class="form-control" placeholder="Ingrese su criterio">
            </div>
   

            <div class="form-group">
                <label class="form-label">Atributo </label>
                <div>
                    <label for="PropietarioID">
                        <input type="radio" id="PropietarioID" name="Atributo" value="PropietarioID" > ID Propietario
                    </label>
                </div>
                 <div>
                    <label for="nombre">
                        <input type="radio" id="nombre" name="Atributo" value="nombre"> Nombre
                    </label>
                </div>
                <div>
                    <label for="localidad">
                        <input type="radio" id="localidad" name="Atributo" value="localidad"> Localidad
                    </label>
                </div>
                <div>
                    <label for="municipio">
                        <input type="radio" id="municipio" name="Atributo" value="municipio"> Municipio
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
            $SQL = "SELECT * FROM Propietarios WHERE $Atributo LIKE '%$Criterio%'";
            $ResultSet = Ejecutar($Con, $SQL);

            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead>
                    <tr>
                        <th>ID Propietario</th>
                        <th>Nombre</th>
                        <th>Localidad</th>
                        <th>Municipio</th>
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
                echo "<td><a href='DPropietarios.php?PropietarioID={$Fila['PropietarioID']}'><button class='btn-back'>Eliminar</button></a></td>";
                echo "<td><a href='FUPropietarios.php?PropietarioID={$Fila['PropietarioID']}'><button class='btn-update'>Actualizar</button></a></td>";
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


