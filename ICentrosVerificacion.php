    <?php
 $No_Centro =$_GET['No_Centro'];
 $No_Linea =$_GET['No_Linea'];
 $Tecnico =$_GET['Tecnico'];
 $FechaExp =$_GET['FechaExp'];
 $HoraEntrada =$_GET['HoraEntrada'];
 $HoraSalida =$_GET['HoraSalida'];


    $SQL ="INSERT INTO CentrosVerificacion (NoCentro,NoLinea,Tecnico,FechaExp,HoraEntrada,HoraSalida)
    VALUES('$No_Centro','$No_Linea','$Tecnico','$FechaExp','$HoraEntrada','$HoraSalida')";

   /* print($SQL)*/;

   
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