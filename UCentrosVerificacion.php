    <?php
 $NoCentro =$_GET['NoCentro'];
 $NoLinea =$_GET['NoLinea'];
 $Tecnico =$_GET['Tecnico'];
 $FechaExp =$_GET['FechaExp'];
 $HoraEntrada =$_GET['HoraEntrada'];
 $HoraSalida =$_GET['HoraSalida'];

    $SQL ="UPDATE CentrosVerificacion 
    SET NoLinea='$NoLinea',Tecnico='$Tecnico',
    FechaExp='$FechaExp',HoraEntrada='$HoraEntrada',
    HoraSalida='$HoraSalida'
   WHERE  NoCentro='$NoCentro'";

   /* print($SQL)*/

   
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