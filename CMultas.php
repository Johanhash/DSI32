<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="folio" required> Folio <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="fecha"> Fecha <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Lugar"> Lugar <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Propietario">Propietario<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Nombre"> Nombre <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Domicilio"> Domicilio <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Vehiculo"> Vehiculo  <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Motivo"> Motivo <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="objetoRetenido"> Objeto Retenido <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="solucion"> Solución <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Oficial"> Oficial <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="LugarPago"> Lugar de pago <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="FolioVerificacion"> Folio de verificacion <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="NoLicencia"> No.Licencia <br>
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
        $SQL = "SELECT * FROM Multas WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>Folio</th>
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Propietario</th>
                <th>Nombre</th>
                <th>Domicilio</th>
                <th>Vehiculo</th>
                <th>Motivo</th>
                <th>Objeto Retenido</th>
                <th>Solucion</th>
                <th>Oficial</th>
                <th>Lugar de pago</th>
                <th>Folio verificacion</th>
                <th>No.Licencia</th>
                <th>Folio de tarjeta</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
               </tr>"
            );

        $NFila = mysqli_num_rows($ResultSet);
        $NColumnas = mysqli_field_count($Con);

        for ($i = 0; $i < $NFila; $i++) {
            $Fila = mysqli_fetch_row($ResultSet);
            print("<tr>");
            for ($j = 0; $j < $NColumnas; $j++) {
                print("<td>" . $Fila[$j] . "</td>");
            }    

            print "<td>";
            print "<a href='DMultas.php?Folio=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUMultas.php?Folio=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";
        }

        print("</table>");
        Desconectar($Con);
    }
?>
