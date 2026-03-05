<?php
$numeros = [4, 2, 8, 6];
$saludo = "Hola";

$saludar = function ($nombre) use ($saludo) {
    echo "$saludo, $nombre!";
};

$saludar("Mundo");
?>