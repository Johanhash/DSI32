<?php
$VehiculoID =$_REQUEST['VehiculoID'];
$NIV =$_REQUEST['NIV'];
$Marca =$_REQUEST['Marca'];
$Linea =$_REQUEST['Linea'];
$Sublinea =$_REQUEST['Sublinea'];
$Color =$_REQUEST['Color'];
$Cilindro =$_REQUEST['Cilindro'];
$Origen =$_REQUEST['Origen'];
$Capacidad =$_REQUEST['Capacidad'];
$Puertas =$_REQUEST['Puertas'];
$Asientos =$_REQUEST['Asientos'];
$Combustible =$_REQUEST['Combustible'];
$Transmision =$_REQUEST['Transmision'];
$Clase =$_REQUEST['Clase'];
$Tipo =$_REQUEST['Tipo'];
$Uso =$_REQUEST['Uso'];


    $SQL ="UPDATE Vehiculos SET NIV='$NIV',Marca='$Marca',Linea='$Linea',
    Sublinea='$Sublinea',Color='$Color',Cilindro='$Cilindro',
    Origen='$Origen',Capacidad='$Capacidad',Puertas='$Puertas',
    Asientos='$Asientos',Combustible='$Combustible',
    Transmision='$Transmision',Clase='$Clase',Tipo='$Tipo',Uso='$Uso'
    WHERE VehiculoID='$VehiculoID';";
    

include("controlador.php");

$Con=Conectar();
$ResultSet=Ejecutar($Con, $SQL);

if ($ResultSet == 1) {
    // Redirigir al formulario de actualización con un mensaje de éxito
    header("Location: FUVehiculos.php?VehiculoID=$VehiculoID&mensaje=exito");
    exit();
} else {
    // Mostrar error si ocurre
    echo "Error en la actualización: " . mysqli_error($Con);
}

procesar();
desconectar($Con);
?>
