# 📝 Formularios en HTML

Los **formularios HTML** son elementos fundamentales para la interacción con los usuarios en la web. Permiten recopilar información, realizar búsquedas, autenticarse en sistemas, realizar compras y muchas otras acciones. Son el puente principal para que los usuarios puedan enviar datos al servidor.

-----

## Estructura de un Formulario

Un formulario HTML se crea utilizando la etiqueta `<form>`, que actúa como contenedor para todos los elementos de entrada de datos.

| Atributo   | Descripción                                                                                      | Valores Comunes                                      |
| ---------- | ------------------------------------------------------------------------------------------------ | ---------------------------------------------------- |
| **action** | URL o ruta del archivo que procesará los datos del formulario cuando se envíe.                   | `procesar.php`, `/api/registro`, `submit.html`       |
| **method** | Método HTTP utilizado para enviar los datos.                                                     | `GET` (datos visibles en URL), `POST` (datos ocultos) |
| **name**   | Nombre que identifica al formulario (útil cuando hay múltiples formularios).                     | Cualquier nombre válido                              |
| **target** | Especifica dónde mostrar la respuesta después de enviar el formulario.                           | `_self`, `_blank`, `_parent`, `_top`                 |

### Ejemplo de Estructura Básica

```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
</head>
<body>
    <form action="/procesar-registro" method="POST">
        <!-- Los elementos del formulario van aquí -->
        <input type="text" name="nombre" placeholder="Ingrese su nombre">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
```

-----

## Elemento Input

El elemento `<input>` es el componente más versátil de los formularios. Su comportamiento cambia completamente según el valor del atributo **type**.

### Tipos de Input Principales

| Tipo (`type`) | Descripción                                                  | Ejemplo                                       |
| ------------- | ------------------------------------------------------------ | --------------------------------------------- |
| **text**      | Campo de texto de una sola línea (uso general).              | `<input type="text" name="usuario">`          |
| **email**     | Campo para direcciones de correo electrónico (con validación automática). | `<input type="email" name="correo">`          |
| **password**  | Campo de contraseña (los caracteres se ocultan).             | `<input type="password" name="clave">`        |
| **number**    | Campo para números (permite incrementar/decrementar).        | `<input type="number" name="edad">`           |
| **tel**       | Campo para números de teléfono.                              | `<input type="tel" name="telefono">`          |
| **url**       | Campo para URLs (con validación de formato).                 | `<input type="url" name="sitio-web">`         |
| **date**      | Selector de fecha.                                           | `<input type="date" name="fecha-nacimiento">` |
| **time**      | Selector de hora.                                            | `<input type="time" name="hora-cita">`        |
| **file**      | Permite seleccionar archivos para cargar.                    | `<input type="file" name="documento">`        |
| **hidden**    | Campo oculto (no visible para el usuario).                   | `<input type="hidden" name="id" value="123">` |
| **color**     | Selector de color.                                           | `<input type="color" name="color-favorito">`  |
| **range**     | Control deslizante para seleccionar un valor en un rango.    | `<input type="range" name="volumen">`         |
| **search**    | Campo optimizado para búsquedas.                             | `<input type="search" name="busqueda">`       |

### Ejemplo de Diferentes Tipos de Input

```html
<form action="/registro" method="POST">
    <label>Nombre Completo:</label>
    <input type="text" name="nombre" placeholder="Juan Pérez">
    
    <label>Correo Electrónico:</label>
    <input type="email" name="email" placeholder="correo@ejemplo.com">
    
    <label>Contraseña:</label>
    <input type="password" name="password">
    
    <label>Edad:</label>
    <input type="number" name="edad" min="18" max="100">
    
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha-nacimiento">
</form>
```

-----

## Atributos del Elemento Input

Los atributos controlan el comportamiento, la apariencia y la validación de los campos de entrada.

