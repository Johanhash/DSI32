<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Redirigir al usuario a la página de inicio de sesión
    header('Location: FAcceso.php');
    exit;
}

include("Controlador.php");
$Con = Conectar();
$SQL = "SELECT * FROM DatosLicencia";
$ResultSet = Ejecutar($Con, $SQL);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Consulta de Licencias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style_crear1.css">
    <script src="menu.js"></script>
    <style>
        .table-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .table {
            width: 80%;
            margin: auto;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
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
                    <a href="#">Licencias</a>
                    <ul class="submenu">
                        <li><a href="FLicencias.php">Crear</a></li>
                        <li><a href="CLicencias.php">Leer</a></li>
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

    <div class="container table-container">
        <h1 class="text-center">Consulta de Licencias</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No. de Licencia</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Foto</th>
                    <th>Tipo de Licencia</th>
                    <th>Fecha de Expedición</th>
                    <th>Vigencia</th>
                    <th>Antigüedad</th>
                    <th>Restricción</th>
                    <th>Observación</th>
                    <th>Domicilio</th>
                    <th>Firma</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($ResultSet)) { ?>
                    <tr>
                        <td><?php echo $row['NoLicencia']; ?></td>
                        <td><?php echo $row['Nombre']; ?></td>
                        <td><?php echo $row['Apellido']; ?></td>
                        <td><img src="<?php echo $row['Foto']; ?>" alt="Foto" width="100"></td>
                        <td><?php echo $row['TipoLicencia']; ?></td>
                        <td><?php echo $row['FechaExp']; ?></td>
                        <td><?php echo $row['Vigencia']; ?></td>
                        <td><?php echo $row['Antiguedad']; ?></td>
                        <td><?php echo $row['Restriccion']; ?></td>
                        <td><?php echo $row['Observacion']; ?></td>
                        <td><?php echo $row['Domicilio']; ?></td>
                        <td><img src="<?php echo $row['Firma']; ?>" alt="Firma" width="100"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
Desconectar($Con);
?>
