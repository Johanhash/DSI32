<?php
    include("Controlador.php");
    $PropietarioID = $_GET['PropietarioID'];
    $SQL = "DELETE FROM Propietarios WHERE PropietarioID='$PropietarioID';";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro Propietario Eliminado");
    } else {
        print(mysqli_error($Con));
    }

    Desconectar($Con);
?>
