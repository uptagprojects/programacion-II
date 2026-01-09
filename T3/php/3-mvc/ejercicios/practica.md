## Ejercicios Prácticos

1.  **Enrutamiento Básico:** Implementa un sistema de rutas simple en un archivo `index.php`. El script debe capturar una variable por URL (ejemplo: `index.php?url=quienes-somos`) y, utilizando un `switch`, cargar un archivo de vista diferente dependiendo del valor. Si la ruta no existe, debe cargar una vista de error 404.
2.  **Pasaje de Datos Controlador-Vista:** Crea un controlador llamado `ProductoController` con un método `detalle($id)`. Este método debe simular la obtención de un producto desde un modelo (puedes usar un array asociativo) y luego requerir un archivo de vista llamado `detalle.php`, pasando los datos del producto para que se muestren en un formato de tarjeta HTML.
3.  **Lógica de Modelo:** Crea una clase `ModeloBase` que contenga una conexión PDO. Luego, crea una clase `Noticia` que herede de `ModeloBase`. Implementa un método `listarRecientes()` que devuelva las últimas 5 noticias de una base de datos. Asegúrate de que el controlador solo llame a este método sin conocer los detalles de la consulta SQL.

## Retos de programación en MVC y Arquitectura

- [Laracasts - The PHP Practitioner](https://laracasts.com/series/php-for-beginners): Una serie excelente que construye un framework MVC desde cero, ideal para entender cada pieza del rompecabezas.
- [SitePoint - Build a Simple PHP MVC Framework](https://www.sitepoint.com/build-php-mvc-framework/): Un tutorial paso a paso para profundizar en la estructura de un framework moderno.
