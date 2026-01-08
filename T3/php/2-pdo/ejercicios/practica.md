## Ejercicios Prácticos

1.  **Conexión y Consulta Simple:** Escribe un script que conecte a una base de datos local llamada `escuela`. Si la conexión falla, muestra un mensaje amigable (no el error crudo de PHP). Si tiene éxito, realiza una consulta `SELECT` para obtener todos los estudiantes de la tabla `alumnos` y muéstralos en una lista HTML `<ul>`.
2.  **Buscador Seguro:** Crea un formulario con un campo "Buscar por Nombre". Al enviar, busca en la tabla `productos` aquellos que coincidan con el término. **Debes usar sentencias preparadas** para prevenir inyección SQL. Si no se encuentran resultados, muestra un mensaje "Sin resultados".
3.  **Registro de Usuarios (INSERT):** Diseña un formulario de registro (Nombre, Email, Password). Al enviar, inserta los datos en la tabla `usuarios` usando parámetros nombrados (`:nombre`, `:email`, etc.). Asegúrate de "hashear" la contraseña con `password_hash()` antes de guardarla. Muestra el ID del usuario recién creado al finalizar.

## Retos de programación en Bases de Datos

- [SQLZoo](https://sqlzoo.net/): Tutoriales interactivos de SQL para practicar consultas, desde lo básico hasta JOINs complejos.
- [PHP Delusions](https://phpdelusions.net/pdo): Profundiza en el manejo correcto de errores y seguridad.
