<?php 
$PropietarioID=$_GET['PropietarioID'];
$SQL ="SELECT * FROM Propietarios WHERE PropietarioID='$PropietarioID';";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<html5>
    <form  method="GET" action="UPropietarios.php"> 
        
    <label>ID Propietario</label>
            <input type="number" name="PropietarioID" id="PropietarioID"
            value="<?php print($Fila[0]);?>">
    <br>
    <label>RFC </label>
        <input type="text" name="RFC" id="RFC"
        value="<?php print($Fila[1]);?>">    
    <br>
    <label>Nombre</label>
            <input type="text" name="Nombre" id="Nombre"
            value="<?php print($Fila[2]);?>">
    <br>
    <label>Localidad</label>
        <input type="text" name="Localidad" id="Localidad"
        value="<?php print($Fila[3]);?>">    
    <br>
    <label>Municipio</label>
        <input type="text" name="Municipio" id="Municipio"
        value="<?php print($Fila[4]);?>">
    <br>
    <input type="submit"> 
    </form>

</html5>
