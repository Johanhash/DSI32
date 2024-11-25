<?php

$UserName=$_POST['UserName'];
$Pwd=$_POST['Pwd'];


function generarToken($longitud = 32) {
    return bin2hex(random_bytes($longitud / 2));
}

$token = generarToken(); 

$SQL = "INSERT INTO Cuentas (UserName,Pwd,Tipo,Status,Bloqueo,Intentos,Llave) 
VALUES('$UserName','$Pwd','U',1,0,0,'$token');";

include("controlador.php");

$Con=conectar();
$ResultSet=ejecutar($Con,$SQL);
if($ResultSet==1){

    $Manejador=fopen("llave$UserName.txt","w");
    fwrite($Manejador,"$token");
    fclose($Manejador);

    $nombre_archivo="llave$UserName.txt";

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $nombre_archivo . '"');
    header('Content-Length: ' . filesize($nombre_archivo));
    readfile($nombre_archivo);

    unlink($nombre_archivo);
}
else{
    print(mysqli_error($Con));
}

procesar();
desconectar($Con);

?>