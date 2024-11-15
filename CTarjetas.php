<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="folio" required> Folio<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Vigencia"> Vigencia <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="FechaExpedicion"> Fecha Expedicion <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="OficinaExp"> Oficina Expedicion <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="movimiento"> Movimiento <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="rfcPropietario"> RFC Propietario <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="NIV"> NIV <br>
        <input type="submit" value="Buscar">
    </form>
</html>


<?php
    if(isset($_GET['Criterio']))
    {
        $Criterio = $_GET['Criterio'];
        $Atributo = $_GET['Atributo'];

        include ("Controlador.php");

        $Con = Conectar();
        $SQL = "SELECT * FROM Tarjetas WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <<th>Folio</th>
                <th>Vigencia</th>
                <th>Fecha Expedicion</th>
                <th>Oficina Expedicion</th>
                <th>Movimiento</th>
                <th>RFC Propietario</th>
                <th>NIV</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
               </tr>");

        $NFila = mysqli_num_rows($ResultSet);
        $NColumnas = mysqli_field_count($Con);

        for ($i = 0; $i < $NFila; $i++) {
            $Fila = mysqli_fetch_row($ResultSet);
            print("<tr>");
            for ($j = 0; $j < $NColumnas; $j++) {
                print("<td>" . $Fila[$j] . "</td>");
            } 
            print "<td>";
            print "<a href='DTarjetas.php?Folio=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUTarjetas.php?Folio=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";

        }
            print("</tr>");
            
        print("</table>");
        Desconectar($Con);}
?>

