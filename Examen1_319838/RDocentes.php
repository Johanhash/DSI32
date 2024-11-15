<?php

$Clave =$_GET['Clave'];
$Nombre=$_GET['Nombre'];
$Salario=$_GET['Salario'];
$Isr=$_GET['Isr'];
$Sexo =$_GET['Sexo'];
$Dept =$_GET['Dept'];
$FechaIngreso=$_GET['Fecha'];



/* IMPRESION*/
    print ("Clave: " .$Clave);
    print("<br>"); 
    print ("Nombre: " .$Nombre);
    print("<br>"); 
    print ("Salario: " .$Salario);
    print("<br>"); 
    print ("ISR: " .$Isr);
    print("<br>"); 
    print ("Sexo: " .$Sexo);
    print("<br>"); 
    print ("Departamento: " .$Dept);
    print("<br>"); 
    print ("Fecha: " .$FechaIngreso);
    print("<br>"); 

    $SQL ="INSERT INTO Docentes (Clave,Nombre,Salario,ISR,Sexo,Dept,FechaIngreso)
    VALUES('$Clave','$Nombre','$Salario','$Isr','$Sexo','$Dept','$FechaIngreso')";
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
