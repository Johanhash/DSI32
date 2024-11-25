<!DOCTYPE html>
<html lang="es">
<head>
    <title>Eliminar Propietario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style_crear1.css">
    <script src="menu.js"></script>
    
    <script>
        function confirmarEliminacion() {
            const confirmationBox = document.getElementById('confirmationBox');
            confirmationBox.style.display = 'block';
        }

        function cancelarEliminacion() {
            const confirmationBox = document.getElementById('confirmationBox');
            confirmationBox.style.display = 'none';
        }
    </script>
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
                <button class="btn-logout" onclick="location.href='CerrarSesion.php'">
                    <img src="Cerrarse.png" alt="Cerrar Sesión" class="cerrar-icon">
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <h1>Eliminar Propietario</h1>
        <form id="deleteForm" action="DPropietarios.php" method="GET">
            <div class="form-group">
                <label for="PropietarioID" class="form-label">ID del Propietario</label>
                <input type="text" id="PropietarioID" name="PropietarioID" class="form-control" placeholder="Ingrese el ID del Propietario" required>
            </div>
            <button type="button" class="btn btn-danger btn-block" onclick="confirmarEliminacion()">Eliminar</button>
        </form>

        <!-- Caja de confirmación -->
        <div id="confirmationBox" class="border p-4 bg-light shadow rounded">
            <p class="confirmation-message">¿Estás seguro de que quieres eliminar el registro?</p>
            <div class="btn-group">
                <button type="submit" form="deleteForm" class="btn btn-danger">Sí, eliminar</button>
                <button type="button" class="btn btn-secondary" onclick="cancelarEliminacion()">No, cancelar</button>
            </div>
        </div>
    </div>
</body>
</html>
