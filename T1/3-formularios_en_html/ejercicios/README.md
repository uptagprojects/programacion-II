# 📚 Ejercicios Prácticos - Formularios en HTML

Esta carpeta contiene ejercicios prácticos para reforzar los conceptos aprendidos sobre formularios en HTML. Los ejercicios están diseñados con dificultad progresiva, desde conceptos básicos hasta implementaciones más avanzadas.

-----

## Ejercicio 1: Formulario de Registro Básico

Crea un formulario de registro que incluya:
- Nombre completo (obligatorio, mínimo 3 caracteres)
- Correo electrónico (obligatorio, validación de email)
- Contraseña (obligatorio, mínimo 8 caracteres)
- Confirmación de contraseña
- Fecha de nacimiento (selector de fecha)
- Género (radiobuttons: Masculino, Femenino, Otro)
- Aceptar términos y condiciones (checkbox obligatorio)
- Botones de Enviar y Limpiar

-----

## Ejercicio 2: Formulario de Contacto

Diseña un formulario de contacto que contenga:
- Nombre (obligatorio)
- Email (obligatorio)
- Teléfono (opcional, validar formato con pattern)
- Asunto (lista desplegable con opciones: Consulta, Reclamo, Sugerencia)
- Mensaje (área de texto, obligatorio, máximo 500 caracteres)
- Botón de enviar

-----

## Ejercicio 3: Formulario de Encuesta

Crea una encuesta de satisfacción:
- Nombre (opcional)
- ¿Cómo califica nuestro servicio? (Radiobuttons: Excelente, Bueno, Regular, Malo)
- ¿Qué aspectos le gustaron? (Checkboxes: Atención, Precio, Calidad, Rapidez)
- Nivel de satisfacción (Input type="range" de 1 a 10)
- Comentarios adicionales (textarea opcional)
- Botón de enviar encuesta

-----

## Ejercicio 4: Formulario Avanzado con Validación

Implementa un formulario de solicitud de empleo:
- Datos personales en un fieldset (nombre, email, teléfono)
- Experiencia laboral en otro fieldset (años de experiencia con number, cargo anterior)
- Nivel de estudios (select con optgroups: Secundaria, Universitario, Posgrado)
- Idiomas que domina (checkboxes: Español, Inglés, Francés, Alemán)
- CV (input type="file", acepta solo PDF)
- Disponibilidad de inicio (input type="date", no puede ser fecha pasada)
- Carta de presentación (textarea, mínimo 100 caracteres)

-----

## 💡 Consejos para Resolver los Ejercicios

1. **Comienza Simple:** Empieza con la estructura básica del formulario y luego añade los atributos de validación.
2. **Prueba Constantemente:** Abre el archivo HTML en tu navegador y prueba cada campo mientras lo desarrollas.
3. **Usa las Etiquetas Correctamente:** No olvides usar `<label>` para cada campo para mejorar la accesibilidad.
4. **Valida tu Código:** Asegúrate de que tu HTML sea válido usando validadores como [W3C Validator](https://validator.w3.org/).
5. **Experimenta:** Una vez completado el ejercicio básico, intenta agregar más funcionalidad o mejorar el diseño con CSS.

-----

## 📂 Estructura Sugerida

Para cada ejercicio, crea un archivo HTML separado:

```
ejercicios/
├── README.md (este archivo)
├── ejercicio1-registro.html
├── ejercicio2-contacto.html
├── ejercicio3-encuesta.html
└── ejercicio4-solicitud-empleo.html
```

-----

## ✅ Criterios de Evaluación

Al completar cada ejercicio, verifica que cumples con:

- [ ] Todos los campos solicitados están presentes
- [ ] Los tipos de input son correctos (email, password, date, etc.)
- [ ] Las validaciones están implementadas (required, min/maxlength, pattern)
- [ ] Cada campo tiene su respectivo `<label>` asociado
- [ ] Los radiobuttons del mismo grupo comparten el atributo `name`
- [ ] El formulario tiene un método (GET o POST) y action definidos
- [ ] El código HTML es válido y está bien indentado
