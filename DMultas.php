<?php
    include("Controlador.php");
    $Folio = $_GET['Folio'];
    $SQL = "DELETE FROM Multas WHERE Folio='$Folio'";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro de Multa Eliminado");
    } else {
        print(mysqli_error($Con));
    }

    Desconectar($Con);
?>
