<?php 
$Folio=$_GET['Folio'];
$SQL ="SELECT * FROM Multas WHERE Folio='$Folio'";
include("Controlador.php"); 
$Con=Conectar ();
$ResultSet=Ejecutar($Con,$SQL);
$Fila=mysqli_fetch_row($ResultSet);
Desconectar($Con);
?>

<html5>
    <form  method="post"   action="UMultas.php"> 
        <label>Folio Multas</label>
       <input type="text" name="Folio" id="Folio" 
       value="<?php print($Fila[0]);?>">
       <br>
       <label>Fecha</label>
           <input type="date" name="Fecha" id="Fecha"
           value="<?php print($Fila[1]);?>">    
           <br>
       <label>Lugar</label>
           <input type="text" name="Lugar" id="Lugar"
           value="<?php print($Fila[2]);?>">
       <br>
       <label>Propietario</label>
               <input type="text" name="Propietario" id="Propietario"
               value="<?php print($Fila[3]);?>">
               <br>
       <label>Nombre</label>
           <input type="text" name="Nombre" id="Nombre"
           value="<?php print($Fila[4]);?>">
           <br>
       <label>Domicilio</label>
           <input type="text" name="Domicilio" id="Domicilio"
           value="<?php print($Fila[5]);?>">
       <br>
       <label>Vehiculo</label>
           <input type="text" name="Vehiculo" id="Vehiculo"
           value="<?php print($Fila[6]);?>">
           <br> 
       <label>Motivo</label>
               <input type="text" name="Motivo" id="Motivo"
               value="<?php print($Fila[7]);?>">
               <br>
       <label>Objeto_Retenido</label>
           <input type="text" name="ObjRetenido" id="ObjRetenido"
           value="<?php print($Fila[8]);?>">
           <br>
       <label>Solucion</label>
           <input type="text" name="Solucion" id="Solucion"
           value="<?php print($Fila[9]);?>">
       <br>
       <label>Oficial       </label>
           <input type="text" name="Oficial" id="Oficial"
           value="<?php print($Fila[10]);?>">
           <br>
       <label>Lugar de pago</label>
           <input type="text" name="LugarPago" id="LugarPago"
           value="<?php print($Fila[11]);?>">
           <br>
       <label>Folio de verificacion</label>
       <input type="text" name="FolioVerifcacion" id="FolioVerifcacion"
       value="<?php print($Fila[12]);?>">
       <br>
       <label>Numero de Licencia</label>
       <input type="number" name="NoLicencia" id="NoLicencia"
       value="<?php print($Fila[13]);?>">
       <br>
       <label>Folio de FolioTarjeta</label>
       <input type="number" name="FolioTarjeta" id="FolioTarjeta"
       value="<?php print($Fila[14]);?>">
       <br>
           <input type="submit">
       </form>
   </html5>