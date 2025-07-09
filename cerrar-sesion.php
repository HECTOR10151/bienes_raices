<?php
// Iniciar sesión
session_start();
// Destruir la sesión
$_SESSION = []; // Vaciar la sesión
header('Location: /'); // Redireccionar al usuario a la página de inicio