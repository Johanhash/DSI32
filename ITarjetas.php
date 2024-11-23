<?php

$Folio =$_POST['Folio'];
$rfcPropietario =$_POST['rfcPropietario'];
$Vigencia =$_POST['Vigencia'];
$FechaExp =$_POST['FechaExp'];
$OficinaExp =$_POST['OficinaExp'];
$Movimiento =$_POST['Movimiento'];
$rfcPropietario =$_POST['rfcPropietario'];
$NIV =$_POST['NIV'];
$PropietarioID =$_POST['PropietarioID'];
$VehiculoID =$_POST['VehiculoID'];



/* IMPRESION

    print ("Folio: " .$Folio);
    print("<br>"); 
    print ("Vigencia: " .$Vigencia);
    print("<br>"); 
    print ("FechaExp: " .$FechaExp);
    print("<br>"); 
    print ("OficinaExp: " .$OficinaExp);
    print("<br>"); 
    print ("Movimiento: " .$Movimiento);
    print("<br>"); 
    print ("rfcPropietario: " .$rfcPropietario);
    print("<br>"); 
    print ("NIV: " .$NIV);
    print("<br>"); */
    
    $SQL ="INSERT INTO Tarjetas VALUES('$Folio','$rfcPropietario','$Vigencia','$FechaExp','$OficinaExp','$Movimiento','$NIV','$PropietarioID','$VehiculoID')";
    /*($SQL)*/;


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


/*
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