| Atributo        | Descripción                                                                         | Valores / Ejemplo                              |
| --------------- | ----------------------------------------------------------------------------------- | ---------------------------------------------- |
| **name**        | Nombre del campo que se enviará al servidor (obligatorio para procesar datos).      | `name="email"`                                 |
| **id**          | Identificador único del elemento (útil para vincular con `<label>`).                | `id="email-usuario"`                           |
| **value**       | Valor inicial o predeterminado del campo.                                           | `value="Texto por defecto"`                    |
| **placeholder** | Texto de sugerencia que aparece cuando el campo está vacío.                         | `placeholder="Ingrese su nombre"`              |
| **required**    | Marca el campo como obligatorio (el formulario no se enviará si está vacío).        | `required` (atributo booleano)                 |
| **disabled**    | Desactiva el campo (no editable, no se envía con el formulario).                    | `disabled`                                     |
| **readonly**    | El campo es de solo lectura (visible pero no editable, se envía con el formulario). | `readonly`                                     |
| **maxlength**   | Número máximo de caracteres permitidos.                                             | `maxlength="50"`                               |
| **minlength**   | Número mínimo de caracteres requeridos.                                             | `minlength="8"`                                |
| **min / max**   | Valores mínimo y máximo (para tipos numéricos y fechas).                            | `min="0" max="100"`                            |
| **step**        | Incremento para valores numéricos.                                                  | `step="0.5"` (permite decimales de 0.5 en 0.5) |
| **pattern**     | Expresión regular para validación de formato personalizado.                         | `pattern="[0-9]{3}-[0-9]{4}"` (ej: 123-4567)   |
| **autocomplete**| Controla el autocompletado del navegador.                                           | `autocomplete="off"`, `autocomplete="email"`   |
| **autofocus**   | El campo recibe el foco automáticamente al cargar la página.                        | `autofocus`                                    |
| **multiple**    | Permite seleccionar múltiples valores (para `type="file"` o `type="email"`).        | `multiple`                                     |

### Ejemplo con Atributos de Validación

```html
<form>
    <label for="usuario">Nombre de Usuario:</label>
    <input 
        type="text" 
        id="usuario" 
        name="usuario" 
        placeholder="Mínimo 5 caracteres"
        minlength="5" 
        maxlength="20" 
        required
        autofocus
    >
    
    <label for="codigo-postal">Código Postal:</label>
    <input 
        type="text" 
        id="codigo-postal" 
        name="codigo" 
        pattern="[0-9]{5}" 
        placeholder="12345"
        title="Debe contener exactamente 5 dígitos"
        required
    >
</form>
```

-----

## Checkbox y Radiobutton

Estos elementos permiten seleccionar opciones de un conjunto predefinido.

### Checkbox (`type="checkbox"`)

Permite seleccionar **múltiples opciones** de forma independiente.

| Característica | Descripción                                                                 |
| -------------- | --------------------------------------------------------------------------- |
| Selección      | Cada checkbox funciona independientemente.                                  |
| Atributo clave | `checked` - Marca la casilla como seleccionada por defecto.                 |
| Uso común      | Aceptar términos y condiciones, seleccionar múltiples intereses o categorías. |

#### Ejemplo de Checkbox

```html
<form>
    <p>Seleccione sus lenguajes de programación favoritos:</p>
    
    <input type="checkbox" id="python" name="lenguajes" value="python">
    <label for="python">Python</label><br>
    
    <input type="checkbox" id="javascript" name="lenguajes" value="javascript" checked>
    <label for="javascript">JavaScript</label><br>
    
    <input type="checkbox" id="java" name="lenguajes" value="java">
    <label for="java">Java</label><br>
    
    <input type="checkbox" id="cpp" name="lenguajes" value="cpp">
    <label for="cpp">C++</label>
</form>
```

### Radiobutton (`type="radio"`)

Permite seleccionar **solo una opción** de un grupo de opciones mutuamente excluyentes.

| Característica | Descripción                                                                           |
| -------------- | ------------------------------------------------------------------------------------- |
| Selección      | Solo se puede seleccionar un radiobutton dentro del mismo grupo (mismo `name`).       |
| Agrupación     | Todos los radiobuttons del mismo grupo deben tener el **mismo valor en `name`**.      |
| Atributo clave | `checked` - Marca la opción como seleccionada por defecto.                            |
| Uso común      | Seleccionar género, nivel de estudios, opciones de pago.                              |

