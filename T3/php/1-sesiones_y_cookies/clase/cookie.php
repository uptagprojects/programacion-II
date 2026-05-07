<?php

setcookie("usuario", "admin", time() + 3600); // La cookie expirará en 1 hora

setcookie("usuario", "admin", time() - 3600); // Eliminar la cookie estableciendo una fecha de expiración en el pasado

$opciones = [
    'expires' => time() + 86400, // 1 día
    'path' => '/',
    'domain' => '',
    'secure' => true,     // Solo transmitir por HTTPS
    'httponly' => true,   // No accesible desde JS (protección XSS)
    'samesite' => 'Strict' // Protección CSRF
];

setcookie("usuario", "admin", $opciones);

if (isset($_COOKIE["usuario"])) {
    echo "El valor de la cookie 'usuario' es: " . $_COOKIE["usuario"];
} else {
    echo "La cookie 'usuario' no está establecida.";
}