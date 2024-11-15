<?php 
session_start();
include("controlador.php");
$UserName=$_POST['UserName'];
$Pwd=$_POST['Pwd'];

//print($UserName."-----".$Pwd);*/

$Con=Conectar();
$SQL="SELECT * FROM Cuentas WHERE UserName='$UserName';";

$ResultSet=Ejecutar($Con,$SQL);
$NFila=mysqli_num_rows($ResultSet);



if($NFila==1){
    //print("Usuario Encontrado");
     $DatosCuenta=mysqli_fetch_row($ResultSet);

     $Intentos = $DatosCuenta[5];
     $maxIntentos = 3;
  
     if($Pwd==$DatosCuenta[1]){
        // print("Contraseña Correcta");
         if($DatosCuenta[3]==1){
            // print("Usuario Activo");
             if($DatosCuenta[4]==0){
                // print("Cuenta no bloqueada");
                 if($DatosCuenta[2]=='A'){
                    //print("Entrar como admin");
                    $_SESSION['user_type'] = 'admin';
                    $_SESSION['user_id'] = $DatosCuenta[0]; 
                        header("Location: Menu.php"); 
                        exit();
                 }else{
                    //print("Entrar como usuario");
                    $_SESSION['user_type'] = 'usuario'; 
                    $_SESSION['user_id'] = $DatosCuenta[0]; 
                        header("Location: MenuUsuarios.php"); //  <-- Corrección aquí
                        exit();
                 }
                }else{
                    print("Cuenta Bloqueada");
                }
            }else{
                print("Usuario Inactivo");
            }

        }else{
            $Intentos++;
            $updateSQL = "UPDATE Cuentas SET Intentos = $Intentos WHERE UserName = '$UserName'";
            Ejecutar($Con, $updateSQL);
            if ($Intentos >= $maxIntentos) {
                $bloqueoSQL = "UPDATE Cuentas SET Bloqueo = 1 WHERE UserName = '$UserName'";
                Ejecutar($Con, $bloqueoSQL);
                print("Cuenta Bloqueada");
            }else{
                print("Contraseña Incorrecta. Le quedan " . ($maxIntentos - $Intentos) . " intentos");
            }
        }
    }else{
        print("Usuario No Encontrado");
    }

    Desconectar($Con);


?>