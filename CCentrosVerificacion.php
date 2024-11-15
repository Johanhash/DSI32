<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="noCentro" required> No Centro<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="noLinea"> No Línea <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="tecnico"> Técnico <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="fechaExpediente"> Fecha Expediente <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="horaEntregado"> Hora Entregado <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="horaSalida"> Hora Salida <br>
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
        $SQL = "SELECT * FROM CentrosVerificacion WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>No Centro</th>
                <th>No Línea</th>
                <th>Técnico</th>
                <th>Fecha Expediente</th>
                <th>Hora Entregado</th>
                <th>Hora Salida</th>
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
            print "<a href='DCentrosVerificacion.php?NoCentro=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUCentrosVerificacion.php?NoCenntro=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";
    
        }

        print "</table>";
        Desconectar($Con);
    }
?>
