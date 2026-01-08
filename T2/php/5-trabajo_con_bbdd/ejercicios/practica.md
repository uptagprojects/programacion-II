# Práctica: Trabajo con Bases de Datos

## Ejercicios Prácticos

1.  **Conexión y Listado:**
    *   Crea una base de datos local llamada `tienda_practica` y una tabla `productos` con campos: `id`, `nombre`, `precio`, `stock`.
    *   Inserta manualmente 3 productos.
    *   Crea un script PHP que se conecte a la base de datos y muestre una lista HTML (`<ul>`) con los nombres y precios de los productos.

2.  **Formulario de Registro:**
    *   Crea un archivo HTML con un formulario que pida: Nombre del producto, Precio y Stock.
    *   Crea el archivo PHP que reciba estos datos por `POST` e inserte el nuevo producto en la tabla.
    *   **Reto:** Valida que el precio no sea negativo antes de insertar.

3.  **Sistema de Actualización:**
    *   Modifica el listado del Ejercicio 1 para que al lado de cada producto haya un enlace "Editar" que lleve a `editar.php?id=X`.
    *   En `editar.php`, muestra un formulario con los datos actuales del producto (recuperados por su ID).
    *   Al enviar ese formulario, actualiza el registro en la base de datos.
    *   **Importante:** Usa **Sentencias Preparadas** para prevenir inyecciones SQL.

## Retos y Recursos Externos

Para reforzar tus habilidades con SQL y PHP, te recomendamos los siguientes recursos interactivos y guías:

*   **SQLZoo:** [sqlzoo.net](https://sqlzoo.net/wiki/SQL_Tutorial) - El mejor sitio para practicar consultas SQL puras, desde lo básico hasta JOINs complejos. Todo interactivo en el navegador.
*   **HackerRank Databases:** [hackerrank.com/domains/databases](https://www.hackerrank.com/domains/sql) - Desafíos de lógica de bases de datos calificados automáticamente.
*   **PHP: The Right Way:** [phptherightway.com](https://phptherightway.com/#databases) - La guía definitiva de buenas prácticas modernas, con una sección específica sobre bases de datos y PDO.
*   **Laracasts - PHP for Beginners:** [laracasts.com](https://laracasts.com/series/php-for-beginners-2023-edition) - (En inglés) Una de las mejores series de video tutoriales. Los capítulos sobre bases de datos explican muy bien *por qué* hacemos las cosas como las hacemos.
