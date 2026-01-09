# 🗄️ PDO (PHP Data Objects)

**PDO** es una interfaz ligera y consistente para acceder a bases de datos en PHP. A diferencia de las funciones antiguas `mysql_*` (ya obsoletas) o `mysqli`, PDO permite trabajar con múltiples sistemas de bases de datos (MySQL, PostgreSQL, SQLite, etc.) cambiando solo la cadena de conexión.

---

## 🔌 Conexión a la Base de Datos

Para conectarse, se crea una instancia de la clase `PDO`. Es fundamental envolver la conexión en un bloque `try-catch` para manejar errores de conexión.

**Ejemplo:**
```php
<?php
$dsn = 'mysql:host=localhost;dbname=tienda';
$usuario = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $usuario, $pass);
    echo "¡Conexión exitosa!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
```

**Configuración de Errores:**
Configurar PDO para que lance *excepciones* en caso de error es vital para un código robusto.

```php
<?php
$opciones = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8mb4', 'user', 'pass', $opciones);
} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
}
?>
```

---

## 🛡️ Sentencias Preparadas vs No Preparadas

Uno de los conceptos más importantes en seguridad web es evitar la **Inyección SQL**.

### Sentencias No Preparadas (Inseguro)
Usar `query()` directamente con variables del usuario es peligroso.
```php
// ❌ ¡PELIGRO! Vulnerable a Inyección SQL
$sql = "SELECT * FROM usuarios WHERE email = '$email_usuario'";
$resultado = $pdo->query($sql); 
```

### Sentencias Preparadas (Seguro)
Las sentencias preparadas separan la instrucción SQL de los datos. El motor de base de datos se encarga de escapar los valores correctamente. Se usa `prepare()` y luego `execute()`.

```php
// ✅ Seguro
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email_usuario]);
```

---

## 📝 Operaciones CRUD

CRUD se refiere a las cuatro operaciones básicas: **Create** (Crear), **Read** (Leer), **Update** (Actualizar), **Delete** (Borrar).

### 1. Create (INSERT)

**Inserción simple**
```php
$sql = "INSERT INTO productos (nombre, precio) VALUES ('Manzana', 1.50)";
$pdo->exec($sql);
```

**Inserción preparada posicional**
```php
$stmt = $pdo->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
$stmt->execute(['Pera', 2.00]);
```

**Inserción preparada con parámetros nombrados**
Esta forma es más legible cuando hay muchos campos.
```php
$stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, rol) VALUES (:n, :e, :r)");
$stmt->execute([
    ':n' => 'Ana Gómez',
    ':e' => 'ana@mail.com',
    ':r' => 'editor'
]);
echo "ID insertado: " . $pdo->lastInsertId();
```

### 2. Read (SELECT)

**Obtener todos los datos (`query`)**
Usado solo cuando no hay variables externas.
```php
$stmt = $pdo->query("SELECT * FROM categorias");
while ($fila = $stmt->fetch()) {
    echo $fila['nombre'] . "<br>";
}
```

**Obtener una sola fila (`prepare` + `fetch`)**
```php
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([5]);
$usuario = $stmt->fetch(); // Devuelve un array asociativo (por la config anterior)
```

**Obtener todo en un array (`fetchAll`)**
Ideal para pasar datos a una vista o API.
```php
$stmt = $pdo->prepare("SELECT * FROM productos WHERE precio > :p");
$stmt->execute([':p' => 100]);
$productos = $stmt->fetchAll();
// Ahora $productos es un array de arrays
```

### 3. Update (UPDATE)

**Ejemplo:**
```php
$stmt = $pdo->prepare("UPDATE productos SET precio = :precio WHERE id = :id");
$stmt->execute([':precio' => 25.99, ':id' => 10]);
echo "Filas afectadas: " . $stmt->rowCount();
```

### 4. Delete (DELETE)

**Ejemplo:**
```php
$stmt = $pdo->prepare("DELETE FROM logs WHERE fecha < :fecha");
$stmt->execute([':fecha' => '2023-01-01']);
```

---

## 🌐 APIs y Servicios Web

El uso moderno de PHP y bases de datos suele darse en el contexto de **APIs REST**. En lugar de imprimir HTML, el servidor devuelve datos en formato **JSON** para que sean consumidos por un frontend (React, Vue, App Móvil).

### Ejemplo: Endpoint simple de API
Este script conecta a la base de datos y devuelve la lista de usuarios en formato JSON.

```php
<?php
// Indicar que la respuesta será JSON
header('Content-Type: application/json');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=app', 'root', '');
    
    // Consultar datos
    $stmt = $pdo->query("SELECT id, nombre, email FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Convertir array PHP a JSON y mostrar
    echo json_encode($usuarios);
} catch (PDOException $e) {
    // En caso de error, devolver un JSON con el mensaje
    http_response_code(500);
    echo json_encode(["error" => "Error de base de datos"]);
}
?>
```

---

## 🔗 Referencias
*   [Manual PHP: PDO](https://www.php.net/manual/es/book.pdo.php)
*   [PHP The Right Way: Databases](https://phptherightway.com/#databases)
*   [SQL Injection Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html)
