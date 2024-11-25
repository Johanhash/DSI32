<?php
session_start();
include("Controlador.php");

$UserName = $_POST['UserName'];
$Pwd = $_POST['Pwd'];
$llave = $_FILES['llave']['name'];
$tipo_archivo = $_FILES['llave']['type'];
$tamano_archivo = $_FILES['llave']['size'];
$carpeta_destino = "./";

$Con = conectar();
$SQL = "SELECT * FROM cuentas WHERE UserName = '$UserName';";
$ResultSet = ejecutar($Con, $SQL);
$NFila = mysqli_num_rows($ResultSet);

if ($NFila == 1) {
    $DatosCuenta = mysqli_fetch_row($ResultSet);
    if ($Pwd == $DatosCuenta[1]) {
        if ($tipo_archivo == "text/plain" && $tamano_archivo <= 100000) {
            $ruta_archivo = $carpeta_destino . $llave;
            if (move_uploaded_file($_FILES['llave']['tmp_name'], $ruta_archivo)) {
                $Manejador = fopen($ruta_archivo, "r");
                $token = fgets($Manejador);
                fclose($Manejador);
                unlink($ruta_archivo);
                if ($token == $DatosCuenta[6]) {
                    $_SESSION['authenticated'] = true;
                    $_SESSION['UserName'] = $UserName;
                    $_SESSION['role'] = $DatosCuenta[2]; // Almacenar el rol del usuario en la sesión
                    if ($DatosCuenta[2] == 'A') { // Verifica si es administrador
                        header("Location: Menu.php");
                    } else {
                        header("Location: MenuUsuarios.php");
                    }
                    exit;
                } else {
                    $_SESSION['error'] = "Llave incorrecta.";
                }
            } else {
                $_SESSION['error'] = "Error al subir la llave.";
            }
        } else {
            $_SESSION['error'] = "La extensión o el tamaño de los archivos no es correcta.";
        }
    } else {
        $_SESSION['error'] = "Contraseña incorrecta.";
    }
} else {
    $_SESSION['error'] = "Usuario no encontrado.";
}

Desconectar($Con);
header("Location: FAcceso.php");
exit;
?>
