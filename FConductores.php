<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_cconductores.css">
    <title>Formulario de Conductores</title>
</head>
<body>
    <?php
    if (isset($_GET['mensaje'])) {
        echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center;'>
                " . htmlspecialchars($_GET['mensaje']) . "
              </div>";
    }
    ?>
    
    <h1>Registro de Conductores</h1>
    <form method="get" action="IConductores.php"> 
        <label for="ConductorID">Conductor</label>
        <input type="number" name="ConductorID" id="ConductorID">    

        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre">

        <label for="Apellido">Apellido</label>
        <input type="text" name="Apellido" id="Apellido">

        <label for="FechaNac">Fecha de nacimiento</label>
        <input type="date" name="FechaNac" id="FechaNac">    

        <label for="Domicilio">Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio">

        <label for="Telefono">Teléfono</label>
        <input type="number" name="Telefono" id="Telefono">

        <label for="TipoSangre">Grupo Sanguíneo</label>
        <select name="TipoSangre" id="TipoSangre"> 
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <label>Donador</label>
        <input type="radio" name="DonadorOrg" id="DonadorOrgSi" value="Si">SI
        <input type="radio" name="DonadorOrg" id="DonadorOrgNo" value="No">NO

        <input type="submit" value="Enviar"> 
    </form>
</body>
</html>
