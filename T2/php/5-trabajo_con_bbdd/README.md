# 🗄️ Trabajo con Bases de Datos en PHP

PHP nació para la web y una de sus características más potentes es su facilidad para interactuar con bases de datos. En esta unidad, exploraremos cómo conectar, consultar y manipular datos utilizando **MySQLi**, una de las extensiones nativas más utilizadas.

---

## 🔌 PHP-MYSQLI

MySQLi (MySQL Improved) es una extensión de PHP que permite acceder a la funcionalidad proporcionada por MySQL 4.1 y posterior. Ofrece una interfaz dual: procedimental y orientada a objetos.

### 1. Conectar a una base de datos

Establecer una conexión es el primer paso para cualquier operación.

**Ejemplo 1: Conexión Básica (Estilo Procedimental)**
La forma más directa y clásica de conectar, ideal para scripts rápidos o aprendizaje inicial.

```php
$conexion = mysqli_connect("localhost", "usuario", "password", "mi_base_datos");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
echo "Conectado exitosamente";
```

**Ejemplo 2: Conexión Orientada a Objetos**
Utilizando la interfaz de objetos, que es más limpia y moderna.

```php
$mysqli = new mysqli("localhost", "usuario", "password", "mi_base_datos");

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
    exit();
}
echo "Conectado vía Objetos";
```

**Ejemplo 3: Conexión Robusta con Manejo de Excepciones**
Para entornos de producción, es recomendable usar `try-catch` y configuraciones de reporte de errores para evitar exponer datos sensibles si algo falla.

```php
// Habilitar reporte de errores estricto
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $mysqli = new mysqli("localhost", "usuario", "password", "mi_base_datos");
    $mysqli->set_charset("utf8mb4"); // Asegurar codificación correcta
} catch (mysqli_sql_exception $e) {
    // Loguear el error en un archivo seguro en lugar de mostrarlo
    error_log($e->getMessage());
    exit('Error conectando a la base de datos'); 
}
```

---

### 2. Crear una tabla desde PHP

A veces necesitamos definir la estructura de nuestros datos programáticamente, por ejemplo, al instalar una aplicación.

**Ejemplo 1: Creación Simple**
Ejecutar una sentencia SQL directa para crear una tabla.

```php
$sql = "CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    email VARCHAR(50)
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Tabla usuarios creada correctamente";
}
```

**Ejemplo 2: Verificar Existencia**
Evitar errores verificando si la tabla ya existe antes de intentar crearla.

```php
$sql = "CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2)
)";

$mysqli->query($sql); // No fallará si ya existe
```

**Ejemplo 3: Estructura Compleja con Índices y Motores**
Creación de tablas con configuraciones específicas de motor de almacenamiento y cotejamiento (collation).

```php
$sql = "CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2),
    INDEX (usuario_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

try {
    $mysqli->query($sql);
} catch (Exception $e) {
    echo "Error en la definición de la tabla: " . $e->getMessage();
}
```

---

### 3. Consultar datos en tablas

Recuperar información es la operación más común (Read del CRUD).

**Ejemplo 1: Selección Simple**
Obtener todos los registros de una tabla.

```php
$resultado = $mysqli->query("SELECT * FROM usuarios");
```

**Ejemplo 2: Iterar Resultados**
Procesar cada fila devuelta por la consulta.

```php
$sql = "SELECT id, nombre, email FROM usuarios";
$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Salida de datos de cada fila
    while($fila = $resultado->fetch_assoc()) {
        echo "id: " . $fila["id"]. " - Nombre: " . $fila["nombre"]. "<br>";
    }
} else {
    echo "0 resultados";
}
```

**Ejemplo 3: Consultas Preparadas (Prepared Statements)**
La forma segura de consultar datos cuando hay variables involucradas, previniendo inyecciones SQL.

```php
$email_buscado = "juan@ejemplo.com";

// 1. Preparar
$stmt = $mysqli->prepare("SELECT id, nombre FROM usuarios WHERE email = ?");
// 2. Vincular (s = string)
$stmt->bind_param("s", $email_buscado);
// 3. Ejecutar
$stmt->execute();
// 4. Obtener resultados
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

print_r($usuario);
$stmt->close();
```

---

### 4. Insertar registros desde formularios

Agregar nueva información a la base de datos (Create del CRUD).

**Ejemplo 1: Inserción Directa (Solo para datos internos)**
Insertar valores fijos o "hardcoded". Nunca usar esto con datos de usuario sin sanitizar.

```php
$sql = "INSERT INTO usuarios (nombre, email) VALUES ('Juan Pérez', 'juan@test.com')";
$mysqli->query($sql);
```

**Ejemplo 2: Inserción con Variables (Riesgoso si no se tiene cuidado)**
Usando variables PHP directamente en la cadena SQL. **Nota:** Esto es vulnerable si las variables vienen de un formulario sin filtrar.

```php
$nombre = $mysqli->real_escape_string($_POST['nombre']); // Sanitización básica
$email = $mysqli->real_escape_string($_POST['email']);

$sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
if($mysqli->query($sql)){
    echo "Nuevo registro creado. ID: " . $mysqli->insert_id;
}
```

