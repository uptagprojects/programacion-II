## 🛠 Ejercicios Prácticos

1.  **Maquetación de la Caja:** Crea un `<div>` con la clase `tarjeta`. Aplícale un `width: 300px` y `height: 200px`.
      * Añádele un `padding` de `15px`.
      * Añádele un `margin` de `20px` y céntralo horizontalmente.
      * Dale un `border: 2px solid green;`.
      * ¡Asegúrate de usar `box-sizing: border-box;`\!
2.  **Estilizado de Enlaces:** Selecciona todos los enlaces (`a`) y haz que:
      * Tengan `color: purple;`.
      * Usa `text-decoration: none;` para eliminar el subrayado.
      * Crea una regla `a:hover` (pseudoclase) para que cambien a `color: hotpink;` cuando el mouse pase por encima.
3.  **Fondo y Tipografía:** Al elemento `<body>` de tu página:
      * Asígnale un `font-family` que sea legible.
      * Ponle un `background-color` suave (usa un valor Hex o RGB).


## 🛠 Ejercicios Prácticos Avanzados

1.  **Navegación Flexible (Flexbox):** Crea una barra de navegación (`<nav>`) y dentro tres enlaces (`<a>`).
      * Aplica `display: flex;` al `<nav>`.
      * Usa `justify-content: space-around;` para distribuir los enlaces uniformemente.
2.  **Encabezado Fijo (`position: fixed`):** Crea un `<header>` y aplícale:
      * `position: fixed;`
      * `top: 0;`
      * `width: 100%;`
      * Añade suficiente contenido al `<body>` para habilitar el *scroll* y comprueba que el encabezado se queda fijo.
3.  **Layout de Página (Grid):** En el `<body>` o `<main>`, crea una estructura que tenga un *sidebar* y un área de contenido principal.
      * Aplica `display: grid;`.
      * Define las columnas: `grid-template-columns: 300px 1fr;` (una columna de 300px para el sidebar y el resto del espacio para el contenido).
