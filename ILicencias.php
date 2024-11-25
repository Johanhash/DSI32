<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("Controlador.php");

    $NoLicencia = $_POST['NoLicencia'];
    $Foto = $_FILES['Foto']['name'];
    $Firma = $_FILES['Firma']['name'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $TipoLicencia = $_POST['TipoLicencia'];
    $FechaExp = $_POST['FechaExp'];
    $Observacion = $_POST['Observacion'];
    $Antiguedad = $_POST['Antiguedad'];
    $Domicilio = $_POST['Domicilio'];
    $Restriccion = $_POST['Restriccion'];
    $Vigencia = $_POST['Vigencia'];
    $ConductorID = $_POST['ConductorID'];

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
}
?>