#### Ejemplo de Radiobutton

```html
<form>
    <p>Seleccione su nivel de experiencia:</p>
    
    <input type="radio" id="principiante" name="nivel" value="principiante" checked>
    <label for="principiante">Principiante</label><br>
    
    <input type="radio" id="intermedio" name="nivel" value="intermedio">
    <label for="intermedio">Intermedio</label><br>
    
    <input type="radio" id="avanzado" name="nivel" value="avanzado">
    <label for="avanzado">Avanzado</label>
</form>
```

> **Nota Importante:** El atributo `name` en radiobuttons **debe ser el mismo** para todos los elementos del grupo. El atributo `value` es lo que se envía al servidor cuando se selecciona esa opción.

-----

## Listas Desplegables

Las listas desplegables se crean con la etiqueta `<select>` y permiten al usuario elegir una o más opciones de un menú.

### Elemento `<select>`

| Atributo     | Descripción                                                          | Ejemplo               |
| ------------ | -------------------------------------------------------------------- | --------------------- |
| **name**     | Nombre del campo que se envía al servidor.                           | `name="pais"`         |
| **id**       | Identificador único del elemento.                                    | `id="lista-paises"`   |
| **multiple** | Permite seleccionar múltiples opciones (mantener Ctrl/Cmd al hacer clic). | `multiple`            |
| **size**     | Número de opciones visibles sin desplegar la lista.                  | `size="3"`            |
| **required** | Marca el campo como obligatorio.                                     | `required`            |
| **disabled** | Desactiva toda la lista desplegable.                                 | `disabled`            |

### Elemento `<option>`

Define cada opción dentro del `<select>`.

| Atributo     | Descripción                                              | Ejemplo                  |
| ------------ | -------------------------------------------------------- | ------------------------ |
| **value**    | Valor que se envía al servidor cuando se selecciona.     | `value="mx"`             |
| **selected** | Marca la opción como seleccionada por defecto.           | `selected`               |
| **disabled** | Desactiva la opción (no se puede seleccionar).           | `disabled`               |

### Elemento `<optgroup>`

Agrupa opciones relacionadas dentro de un `<select>`.

| Atributo  | Descripción                      | Ejemplo                        |
| --------- | -------------------------------- | ------------------------------ |
| **label** | Texto que describe el grupo.     | `label="América del Sur"`      |

### Ejemplo Básico de Lista Desplegable

```html
<form>
    <label for="pais">Seleccione su país:</label>
    <select id="pais" name="pais" required>
        <option value="">-- Seleccione una opción --</option>
        <option value="ar">Argentina</option>
        <option value="co" selected>Colombia</option>
        <option value="mx">México</option>
        <option value="pe">Perú</option>
    </select>
</form>
```

### Ejemplo con Grupos de Opciones

```html
<form>
    <label for="carrera">Seleccione una carrera:</label>
    <select id="carrera" name="carrera" size="8">
        <optgroup label="Ingeniería">
            <option value="sistemas">Ingeniería de Sistemas</option>
            <option value="industrial">Ingeniería Industrial</option>
            <option value="civil">Ingeniería Civil</option>
        </optgroup>
        <optgroup label="Ciencias Sociales">
            <option value="derecho">Derecho</option>
            <option value="psicologia">Psicología</option>
            <option value="economia">Economía</option>
        </optgroup>
    </select>
</form>
```

-----

## Áreas de Texto

El elemento `<textarea>` se utiliza para campos de texto de **múltiples líneas**, ideal para comentarios, descripciones o mensajes largos.

