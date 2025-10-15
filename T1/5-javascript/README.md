# 🧠 Introducción y Fundamentos de JavaScript

## Introducción a JavaScript (JS)

**JavaScript (JS)** es un lenguaje de programación de alto nivel, interpretado y orientado a objetos, que se utiliza principalmente para hacer que las páginas web sean **interactivas y dinámicas**. Originalmente diseñado para ejecutarse en el navegador (*Client-side*), ahora también se usa en servidores (*Node.js*).

### ¿Dónde incluir JS en HTML?

Hay tres formas principales de integrar JavaScript en tu página web:

1.  **Etiquetas `<script>` en el HTML:** Idealmente, coloca la etiqueta al **final del `<body>`** para asegurar que el HTML se cargue primero.
    ```html
    <body>
        <script>
            // Código JS aquí
        </script>
    </body>
    ```
2.  **Archivos Externos:** La forma **recomendada** para proyectos grandes. Vincula un archivo `.js` externo.
    ```html
    <script src="app.js"></script>
    ```

-----

## Variables (Almacenamiento de Datos)

Las variables son contenedores que almacenan valores. JavaScript moderno utiliza principalmente `let` y `const`.

| Declaración | Uso | Descripción | Ejemplo |
| :--- | :--- | :--- | :--- |
| **`let`** | Para valores que **cambiarán** (variables mutables). | Permite reasignación del valor. | `let edad = 25;` |
| **`const`** | Para valores que **no cambiarán** (constantes). | No permite reasignación; debe inicializarse. | `const PI = 3.14159;` |
| **`var`** | (Obsoleto) Evitar su uso en código nuevo debido a problemas de alcance (*scope*). | | |

### Tipos de Datos Primitivos

| Tipo | Descripción | Ejemplo |
| :--- | :--- | :--- |
| **`String`** | Texto. | `"Hola Mundo"` |
| **`Number`** | Números enteros o decimales. | `10`, `98.6` |
| **`Boolean`** | Verdadero o Falso. | `true`, `false` |
| **`null`** | Ausencia intencional de valor. | `let valor = null;` |
| **`undefined`** | La variable ha sido declarada, pero no tiene valor asignado. | `let nombre;` |

-----

## Operadores

Los operadores nos permiten realizar operaciones con variables y valores.

### Operadores Aritméticos

Para realizar cálculos matemáticos (`+`, `-`, `*`, `/`, `%` [módulo/residuo]).

### Operadores de Asignación

Para asignar valores (`=`, `+=`, `-=`, etc.).

### Operadores de Comparación (Devuelven `Boolean`)

| Operador | Nombre | Descripción |
| :--- | :--- | :--- |
| **`==`** | Igualdad | Compara valor (ignora el tipo de dato). |
| **`===`** | Igualdad Estricta | Compara valor **Y** tipo de dato. **(Recomendado)** |
| **`!=`** | Desigualdad | Compara valor (ignora el tipo). |
| **`!==`** | Desigualdad Estricta | Compara valor **Y** tipo de dato. **(Recomendado)** |
| **`>`, `<`, `>=`, `<=`** | Mayor/Menor que | |

### Operadores Lógicos

| Operador | Nombre | Descripción |
| :--- | :--- | :--- |
| **`&&`** | AND Lógico | Devuelve `true` si ambos operandos son verdaderos. |
| **`||`** | OR Lógico | Devuelve `true` si al menos un operando es verdadero. |
| **`!`** | NOT Lógico | Invierte el valor booleano (`true` se convierte en `false`). |

-----

## Funciones (Bloques de Código Reutilizables)

Las funciones son el corazón de la programación. Permiten encapsular una serie de instrucciones para ser ejecutadas cuando se les llama.

### Sintaxis Clásica (Declaración de Función)

```javascript
// Declaración de una función
function saludar(nombre) {
    return "Hola, " + nombre + ". ¡Bienvenido!";
}

// Llamada a la función
let mensaje = saludar("Estudiante de IT"); 
```

### Funciones de Flecha (*Arrow Functions*)

Sintaxis más concisa, popular en JS moderno.

```javascript
// Función de flecha
const sumar = (a, b) => {
    return a + b;
};

// Si es una sola línea, el 'return' es implícito
const multiplicar = (a, b) => a * b;
```

-----

## Consola y Llamada (Depuración y Salida)

La **Consola del Navegador** (accesible con F12) es tu herramienta principal para la depuración y para mostrar la salida de tu código.

| Comando | Función | Ejemplo |
| :--- | :--- | :--- |
| **`console.log()`** | Muestra la salida de datos en la consola (variables, resultados). | `console.log("El resultado es:", resultado);` |
| **`console.error()`** | Muestra un mensaje de error (en color rojo). | `console.error("Error: Archivo no encontrado.");` |
| **`alert()`** | Muestra un cuadro de diálogo emergente al usuario. | `alert("La validación falló.");` |

