<?php

$Folio=$_GET['Folio'];
$SQL ="SELECT * FROM Tarjetas WHERE Folio='$Folio'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>
<html5>
    <form  method="post" action="UTarjetas.php"> 

    <label>Folio Tarjeta Circulacion</label>
        <input type="text" name="Folio" id="Folio"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Vigencia</label>
        <input type="text" name="Vigencia" id="Vigencia"
        value="<?php print($Fila[1]);?>">    
        <br>
    <label>Fecha_Expedicion</label>
        <input type="date" name="FechaExp" id="FechaExp"
        value="<?php print($Fila[2]);?>">
    <br>
    <label>Oficina Expedicion</label>
            <input type="number" name="OficinaExp" id="OficinaExp"
            value="<?php print($Fila[3]);?>">
            <br>
    <label>Movimiento</label>
        <input type="text" name="Movimiento" id="Movimiento"
        value="<?php print($Fila[4]);?>">
        <br>
    <label>RFC Propietario</label>
        <input type="text" name="rfcPropietario" id="rfcPropietario"
        value="<?php print($Fila[5]);?>">
    <br>
    <label>NIV</label>
        <input type="text" name="NIV" id="NIV"
        value="<?php print($Fila[6]);?>">
        <br>
        <input type="submit">
    </form>
</html5>
