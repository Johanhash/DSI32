<?php
    $NoLicencia=$_REQUEST['NoLicencia'];
    $Foto=$_REQUEST['Foto'];
    $Nombre=$_REQUEST['Nombre'];
    $TipoLicencia=$_REQUEST['TipoLicencia'];
    $FechaExp=$_REQUEST['FechaExp']; 
    $Observacion=$_REQUEST['Observacion'];
    $Antiguedad =$_REQUEST['Antiguedad'];
    $Domicilio =$_REQUEST['Domicilio'];
    $Restriccion =$_REQUEST['Restriccion'];
    $Vigencia =$_REQUEST['Vigencia'];
    $Conductor =$_REQUEST['Conductor'];


    $SQL ="INSERT INTO Licencias VALUES('$NoLicencia','$Foto','$Nombre',
    '$TipoLicencia','$FechaExp','$Observacion',
    '$Antiguedad','$Domicilio',
    '$Restriccion','$Vigencia','$Conductor')";
    /*print($SQL)*/;


//Enviar datos al controlador 
include("Controlador.php"); 
$Con=Conectar();
$ResultSet=Ejecutar($Con,$SQL);
if ($ResultSet == 1){
    print("Registro insertado");
}else{
    print("Error"); 
}
Desconectar($Con); 


   
?>
