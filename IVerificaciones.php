<?php

$Folio =$_POST['Folio'];
$Vehiculo =$_POST['Vehiculo'];
$Motivo=$_POST['Motivo'];
$Semestre =$_POST['Semestre'];
$Vigencia =$_POST['Vigencia'];
$FolioTarjeta =$_POST['FolioTarjeta'];
$NoCentro =$_POST['NoCentro'];


    $SQL ="INSERT INTO Verificaciones (Folio,Vehiculo,Motivo,Semestre,Vigencia,FolioTarjeta,NoCentro)
    VALUES('$Folio','$Vehiculo','$Motivo','$Semestre','$Vigencia','$FolioTarjeta','$NoCentro')";
    
    include("Controlador.php"); 
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    
    if ($ResultSet == 1) {
        // Redirigir a la misma página con un mensaje de éxito
        header("Location: FVerificaciones.php?mensaje=Registro+exitoso");
        exit();
    } else {
        // Redirigir a la misma página con un mensaje de error
        header("Location: FVerificaciones.php?mensaje=Error+en+el+registro");
        exit();
    }
Desconectar($Con); 

?>