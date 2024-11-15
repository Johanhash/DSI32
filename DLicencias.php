<?php
    include("Controlador.php");
    $NoLicencia=$_GET['NoLicencia'];
    $SQL = "DELETE FROM Licencias WHERE NoLicencia='$NoLicencia'";
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if (mysqli_affected_rows($Con) == 1) {
        print("1 Registro de Licencia Eliminado");
    } else {
        print(mysqli_error($Con));
    }
    Desconectar($Con);
?>

