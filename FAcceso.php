<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_acceso.css">
    <title>Inicio de Sesión</title>

</head>
<body>
    <div class="login-container">
            <div class="tabs">
            <a href="#" class="active">Iniciar sesión</a> 
            <a href="FRegistro.html" >Registrarse</a>
        </div>

        <h1>Inicio de Sesión</h1>
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']); 
        }
        ?>
        <form method="post" action="Acceso.php" enctype="multipart/form-data">
        <div class="form-group">
                <label for="UserName">Nombre de Usuario</label>
                <input type="text" name="UserName" id="UserName" placeholder="Escribe tu usuario" required>
            </div>
        
            <div class="form-group">
                <label for="Pwd">Contraseña</label>
                <input type="password" name="Pwd" id="Pwd" placeholder="Escribe tu contraseña" required>
            </div>
            <div class="form-group">
                <label for="key">Llave</label>
                <input type="file" id="llave" name="llave" placeholder="">
            </div>
            <div class="form-group">
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
    </main>
</body>
</html>
