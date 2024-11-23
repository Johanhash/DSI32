<?php 
$NoCentro=$_GET['NoCentro'];
$SQL ="SELECT * FROM CentrosVerificacion WHERE NoCentro='$NoCentro'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<html5>

    <form  method="get" action="UCentrosVerificacion.php">
        <label>Numero de centro</label>
        <input type="int" name="NoCentro" id="NoCentro"  
        value="<?php print($Fila[0]);?>">  
    <br>
    <label>Numero de linea</label>
            <input type="text" name="NoLinea" id="NoLinea"
            value="<?php print($Fila[1]);?>">    
    <br>
    <label>Tecnico</label>
        <input type="text" name="Tecnico" id="Tecnico"  
        value="<?php print($Fila[2]);?>"> 
    <br>
    <label>Fecha_Expedicion</label>
        <input type="date" name="FechaExp" id="FechaExp"
                  value="<?php print($Fila[3]);?>">
                  <br>
    <label>Hora de entrada</label>
        <input type="time" name="HoraEntrada" id="HoraEntrada"
        value="<?php print($Fila[4]);?>">
    <br>
    <label>Hora de salida</label>
        <input type="time" name="HoraSalida" id="HoraSalida"
        value="<?php print($Fila[5]);?>">
    <br>
    <input type="submit"> 
    </form>

</html5>
