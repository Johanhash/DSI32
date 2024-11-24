<?php 
session_start();
include("controlador.php");

$llave = $_FILES['llave']['name'];
$tipo_archivo = $_FILES['llave']['type'];
$tamano_archivo = $_FILES['llave']['size'];
$carpeta_destino = "./";

$UserName=$_POST['UserName'];
$Pwd=$_POST['Pwd'];

$Con = Conectar();
$SQL = "SELECT * FROM Cuentas WHERE UserName='$UserName' AND Pwd='$Pwd' AND Llave_Key='$Key' AND Status=1;";

$ResultSet = Ejecutar($Con, $SQL);
$NFila = mysqli_num_rows($ResultSet);

if ($NFila == 1) {
    $DatosCuenta = mysqli_fetch_row($ResultSet);
    $Intentos = $DatosCuenta[5];
    $maxIntentos = 3;

    if ($Pwd == $DatosCuenta[1]) {
        if ($DatosCuenta[3] == 1) {
            if ($DatosCuenta[4] == 0) {
                $_SESSION['user_type'] = $DatosCuenta[2];
                $_SESSION['user_id'] = $DatosCuenta[0];
                if ($DatosCuenta[2] == 'A') {
                    header("Location: Menu.php");
                } else {
                    header("Location: MenuUsuarios.php");
                }
                exit();
            } else {
                print("Cuenta bloqueada");
            }
        } else {
            print("Usuario inactivo");
        }
    } else {
        $Intentos++;
        $updateSQL = "UPDATE Cuentas SET Intentos = $Intentos WHERE UserName = '$UserName'";
        Ejecutar($Con, $updateSQL);
        if ($Intentos >= $maxIntentos) {
            $bloqueoSQL = "UPDATE Cuentas SET Bloqueo = 1 WHERE UserName = '$UserName'";
            Ejecutar($Con, $bloqueoSQL);
            print("Cuenta bloqueada");
        } else {
            print("Contraseña incorrecta. Le quedan " . ($maxIntentos - $Intentos) . " intentos");
        }
    }
} else {
    print("Usuario no encontrado");
}

Desconectar($Con);
?>
