# 📝 Formularios y Manejo de Datos en PHP

En esta unidad exploraremos cómo PHP interactúa con los datos enviados por el usuario. Los formularios son la principal interfaz de comunicación entre el cliente (navegador) y el servidor, permitiendo enviar información para ser procesada, almacenada o utlizada en la lógica de negocio.

Abordaremos cómo recibir el *query string* y el *body* de una petición, entendiendo las diferencias fundamentales entre los métodos HTTP y cómo validar la integridad de estos datos.


---

## 📖 Glosario de Términos


Algunas terminologías a tomar en cuenta para esta unidad.

*   **Query String:** Es la parte de una URL que sigue al signo de interrogación (`?`) y contiene datos clave-valor. Es el medio de transporte de datos del método GET.
*   **Body (Cuerpo):** Es la parte principal de una petición HTTP que contiene los datos enviados por el usuario (cuando se usa POST), invisible en la barra de direcciones.
*   **Content-Type:** Es un encabezado HTTP que indica al servidor qué tipo de datos se están enviando (ej. texto plano, JSON, datos de formulario).
*   **Header (Encabezado):** Metadatos enviados en una petición o respuesta HTTP que proporcionan información esencial sobre la transacción (ej. idioma, tipo de contenido, cookies).
*   **Sanitización:** Proceso de limpiar los datos de entrada para eliminar caracteres peligrosos o no deseados antes de procesarlos.
*   **Validación:** Proceso de verificar si los datos cumplen con los requisitos esperados (formato, tipo, longitud) antes de aceptarlos.
*   **Superglobal:** Variables nativas de PHP (como `$_GET`, `$_POST`, `$_SERVER`) que están disponibles en todo el script sin necesidad de declararlas.
*   **Input:** Elemento de un formulario HTML que permite al usuario introducir datos.

---

## 📨 Envío de Datos desde un Formulario

Para enviar datos a un script PHP, utilizamos la etiqueta HTML `<form>`. Dos atributos son cruciales aquí:
*   `action`: La URL del script que procesará los datos. Si se omite, se envía a la misma página.
*   `method`: El método HTTP a utilizar (`GET` o `POST`).

### Ejemplos Prácticos

1. **Formulario Básico**
Este es el ejemplo más elemental: un input y un botón de envío.

```html
<form action="procesar.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <button type="submit">Enviar</button>
</form>
```

2. **Formulario con Tipos de Datos**
HTML5 ofrece varios tipos de inputs que ayudan a la experiencia de usuario antes de enviar los datos.

```html
<form action="registro.php" method="POST">
    <input type="text" name="usuario" placeholder="Nombre de usuario" required>
    <input type="email" name="correo" placeholder="correo@ejemplo.com" required>
    <input type="password" name="clave" placeholder="Contraseña">
    <input type="date" name="nacimiento">
    <input type="submit" value="Registrar">
</form>
```

3. **Formulario Complejo (Archivos y Opciones)**
Para enviar archivos, es **obligatorio** el atributo `enctype="multipart/form-data"`. Esto cambia el *Content-Type* del request para permitir datos binarios.

```html
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Sube tu CV (PDF):</label>
    <input type="file" name="documento" accept=".pdf">
    
    <label>Áreas de interés:</label>
    <select name="area">
        <option value="dev">Desarrollo</option>
        <option value="des">Diseño</option>
    </select>
    
    <label>
        <input type="checkbox" name="terminos" value="1"> Acepto términos
    </label>
    
    <button type="submit">Enviar Solicitud</button>
</form>
```

---

## 🔍 Método GET

El método GET envía la información anexada a la URL (en el *query string*). Es visible para todos y tiene límite de longitud.
*   **Uso:** Ideal para búsquedas, filtros y cuando la acción no modifica datos en el servidor (idempotente).
*   **PHP:** Los datos se reciben en el superglobal `$_GET`.

### Ejemplos Prácticos

1. **Recepción Simple**
URL: `saludo.php?nombre=Ana`

```php
<?php
    // Si la URL es saludo.php?nombre=Ana
    $nombre = $_GET['nombre'];
    echo "Hola, " . $nombre;
?>
```

2. **Buscador (Search Query)**
Típico caso de uso: un formulario de búsqueda que viaja por GET para que la URL sea compartible.

```php
<?php
    // Formulario HTML que envía a buscar.php?q=laptop
    
    // Verificamos si viene el parámetro 'q'
    if (isset($_GET['q'])) {
        $busqueda = htmlspecialchars($_GET['q']); // Sanitizamos para evitar XSS
        echo "Resultados para la búsqueda: " . $busqueda;
        // Aquí iría la lógica de consulta a base de datos
    } else {
        echo "Por favor ingresa un término de búsqueda.";
    }
?>
```

3. **Navegación y Paginación**
Uso de múltiples parámetros en la URL para controlar la vista.
URL: `productos.php?categoria=zapatos&pagina=2&orden=precio_asc`

