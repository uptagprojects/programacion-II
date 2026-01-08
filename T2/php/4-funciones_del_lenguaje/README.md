# 🧩 Funciones y Modularidad en PHP

Las funciones son bloques de código reutilizables que permiten organizar la lógica de nuestros programas, evitar la repetición (principio DRY - *Don't Repeat Yourself*) y facilitar el mantenimiento. En esta unidad, profundizaremos en cómo PHP maneja la modularidad a través de funciones.

---

## 📖 Glosario de Términos

*   **Función (Function):** Bloque de código con un nombre específico que realiza una tarea concreta.
*   **Parámetro:** Variable definida en la declaración de la función que espera recibir un valor.
*   **Argumento:** Valor real que se envía a la función al momento de llamarla.
*   **Scope (Ámbito):** Contexto o alcance donde una variable está definida y puede ser accedida (ej. *Global* vs *Local*).
*   **Return (Retorno):** Instrucción que finaliza la ejecución de la función y opcionalmente devuelve un valor al código que la llamó.
*   **Type Hinting (Declaración de Tipo):** Práctica de especificar explícitamente el tipo de dato que se espera en un parámetro o que se devolverá.
*   **Closure:** Función anónima que puede "capturar" variables de su entorno padre para usarlas internamente.

---

## 🏗️ Declaración de Funciones

Para definir una función en PHP utilizamos la palabra clave `function`, seguida del nombre (que debe ser descriptivo) y paréntesis `()`.

### Ejemplos Prácticos

1.  **Función Básica**
    La forma más simple de declarar una función: sin entradas ni salidas, solo ejecuta una acción.

    ```php
    function saludar() {
        echo "¡Hola mundo!";
    }
    ```

2.  **Función con Lógica Interna**
    Una función que encapsula una lógica, como obtener la fecha actual, aislando esa complejidad del resto del código.

    ```php
    function imprimirFechaActual() {
        // Lógica encapsulada
        date_default_timezone_set('America/Santiago');
        $fecha = date('d-m-Y H:i');
        echo "La fecha y hora actual es: " . $fecha;
    }
    ```

3.  **Función Condicional**
    Es posible definir funciones dentro de estructuras de control. Esto significa que la función solo existirá si se cumple la condición.

    ```php
    $modoDesarrollador = true;

    if ($modoDesarrollador) {
        // Esta función solo se define si $modoDesarrollador es true
        function mostrarErrores() {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            echo "Modo Debug Activado";
        }
    }
    ```

---

## 📞 Llamado de Funciones

Una vez declarada, una función no se ejecuta hasta que es "llamada" o "invocada".

### Ejemplos Prácticos

1.  **Invocación Directa**
    El llamado estándar por su nombre.

    ```php
    saludar(); // Salida: ¡Hola mundo!
    ```

2.  **Llamado en Expresiones**
    Podemos llamar funciones dentro de otras expresiones o cadenas, dependiendo de su propósito.

    ```php
    // Suponiendo una función que imprime algo
    echo "<h1>";
    imprimirFechaActual();
    echo "</h1>";
    ```

3.  **Funciones Variables (Callables)**
    PHP permite llamar a una función usando una variable que contiene su nombre (string). Esto es base para muchos patrones de diseño y frameworks.

    ```php
    $accion = "saludar";
    
    // PHP busca una función llamada "saludar" y la ejecuta
    if (function_exists($accion)) {
        $accion(); 
    }
    ```

---

## 📥 Parámetros de las Funciones

Los parámetros permiten que las funciones sean dinámicas, procesando datos diferentes en cada ejecución.

### Ejemplos Prácticos

1.  **Parámetros Simples**
    Pasar valores para que la función trabaje con ellos.

    ```php
    function despedir($nombre) {
        echo "Adios, " . $nombre;
    }
    
    despedir("Carlos"); // El argumento es "Carlos"
    ```

2.  **Múltiples Parámetros y Valores por Defecto**
    Podemos definir valores opcionales asignando un valor por defecto en la declaración. Los obligatorios siempre deben ir primero.

    ```php
    function crearEtiqueta($texto, $tag = "p", $color = "black") {
        echo "<$tag style='color:$color'>$texto</$tag>";
    }

    crearEtiqueta("Texto normal");                  // Usa p y black
    crearEtiqueta("Título Rojo", "h1", "red");      // Sobrescribe todo
    ```

3.  **Tipado Estricto y Paso por Referencia**
    Para robustez, declaramos los tipos esperados. También podemos usar `&` para modificar la variable original (paso por referencia) en lugar de una copia.

    ```php
    declare(strict_types=1); // Obliga a respetar los tipos

    // $contador se pasa por referencia (&)
    function incrementar(int &$contador, int $pasos): void {
        $contador += $pasos;
    }

    $miNumero = 10;
    incrementar($miNumero, 5);
    echo $miNumero; // Imprime 15 (la variable original cambió)
    ```

---

## 📤 Retornar Valores

Generalmente, las funciones procesan datos y **devuelven** un resultado para que el programa principal decida qué hacer con él, en lugar de imprimirlo directamente.

### Ejemplos Prácticos

1.  **Retorno Simple**
    Devolver un valor calculado.

    ```php
    function cuadrado($numero) {
        return $numero * $numero;
    }

    $resultado = cuadrado(4); // $resultado vale 16
    ```

2.  **Retorno Temprano (Early Return)**
    Usar `return` para salir de la función antes de tiempo si se cumple una condición, evitando anidamiento de `else`.

    ```php
    function esMayorDeEdad($edad) {
        if ($edad < 0) {
            return "Edad inválida"; // Sale inmediatamente
        }
        
        if ($edad >= 18) {
            return true;
        }

        return false;
    }
    ```

3.  **Declaración de Tipo de Retorno (Return Types)**
    Desde PHP 7+ podemos (y deberíamos) especificar qué tipo de dato devolverá la función. Esto mejora la calidad del código.

    ```php
    // : ?array indica que devuelve un array o null
    function buscarUsuario(int $id): ?array {
        $db = ['1' => ['nombre' => 'Ana'], '2' => ['nombre' => 'Juan']];

        if (isset($db[$id])) {
            return $db[$id];
        }

        return null; // Si no existe, devuelve null
    }
    ```

---

## 🚀 Conceptos Avanzados

Más allá de lo básico, PHP ofrece características poderosas para programación funcional y manejo de contexto.

### Scope (Ámbito) de Variables
Las variables dentro de una función son **locales**. Para acceder a una variable externa, se debe declarar como `global` (aunque se prefiere evitarlo pasarla como argumento).

```php
$mensaje = "Hola";

function test() {
    // echo $mensaje; // Error: $mensaje no está definida aquí
    global $mensaje;
    echo $mensaje; // Funciona
}
```

### Funciones Anónimas (Closures)

Son funciones que no tienen un nombre especificado. Son útiles como el valor de funciones de devolución de llamada (*callbacks*) o para crear lógica encapsulada que se puede asignar a variables.

**Ejemplos Prácticos**

1.  **Asignación a una Variable**
    Las funciones anónimas son "ciudadanos de primera clase" en PHP, lo que significa que pueden asignarse a variables igual que un entero o un string.

    ```php
    $saludo = function($nombre) {
        return "Hola " . $nombre;
    };

    echo $saludo("Mundo"); // Se llama usando la variable
    ```

2.  **Uso como Callback**
    Muy comunes en funciones nativas de manipulación de arrays como `array_map`, `array_filter` o `usort`.

    ```php
    $numeros = [4, 2, 8, 6];

    // Ordenar de menor a mayor usando una función anónima
    usort($numeros, function($a, $b) {
        return $a <=> $b; // Operador nave espacial (PHP 7+)
    });
    
    // $numeros ahora es [2, 4, 6, 8]
    ```

3.  **Heredar Variables (Closures con `use`)**
    A diferencia de otros lenguajes (como JS), en PHP una función anónima no tiene acceso automático al scope padre. Debemos usar la palabra clave `use` para "capturar" variables explícitamente.

    ```php
    $impuesto = 0.19;
    $mensaje = "Total: ";

    // Capturamos $impuesto por valor y $mensaje por referencia (si quisiéramos modificarlo)
    $calculadora = function($precio) use ($impuesto) {
        return $precio * (1 + $impuesto);
    };

    echo $mensaje . $calculadora(1000); // Salida: "Total: 1190"
    ```

### Arrow Functions (Funciones Flecha)
Introducidas en PHP 7.4, son una sintaxis más corta para funciones anónimas simples. Capturan variables del padre automáticamente (by-value).

```php
$factor = 2;
$nums = [1, 2, 3];

// fn(args) => expresión
$dobles = array_map(fn($n) => $n * $factor, $nums);
// Resultado: [2, 4, 6]
```

### Named Arguments (Argumentos Nombrados)
Desde PHP 8.0, podemos pasar argumentos por nombre, saltando el orden o los opcionales.

```php
// Usando la función crearEtiqueta definida anteriormente
crearEtiqueta(texto: "Solo cambio el color", color: "blue");
// El tag usa su valor por defecto "p"
```

---

## 🔗 Referencias y Recursos

*   **Documentación Oficial de PHP:**
    *   [Funciones definidas por el usuario](https://www.php.net/manual/es/functions.user-defined.php)
    *   [Argumentos de funciones](https://www.php.net/manual/es/functions.arguments.php)
    *   [Devolver valores](https://www.php.net/manual/es/functions.returning-values.php)
    *   [Funciones Anónimas](https://www.php.net/manual/es/functions.anonymous.php)
    *   [Declaraciones de tipo](https://www.php.net/manual/es/language.types.declarations.php)
*   **W3Schools:**
    *   [PHP Functions](https://www.w3schools.com/php/php_functions.asp)
