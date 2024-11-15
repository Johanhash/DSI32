<?php
    $Folio =$_POST['Folio'];
    $Fecha =$_POST['Fecha'];
    $Lugar =$_POST['Lugar'];
    $Propietario =$_POST['Propietario'];
    $Nombre =$_POST['Nombre'];
    $Domicilio =$_POST['Domicilio'];
    $Vehiculo =$_POST['Vehiculo'];
    $Motivo =$_POST['Motivo'];
    $ObjRetenido =$_POST['ObjRetenido'];
    $Solucion =$_POST['Solucion'];
    $Oficial =$_POST['Oficial'];
    $LugarPago =$_POST['LugarPago'];
    $FolioVerifcacion =$_POST['FolioVerifcacion'];
    $NoLicencia =$_POST['NoLicencia'];   
    $FolioTarjeta =$_POST['FolioTarjeta'];



/* IMPRESION
    print ("Folio: " .$Folio);
    print("<br>"); 
    print ("Fecha: " .$Fecha);
    print("<br>"); 
    print ("Lugar: " .$Lugar);
    print("<br>"); 
    print ("Propietario: " .$Propietario);
    print("<br>"); 
    print ("Nombre: " .$Nombre);
    print("<br>"); 
    print ("Domicilio: " .$Domicilio);
    print("<br>"); 
    print ("Vehiculo: " .$Vehiculo);
    print("<br>"); 
    print ("Motivo: " .$Motivo);
    print("<br>"); 
    print ("ObjRetenido: " .$ObjRetenido);
    print("<br>"); 
    print ("Solucion: " .$Solucion);
    print("<br>"); 
    print ("Oficial: " .$Oficial);
    print("<br>"); 
    print ("LugarPago: " .$LugarPago);
    print("<br>"); 
    print ("FolioVerifcacion: " .$FolioVerifcacion);
    print("<br>"); 
    print ("NoLicencia: " .$NoLicencia);
    print("<br>"); 
    print ("FolioTarjeta: " .$FolioTarjeta);
    print("<br>"); 
    */

    $SQL ="INSERT INTO Multas VALUES('$Folio','$Fecha','$Lugar','$Propietario','$Nombre','$Domicilio','$Vehiculo','$Motivo','$ObjRetenido','$Solucion','$Oficial','$LugarPago','$FolioVerifcacion','$NoLicencia','$FolioTarjeta')";
    /*print($SQL)*/;



//Enviar datos al controlador 
include("Controlador.php");
$Con =Conectar();
$ResultSet=Ejecutar($Con,$SQL);
if ($ResultSet == 1){
    print("Registro insertado");
}else{
    print("Error");
}
Desconectar($Con); 



/*Enviar SQL al SMBD  con = puente de comunicacion
$Servidor ="127.0.0.1";
$User="root";
$Password="";
$BD="SistemaDeControlVehicular"; 
$Con=mysqli_connect($Servidor, $User,$Password,$BD); 
$ResultSet=mysqli_query($Con,$SQL); 
if ($ResultSet==1){
    print("Instruccion ejecutada");
}else{
    print(mysqli_error($Con));
}
mysqli_close($Con); */

?>


