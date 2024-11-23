<?php 
$Folio=$_GET['Folio'];
$SQL ="SELECT * FROM Verificaciones WHERE Folio='$Folio'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>


<html5>
    <form  method="post" action="UVerificaciones.php"> 
        <label>Folio</label>
        <input type="text" name="Folio" id="Folio"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Vehiculo</label>
            <input type="text" name="Vehiculo" id="Vehiculo"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Motivo</label>
        <input type="text" name="Motivo" id="Motivo"
        value="<?php print($Fila[2]);?>">    
    <br>
    <label>Semestre</label>
        <input type="text" name="Semestre" id="Semestre"
        value="<?php print($Fila[3]);?>">
    <br>
    <label>Vigencia</label>
            <input type="text" name="Vigencia" id="Vigencia"
            value="<?php print($Fila[4]);?>">
    <br>
    <label>FolioTarjeta</label>
        <input type="text" name="FolioTarjeta" id="FolioTarjeta"
        value="<?php print($Fila[5]);?>">    
    <br>
    <label>CentroVer</label>
        <input type="number" name="CentroVer" id="CentroVer"
        value="<?php print($Fila[5]);?>">
    <br>
    <input type="submit"> 
    </form>
</html5>