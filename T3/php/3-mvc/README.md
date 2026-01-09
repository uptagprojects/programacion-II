# 🏗️ Modelo Vista Controlador (MVC)

El patrón de arquitectura **MVC** es un estándar fundamental en el desarrollo web moderno. Su objetivo principal es separar la lógica de negocio (datos), la lógica de control (flujo) y la interfaz de usuario (presentación), facilitando el mantenimiento y la escalabilidad del código.

---

## 🏛️ Estructura MVC

El flujo típico de una aplicación MVC es:
1.  El usuario realiza una petición (URL).
2.  El **Controlador** recibe la petición.
3.  El Controlador pide datos al **Modelo**.
4.  El Modelo interactúa con la BD y devuelve datos.
5.  El Controlador envía los datos a la **Vista**.
6.  La Vista genera el HTML que ve el usuario.

### Estructura de Directorios Típica
```text
/public       -> Archivos accesibles (css, js, images, index.php)
/app
    /controllers -> Lógica de control
    /models      -> Lógica de datos
    /views       -> Plantillas HTML
/config       -> Configuración de BD, rutas
```

---

## 🧩 Componentes

### 1. Modelos (Models)
Encargados de los datos y las reglas de negocio. Aquí es donde se usa **PDO**. El modelo no debe saber nada sobre HTML ni sobre la petición HTTP.

**Ejemplo:**
```php
<?php
// app/models/Usuario.php
class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
```

### 2. Vistas (Views) y Plantillas
Encargadas de la presentación. Solo deben contener HTML y pequeñas porciones de PHP para imprimir variables (loops y condicionales de presentación). **No deben contener consultas SQL ni lógica compleja.**

**Ejemplo de vista simple:**
```php
<!-- app/views/perfil.php -->
<h1>Perfil de Usuario</h1>
<p>Nombre: <?php echo $usuario['nombre']; ?></p>
```

**Sistema de Plantillas:**
Para evitar repetir el header y footer en cada archivo, se usan *layouts* o plantillas maestras.

```php
<!-- app/views/layout.php -->
<!DOCTYPE html>
<html>
<head><title>Mi App</title></head>
<body>
    <nav>...</nav>
    
    <main>
        <?php include $vista_hija; ?>
    </main>

    <footer>...</footer>
</body>
</html>
```

### 3. Controladores (Controllers)
Intermediarios. Reciben la petición, validan inputs, deciden qué modelo llamar y qué vista cargar.

**Ejemplo:**
```php
<?php
// app/controllers/UsuarioController.php
require_once '../models/Usuario.php';

class UsuarioController {
    public function index() {
        // 1. Instanciar modelo y obtener datos
        $modelo = new Usuario($conexion_pdo);
        $usuarios = $modelo->obtenerTodos();

        // 2. Cargar vista y pasarle los datos
        require '../views/usuarios_lista.php';
    }
}
?>
```

---

## 🚦 Enrutamiento y Htaccess

Para tener URLs limpias (ej: `misitio.com/usuarios/ver/5` en lugar de `misitio.com/index.php?controller=usuarios&action=ver&id=5`), necesitamos redirigir todo el tráfico a un único punto de entrada (*Front Controller*), usualmente `index.php`.

### Configuración .htaccess (Apache)
Este archivo se coloca en la raíz pública y reescribe las URLs.

```apache
RewriteEngine On

# Si el archivo o carpeta solicitada existe físicamente, servirlo directamente (css, js, img)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# Si no, redirigir todo a index.php
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

### Front Controller (index.php)
Es el archivo que recibe todas las peticiones y despacha al controlador adecuado.

```php
<?php
// public/index.php

// Obtener la URL solicitada
$url = $_GET['url'] ?? 'home/index';
$partes = explode('/', rtrim($url, '/'));

$controlador_nombre = $partes[0] . 'Controller'; // Ej: UsuarioController
$metodo = $partes[1] ?? 'index';                 // Ej: ver

// Cargar archivo del controlador (Autoload simplificado)
require_once "../app/controllers/$controlador_nombre.php";

// Instanciar y ejecutar
$controlador = new $controlador_nombre();
$controlador->$metodo();
?>
```

---

## 🧠 Patrones de Diseño y Buenas Practicas

Aunque MVC es un patrón en sí mismo, se suele combinar con otros para mejorar la calidad del código.

### Singleton (Para la Base de Datos)
Evita crear múltiples conexiones a la base de datos en una misma petición.

```php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        // Conexión PDO privada
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
}
```

### Namespaces y Autoloading
En proyectos grandes, hacer `require` manualmente es insostenible. Se usan **Namespaces** para organizar clases y `composer` (o un autoloader propio) para cargarlas automáticamente.

```php
namespace App\Controllers;
use App\Models\Usuario;

class PerfilController { ... }
```

---

## 🔗 Referencias
*   [Wikipedia: Modelo-vista-controlador](https://es.wikipedia.org/wiki/Modelo%E2%80%93vista%E2%80%93controlador)
*   [PHP The Right Way: Design Patterns](https://phptherightway.com/#design_patterns)
* [Refactoring.Guru - MVC](https://refactoring.guru/es/design-patterns/mvc)