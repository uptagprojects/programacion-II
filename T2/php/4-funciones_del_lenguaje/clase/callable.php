<?php


function saludar($nombre) {
    echo "Hola, $nombre!";
}


function saludar_dev($nombre) {
    echo "Hola, $nombre! (Modo Debug)";
}

function despedir($nombre) {
    echo "Adiós, $nombre!";
}









function emitMessage(string $nombre, $fn = "saludar") {
    if(!function_exists($fn)) {
        return ;
    }
    $fn($nombre);
    echo "\n";
}


?>