**Ejemplo 3: Inserción Segura con Sentencias Preparadas**
El estándar profesional para manejar datos de formularios. Separa la lógica SQL de los datos.

```php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$edad = $_POST['edad'];

// La plantilla SQL tiene signos de interrogación (?) donde irán los datos
$stmt = $mysqli->prepare("INSERT INTO usuarios (nombre, email, edad) VALUES (?, ?, ?)");
// "ssi" indica los tipos: String, String, Integer
$stmt->bind_param("ssi", $nombre, $email, $edad);

if ($stmt->execute()) {
    echo "Registro seguro creado exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
```

---

### 5. Actualizar registros

Modificar información existente (Update del CRUD).

**Ejemplo 1: Variable estática**
Actualizar un campo específico para todos los registros que cumplan una condición simple.

```php
$mysqli->query("UPDATE productos SET stock = 0 WHERE categoria = 'descontinuados'");
```

**Ejemplo 2: Actualización Dinámica**
Construir la consulta con valores, nuevamente cuidando el escape de strings.

```php
$nuevo_precio = 19.99;
$id_producto = 5;

$sql = "UPDATE productos SET precio = $nuevo_precio WHERE id = $id_producto";
$mysqli->query($sql);
```

**Ejemplo 3: Actualización Segura y Verificación**
Usar sentencias preparadas y verificar si realmente se modificó alguna fila (puede que el ID no exista o el valor ya fuera ese).

```php
$id_usuario = $_POST['id'];
$nuevo_email = $_POST['email'];

$stmt = $mysqli->prepare("UPDATE usuarios SET email = ? WHERE id = ?");
$stmt->bind_param("si", $nuevo_email, $id_usuario);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Usuario actualizado.";
} else {
    echo "No se realizaron cambios (el usuario no existe o el email era el mismo).";
}
```

---

### 6. Eliminar registros

Borrar información (Delete del CRUD). ¡Cuidado, sin el `WHERE` borras todo!

**Ejemplo 1: Borrado Simple**
Eliminar un registro específico por ID fijo.

```php
$mysqli->query("DELETE FROM logs WHERE fecha < '2023-01-01'");
```

**Ejemplo 2: Borrado con Límite**
Una pequeña medida de seguridad para evitar borrados masivos accidentales.

```php
$id_borrar = 15;
// LIMIT 1 asegura que solo se borre uno, incluso si hay error en la lógica
$sql = "DELETE FROM usuarios WHERE id = $id_borrar LIMIT 1";
$mysqli->query($sql);
```

**Ejemplo 3: Borrado Seguro Transaccional**
Para operaciones críticas, usamos sentencias preparadas. En sistemas complejos, esto podría estar envuelto en una transacción.

```php
$id_cliente = $_POST['cliente_id'];

$stmt = $mysqli->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->bind_param("i", $id_cliente);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Cliente eliminado.";
} else {
    echo "Error: Cliente no encontrado.";
}
```

---

## 🛡️ Mejores Prácticas y Conceptos Avanzados

Para llevar el desarrollo al siguiente nivel, hay que considerar más que solo que el código "funcione".

### Seguridad (SQL Injection)
La inyección SQL ocurre cuando un atacante manipula los datos de entrada para ejecutar código SQL arbitrario.
*   ❌ **Mal:** `$sql = "SELECT * FROM users WHERE name = '" . $_POST['name'] . "'";`
*   ✅ **Bien:** Usar **Prepared Statements** siempre que se involucren datos de entrada. Los parámetros se envían por separado de la consulta, haciendo imposible que se interpreten como comandos SQL.

### PDO vs MySQLi
En este documento usamos **MySQLi** (nativo para MySQL), pero existe **PDO (PHP Data Objects)**.
*   **MySQLi:** Solo funciona con bases de datos MySQL. Ofrece estilo procedural y OO.
*   **PDO:** Funciona con 12 tipos diferentes de bases de datos (PostgreSQL, SQLite, SQL Server, etc.). Solo orientado a objetos. Si planeas cambiar de motor de base de datos en el futuro, PDO es la elección.

### Migraciones
En proyectos reales, no creamos tablas con `CREATE TABLE` dispersos en el código PHP. Usamos **Migraciones** (gestionadas por herramientas como Laravel o Phinx) que son archivos con control de versiones que definen cómo cambia el esquema de la base de datos a lo largo del tiempo.

### Manejo de Credenciales
*   Nunca guardes usuarios y contraseñas (hardcoded) en tus archivos PHP que subes al repositorio.
*   Usa variables de entorno (archivos `.env`) y librerías como `phpdotenv` para cargar configuraciones sensibles.

---

## 🔗 Referencias

*   [Manual Oficial de PHP: MySQLi](https://www.php.net/manual/es/book.mysqli.php)
*   [PHP: Sentencias Preparadas](https://www.php.net/manual/es/mysqli.quickstart.prepared-statements.php)
*   [W3Schools PHP MySQL Connect](https://www.w3schools.com/php/php_mysql_connect.asp)
*   [OWASP SQL Injection Prevention Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html)
