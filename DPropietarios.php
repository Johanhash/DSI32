<?php
    include("Controlador.php");
    $Propietarioid = $_GET['Propietarioid'];
    $SQL = "DELETE FROM Propietarios WHERE Propietarioid='$Propietarioid';";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro Propietario Eliminado");
    } else {
        print(mysqli_error($Con));
    }

    Desconectar($Con);
?>
