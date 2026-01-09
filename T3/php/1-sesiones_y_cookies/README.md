# 🍪 Sesiones y Cookies en PHP

El protocolo HTTP es **sin estado** (*stateless*), lo que significa que el servidor no recuerda al usuario entre diferentes peticiones. Para solucionar esto y mantener la persistencia de datos (como un usuario logueado o un carrito de compras), utilizamos **Cookies** y **Sesiones**.

---

## 🍪 Cookies

Las cookies son pequeños archivos de texto que el servidor envía al navegador del usuario. El navegador las almacena y las envía de vuelta al servidor en cada petición subsiguiente. Son ideales para guardar preferencias del usuario o identificadores de rastreo.

### 1. Crear una Cookie (`setcookie`)

Para definir una cookie se utiliza la función `setcookie()`. Esta función debe llamarse **antes** de enviar cualquier salida HTML al navegador.

**Ejemplo Básico:**
```php
<?php
// Expira al cerrar el navegador
setcookie("usuario", "JuanPerez");
?>
```

**Ejemplo con expiración:**
```php
<?php
// Expira en 1 hora (3600 segundos)
setcookie("idioma", "es", time() + 3600);
?>
```

**Configuración Segura:**
Es una buena práctica configurar opciones de seguridad como `Secure` y `HttpOnly` para mitigar ataques XSS.

```php
<?php
// Cookie segura, accesible solo por HTTPS y no accesible vía JavaScript
$opciones = [
    'expires' => time() + 86400, // 1 día
    'path' => '/',
    'domain' => '',
    'secure' => true,     // Solo transmitir por HTTPS
    'httponly' => true,   // No accesible desde JS (protección XSS)
    'samesite' => 'Strict' // Protección CSRF
];
setcookie("token_auth", "a1b2c3d4e5", $opciones);
?>
```

### 2. Leer una Cookie

PHP almacena las cookies recibidas en la superglobal `$_COOKIE`.

**Ejemplo:**
```php
<?php
if (isset($_COOKIE["usuario"])) {
    echo "Bienvenido de nuevo, " . htmlspecialchars($_COOKIE["usuario"]);
} else {
    echo "Bienvenido, invitado.";
}
?>
```

### 3. Borrar una Cookie

Para borrar una cookie, simplemente se debe volver a definir con una fecha de expiración en el **pasado**.

**Ejemplo:**
```php
<?php
// Establecer la fecha de expiración en hace una hora
setcookie("usuario", "", time() - 3600, "/");
?>
```

---

## 🔐 Sesiones

A diferencia de las cookies, las **sesiones** almacenan la información en el **servidor**. El navegador solo guarda un identificador (ID de sesión) usualmente en una cookie llamada `PHPSESSID`. Son más seguras para guardar datos sensibles.

### 1. Iniciar una Sesión

El primer paso siempre es iniciar o reanudar la sesión existente con `session_start()`. Al igual que las cookies, esto debe ir al principio del script.

```php
<?php
session_start();
// Ahora tenemos acceso a $_SESSION
?>
```

### 2. Variables de Sesión

Las variables se almacenan en la superglobal `$_SESSION`.

**Ejemplo Básico:**
```php
<?php
session_start();
$_SESSION["rol"] = "admin";
echo "Rol del usuario: " . $_SESSION["rol"];
?>
```

**Ejemplo de Contador de visitas:**
```php
<?php
session_start();
if (!isset($_SESSION["visitas"])) {
    $_SESSION["visitas"] = 0;
}
$_SESSION["visitas"]++;
echo "Has visitado esta página " . $_SESSION["visitas"] . " veces.";
?>
```

**Ejemplo de Manejo de Arrays y Objetos:**
```php
<?php
session_start();
// Guardando perfil completo
$_SESSION["perfil"] = [
    "id" => 42,
    "email" => "correo@ejemplo.com",
    "preferencias" => ["tema" => "oscuro", "notificaciones" => true]
];

// Accediendo a datos anidados
echo "Tema preferido: " . $_SESSION["perfil"]["preferencias"]["tema"];
?>
```

### 3. Destruir Sesiones (Logout)

Para cerrar una sesión correctamente (como en un "Logout"), se deben seguir tres pasos:
1.  Iniciar la sesión.
2.  Vaciar el array `$_SESSION`.
3.  Destruir la sesión en el servidor.
4.  (Opcional pero recomendado) Borrar la cookie de sesión.

**Ejemplo Completo de Logout:**
```php
<?php
session_start();

// 1. Vaciar variables de sesión
$_SESSION = array();

// 2. Borrar la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Destruir la sesión
session_destroy();
?>
```

---

## 🛡️ Seguridad y Autenticación

Al trabajar con sesiones y autenticación, es crucial implementar capas de seguridad para proteger la identidad del usuario.

### Tipos de Autenticación Modernos
En aplicaciones web, comúnmente verás:
*   **Basada en Sesiones:** El servidor guarda el estado (lo que acabamos de ver). Común en aplicaciones renderizadas en servidor (SSR).
*   **Basada en Tokens (Bearer / JWT):** El servidor no guarda estado; el cliente envía un token firmado en cada petición. Común en APIs REST y SPAs.
*   **OAuth:** Delegar la autenticación a un tercero (ej. "Iniciar sesión con Google").

### Buenas Prácticas

1.  **Regenerar ID de Sesión:** Para prevenir el "secuestro de sesión" (*Session Fixation*), regenera el ID cada vez que el usuario inicie sesión o cambie de privilegios.

    ```php
    <?php
    session_start();
    // Validar credenciales... si son correctas:
    session_regenerate_id(true); // Nuevo ID, borra el anterior
    $_SESSION['auth'] = true;
    ?>
    ```

2.  **Tokens CSRF:** Protege tus formularios generando un token único en la sesión y validándolo al recibir datos.

    **Generar:**
    ```php
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    ```

    **Validar:**
    ```php
    if (!hash_equals($_SESSION['csrf_token'], $_POST['token'])) {
        die("Token inválido");
    }
    ```

---

## 🔗 Referencias
*   [Manual PHP: Cookies](https://www.php.net/manual/es/features.cookies.php)
*   [Manual PHP: Manejo de Sesiones](https://www.php.net/manual/es/book.session.php)
*   [OWASP: Session Management](https://owasp.org/www-community/vulnerabilities/Session_Fixation)
* [PHP The Right Way](https://phptherightway.com/)