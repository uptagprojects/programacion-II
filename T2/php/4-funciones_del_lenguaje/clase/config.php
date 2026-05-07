<?php
const DEV_MODE = true;

 // Esta función solo se define si DEV_MODE es true
function mostrarErrores() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    echo "Modo de desarrollo activado: se mostrarán todos los errores.";
}

if(DEV_MODE) {
    mostrarErrores();
}


?>