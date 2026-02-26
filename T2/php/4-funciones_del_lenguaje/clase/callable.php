<?php

require_once 'config.php';

function saludar($nombre) {
    echo "Hola, $nombre!";
}

function saludar_dev($nombre) {
    echo "Hola, $nombre! (Modo Debug)";
}

function despedir($nombre) {
    echo "Adiós, $nombre!";
}




function emitMessage($nombre, $fn = "saludar") {
    $fn($nombre);
    echo "\n";
}

emitMessage("Juan"); // Llama a saludar("Juan")
emitMessage("María", "saludar_dev"); // Llama a saludar_dev("
emitMessage("Pedro", "despedir"); // Llama a despedir("Pedro")









?>