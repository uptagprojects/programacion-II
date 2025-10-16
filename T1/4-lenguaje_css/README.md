# 🎨 CSS - Hojas de Estilo en Cascada

**CSS** (*Cascading Style Sheets*) es un lenguaje de hojas de estilo que se utiliza para describir la presentación de un documento escrito en HTML. Se encarga de los colores, tipografías, *layouts*, y todos los aspectos visuales.

-----

## Incluir CSS en un Documento HTML

Existen tres formas de aplicar estilos CSS a tu documento HTML. La opción externa es, con diferencia, la **mejor práctica** en desarrollo web.

### A. Estilos Externos (Recomendado) 🔗

  * Se escribe el código CSS en un archivo separado (ej: `styles.css`).
  * Se vincula el archivo CSS dentro de la etiqueta `<head>` del HTML.

<!-- end list -->

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estilos CSS</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    </body>
</html>
```

### B. Estilos Internos (`<style>`)

  * Se escribe el código CSS directamente dentro de la etiqueta `<style>` ubicada en el `<head>` del HTML.

<!-- end list -->

```html
<head>
    <style>
        h1 { color: blue; }
    </style>
</head>
```

### C. Estilos en Línea (*Inline*)

  * Se aplica el CSS directamente al elemento HTML usando el atributo `style`. **(Evitar su uso)**.

<!-- end list -->

```html
<h1 style="color: red; font-size: 24px;">Título</h1>
```

-----

## Selectores (Apuntar a los Elementos)

Un **Selector** es el patrón usado para **seleccionar** los elementos HTML a los que se aplicarán las reglas de estilo.

| Selector | Sintaxis | Ejemplo de CSS | Aplicación |
| :--- | :--- | :--- | :--- |
| **Por Etiqueta** | `etiqueta` | `p { ... }` | Aplica a **todos** los `<p>`. |
| **Por Clase** | `.clase` | `.btn { ... }` | Aplica a elementos con el atributo `class="btn"`. |
| **Por ID** | `#id` | `#logo { ... }` | Aplica a un **único** elemento con el atributo `id="logo"`. |
| **Universal** | `*` | `* { ... }` | Aplica a **todos** los elementos. |
| **Combinado** | `tag.clase` | `a.externo { ... }` | Aplica solo a enlaces (`<a>`) con la clase `externo`. |

**Regla de Prioridad (Cascada):** Los ID tienen mayor prioridad que las Clases, y las Clases tienen mayor prioridad que las Etiquetas. Los estilos en línea tienen la máxima prioridad.

-----

## Modelo de Caja (*Box Model*) 📦

El Modelo de Caja es el concepto fundamental de CSS. Cada elemento HTML es tratado por el navegador como una caja rectangular que envuelve su contenido.

| Componente | Descripción |
| :--- | :--- |
| **Content** | El contenido real del elemento (texto, imagen, video). |
| **Padding (Relleno)** | Espacio **transparente** entre el borde y el contenido. |
| **Border (Borde)** | La línea visible que rodea el padding y el contenido. |
| **Margin (Margen)** | Espacio **transparente** *fuera* del borde, que separa la caja de otros elementos. |

**Propiedad Clave:**

  * `box-sizing: border-box;`: Esta propiedad es una **práctica moderna esencial**. Le indica al navegador que el `padding` y el `border` deben **incluirse** dentro del ancho (`width`) y alto (`height`) total del elemento, facilitando el diseño.

-----

## Bordes y Márgenes

### Bordes (`border`)

Permiten definir el estilo, ancho y color de la línea que rodea la caja.

```css
/* Sintaxis abreviada: [ancho] [estilo] [color] */
.caja {
    border: 3px solid black; 
}
/* Se pueden definir individualmente: */
.caja-especial {
    border-top-width: 5px;
    border-style: dashed;
    border-color: #55aaff;
}
```

### Márgenes y Relleno (`margin` y `padding`)

Controlan el espacio **alrededor** (margin) y **dentro** (padding) del elemento.

