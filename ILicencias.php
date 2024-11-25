<?php
    $NoLicencia=$_REQUEST['NoLicencia'];
    $Foto=$_REQUEST['Foto'];
    $Nombre=$_REQUEST['Nombre'];
    $Apellido=$_REQUEST['Apellido'];
    $Firma=$_REQUEST['Firma'];
    $TipoLicencia=$_REQUEST['TipoLicencia'];
    $FechaExp=$_REQUEST['FechaExp']; 
    $Observacion=$_REQUEST['Observacion'];
    $Antiguedad =$_REQUEST['Antiguedad'];
    $Domicilio =$_REQUEST['Domicilio'];
    $Restriccion =$_REQUEST['Restriccion'];
    $VigenciaSeleccionada = $_REQUEST['Vigencia'];
    $Conductor =$_REQUEST['Conductor'];

    $Vigencia = date('Y-m-d', strtotime("+$VigenciaSeleccionada years", strtotime($FechaExp)));


    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file_foto = $target_dir . basename($Foto);
    $target_file_firma = $target_dir . basename($Firma);

    if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file_foto) && move_uploaded_file($_FILES["Firma"]["tmp_name"], $target_file_firma)) {
        $Con = Conectar();
        $SQL = "INSERT INTO Licencias (NoLicencia, Foto, Firma, Nombre, Apellido, TipoLicencia, FechaExp, Observacion, Antiguedad, Domicilio, Restriccion, Vigencia, ConductorID)
                VALUES ('$NoLicencia', '$target_file_foto', '$target_file_firma', '$Nombre', '$Apellido', '$TipoLicencia', '$FechaExp', '$Observacion', '$Antiguedad', '$Domicilio', '$Restriccion', '$Vigencia', '$ConductorID')";

        try {
            $ResultSet = Ejecutar($Con, $SQL);
            echo "Registro insertado exitosamente.";
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
        Desconectar($Con);
    } else {
        echo "Hubo un error al subir los archivos.";
    }

?>

