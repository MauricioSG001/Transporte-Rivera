<?php

session_start();         // Iniciar o continuar sesión
session_unset();         // Borra todas las variables de sesión
session_destroy();       // Destruye la sesión

// Redirige al usuario al login
header("Location: ../../View/inicioSesion/viewInicioSesion.php");
exit();

?>