| Propiedad | Función | Sintaxis (Abreviada) |
| :--- | :--- | :--- |
| **`margin`** | Espacio **exterior** del borde. | `margin: 10px 20px 5px 0;` (Arriba, Derecha, Abajo, Izquierda) |
| **`padding`** | Espacio **interior** del borde. | `padding: 10px 20px;` (10px Arriba/Abajo, 20px Izquierda/Derecha) |

**Tip de Centrado Horizontal:** Para centrar un elemento de nivel de bloque (`<div>`, `<p>`) que tenga un ancho definido (`width`), usa: `margin: 0 auto;`.

-----

## Estilos de Texto

| Propiedad | Función | Valores Comunes |
| :--- | :--- | :--- |
| **`font-family`** | Tipo de letra. | `"Arial", sans-serif;` |
| **`font-size`** | Tamaño del texto. | `16px`, `1.2em`, `2rem` |
| **`font-weight`** | Grosor de la fuente. | `bold`, `normal`, `700` |
| **`color`** | Color del texto. | `#000000`, `rgb(0,0,0)`, `black` |
| **`text-align`** | Alineación del texto. | `left`, `right`, `center`, `justify` |
| **`line-height`** | Espaciado vertical entre líneas. | `1.5` (150% del tamaño de la fuente) |
| **`text-decoration`** | Decora el texto. | `none` (ideal para quitar el subrayado de los enlaces) |

-----

## Colores

CSS acepta varios formatos para definir colores:

1.  **Hexadecimal (Hex):** Se usa el signo `#` seguido de 6 dígitos (o 3 abreviados).
      * `color: #FF0000;` (Rojo puro)
2.  **RGB (Rojo, Verde, Azul):** Se usan valores de 0 a 255.
      * `color: rgb(255, 0, 0);` (Rojo puro)
3.  **RGBA (RGB + Alpha):** Igual que RGB, pero con un canal **Alpha** (transparencia), donde 0 es transparente y 1 es opaco.
      * `color: rgba(0, 0, 0, 0.5);` (Negro con 50% de transparencia)
4.  **Nombres Predefinidos:** Nombres básicos reconocidos.
      * `color: blue;`

-----

## Fondo (`background`)

Controla la apariencia detrás del contenido de un elemento.

| Propiedad | Función | Ejemplo |
| :--- | :--- | :--- |
| **`background-color`** | Color de fondo de la caja. | `background-color: #f0f0f0;` |
| **`background-image`** | Imagen de fondo. | `background-image: url('img/fondo.jpg');` |
| **`background-repeat`** | Define si la imagen se repite. | `background-repeat: no-repeat;` |
| **`background-position`** | Posición de la imagen de fondo. | `background-position: center top;` |
| **`background` (Abreviada)** | Combinación de todas las propiedades. | `background: #333 url('img/patron.png') no-repeat center;` |


-----

## Propiedades Fundamentales de Comportamiento (`display` y `position`)

Estas dos propiedades definen cómo interactúan los elementos entre sí y dónde se colocan en la página.

### A. Propiedad `display`

La propiedad `display` determina el tipo de **caja** de visualización que tendrá un elemento, afectando cómo interactúa con los márgenes, anchos y otros elementos a su alrededor.

| Valor | Comportamiento | Características Clave |
| :--- | :--- | :--- |
| **`block`** | Ocupa todo el ancho disponible. | Siempre inicia en una nueva línea. Acepta `width`, `height`, `margin` y `padding`. (Ej: `<div>`, `<h1>`, `<p>`) |
| **`inline`** | Ocupa solo el ancho necesario para su contenido. | **No** inicia en una nueva línea. Ignora la mayoría de los `width` y `height`. (Ej: `<span>`, `<a>`, `<strong>`) |
| **`inline-block`** | Ocupa solo el ancho necesario, pero se comporta como `block`. | Permite que otros elementos lo rodeen, pero acepta `width` y `height`. |
| **`none`** | Oculta el elemento completamente (no ocupa espacio en el layout). | (Diferente de `visibility: hidden;` que solo lo oculta, pero mantiene su espacio). |
| **`flex`** | Convierte el elemento en un **contenedor Flexbox**. | Habilita la alineación y distribución flexible de sus hijos (ver Sección 9). |
| **`grid`** | Convierte el elemento en un **contenedor Grid**. | Habilita el diseño de cuadrícula en dos dimensiones (ver Sección 10). |

