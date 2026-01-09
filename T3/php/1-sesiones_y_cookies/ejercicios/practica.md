## Ejercicios Prácticos

1.  **Preferencias de Usuario:** Crea un formulario simple con un desplegable para elegir el "Color de Fondo" (ej. claro/oscuro) y un botón "Guardar". Al enviar, guarda la elección en una **Cookie** por 7 días. Si la cookie existe, el color de fondo de la página debe cambiar automáticamente al cargarla.
2.  **Sistema de Login Simulado:** Crea dos archivos: `login.php` y `panel.php`. En `login.php`, crea un formulario de usuario/contraseña. Al enviar, si las credenciales son "admin" y "1234", inicia una **Sesión**, guarda el nombre de usuario en `$_SESSION` y redirige a `panel.php`. Si no, muestra error. En `panel.php`, verifica si la sesión existe; si no, redirige de vuelta al login. Incluye un botón "Cerrar Sesión" que destruya la sesión.
3.  **Carrito de Compras Básico:** Crea un array de productos simulados (nombre y precio). Muestra la lista con un botón "Añadir" al lado de cada uno. Al hacer clic, añade el producto a un array en `$_SESSION['carrito']`. Muestra el contenido del carrito y el precio total en la parte superior de la página en todo momento.

## Retos de programación en PHP

- [Exercism PHP Track](https://exercism.org/tracks/php): Ejercicios de lógica y algoritmos guiados por mentores, específicos para PHP.
- [PHP.net Auth Tutorial](https://www.php.net/manual/es/features.http-auth.php): Documentación oficial sobre autenticación HTTP básica.
