<?php 

$LineaCaptura=$_GET['LineaCaptura'];
$SQL ="SELECT * FROM Tenencias WHERE LineaCaptura='$LineaCaptura'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<html5>
    <form  method="get" action="UTenencias.php"> 
        <label>Linea de Captura</label>
        <input type="text" name="LineaCaptura" id="LineaCaptura"
        value="<?php print($Fila[0]);?>">    
    <br>
    <label>Vehiculo</label>
            <input type="text" name="Vehiculo" id="Vehiculo"
            value="<?php print($Fila[1]);?>">
    <br>
    <label>Transaccion</label>
        <input type="text" name="Transaccion" id="Transaccion"
        value="<?php print($Fila[2]);?>">    
    <br>
    <label>Fecha Limite</label>
        <input type="date" name="FechaLimite" id="FechaLimite"
        value="<?php print($Fila[3]);?>">
    <br>
    <label>Importe</label>
    <input type="number" name="Importe" id="Importe"
    value="<?php print($Fila[4]);?>">    
    <br>
    <label>Tipo de pago</label>
            <input type="text" name="TipoPago" id="TipoPago"
            value="<?php print($Fila[5]);?>">
    <br>
    <label>Fecha actual</label>
        <input type="date" name="FechaActual" id="FechaActual"
        value="<?php print($Fila[6]);?>">
    <br>
<label>Hora</label>
    <input type="time" name="Hora" id="Hora"
    value="<?php print($Fila[7]);?>">
<br>
<label>FolioTarjeta</label>
<input type="text" name="FolioTarjeta" id="FolioTarjeta"
value="<?php print($Fila[8]);?>">    
<br>
    <input type="submit"> 
    </form>
</html5>
