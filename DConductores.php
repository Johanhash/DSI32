<?php
    include("Controlador.php");
    $ConductorID = $_GET['ConductorID'];
    $SQL = "DELETE FROM Conductores WHERE conductorID='$ConductorID'";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro Eliminado");
    } else {
        print(mysqli_error($Con));
    }

    Desconectar($Con);

?>