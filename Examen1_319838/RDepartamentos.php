<?php

$ClaveDept =$_GET['ClaveDept'];
$Nombre=$_GET['Nombre'];
$Status=$_GET['Status'];



/* IMPRESION*/
    print ("Clave: " .$ClaveDept);
    print("<br>"); 
    print ("Nombre: " .$Nombre);
    print("<br>"); 
    print ("Salario: " .$Status);
    print("<br>"); 
   
    $SQL ="INSERT INTO Departamentos VALUES('$ClaveDept','$Nombre','$Status')";
    print($SQL);

    $Servidor ="127.0.0.1";
    $User="root";
    $Password="";
    $BD="Examen1"; 
    $Con=mysqli_connect($Servidor, $User,$Password,$BD); 
    $ResultSet=mysqli_query($Con,$SQL); 
    if ($ResultSet==1){
        print("Instruccion ejecutada");
    }else{
        print(mysqli_error($Con));
    }
    mysqli_close($Con); 
?>
