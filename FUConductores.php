<?php 
$ConductorID=$_GET['ConductorID'];
$SQL ="SELECT * FROM Conductores WHERE ConductorID='$ConductorID'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>
<html5>
    <form  method="get"  action="UConductores.php"> 
        <label>Conductor ID</label>
        <input type="number" name="ConductorID" id="ConductorID"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Nombre</label>
            <input type="text" name="Nombre" id="Nombre"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Fecha_nacimiento</label>
        <input type="date" name="FechaNac" id="FechaNac"
        value="<?php print($Fila[2]);?>">    
    <br>
    <label>Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio"
        value="<?php print($Fila[3]);?>">
    <br>
    <label>Telefono</label>
        <input type="number" name="Telefono" id="Telefono"
        value="<?php print($Fila[4]);?>">
    <br>
    <label>Grupo Sanguineo</label>
    <select name="TipoSangre" id="TipoSangre"
    value="<?php print($Fila[5]);?>"> 
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        </select>
    <br>
    <label>Donador</label>
    <input type="radio" name="DonadorOrg" id="DonadorOrg" value="Si" value="<?php print($Fila[6]);?>">SI
    <input type="radio" name="DonadorOrg" id="DonadorOrg" value="No" value="<?php print($Fila[6]);?>">NO
    <br>   
    <input type="submit"> 
    </form>

</html5>
