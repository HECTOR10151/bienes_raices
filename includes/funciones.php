<?php

    require 'app.php';//Requiere el archivo app.php que contiene las constantes TEMPLATES_URL y FUNCIONES_URL

function incluirTemplate(string $nombre, bool $inicio=false){//funcion para incluir las plantillas de header y footer 
   // include "includes/templates/${nombre}.php";//nos ayuda a incluir las plantillas de header y footer
   include TEMPLATES_URL . "/${nombre}.php";//nos ayuda a incluir las plantillas de header y footer y hace lo mismo que la linea de arriba
}

?>