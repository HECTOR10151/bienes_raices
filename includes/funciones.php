<?php

    require 'app.php';//Requiere el archivo app.php que contiene las constantes TEMPLATES_URL y FUNCIONES_URL

    function incluirTemplate(string $nombre, bool $inicio=false){//funcion para incluir las plantillas de header y footer 
    // include "includes/templates/${nombre}.php";//nos ayuda a incluir las plantillas de header y footer
    include TEMPLATES_URL . "/${nombre}.php";//nos ayuda a incluir las plantillas de header y footer y hace lo mismo que la linea de arriba
    }

    function estaAuntenticado():bool{
        session_start();//iniciar la sesion
        //Validar si el usuario esta autenticado
        $auth = $_SESSION['login']; //verificar si la sesion login esta iniciada y es verdadera
        if($auth){//verificar si la sesion login esta iniciada y es verdadera
            return true;//retornar verdadero si el usuario esta autenticado
        }
        return false;//retornar falso si el usuario no esta autenticado
    }
?>