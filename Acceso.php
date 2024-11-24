<?php
session_start();
include("Controlador.php");

$llave = $_FILES['llave']['name'];
$tipo_archivo = $_FILES['llave']['type'];
$tamano_archivo = $_FILES['llave']['size'];
$carpeta_destino = "./";

$UserName = $_POST['UserName'];
$Pwd = $_POST['Pwd'];

$Con = conectar();
$SQL = "SELECT * FROM cuentas WHERE UserName = '$UserName';";

$ResultSet = ejecutar($Con, $SQL);
$NFila = mysqli_num_rows($ResultSet);

// Comprueba características del archivo
if ($tipo_archivo != "text/plain" || $tamano_archivo > 100000) {
    $_SESSION['error'] = "La extensión o el tamaño de los archivos no es correcta.";
    header("Location: FAcceso.php");
    exit;
    
} else {
    $ruta_archivo = $carpeta_destino . $llave;
    if (move_uploaded_file($_FILES['llave']['tmp_name'], $ruta_archivo)) {
        if ($NFila == 1) {
            $DatosCuenta = mysqli_fetch_row($ResultSet);
            if ($Pwd == $DatosCuenta[1]) {
                $Manejador = fopen("$llave", "r");
                $token = fgets($Manejador);
                fclose($Manejador);
                if ($token == $DatosCuenta[6]) {
                    if ($DatosCuenta[3] == 1) { 
                        if ($DatosCuenta[4] == 0) { 
                            unlink($ruta_archivo);
                            $_SESSION['UserName'] = $UserName;
                            $redirect = $DatosCuenta[2] == 'A' ? "Menu.php" : "MenuUsuarios.php";
                            header("Location: $redirect");
                            exit;
                        } else {
                            $_SESSION['error'] = "Cuenta bloqueada.";
                        }
                    } else {
                        $_SESSION['error'] = "Usuario, contraseña o llave incorrectos.";
                    }
                } else {
                    $_SESSION['error'] = "Usuario, contraseña o llave incorrectos.";
                }
            } else {
                $_SESSION['error'] = "Usuario, contraseña o llave incorrectos.";
                $INTENTOS = "UPDATE Cuentas SET intentos = intentos + 1 WHERE UserName='$UserName';";
                ejecutar($Con, $INTENTOS);
                if ($DatosCuenta[5] > 1) {
                    $BloquearCuenta = "UPDATE Cuentas SET Bloqueo=1 WHERE UserName='$UserName';";
                    ejecutar($Con, $BloquearCuenta);
                }
            }
        } else {
            $_SESSION['error'] = "Usuario, contraseña o llave incorrectos.";
        }
    } else {
        $_SESSION['error'] = "Error al cargar el archivo.";
    }
    header("Location: FAcceso.php");
    exit;
}
Desconectar($Con);
?>
