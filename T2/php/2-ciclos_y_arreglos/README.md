# 🔄 Ciclos y Arreglos en PHP

En esta unidad profundizaremos en las estructuras de control que nos permiten repetir bloques de código y en las estructuras de datos fundamentales para almacenar conjuntos de información.

## 🔁 Estructuras de Control: Ciclos (Bucles)

Los ciclos o bucles permiten ejecutar un bloque de código repetidas veces mientras se cumpla una condición específica.

### Ciclo `for`

Ideal cuando conocemos de antemano el número exacto de iteraciones que queremos realizar.

**Sintaxis:**

```php
<?php
    for (inicialización; condición; incremento) {
        // Código a repetir
    }
?>
```

### Ejemplos Prácticos

1. **Contador simple**
```php
<?php
    for ($i = 1; $i <= 5; $i++) {
        echo "Número: " . $i . " "; // Salida: 1 2 3 4 5
    }
?>
```

2. **Sumatoria**
```php
<?php
    $suma = 0;
    for ($i = 1; $i <= 10; $i++) {
        $suma += $i;
    }
    echo "La suma de los primeros 10 números es: " . $suma;
?>
```

3. **Tabla de multiplicar**
```php
<?php
    $numero = 7;
    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . "<br>";
    }
?>
```

### Ciclo `while`

Ejecuta el bloque de código mientras la condición sea verdadera. Es útil cuando no sabemos cuántas veces se repetirá el ciclo.

**Sintaxis:**

```php
<?php
    while (condición) {
        // Código a ejecutar
    }
?>
```

### Ejemplos Prácticos

1. **Cuenta regresiva**
```php
<?php
    $contador = 5;
    while ($contador > 0) {
        echo $contador . "... ";
        $contador--;
    }
    echo "¡Despegue!";
?>
```

2. **Búsqueda (Simulada)**
```php
<?php
    $numero = 10;
    while ($numero > 2) {
        echo "Aún es mayor que 2: ".$numero." <br>";
        $numero -= 2; 
    }
?>
```

3. **Simulación hasta condición**
```php
<?php
    $cara = 0;
    $intentos = 0;
    // Lanzar hasta obtener 3 caras (1 representa cara)
    while ($cara < 3) {
        $resultado = rand(0, 1);
        if ($resultado == 1) {
            $cara++;
            echo "¡Cara! (" . $cara . ") <br>";
        } else {
            echo "Cruz <br>";
        }
        $intentos++;
    }
    echo "Total de intentos: " . $intentos;
?>
```

### Ciclo `foreach`

Diseñado específicamente para iterar sobre **arreglos (arrays)** y objetos. Es la forma más sencilla de recorrer listas.

**Sintaxis:**

```php
<?php
    foreach ($array as $valor) {
        // Código a usar con $valor
    }
?>
```

### Ejemplos Prácticos

1. **Lista de compras**
```php
<?php
    $frutas = ["Manzana", "Pera", "Uva"];
    foreach ($frutas as $fruta) {
        echo "Comprar: " . $fruta . "<br>";
    }
?>
```

2. **Clave y Valor**
```php
<?php
    $agenda = ["Juan" => "555-1234", "Ana" => "555-9876"];
    foreach ($agenda as $nombre => $telefono) {
        echo "Llamar a $nombre al $telefono <br>";
    }
?>
```

3. **Filtrando datos (Solo pares)**
```php
<?php
    $numeros = [1, 2, 3, 4, 5, 6];
    echo "Números pares: ";
    foreach ($numeros as $num) {
        if ($num % 2 == 0) {
            echo $num . " ";
        }
    }
?>

```

---

## 🔀 Sentencia `switch`

La sentencia `switch` se utiliza para realizar diferentes acciones basadas en distintos valores de una sola variable. Es una alternativa más limpia a múltiples sentencias `if / elseif`.

**Sintaxis:**

