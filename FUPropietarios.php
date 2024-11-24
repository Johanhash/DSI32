<?php 
$PropietarioID = $_GET['PropietarioID'];
$SQL = "SELECT * FROM Propietarios WHERE PropietarioID = '$PropietarioID';";
include("Controlador.php"); 
$Con = Conectar();
$ResultSet = Ejecutar($Con, $SQL);
$Fila = mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Propietario</title>
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
                        <li><a href="CPropietarios.php">Leer</a></li>
          
                    </ul>
                </li>
            </ul>
            <div class="session-controls">
                <button class="btn-logout" onclick="location.href='FAcceso.html'">
                    <img src="Cerrarse.png" alt="Cerrar Sesión" class="cerrar-icon">
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <h1 class="text-center">Actualizar Propietario</h1>
        <form method="GET" action="UPropietarios.php" class="border p-4 bg-white shadow rounded">
            <div class="form-group">
                <label for="PropietarioID">ID Propietario</label>
                <input type="number" name="PropietarioID" id="PropietarioID" class="form-control"
                       value="<?php echo $Fila[0]; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="RFC">RFC</label>
                <input type="text" name="RFC" id="RFC" class="form-control" value="<?php echo $Fila[1]; ?>">
            </div>
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="<?php echo $Fila[2]; ?>">
            </div>
            <div class="form-group">
                <label for="Localidad">Localidad</label>
                <input type="text" name="Localidad" id="Localidad" class="form-control" value="<?php echo $Fila[3]; ?>">
            </div>
            <div class="form-group">
                <label for="Municipio">Municipio</label>
                <input type="text" name="Municipio" id="Municipio" class="form-control" value="<?php echo $Fila[4]; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