| Atributo        | Descripción                                                         | Ejemplo                       |
| --------------- | ------------------------------------------------------------------- | ----------------------------- |
| **name**        | Nombre del campo que se envía al servidor.                          | `name="comentarios"`          |
| **id**          | Identificador único del elemento.                                   | `id="mensaje"`                |
| **rows**        | Número de líneas visibles (altura del área de texto).               | `rows="5"`                    |
| **cols**        | Número de caracteres visibles por línea (ancho del área de texto).  | `cols="40"`                   |
| **placeholder** | Texto de sugerencia que aparece cuando el área está vacía.          | `placeholder="Su mensaje..."` |
| **maxlength**   | Número máximo de caracteres permitidos.                             | `maxlength="500"`             |
| **required**    | Marca el campo como obligatorio.                                    | `required`                    |
| **readonly**    | El área es de solo lectura.                                         | `readonly`                    |
| **disabled**    | Desactiva el área de texto.                                         | `disabled`                    |
| **wrap**        | Controla cómo se ajusta el texto al enviar el formulario.           | `wrap="soft"`, `wrap="hard"`  |

### Ejemplo de Área de Texto

```html
<form>
    <label for="comentarios">Comentarios adicionales:</label><br>
    <textarea 
        id="comentarios" 
        name="comentarios" 
        rows="6" 
        cols="50"
        placeholder="Ingrese sus comentarios aquí (máximo 500 caracteres)"
        maxlength="500"
        required
    >Texto inicial opcional aquí...</textarea>
</form>
```

> **Nota:** A diferencia de `<input>`, el contenido inicial del `<textarea>` va **entre las etiquetas de apertura y cierre**, no en un atributo `value`.

-----

## Botones

Los botones son elementos interactivos que permiten al usuario realizar acciones en el formulario.

### Tipos de Botones

| Tipo (`type`) | Descripción                                                                                | Comportamiento                                   |
| ------------- | ------------------------------------------------------------------------------------------ | ------------------------------------------------ |
| **submit**    | Botón para enviar el formulario (comportamiento por defecto si no se especifica `type`).   | Envía los datos del formulario al servidor.      |
| **reset**     | Botón para restablecer todos los campos del formulario a sus valores iniciales.           | Limpia/reinicia el formulario.                   |
| **button**    | Botón genérico sin comportamiento predeterminado.                                          | Se usa con JavaScript para acciones personalizadas. |

### Elemento `<button>`

Es la forma moderna y recomendada de crear botones. Permite contenido HTML dentro (imágenes, íconos, etc.).

```html
<button type="submit">Enviar Formulario</button>
<button type="reset">Limpiar Campos</button>
<button type="button" onclick="alert('¡Hola!')">Saludar</button>
```

### Elemento `<input>` como Botón

Forma más antigua, pero aún válida. Solo puede contener texto.

```html
<input type="submit" value="Enviar">
<input type="reset" value="Restablecer">
<input type="button" value="Hacer algo" onclick="alert('Acción personalizada')">
```

### Atributos Comunes de Botones

| Atributo       | Descripción                                                                  | Ejemplo                               |
| -------------- | ---------------------------------------------------------------------------- | ------------------------------------- |
| **name**       | Nombre del botón (enviado al servidor cuando es tipo submit).               | `name="accion"`                       |
| **value**      | Valor enviado al servidor (para `<input>` también es el texto del botón).   | `value="guardar"`                     |
| **disabled**   | Desactiva el botón.                                                          | `disabled`                            |
| **formaction** | URL alternativa para enviar el formulario (sobrescribe el `action` del form). | `formaction="/ruta-alternativa"`      |
| **formmethod** | Método HTTP alternativo (sobrescribe el `method` del form).                  | `formmethod="GET"`                    |

### Ejemplo Completo con Botones

```html
<form action="/procesar" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <!-- Botón para enviar el formulario -->
    <button type="submit">Enviar Datos</button>
    
    <!-- Botón para limpiar el formulario -->
    <button type="reset">Borrar Todo</button>
    
    <!-- Botón personalizado sin acción predeterminada -->
    <button type="button" onclick="console.log('Botón personalizado')">
        Vista Previa
    </button>
</form>
```

-----

## 💡 Información Adicional Pertinente

### A. Etiquetas `<label>` (Accesibilidad)

Las etiquetas `<label>` son **esenciales** para la accesibilidad y usabilidad. Asocian texto descriptivo con un campo de formulario.

**Beneficios:**
- Al hacer clic en el `<label>`, se enfoca automáticamente el campo asociado.
- Los lectores de pantalla usan las etiquetas para describir los campos.