```php
<?php
    switch ($variable) {
        case valor1:
            // código si $variable == valor1
            break;
        case valor2:
            // código si $variable == valor2
            break;
        default:
            // código si ninguno de los casos anteriores coincide
    }
?>
```

### Ejemplos Prácticos

1. **Días de la semana**
```php
<?php
    $dia = 3;
    switch ($dia) {
        case 1: echo "Lunes"; break;
        case 2: echo "Martes"; break;
        case 3: echo "Miércoles"; break;
        default: echo "Otro día";
    }
?>
```

2. **Agrupando casos**
```php
<?php
    $nota = "B";
    switch ($nota) {
        case "A":
            echo "¡Excelente!";
            break;
        case "B":
        case "C":
            echo "Bien, pero mejorable.";
            break;
        case "F":
            echo "Reprobado.";
            break;
        default:
            echo "Nota inválida.";
    }
?>
```

3. **Menú de opciones**
```php
<?php
    $opcion = "guardar";
    switch ($opcion) {
        case "guardar":
            echo "Guardando archivo...";
            break;
        case "borrar":
            echo "¿Borrar archivo?";
            break;
        case "salir":
            echo "Saliendo...";
            break;
        default:
            echo "Comando desconocido";
    }
?>
```

---

## 📦 Arreglos (Arrays) y Strings

Un **array** es una variable especial que puede contener más de un valor a la vez.

### Arreglos Indexados

Son aquellos donde los elementos tienen un índice numérico automático, comenzando desde 0.

```php
<?php
    $frutas = array("Manzana", "Banana", "Naranja");
    // O sintaxis corta (a partir de PHP 5.4)
    $colores = ["Rojo", "Verde", "Azul"];

    echo "Me gusta la " . $frutas[0]; // Salida: Me gusta la Manzana
?>
```

### Strings como Arrays de Caracteres

En PHP, se puede acceder a caracteres individuales de un *string* como si fuera un array, usando corchetes y el índice.

```php
<?php
    $cadena = "Hola";
    echo $cadena[0]; // Salida: H
    echo $cadena[3]; // Salida: a
?>
```

### Arreglos Asociativos

Son arrays que utilizan claves con nombre (strings) que tú asignas a los valores, en lugar de índices numéricos.

**Sintaxis:**

```php
<?php
    $edades = array("Juan" => 35, "Maria" => 28, "Pedro" => 42);
    // Sintaxis corta
    $precios = [
        "Leche" => 1.50,
        "Pan" => 0.90,
        "Huevos" => 2.10
    ];

    echo "Juan tiene " . $edades['Juan'] . " años.";
?>
```

---

## 🔄 Recorrer Arreglos con Ciclos

La combinación de arrays y ciclos es fundamental en programación.

### Usando `for` (Solo para arrays indexados)

```php
<?php
    $autos = ["Volvo", "BMW", "Nissan"];
    $longitud = count($autos);

    for($x = 0; $x < $longitud; $x++) {
        echo $autos[$x] . "<br>";
    }
?>
```

### Usando `foreach` (El método preferido)

Funciona tanto para arrays indexados como asociativos.

**Para arreglos asociativos:**

```php
<?php
    $edades = ["Juan" => 35, "Maria" => 28];

    foreach($edades as $nombre => $edad) {
        echo "Clave=" . $nombre . ", Valor=" . $edad . "<br>";
    }
?>
```

---

---

## 🔗 Referencias y Recursos

*   **Documentación Oficial de PHP:**
    *   [Estructuras de Control](https://www.php.net/manual/es/language.control-structures.php)
    *   [Arrays en PHP](https://www.php.net/manual/es/language.types.array.php)
    *   [Funciones para Strings](https://www.php.net/manual/es/ref.strings.php)
*   **W3Schools:**
    *   [PHP Loops](https://www.w3schools.com/php/php_looping.asp)
    *   [PHP Arrays](https://www.w3schools.com/php/php_arrays.asp)