-----

## Objetos DOM (Document Object Model)

El **DOM** es una interfaz de programación para documentos web. Representa la página para que los programas puedan cambiar la estructura, el estilo y el contenido.

**JavaScript usa el DOM para modificar elementos HTML.**

### Métodos Comunes para Obtener Elementos

| Método | Función | Ejemplo |
| :--- | :--- | :--- |
| **`document.getElementById()`** | Obtiene un elemento por su atributo `id`. | `const titulo = document.getElementById("miTitulo");` |
| **`document.querySelector()`** | Obtiene el primer elemento que coincide con un selector CSS (clase, ID, etiqueta). | `const boton = document.querySelector(".btn-principal");` |
| **`document.querySelectorAll()`** | Obtiene una lista (`NodeList`) de todos los elementos que coinciden con el selector CSS. | `const items = document.querySelectorAll("li");` |

### Modificación de Documentos (Manipulación del DOM)

Una vez que obtienes un elemento, puedes modificar sus propiedades:

| Propiedad | Función | Ejemplo |
| :--- | :--- | :--- |
| **`.textContent`** | Obtiene o establece el contenido de texto. | `titulo.textContent = "Nuevo Titulo";` |
| **`.innerHTML`** | Obtiene o establece el contenido, incluyendo etiquetas HTML. | `elemento.innerHTML = "<b>Negrita</b>";` |
| **`.style`** | Modifica los estilos CSS en línea. | `titulo.style.color = "blue";` |
| **`.classList.add()`** | Agrega una clase CSS al elemento. | `boton.classList.add("activo");` |

-----

## Validar Formularios (Eventos y Lógica)

La validación es esencial para asegurar que el usuario ha introducido datos correctos antes de enviarlos al servidor. Esto requiere el uso de **Eventos**.

### Eventos Clave para Formularios

| Evento | Descripción | Aplicación Típica |
| :--- | :--- | :--- |
| **`submit`** | Ocurre cuando se intenta enviar un formulario. | Detener el envío (`event.preventDefault()`) para validación. |
| **`click`** | Ocurre al hacer clic en un elemento (ej: un botón). | Ejecutar una función de validación. |
| **`input`** | El valor de un campo de formulario cambia. | Validar en tiempo real. |

### Ejemplo de Validación Básica

Este código muestra cómo escuchar el evento `submit` de un formulario:

```javascript
const formulario = document.getElementById('miFormulario');

formulario.addEventListener('submit', function(event) {
    const campoNombre = document.getElementById('nombre').value;

    if (campoNombre === "" || campoNombre.length < 3) {
        // 1. Detener el envío del formulario
        event.preventDefault(); 
        
        // 2. Notificar al usuario (puede ser un mensaje en un div)
        alert("El campo Nombre es obligatorio y debe tener al menos 3 caracteres.");
        
        // 3. (Opcional) Enfocar el campo para que el usuario corrija
        document.getElementById('nombre').focus();
    }
    // Si la validación pasa, el formulario se envía.
});
```

-----

## formación Adicional Pertinente

### Ámbito (*Scope*)

El **ámbito** define dónde una variable es accesible.

  * **Bloque (*Block Scope*):** Variables declaradas con `let` y `const` solo existen dentro del bloque `{}` donde fueron definidas (ej. dentro de un `if` o un `for`).
  * **Global (*Global Scope*):** Variables declaradas fuera de cualquier función o bloque son accesibles desde cualquier lugar del código.

### Estructuras de Control de Flujo

JavaScript utiliza `if/else`, `switch` (para múltiples condiciones) y bucles (`for`, `while`) para controlar la ejecución del código.

```javascript
// Ejemplo de control de flujo
let nota = 15;
if (nota >= 18) {
    console.log("Excelente");
} else if (nota >= 12) {
    console.log("Aprobado");
} else {
    console.log("Reprobado");
}
```

-----

## Sitios de Referencia Esenciales

  * **MDN Web Docs (Mozilla Developer Network):** La referencia más completa y autorizada para JavaScript, DOM y toda la tecnología web.
      * [MDN JavaScript Guide](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide)
      * [Referencia del DOM](https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model)
  * **W3Schools:** Excelente para ejemplos sencillos e interactivos.
      * [W3Schools JavaScript Tutorial](https://www.w3schools.com/js/)
  * **Node.js (Para desarrollo *Backend*):**
      * [Página oficial de Node.js](https://nodejs.org/en/)
      * [Nodeschool](https://nodeschool.io/)
