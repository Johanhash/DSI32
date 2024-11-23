<?php

    include("Controlador.php");
    $NoCentro = $_GET['NoCentro'];
    $SQL = "DELETE FROM CentrosVerificacion WHERE NoCentro='$NoCentro'";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro Eliminado");
    } else {
        print(mysqli_error($Con));
    }
    Desconectar($Con);
?> 
