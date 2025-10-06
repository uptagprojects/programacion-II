# 📚 Introducción a HTML

**HTML** (HyperText Markup Language) es el lenguaje de marcado estándar que se utiliza para crear páginas web. Es la columna vertebral de cualquier sitio, encargándose de la estructura y el contenido. No es un lenguaje de programación, sino un lenguaje que le dice al navegador cómo debe mostrar el contenido.

### Estructura de una Página Web

Toda página HTML sigue una estructura básica. Piénsalo como el esqueleto de tu sitio.

| Elemento          | Descripción                                                                                                                                    |
| ----------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| `<!DOCTYPE html>` | Declaración que define el documento como HTML5. Siempre va al inicio.                                                                          |
| `<html>`          | El elemento raíz de toda página HTML. Encierra todo el contenido.                                                                              |
| `<head>`          | Contiene metadatos sobre el documento (como el título, el conjunto de caracteres, y enlaces a CSS). No se muestra en la ventana del navegador. |
| `<body>`          | Contiene el contenido visible de la página (texto, imágenes, enlaces, etcétera).                                                               |

#### Ejemplo de Estructura Básica

```HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Primera Página HTML</title>
</head>
<body>
    <h1>¡Hola Mundo!</h1>
    <p>Este es el contenido principal de mi sitio.</p>
</body>
</html>
```

### Etiquetas Semánticas de Estructura

Toda página HTML sigue una estructura básica, pero con HTML5 podemos usar etiquetas que describen el propósito de su contenido, haciendo nuestro código más legible y significativo.
La estructura moderna de HTML5 usa etiquetas que describen el propósito del contenido, mejorando la accesibilidad y el SEO.

| Etiqueta    | Función                                                                           | Atributos Clave             |
| ----------- | --------------------------------------------------------------------------------- | --------------------------- |
| `<header>`  | Contenido introductorio o de navegación (logo, título, etc.).                     | Globales (id, class, style) |
| `<nav>`     | Contenedor de enlaces principales de navegación.                                  | Globales                    |
| `<main>`    | El contenido principal único de la página.                                        | Globales                    |
| `<article>` | Contenido independiente y autosuficiente (publicación, noticia, widget).          | Globales                    |
| `<section>` | Agrupa contenido relacionado temáticamente (debe tener un encabezado).            | Globales                    |
| `<aside>`   | Contenido relacionado indirectamente o tangencial (barras laterales, publicidad). | Globales                    |
| `<footer>`  | Información de cierre (derechos de autor, información de contacto).               | Globales                    |

> Nota: Los Atributos Globales (como id, class, style, data-\*) pueden aplicarse a cualquier etiqueta HTML.

#### Ejemplo de estructuras con HTML5

```html
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Blog de IT</title>
  </head>
  <body>
    <header>
      <h1>Universidad de IT</h1>
      <nav>...</nav>
    </header>

    <main>
      <section>
        <h2>Noticias Destacadas</h2>
        <article>
          <h3>Nuevo Lenguaje de Programación</h3>
          <p>Detalles de la noticia...</p>
        </article>
        <article>
          <h3>Evento de Ciberseguridad</h3>
          <p>Detalles del evento...</p>
        </article>
      </section>
    </main>

    <aside>
      <h4>Enlaces de Interés</h4>
      <ul>
        <li><a href="#">Calendario Académico</a></li>
      </ul>
    </aside>

    <footer>
      <p>&copy; 2024 Universidad de IT. Todos los derechos reservados.</p>
    </footer>
  </body>
</html>
```

### Elementos, Etiquetas y Atributos

| Concepto               | Definición                                                      | Ejemplo                                  |
| ---------------------- | --------------------------------------------------------------- | ---------------------------------------- |
| Etiqueta _(Tag)_       | Nombre encerrado entre corchetes angulares.                     | `<p>`, `</p>`                            |
| Elemento _(Element)_   | La etiqueta de apertura, el contenido y la etiqueta de cierre.  | `<p>Contenido</p>`                       |
| Atributo _(Attribute)_ | Información adicional que se coloca en la etiqueta de apertura. | `<img src="foto.jpg" alt="Descripción">` |

### Etiquetas de Texto

| Etiqueta      | Función                                 | Atributos Clave | Ejemplo                       |
| ------------- | --------------------------------------- | --------------- | ----------------------------- |
| `<h1> a <h6>` | Encabezados (importancia jerárquica).   | Globales        | `<h1>Título</h1>`             |
| `<p>`         | Párrafo de texto.                       | Globales        | `<p>Mi texto.</p>`            |
| `<strong>`    | Texto con gran importancia (semántica). | Globales        | `<strong>Importante</strong>` |
| `<em>`        | Texto con énfasis (tono o acentuación). | Globales        | `<em>Énfasis</em>`            |
| `<br>`        | Salto de línea (etiqueta vacía).        | Globales        | `Línea 1<br>Línea 2`          |

