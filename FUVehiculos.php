<?php 
$NIV=$_GET['NIV'];
$SQL ="SELECT * FROM Vehiculos WHERE NIV='$NIV'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<html5>
    <form  method="get" action="UVehiculos.php"> 
        <label>NIV</label>
    <input type="text" name="NIV" id="NIV"
    value="<?php print($Fila[0]);?>">
    <br>
    <label>Marca</label>
        <input type="text" name="Marca" id="Marca"
        value="<?php print($Fila[1]);?>">    
        <br>
    <label>Linea</label>
        <input type="text" name="Linea" id="Linea"
        value="<?php print($Fila[2]);?>">
    <br>
    <label>Sublinea</label>
            <input type="text" name="Sublinea" id="Sublinea"
            value="<?php print($Fila[3]);?>">
            <br>
    <label>Color</label>
        <input type="text" name="Color" id="Color"
        value="<?php print($Fila[4]);?>">
        <br>
    <label>Cilindro</label>
        <input type="number" name="Cilindro" id="Cilindro"
        value="<?php print($Fila[5]);?>">
    <br>
    <label>Origen</label>
        <input type="text" name="Origen" id="Origen"
        value="<?php print($Fila[6]);?>">
        <br> <br>
    <label>Capacidad</label>
            <input type="number" name="Capacidad" id="Capacidad"
            value="<?php print($Fila[7]);?>">
            <br>
    <label>Puertas</label>
        <input type="number" name="Puertas" id="Puertas"
        value="<?php print($Fila[8]);?>">
        <br>
    <label>Asientos</label>
        <input type="number" name="Asientos" id="Asientos"
        value="<?php print($Fila[9]);?>">
    <br>
    <label>Combustible</label>
        <input type="number" name="Combustible" id="Combustible"
        value="<?php print($Fila[10]);?>">
        <br>
    <label>Transmision</label>
        <input type="text" name="Transmision" id="Transmision"
        value="<?php print($Fila[11]);?>">
    <label>Clase</label>
    <input type="number" name="Clase" id="Clase"
    value="<?php print($Fila[12]);?>">
    <br>
    <label>Tipo</label>
    <input type="number" name="Tipo" id="Tipo"
    value="<?php print($Fila[13]);?>">
    <br>
    <label>Uso</label>
    <input type="number" name="Uso" id="Uso"
    value="<?php print($Fila[14]);?>"
    >
    <br>
        <input type="submit">
    </form>
</html5>
