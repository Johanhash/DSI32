<?php 

function Conectar(){

    $Server ="127.0.0.1";
    $Usuario ="root";
    $Pwd="";
    $BD="sistemadecontrolvehicular";

    $Con=mysqli_connect($Server,$Usuario,$Pwd,$BD); 
    return $Con; 

}

function Ejecutar($Con,$SQL){
    $ResultSet=mysqli_query($Con,$SQL);
    return $ResultSet;
}


function Procesar(){}

function Desconectar($Con){
    $R=mysqli_close($Con);
    return $R;
}

