<?php

session_start();

$_SESSION["usuario"] = "admin";

if (!isset($_SESSION["visitas"])) {
    $_SESSION["visitas"] = 0;
}
$_SESSION["visitas"]++;
echo "Has visitado esta página " . $_SESSION["visitas"] . " veces.";




$_SESSION = array(); // Vaciar todas las variables de sesión


session_destroy(); // Destruir la sesión completamente

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "admin") {
    echo "Bienvenido, admin.";
} else {
    echo "Acceso denegado.";
}

$_SESSION["tema"] = "oscuro";
$_SESSION["usuario"] = array(); // vaciar la variable de sesión "usuario" sin destruir la sesión completa

// Borrar la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}



