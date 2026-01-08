# Práctica: Funciones en PHP

## Ejercicios Prácticos

Para afianzar los conceptos de funciones, tipos y paso por referencia, realiza los siguientes desafíos:

1.  **Calculadora de Descuentos:**
    *   Crea una función llamada `calcularDescuento(float $precio, int $porcentaje): float`.
    *   La función debe retornar el precio final aplicado el descuento.
    *   **Validación:** Si el porcentaje es negativo o mayor a 100, la función debe retornar el precio original ser modificado (o lanzar un error si prefieres practicar excepciones).
    *   *Tip:* Usa `declare(strict_types=1);` al inicio de tu archivo.

2.  **Transformador de Texto:**
    *   Crea una función `formatearTexto(string $texto, string $modo = 'capital'): string`.
    *   El parámetro `$modo` debe aceptar:
        *   `'mayus'`: Convierte todo a mayúsculas (`strtoupper`).
        *   `'minus'`: Convierte todo a minúsculas (`strtolower`).
        *   `'capital'`: Convierte la primera letra de cada palabra (`ucwords`).
    *   Usa una expresión `match` (PHP 8) o un `switch` para manejar la lógica.

3.  **Sistema de Log con Referencias:**
    *   Crea una función `agregarLog(array &$historial, string $mensaje): void`.
    *   Nota el uso de `&` en `$historial`. La función no debe retornar nada, sino modificar el array original.
    *   Debe agregar al array un string con el formato: `"[Fecha y Hora] Mensaje"`.
    *   Prueba llamando a la función varias veces y luego imprime el array `$historial` fuera de la función para verificar que guardó los cambios.


## Retos y Recursos Externos

Además de estos ejercicios, te recomendamos practicar en plataformas interactivas que ofrecen feedback inmediato:

*   **Edabit (PHP Functions):** [edabit.com/challenges/php](https://edabit.com/challenges/php) - Selecciona la etiqueta "Functions". Son ejercicios cortos y adictivos ("bites") ideales para desarrollar memoria muscular.
*   **Exercism PHP Track:** [exercism.org/tracks/php](https://exercism.org/tracks/php) - Ejercicios más completos que incluyen pruebas unitarias (TDD). Requiere instalar su CLI, lo cual es una excelente práctica de entorno real.
*   **W3Schools Exercises:** [w3schools.com/php/exercise.asp](https://www.w3schools.com/php/exercise.asp?filename=exercise_functions1) - Ejercicios sencillos de "completa el espacio en blanco" para revisar sintaxis básica.
*   **Codewars:** [codewars.com](https://www.codewars.com/?language=php) - Retos de algoritmos (Katas) que a menudo requieren crear funciones eficientes.