### Enlaces

Los enlaces son el corazón de la web. La etiqueta **<a>** _(anchor)_ se usa para hipervínculos.

| Atributo | Descripción                                                    | Valores Comunes                                                |
| -------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| href     | Obligatorio. Especifica la URL o ruta de destino.              | https://..., archivo.html, `#seccion`                          |
| target   | Define dónde se abrirá el enlace.                              | `_self` (por defecto, misma pestaña), `_blank` (nueva pestaña) |
| rel      | Especifica la relación entre el documento actual y el destino. | `noopener`, `noreferrer`, `nofollow`                           |
| download | Indica que el recurso debe ser descargado.                     | Nombre del archivo (opcional)                                  |

#### Ejemplo de Enlace

```html
<a href="documentos/pdf-final.pdf" download="reporte-final.pdf"
  >Descargar Reporte</a
>
```

### Listas

Se usan para organizar la información de forma estructurada.

| Etiqueta | Función                      | Atributos Clave                                                       |
| -------- | ---------------------------- | --------------------------------------------------------------------- |
| `<ul>`   | Lista Desordenada (viñetas). | Globales                                                              |
| `<ol>`   | Lista Ordenada (secuencia).  | `type` (cambia el marcador: 1, A, a, I, i), `start` (número inicial). |
| `<li>`   | Elemento de la lista.        | `value` (para <ol>, establece un número específico para ese ítem).    |

#### Ejemplo de Lista Ordenada

```html
<ol type="A" start="3">
  <li>Tercer paso</li>
  <li>Cuarto paso</li>
</ol>
```

### Multimedia

#### Imágenes

La etiqueta `<img>` es vacía y se usa para incrustar imágenes.

| Atributo       | Función                                                                    | Valores Clave                            |
| -------------- | -------------------------------------------------------------------------- | ---------------------------------------- |
| src            | Obligatorio. Ruta o URL del archivo de imagen.                             | Ruta local o URL externa.                |
| alt            | Obligatorio. Texto alternativo para accesibilidad o si la imagen no carga. | Una descripción concisa del contenido.   |
| width / height | Define el ancho y alto del viewport de la imagen.                          | Valores en píxeles (sin la unidad 'px'). |

Ejemplo
```html
<img src="logo-it.png" alt="Logo de la Universidad de IT" width="100">
```

#### Video

Se usa para incrustar reproductores de video.

| Atributo | Función                                                                | Valores Clave             |
| -------- | ---------------------------------------------------------------------- | ------------------------- |
| src      | Ruta del archivo de video (también se usa <source>).                   | Ruta local o URL externa. |
| controls | Muestra la interfaz de usuario de reproducción (pausa, volumen, etc.). | Booleano                  |
| autoplay | Inicia la reproducción automática al cargar la página.                 | Booleano                  |
| loop     | Reproduce el video en un ciclo continuo.                               | Booleano                  |

> Nota: El texto dentro de la etiqueta sólo es visible cuando el navegador no soporta la etiqueta `<video>`

Ejemplo
```html
<video src="clase.mp4" controls>
    Tu navegador no soporta el video.
</video>
```

### Tablas

Utilizadas para mostrar datos tabulares (filas y columnas).

| Etiqueta  | Función                                | Atributos Clave                                                           |
| --------- | -------------------------------------- | ------------------------------------------------------------------------- |
| `<table>` | Contenedor principal.                  | Globales                                                                  |
| `<thead>` | Contenedor de las filas de encabezado. | Globales                                                                  |
| `<tbody>` | Contenedor de las filas de datos.      | Globales                                                                  |
| `<tr>`    | Define una fila (Table Row).           | Globales                                                                  |
| `<th>`    | Define una celda de encabezado.        | scope (define si es encabezado de col o row).                             |
| `<td>`    | Define una celda de datos.             | colspan (une celdas horizontalmente), rowspan (une celdas verticalmente). |

#### Ejemplo de Tabla

```html
<table>
    <thead>
        <tr>
            <th>Curso</th>
            <th>Créditos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Introducción a HTML</td>
            <td>3</td>
        </tr>
    </tbody>
</table>
```


#### Ejemplo de Celda Unida

```html
<tr>
    <td colspan="2">Dato que ocupa dos columnas</td>
</tr>
```
