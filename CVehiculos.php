<html>
    
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"><br>
        <input type="radio" Id="Atributo" Name="Atributo" value="NIV" required> NIV<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="marca"> Marca <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="linea"> Línea <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="sublinea"> Sublínea <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="color"> Color <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="cilindraje"> Cilindraje <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="sublinea"> Sub-línea <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="origen"> Origen <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="capacidad"> Capacidad <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="puerta"> Puertas <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="asiento"> Asientos <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="combustible"> Combustible <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="transmision"> Transmisión <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="clase"> Clase <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="tipo"> Tipo <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="uso"> Uso <br>
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
        $SQL = "SELECT * FROM Vehiculos WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>NIV</th>
                <th>Marca</th>
                <th>Línea</th>
                <th>Sublínea</th>
                <th>Color</th>
                <th>Cilindraje</th>
                <th>Origen</th>
                <th>Capacidad</th>
                <th>Puertas</th>
                <th>Asientos</th>
                <th>Combustible</th>
                <th>Transmisión</th>
                <th>Clase</th>
                <th>Tipo</th>
                <th>Uso</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
               </tr>");

        $NFila = mysqli_num_rows($ResultSet);
        $NColumnas = mysqli_field_count($Con);

        for ($i = 0; $i < $NFila; $i++) {
            $Fila = mysqli_fetch_row($ResultSet);
            print("<tr>");
            for ($j = 0; $j < $NColumnas; $j++) {
                print("<td>" . $Fila[$j] . "</td>");}
            
                print "<td>";
                print "<a href='DVehiculos.php?NIV=" . $Fila[0] . "'>
                <input type='submit' value='Eliminar'></a>";
                print "</td>";
                print "</td>";
            
                print "<td>";
                print "<a href='FUVehiculos.php?NIV=" . $Fila[0] . "'>
                <input type='submit' value='Actualizar'></a>";
                print "</td>";
            }

        print("</table>");
        Desconectar($Con);
    }
?>

