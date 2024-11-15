<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="lineaCaptura" required> Línea Captura<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="importe"> Vehiculo <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="transaccion"> Transacción <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="fechaLimite"> Fecha Límite <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="importe"> Importe <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="tipoPago"> Tipo Pago <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="fechaActual"> Fecha Actual <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="hora"> Hora <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="FolioTarjeta"> Folio Tarjeta <br>
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
        $SQL = "SELECT * FROM Tenencias WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>Línea Captura</th>
                <th>Vehiculo</th>
                <th>Transaccion</th>
                <th>Fecha limite</th>
                 <th>Importe</th>
                <th>Tipo Pago</th>
                <th>Fecha Actual</th>
                <th>Hora</th>
                <th>Folio Tarjeta</th>
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
            print "<a href='DTenencias.php?LineaCaptura=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUTenencias.php?LineaCaptura=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";
        }

        print("</table>");
        Desconectar($Con);
    }
?>
