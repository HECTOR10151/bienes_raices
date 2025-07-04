<?php

function conectarDB(): mysqli {
    $db=mysqli_connect('localhost','root','root','bienesraices_crud');//conexion a la base de datos
    if(!$db){
        echo "Error no se pudo conectar a la base de datos";
        exit;//termina el script si no se conecta 
    }
    return $db;//retorna la conexion a la base de datos
}