**Dos formas de asociación:**

1. **Usando el atributo `for`** (recomendado):
```html
<label for="email">Correo Electrónico:</label>
<input type="email" id="email" name="email">
```

2. **Envolviendo el input:**
```html
<label>
    Correo Electrónico:
    <input type="email" name="email">
</label>
```

### B. Agrupación con `<fieldset>` y `<legend>`

Estos elementos agrupan campos relacionados y mejoran la semántica y accesibilidad del formulario.

| Elemento       | Descripción                                                |
| -------------- | ---------------------------------------------------------- |
| **`<fieldset>`** | Agrupa un conjunto de controles relacionados dentro del formulario. |
| **`<legend>`**   | Proporciona un título o descripción para el `<fieldset>`. |

#### Ejemplo de Agrupación

```html
<form>
    <fieldset>
        <legend>Información Personal</legend>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido">
    </fieldset>
    
    <fieldset>
        <legend>Información de Contacto</legend>
        
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </fieldset>
</form>
```

### C. Validación HTML5

HTML5 proporciona validación automática del lado del cliente antes de enviar el formulario.

| Atributo/Tipo | Validación que Proporciona                           |
| ------------- | ---------------------------------------------------- |
| **required**  | El campo no puede estar vacío.                       |
| **type="email"** | Valida formato de correo electrónico (debe contener @). |
| **type="url"** | Valida formato de URL (debe comenzar con http:// o https://). |
| **type="number"** | Solo acepta valores numéricos.                       |
| **min / max** | Valida rangos numéricos o de fechas.                 |
| **minlength / maxlength** | Valida la longitud del texto.                        |
| **pattern**   | Valida contra una expresión regular personalizada.   |

**Mensajes de Error Personalizados:**

```html
<input 
    type="email" 
    name="email" 
    required
    title="Por favor, ingrese un correo electrónico válido"
    oninvalid="this.setCustomValidity('Formato de email inválido')"
    oninput="this.setCustomValidity('')"
>
```

### D. Atributo `autocomplete`

Controla si el navegador debe autocompletar los campos del formulario basándose en el historial del usuario.

| Valor                | Descripción                                               |
| -------------------- | --------------------------------------------------------- |
| **`on`**             | Habilita el autocompletado (valor por defecto).           |
| **`off`**            | Deshabilita el autocompletado.                            |
| **Valores específicos** | `name`, `email`, `username`, `current-password`, `new-password`, `tel`, `street-address`, `postal-code`, etc. |

```html
<input type="email" name="email" autocomplete="email">
<input type="password" name="password" autocomplete="current-password">
```

-----

## 🔗 Sitios de Referencia

* **MDN Web Docs (Mozilla Developer Network):** Documentación completa y autorizada sobre formularios HTML.
    * [Guía de Formularios HTML](https://developer.mozilla.org/es/docs/Learn/Forms)
    * [Referencia del elemento `<form>`](https://developer.mozilla.org/es/docs/Web/HTML/Element/form)
    * [Referencia del elemento `<input>`](https://developer.mozilla.org/es/docs/Web/HTML/Element/input)
    * [Validación de formularios del lado del cliente](https://developer.mozilla.org/es/docs/Learn/Forms/Form_validation)

* **W3Schools:** Tutoriales interactivos y ejemplos prácticos.
    * [HTML Forms Tutorial](https://www.w3schools.com/html/html_forms.asp)
    * [HTML Input Types](https://www.w3schools.com/html/html_form_input_types.asp)
    * [HTML Input Attributes](https://www.w3schools.com/html/html_form_attributes.asp)

* **WebAIM:** Recursos sobre accesibilidad en formularios web.
    * [Creating Accessible Forms](https://webaim.org/techniques/forms/)

* **HTML Standard (WHATWG):** Especificación oficial y completa del estándar HTML.
    * [Forms - HTML Living Standard](https://html.spec.whatwg.org/multipage/forms.html)

* **Can I Use:** Verifica la compatibilidad de características HTML5 en diferentes navegadores.
    * [Can I Use - HTML5 Form Features](https://caniuse.com/?search=form)
