<?php
//Importar la conexion a la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

//Crear email y password
    $email = "correo@correo.com";
    $password = "123456";

    //Hash los datos para la base de datos y verificar la seguridad
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    var_dump($passwordHash); //Para verificar la conexion a la base de datos

//Query para crear el usuario
    // $query="INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}')";
    //echo $query;
    //exit;

//Agregar a la base de datos
    // mysqli_query($db, $query);