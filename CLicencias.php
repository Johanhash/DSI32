<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio">
        <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="NoLicencia" required> No Licencia<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Foto"> Foto <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Nombre"> Nombre <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Licencia"> Licencia <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="FechaExp"> Fecha_Exp <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Observacion"> Observación <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Antiguedad"> Antigüedad <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Domicilio"> Domicilio <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Restriccion"> Restriccion <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Vigencia"> Vigencia <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="Conductor"> Conductor <br>
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
        $SQL = "SELECT * FROM Licencias WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>No_Licencia</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Tipo_Licencia</th>
                <th>Fecha_Exp</th>
                <th>Observación</th>
                <th>Antigüedad</th>
                <th>Domicilio</th>
                <th>Restricción</th>
                <th>Vigencia</th>
                <th>Conductor</th>
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
            print "<a href='DLicencias.php?NoLicencia=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FULicencias.php?NoLicencia=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";
        }
    
        print("</table>");

        Desconectar($Con);}
?>

