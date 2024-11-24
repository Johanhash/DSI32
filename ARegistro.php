<?php

$UserName=$_POST['UserName'];
$Pwd=$_POST['Pwd'];


function generarToken($longitud = 32) {
    // Generar bytes aleatorios y convertirlos a formato hexadecimal
    return bin2hex(random_bytes($longitud / 2));
}

// Uso del token
$token = generarToken(); // Por defecto genera un token de 32 caracteres;


$SQL = "INSERT INTO Cuentas (UserName,Pwd,Tipo,Status,Bloqueo,Intentos,Llave) 
VALUES('$UserName','$Pwd','U',1,0,0,'$token');";

include("controlador.php");

$Con=conectar();
$ResultSet=ejecutar($Con,$SQL);
if($ResultSet==1){
    //print("instruccion Ejecutada");

    $Manejador=fopen("llave$UserName.txt","w");
    fwrite($Manejador,"$token");
    fclose($Manejador);

    $nombre_archivo="llave$UserName.txt";

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nombre_archivo . '"');
    header('Content-Length: ' . filesize($nombre_archivo));
    readfile($nombre_archivo);

    // Eliminar el archivo del servidor después de la descarga
    unlink($nombre_archivo);
}
else{
    print(mysqli_error($Con));
}
procesar();
desconectar($Con);

?>