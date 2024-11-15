<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Folio" required> Folio<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Vehiculo"> Vehiculo <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="motivo"> Motivo <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="semestre"> Semestre <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="vigencia"> Vigencia <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="tarjetaCirculacionID"> Tarjeta Circulación ID <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="centroVerificacionID"> Centro Verificación ID <br>
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
        $SQL = "SELECT * FROM Verificaciones WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>Folio</th>
                <th>Vehículo</th>
                <th>Motivo</th>
                <th>Semestre</th>
                <th>Vigencia</th>
                <th>Tarjeta Circulación ID</th>
                <th>Centro Verificación ID</th>
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
            print "<a href='DVerificaciones.php?Folio=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUVerificaciones.php?Folio=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";
        }

        print("</table>");
        Desconectar($Con);
    }
    
?>


