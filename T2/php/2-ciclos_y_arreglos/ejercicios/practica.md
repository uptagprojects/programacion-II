# Práctica: Ciclos y Arreglos en PHP

Para afianzar el dominio de las estructuras de control y manipulación de datos, realiza los siguientes desafíos progresivos.

## Ejercicios Prácticos

1.  **Frecuencia de Caracteres:**
    *   Crea un script que reciba una cadena de texto (ej: `"programacion web"`).
    *   Utiliza un array asociativo para contar cuántas veces aparece cada carácter en el string.
    *   Recorre el string carácter por carácter (puedes acceder como `$str[$i]` o convertir a array).
    *   **Salida esperada:**
        ```text
        p: 1
        r: 2
        o: 2
        ...
        ```

2.  **Inventario de Tienda:**
    *   Define un array multidimensional que simule el inventario de una tienda. Cada producto debe tener: `nombre`, `precio` y `stock`.
    *   **Objetivos:**
        1.  Calcular el valor total del inventario (sumatoria de `precio * stock` de todos los productos).
        2.  Encontrar y mostrar el producto más caro.
        3.  Generar una lista de productos con bajo stock (menos de 5 unidades).

3.  **Generador de Tablas HTML:**
    *   Genera dinámicamente una tabla HTML (`<table>`) que represente las tablas de multiplicar del 1 al 10.
    *   Debes usar **ciclos anidados** (un ciclo dentro de otro).
    *   El ciclo externo controlará las filas (`<tr>`) y el interno las celdas (`<td>`).
    *   Agrega estilos CSS básicos (inline o separado) para que las celdas tengan bordes y se vea ordenado.
    *   *Extra:* Colorea el fondo de la celda donde el resultado sea un número par.

## Retos y Recursos Externos

Además de estos ejercicios, te recomendamos practicar en plataformas interactivas que ofrecen feedback inmediato:

*   **W3Schools PHP Exercises:** [w3schools.com/php/exercise.asp](https://www.w3schools.com/php/exercise.asp?filename=exercise_loops1) - Selecciona las secciones "PHP Loops" y "PHP Arrays". Son ejercicios rápidos para memorizar sintaxis.
*   **Exercism PHP Track:** [exercism.org/tracks/php](https://exercism.org/tracks/php) - Busca ejercicios como "Hamming", "High Scores" o "Matrix". Excelentes para practicar lógica con arrays.
*   **Codewars:** [codewars.com](https://www.codewars.com/?language=php) - Filtra por dificultad (8kyu es la más fácil). Desafíos de algoritmos que te obligarán a usar bucles y arrays de forma creativa.
