# Práctica: Formularios y Manejo de Datos

## Ejercicios Prácticos

Para dominar el manejo de formularios, métodos HTTP y validación en PHP, completa los siguientes desafíos:

1.  **Saludo Personalizado:**
    *   Crea un archivo `saludo.php` y un formulario HTML (en el mismo archivo o separado) que pida el nombre y apellido.
    *   Configura el formulario para usar el método `GET`.
    *   Al enviar, debe mostrar un mensaje: "Hola, [Nombre] [Apellido]!".
    *   **Reto:** Si los parámetros no existen en la URL (primera carga), no debe mostrar ningún mensaje de error ni saludo incompleto.

2.  **Calculadora Simple:**
    *   Crea una calculadora que reciba dos números y una operación (suma, resta, multiplicación, división) mediante un `select`.
    *   Usa el método `POST` para enviar los datos.
    *   **Validación:** Asegúrate de que los valores sean numéricos (`is_numeric`) y evita la división por cero. Si hay error, muéstralo; si no, muestra el resultado.

3.  **Formulario de Contacto Seguro:**
    *   Crea un formulario completo con: Nombre, Email, Asunto y Mensaje.
    *   **Requerimientos de Validación:**
        *   Nombre: mínimo 3 caracteres, sin números.
        *   Email: formato válido (`filter_var`).
        *   Mensaje: mínimo 10 caracteres.
    *   Almacena los errores en un array. Si el array está vacío al procesar, muestra un mensaje de éxito con los datos **sanitizados** (sin etiquetas HTML peligrosas usando `htmlspecialchars`).
    *   Si hay errores, muéstralos en una lista sobre el formulario y **mantén los valores ingresados** en los inputs para que el usuario no tenga que escribirlos de nuevo.


## Retos y Recursos Externos

Además de estos ejercicios locales, utiliza estas plataformas para practicar escenarios reales y ver ejemplos de la comunidad:

*   **FreeCodeCamp (PHP):** [freecodecamp.org](https://www.freecodecamp.org/learn/relational-database/learn-php-by-building-a-simple-application/build-a-simple-php-application) - Tutoriales interactivos donde construyes aplicaciones pequeñas que manejan formularios.
*   **PHP Form Exercises (W3Resource):** [w3resource.com](https://www.w3resource.com/php-exercises/php-form-exercises.php) - Una colección extensa de ejercicios específicos de formularios, desde lo básico hasta manejo de archivos.
*   **Codecademy (PHP Forms):** [codecademy.com](https://www.codecademy.com/learn/learn-php/modules/php-forms) - Módulos interactivos dedicados exclusivamente a `$_GET`, `$_POST` y validación de formularios (requiere cuenta).
*   **PHP Delusions:** [phpdelusions.net](https://phpdelusions.net/) - (Lectura recomendada) Aunque no es un sitio de ejercicios interactivos, es la "biblia" de las buenas prácticas modernas en PHP. Muy útil para entender *cómo no* procesar formularios de forma insegura.
*   **HackerRank (PHP):** [hackerrank.com/domains/php](https://www.hackerrank.com/domains/php) - Desafíos que a menudo requieren leer input desde `STDIN` o procesar datos de formas que refuerzan el entendimiento del flujo de datos.