```php
<?php
    // Definimos valores por defecto por si no vienen en la URL
    $categoria = $_GET['categoria'] ?? 'general'; // Operador de fusión null (PHP 7+)
    $pagina = (int)($_GET['pagina'] ?? 1);        // Aseguramos que sea entero
    $orden = $_GET['orden'] ?? 'destacados';

    echo "Mostrando categoría: " . $categoria . "<br>";
    echo "Página actual: " . $pagina . "<br>";
    echo "Ordenado por: " . $orden;
    
    // Lógica para calcular offset de base de datos:
    // $offset = ($pagina - 1) * 10;
?>
```

---

## 📦 Método POST

El método POST envía los datos en el cuerpo (*body*) de la petición HTTP. No es visible en la URL y no tiene límite de tamaño estricto.
*   **Uso:** Envío de información sensible (contraseñas), formularios extensos, subida de archivos y acciones que modifican el estado del servidor (crear, actualizar, borrar).
*   **Headers:** El navegador envía headers como `Content-Type: application/x-www-form-urlencoded` por defecto.
*   **PHP:** Los datos se reciben en el superglobal `$_POST`.

### Ejemplos Prácticos

1. **Login Simple**
Recibir credenciales de forma privada.

```php
<?php
    $usuario = $_POST['user'];
    $password = $_POST['pass'];

    if ($usuario === 'admin' && $password === '1234') {
        echo "Bienvenido, Administrador.";
    } else {
        echo "Credenciales incorrectas.";
    }
?>
```

2. **Procesar Formulario de Contacto**
Manejo de múltiples campos enviados desde el formulario.

```php
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];

        // Simulación de envío de correo
        // mail($email, "Contacto", $mensaje);
        
        echo "Gracias " . $nombre . ", hemos recibido tu mensaje: <br>";
        echo "<blockquote>" . $mensaje . "</blockquote>";
    }
?>
```

3. **Recepción de JSON (API Style)**
A veces no recibimos datos de un formulario estándar, sino un JSON crudo (ej. desde JavaScript/Fetch). PHP no llena `$_POST` automáticamente en este caso, debemos leer el *input stream*.

```php
<?php
    // Verificamos el Content-Type
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
        // Leemos el flujo de entrada crudo
        $content = file_get_contents("php://input");
        
        // Decodificamos el JSON a un array asociativo
        $decoded = json_decode($content, true);

        // Si el JSON es válido
        if (is_array($decoded)) {
            echo "Recibido JSON de usuario: " . $decoded['usuario'];
        } else {
            echo "JSON inválido";
        }
    }
?>
```

---

## ✅ Validar un Formulario

Nunca debes confiar en los datos que vienen del cliente. La validación en el servidor es obligatoria por seguridad y consistencia de datos.

### Ejemplos Prácticos

1. **Validación de Campo Vacío**
La validación más básica: asegurar que el dato existe y no está vacío.

```php
<?php
    if (empty($_POST['nombre'])) {
        echo "El nombre es obligatorio.";
    } else {
        echo "Nombre recibido: " . $_POST['nombre'];
    }
?>
```

2. **Validación de Tipos (Filtros)**
PHP ofrece `filter_var` para validar formatos específicos como correos o URLs sin usar expresiones regulares complejas.

```php
<?php
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El formato del correo es inválido.<br>";
    }

    if (!filter_var($edad, FILTER_VALIDATE_INT) || $edad < 18) {
        echo "Debes ingresar una edad válida y ser mayor de 18.<br>";
    }
?>
```

3. **Validación Completa con Manejo de Errores**
Un patrón robusto acumula errores en un arreglo y solo procesa si el arreglo está vacío. También incluye "saneamiento" de datos.

```php
<?php
    $errores = [];
    $datos = [];

    // 1. Saneamiento (Limpiar datos)
    $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);

    // 2. Validación (Reglas de negocio)
    if (empty($nombre)) {
        $errores[] = "El nombre no puede estar vacío.";
    } elseif (strlen($nombre) < 3) {
        $errores[] = "El nombre es muy corto.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // 3. Respuesta
    if (count($errores) > 0) {
        echo "<h3>Se encontraron errores:</h3><ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='formulario.php'>Volver</a>";
    } else {
        // Éxito: Guardar en BD o enviar mail
        echo "<h1>¡Registro Exitoso!</h1>";
        echo "<p>Bienvenido, " . $nombre . ".</p>";
    }
?>
```

---

## 🔗 Referencias y Recursos

*   **Documentación Oficial de PHP:**
    *   [Manejo de variables externas (GET/POST)](https://www.php.net/manual/es/language.variables.external.php)
    *   [Filtros de Validación](https://www.php.net/manual/es/book.filter.php)
    *   [Carga de archivos con POST](https://www.php.net/manual/es/features.file-upload.post-method.php)
*   **MDN Web Docs:**
    *   [Enviando datos de formulario](https://developer.mozilla.org/es/docs/Learn/Forms/Sending_and_retrieving_form_data)
*   **W3Schools:**
    *   [PHP Form Handling](https://www.w3schools.com/php/php_forms.asp)
    *   [PHP Form Validation](https://www.w3schools.com/php/php_form_validation.asp)
