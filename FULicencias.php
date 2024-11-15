<?php 
$NoLicencia=$_GET['NoLicencia'];
$SQL ="SELECT * FROM Licencias WHERE NoLicencia='$NoLicencia'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>


<html5>
    <form  method="get"  action="ULicencias.php"> 
    <label>No_Licencias</label>
        <input type="number" name="NoLicencia" id="NoLicencia"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Foto</label>
        <input type="file" name="Foto" id="Foto"
        value="<?php print($Fila[1]);?>">    
        <br>
        <label>Nombre</label>
            <input type="text" name="Nombre" id="Nombre"
            value="<?php print($Fila[2]);?>">
            <br>
    <label>Tipo_Licencia</label>
        <select name="TipoLicencia" id="TipoLicencia"
        value="<?php print($Fila[3]);?>"> 
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>
        <br>
    <label>Fecha_Expedicion</label>
        <input type="date" name="FechaExp" id="FechaExp"
        value="<?php print($Fila[4]);?>">
        <br>
    <label>Observacion</label>
        <input type="text" name="Observacion" id="Observacion"
        value="<?php print($Fila[5]);?>">
    <br>
    <label>Antiguedad</label>
        <input type="number" name="Antiguedad" id="Antiguedad"
        value="<?php print($Fila[6]);?>">
    <br>
    <label>Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio"
        value="<?php print($Fila[7]);?>">
    <br>
    <label>Restriccion</label>
        <input type="text" name="Restriccion" id="Restriccion"
        value="<?php print($Fila[8]);?>">
    <br>
    <label>Vigencia</label>
        <input type="date" name="Vigencia" id="Vigencia"
        value="<?php print($Fila[9]);?>">
    <br>
    <label>Conductor</label>
        <input type="number" name="Conductor" id="Conductor"
        value="<?php print($Fila[10]);?>">
    <br>
        <input type="submit">
    </form>
    
</html5>
