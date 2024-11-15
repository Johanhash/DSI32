<html>
    <form>
        <label>Criterio</label>
        <input type="text" Id="Criterio" Name="Criterio"> <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="conductorId" required >conductorId<br>
        <input type="radio" Id="Atributo" Name="Atributo" value="nombre"> nombre <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="fechaNac">fechaNac <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="TipoSangre"> TipoSangre <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="telefono"> Telefono <br>
        <input type="radio" Id="Atributo" Name="Atributo" value="domicilio"> domicilio <br>
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
        $SQL = "SELECT * FROM Conductores WHERE $Atributo LIKE '%$Criterio%'";
        $ResultSet = Ejecutar($Con, $SQL);

        print("<table border='1' cellpadding='10' cellspacing='0'>");
        print("<tr>
                <th>ConductorID</th>
                <th>Nombre</th>
                <th>Fecha Nacimiento</th>
                <th>Domicilio</th>   
                <th>Teléfono</th>
                <th>Tipo Sanguineo</th>
                 <th>Donador</th>
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
            print "<a href='DConductores.php?ConductorID=" . $Fila[0] . "'>
            <input type='submit' value='Eliminar'></a>";
            print "</td>";
            print "</td>";
        
            print "<td>";
            print "<a href='FUConductores.php?ConductorID=" . $Fila[0] . "'>
            <input type='submit' value='Actualizar'></a>";
            print "</td>";}

        print("</table>");

        Desconectar($Con);}
    
?>


