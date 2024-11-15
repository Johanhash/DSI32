<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="rfc" required> RFC<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="nombre"> Nombre <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="localidad"> Localidad <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="municipio"> Municipio <br>
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
        $SQL = "SELECT * FROM Propietarios WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Localidad</th>
                <th>Municipio</th>
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
            print "<a href='DPropietarios.php?RFC=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUPropietarios.php?RFC=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";
        }

        print("</table>");
        Desconectar($Con);
    }
?>


