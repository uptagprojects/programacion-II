# 🐘 Fundamentos de PHP

**PHP** es un lenguaje de *scripting* del lado del **servidor**, diseñado principalmente para el desarrollo web. Permite generar contenido HTML dinámico, interactuar con bases de datos y gestionar sesiones.

## Estructura y Conceptos Fundamentales

### Marcadores PHP
El código PHP debe estar siempre encerrado entre marcadores para que el servidor lo reconozca y procese:

```php
<?php
    // Todo el código PHP se escribe aquí
    echo "¡Hola, soy PHP!"; 
?>
````

> **Nota:** Cada sentencia debe terminar con un **punto y coma (`;`)**.

### Variables y Constantes

#### Variables

Las variables en PHP son flexibles y de tipado débil.

  * Deben comenzar con el símbolo de **dólar (`$`)**.
  * No necesitan ser declaradas con un tipo de dato.

<!-- end list -->

```php
<?php
    $nombre = "Juan";      // Variable de tipo string
    $edad = 30;            // Variable de tipo entero
    $es_profesor = true;   // Variable de tipo booleano

    echo $nombre; // Muestra 'Juan'
?>
```

#### Constantes

Las constantes almacenan valores que **no deben cambiar** durante la ejecución del *script*. Se definen de dos maneras:

| Método | Uso | Ejemplo |
| :--- | :--- | :--- |
| **`define()`** | Definición tradicional. | `define("PI", 3.14159);` |
| **`const`** | Definición moderna (similar a otros lenguajes). | `const IVA = 0.16;` |

-----

## Tipos de Datos Primitivos en PHP

PHP tiene ocho tipos de datos primitivos. Nos enfocaremos en los cuatro escalares esenciales para empezar:

| Tipo de Dato | Descripción | Ejemplo |
| :--- | :--- | :--- |
| **`String`** | Secuencia de caracteres. | `$saludo = "Buenos días";` |
| **`Integer`** | Números enteros (sin decimales). | `$contador = 100;` |
| **`Float`** (o `Double`) | Números con decimales. | `$precio = 99.99;` |
| **`Boolean`** | Representa verdad o falsedad. | `$activo = true;` (o `false`) |

**Funciones Útiles:**

  * `gettype($variable)`: Devuelve el tipo de dato de una variable.
  * `var_dump($variable)`: Muestra información estructurada de una variable (tipo y valor).

-----

## Operadores Aritméticos

Se utilizan para realizar operaciones matemáticas.

| Operador | Nombre | Ejemplo | Resultado |
| :--- | :--- | :--- | :--- |
| `+` | Adición | `$a + $b` | Suma |
| `-` | Sustracción | `$a - $b` | Resta |
| `*` | Multiplicación | `$a * $b` | Multiplicación |
| `/` | División | `$a / $b` | División (puede ser *float*) |
| `%` | **Módulo** | `$a % $b` | Resto de la división. |
| `**` | Exponenciación | `$a ** $b` | Eleva a la potencia. |

**Ejemplo de Módulo:**

```php
<?php
    $numero = 10 % 3; // $numero será 1 (el resto de 10 / 3)
    echo $numero;
?>
```

-----

## Control de Flujo: Condicionales

Las sentencias condicionales permiten ejecutar bloques de código solo si una condición específica es verdadera.

### Sentencia `if`

Ejecuta un bloque de código **solo si** la condición es `true`.

**Sintaxis:**

```php
<?php
    if (condicion_booleana) {
        // Código que se ejecuta si la condición es VERDADERA
    }
?>
```

**Ejemplo:**

```php
<?php
    $stock = 5;
    if ($stock < 10) {
        echo "<p>Stock bajo. ¡Pedido urgente!</p>";
    }
?>
```

### Sentencia `if / else`

Ejecuta un bloque de código si la condición es `true`, y un bloque alternativo si la condición es `false`.

**Sintaxis:**

```php
<?php
    if (condicion) {
        // Código si es VERDADERO
    } else {
        // Código si es FALSO (la alternativa)
    }
?>
```

**Ejemplo:**

```php
<?php
    $saldo = 150;
    if ($saldo >= 200) {
        echo "Transacción aprobada.";
    } else {
        echo "Saldo insuficiente. Transacción rechazada.";
    }
?>
```

### Operador Ternario

El **operador ternario** es una forma compacta de escribir una estructura `if / else` simple. Es especialmente útil para asignaciones condicionales en una sola línea.

**Sintaxis:**

```php
<?php
    $variable = (condicion) ? valor_si_verdadero : valor_si_falso;
?>
```

**Ejemplo:**

```php
<?php
    $edad = 17;
    $es_mayor = ($edad >= 18) ? "Sí" : "No";
    
    echo "¿Es mayor de edad? " . $es_mayor; // Salida: ¿Es mayor de edad? No
?>
```

**Comparación con `if / else`:**

```php
<?php
    // Usando if / else
    $stock = 5;
    if ($stock > 0) {
        $mensaje = "Disponible";
    } else {
        $mensaje = "Agotado";
    }
    
    // Usando operador ternario (equivalente)
    $stock = 5;
    $mensaje = ($stock > 0) ? "Disponible" : "Agotado";
    
    echo $mensaje; // Salida: Disponible
?>
```

> **Nota:** El operador ternario es ideal para casos simples. Si la lógica es compleja, es preferible usar `if / else` para mantener la legibilidad del código.

-----

## Manejo de Fechas

La función principal para trabajar con fechas y horas en PHP es **`date()`**. Requiere un parámetro de formato.

| Carácter | Formato | Descripción |
| :--- | :--- | :--- |
| `Y` | Año | 2024 |
| `m` | Mes | 01 a 12 |
| `d` | Día | 01 a 31 |
| `H` | Hora (24h) | 00 a 23 |
| `i` | Minutos | 00 a 59 |
| `s` | Segundos | 00 a 59 |

**Ejemplo:** Mostrar la fecha y hora actual.

```php
<?php
    // Obtener la fecha y hora actual del servidor en el formato: 2025-01-15 14:30:00
    $fecha_actual = date("Y-m-d H:i:s");
    
    echo "Hoy es: " . $fecha_actual; 
?>
```

-----

## 💡 Información Adicional Pertinente

### Concatenación

En PHP, el operador para **concatenar** (unir) *strings* y variables es el **punto (`.`)**.

```php
<?php
    $nombre = "Ana";
    $edad = 25;
    
    echo "La usuaria " . $nombre . " tiene " . $edad . " años."; 
    // Salida: La usuaria Ana tiene 25 años.
?>
```

### Comentarios

Los comentarios son líneas ignoradas por el intérprete.

  * Línea simple: `// Este es un comentario` o `# Este también`
  * Bloque: `/* Este es un comentario de varias líneas */`


-----

## 🔗 Sitios de Referencia Esenciales

  * **PHP Manual (Documentación Oficial):** El recurso más completo y preciso para la sintaxis y funciones de PHP.
      * [php.net](https://www.php.net/)
      * [Función date() en PHP](https://www.php.net/manual/es/function.date.php)
  * **W3Schools:** Excelente para ejemplos sencillos y principiantes.
      * [Tutorial de PHP](https://www.w3schools.com/php/)