-----

### B. Propiedad `position`

La propiedad `position` controla la colocación exacta de un elemento y cómo se comporta al hacer *scroll*. Trabaja junto a las propiedades `top`, `bottom`, `left`, y `right`.

| Valor | Descripción | Comportamiento |
| :--- | :--- | :--- |
| **`static`** | **(Por defecto)**. El elemento se posiciona según el flujo normal del documento. | `top`, `bottom`, `left`, `right` no tienen efecto. |
| **`relative`** | Se posiciona según el flujo normal, pero **se puede desplazar** a partir de su posición original. | Deja un espacio vacío donde estaba originalmente. |
| **`absolute`** | Se posiciona en relación a su **padre posicionado más cercano** (`relative`, `absolute`, `fixed`, o `sticky`). | Se saca del flujo normal del documento. |
| **`fixed`** | Se posiciona en relación a la **ventana del navegador (viewport)**. | Permanece visible y fijo, incluso al hacer *scroll*. |
| **`sticky`** | Funciona como `relative` hasta que el usuario hace *scroll* y alcanza una posición definida (ej: `top: 0;`), momento en el que se vuelve `fixed`. | Ideal para encabezados que se 'pegan' en la parte superior. |

-----

## Flexbox (Diseño Flexible en una Dimensión)

**Flexbox** es un módulo de diseño que permite alinear, distribuir y organizar elementos en **una sola dimensión** (fila O columna). Es la herramienta preferida para componentes, barras de navegación y alineaciones sencillas.

### Conceptos Clave

  * **Contenedor Flexible:** El elemento padre al que se le aplica `display: flex;`.
  * **Elementos Flexibles:** Los hijos directos dentro del contenedor.
  * **Eje Principal:** La dirección principal de los elementos (por defecto, horizontal).
  * **Eje Transversal:** La dirección perpendicular al eje principal (por defecto, vertical).

### Propiedades Esenciales

| Aplicación | Propiedad | Función |
| :--- | :--- | :--- |
| **Contenedor** | `display: flex;` | Habilita Flexbox. |
| **Contenedor** | `flex-direction` | Define el Eje Principal (`row`, `column`). |
| **Contenedor** | `justify-content` | Distribuye el espacio **a lo largo del Eje Principal** (`center`, `space-between`, `flex-start`). |
| **Contenedor** | `align-items` | Alinea los elementos **a lo largo del Eje Transversal** (`center`, `flex-start`). |
| **Elementos** | `flex-grow` | Define la capacidad del ítem para crecer y ocupar espacio extra. |

-----

## Grid (Diseño de Cuadrícula en Dos Dimensiones)

**CSS Grid** es un módulo de diseño que permite crear *layouts* complejos en **dos dimensiones** (filas Y columnas simultáneamente). Es la herramienta ideal para diseñar la estructura principal (el *layout*) de toda una página.

### Conceptos Clave

  * **Contenedor Grid:** El elemento padre al que se le aplica `display: grid;`.
  * **Celdas, Líneas, Áreas:** Grid crea una cuadrícula virtual definida por líneas (horizontales y verticales) que forman celdas y áreas.

### Propiedades Esenciales

| Aplicación | Propiedad | Función |
| :--- | :--- | :--- |
| **Contenedor** | `display: grid;` | Habilita Grid. |
| **Contenedor** | `grid-template-columns` | Define el número y ancho de las columnas. (Ej: `1fr 1fr 1fr;`) |
| **Contenedor** | `grid-template-rows` | Define el número y alto de las filas. |
| **Contenedor** | `gap` | Define el espacio entre las filas y columnas. |
| **Elementos** | `grid-column` / `grid-row` | Define qué líneas debe abarcar el elemento (ej: `grid-column: 1 / 3;`). |

-----

## Variables CSS (Propiedades Personalizadas)

Las **Variables CSS** son entidades definidas por el autor que contienen valores específicos para reutilizar a lo largo de un documento. Permiten almacenar valores repetitivos (como colores de marca o tamaños de fuente base) en un solo lugar, haciendo que los cambios de diseño sean rápidos y consistentes.

