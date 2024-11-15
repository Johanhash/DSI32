<?php
    include("Controlador.php");
    $RFC = $_GET['RFC'];
    $SQL = "DELETE FROM Propietarios WHERE RFC='$RFC'";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro Propietario Eliminado");
    } else {
        print(mysqli_error($Con));
    }

    Desconectar($Con);
?>