### A. Definición y Uso

1.  **Declaración:** Las variables se definen dentro de un bloque de reglas CSS, generalmente en el selector `:root`. El selector `:root` se refiere al elemento raíz (`<html>`) y hace que las variables estén disponibles globalmente.
      * Se definen usando **dos guiones** antes del nombre: `--nombre-variable`.
2.  **Uso:** Se accede al valor de la variable usando la función **`var()`**.

| Concepto | Sintaxis CSS | Descripción |
| :--- | :--- | :--- |
| **Declaración Global** | `:root { --color-principal: #007bff; }` | Define la variable en el nivel más alto del documento. |
| **Uso de la Variable** | `background-color: var(--color-principal);` | Aplica el valor (`#007bff`) donde se necesita. |
| **Valor de Reserva** | `color: var(--color-secundario, grey);` | Si `--color-secundario` no existe, se usa `grey`. |

### Ejemplo Práctico de Variables

```css
/* Definición de Variables Globales */
:root {
    --color-principal: #FF4500;  /* Naranja brillante */
    --espacio-base: 1.5rem;      /* Unidad de espaciado para márgenes */
}

/* Uso de las Variables */
.encabezado {
    background-color: var(--color-principal); /* Aplicado en el fondo */
    padding: var(--espacio-base);
}

.boton-principal {
    color: white;
    /* Uso con valor de reserva: si --fuente-btn no está definida, usa Arial */
    font-family: var(--fuente-btn, Arial, sans-serif); 
    /* El margen horizontal usa la variable, el vertical es fijo */
    margin: 10px var(--espacio-base); 
}
```

### B. Ventajas Clave

  * **Modularidad y Consistencia:** Garantizan que el mismo color o tamaño se use en toda la aplicación.
  * **Mantenimiento Sencillo:** Para cambiar el color principal de un sitio, solo necesitas modificar una línea de código dentro de `:root`, en lugar de buscar ese valor Hexadecimal en cientos de lugares.
  * **Temas Dinámicos:** Las variables CSS pueden ser modificadas en tiempo de ejecución (mientras la página está abierta) usando JavaScript, lo cual es ideal para implementar temas oscuros o *skins* de usuario.


-----

## 💡 Información Adicional Pertinente: Unidades de Medida

Es vital conocer las diferentes unidades de medida en CSS:

  * **Píxeles (`px`):** Unidad absoluta. Fija e independiente del contexto.
  * **Porcentajes (`%`):** Unidad relativa al elemento padre.
  * **`em`:** Unidad relativa al **tamaño de fuente** del propio elemento o del padre.
  * **`rem`:** Unidad relativa al **tamaño de fuente raíz** (`<html>`). **(Recomendado para tipografía)**.
  * **Unidades de *Viewport* (`vw`, `vh`):** Unidades relativas al tamaño de la ventana del navegador (viewport). `1vw` es el 1% del ancho del viewport.

-----

## 🔗 Sitios de Referencia Esenciales

* **MDN Web Docs:** La documentación más completa.
    * [Referencia CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
    * [Explicación del Box Model](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Box_Model/Introduction_to_the_box_model)
    * [Variables en CSS](https://developer.mozilla.org/es/docs/Web/CSS/CSS_cascading_variables/Using_CSS_custom_properties)
* **CSS Tricks:** Colección de consejos y técnicas avanzadas.
    * [CSS Tricks Almanac](https://css-tricks.com/almanac/)
    * [Guía Completa de Flexbox](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
    * [Guía Completa de Grid](https://css-tricks.com/snippets/css/complete-guide-grid/)
* **Retos Interactivos**: Documentación interactiva y juegos
    * [Flexbox Froggy](https://flexboxfroggy.com/)
    * [Interactive Guide to Grid](https://www.joshwcomeau.com/css/interactive-guide-to-grid/)
    * [Grid by Example](https://gridbyexample.com/patterns/)
    * [CSS Transitions article from Programiz](https://www.programiz.com/css/transitions)
    * [CSS Transitions article from Josh Comeau](https://www.joshwcomeau.com/animation/css-transitions/)
    * [CSS Container Query Guide](https://ishadeed.com/article/css-container-query-guide/#)