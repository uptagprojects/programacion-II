# **UNIDAD I**: INTRODUCCIÓN AL DESARROLLO WEB


## **La Web**

La World Wide Web —comúnmente conocida como WWW, W3, o la Web— es un sistema interconectado de páginas web públicas accesibles a través de Internet. La Web no es lo mismo que el Internet: la Web es una de las muchas aplicaciones construidas sobre Internet.

Tim Berners-Lee propuso la arquitectura de lo que es conocido como la World Wide Web. Él creó el primer servidor web (server), el primer navegador de internet (browser), y la primera página web, en su computadora del laboratorio de investigación de física del CERN en 1990\. En 1991, anunció su creación en el grupo de noticias alt.hypertext, marcando con esto el momento en que la Web se hizo pública.

El sistema que nosotros conocemos hoy como "la Web" tiene varios componentes:

* El protocolo HTTP dirige las transferencias de datos entre el servidor y el cliente.  
* Para acceder a un componente de la Web, el cliente proporciona un único identificador universal, llamado URL por sus siglas en inglés de Localizador Uniforme de Recursos (Uniform Resource Locator) o URI por sus siglas en inglés de Identificador Uniforme de Recursos (Uniform Resource Identifier).  
* HTML por sus siglas en inglés de Lenguaje de Marcas de Hipertexto (Hypertext Markup Language) es el formato más común para publicar documentos web.

Enlazar, o conectar recursos a través de hyperlinks (hiperenlaces), es un concepto que define la Web, contribuyendo a su identidad como una colección de documentos conectados.

## **El Internet**

Internet es un conjunto descentralizado de redes interconectadas a través de un conjunto de protocolos denominado TCP/IP. La Real Academia de la Lengua (RAE) lo define como “la red informática mundial, descentralizada y formada por la conexión directa entre computadoras mediante un protocolo especial de comunicación”.

Su nombre procede del inglés Interconnected Networks (redes interconectadas).

TCP over IP es comúnmente llamada Internet Protocol Suite, y si bien es cierto que el uso es mayormente mediante TCP, el Internet Protocol o IP puede ser también usado con el protocolo UDP, como es el caso de los servicios de streaming de vídeo y las búsquedas de DNS.

## **El Desarrollo Web**

Ya que comprendemos las diferencias entre Internet y Web, es importante conocer dónde ambos coexisten. Es entonces donde nos referimos al desarrollo web.

La interacción con los documentos en la web que se comunican con servidores a través de internet que ejecutan procesos, hace posible la creación de aplicaciones y sistemas completos que nosotros como usuarios de internet, usamos y consumimos. 

El desarrollo web es el proceso de creación y mantenimiento de sitios web. Sin embargo, la creación de software que funcione a través de internet no es tarea fácil.

Los especialistas en desarrollo web son aquellos que se encargan de que los websites y las apps funcionen correctamente, sean eficientes, tengan dinamismo y buena organización.

Se trata de un trabajo que implica colaborar con otros actores en la creación de sitios web y herramientas digitales, incluyendo a diseñadores gráficos, responsables del contenido y expertos en posicionamiento en buscadores, entre otros.

## **Arquitectura Cliente-Servidor**

La arquitectura cliente-servidor es un patrón de diseño ampliamente usado en ingeniería del software que permite la comunicación eficiente y la separación de preocupaciones o acoplamiento (separation of concerns) entre diferentes componentes del sistema. Esto divide el sistema en dos partes principales: el cliente y el servidor.

Este modelo es usado en distintas aplicaciones, desde la navegación web hasta tiendas en línea. Ofrece los beneficios en escalabilidad, modularidad, seguridad y performance. El cliente se enfoca en la interfaz del usuario mientras el servidor maneja la lógica del negocio, el procesamiento de datos y la persistencia.

Ventajas de la arquitectura  cliente-servidor:

* Escalabilidad: Una característica vital de esta arquitectura es la habilidad de manejar una carga incrementada añadiendo más servidores.  
* Modularidad: Separar las tareas entre cliente y servidor hace que el desarrollo, testing y mantenimiento sea más manejable. Además implica que los cambios de una parte no afecten a la otra.  
* Seguridad: Centralizar los datos y la lógica en el servidor. Esto ayuda a controlar el acceso al sistema, reduciendo riesgos de accesos sin autorización. Centralizar la lógica en el servidor facilita mantener y asegurar los datos.  
* Performance: Esta arquitectura permite manejar las tareas que requieren de mucho procesamiento al servidor. Esto permite al cliente enfocarse en proveer al usuario de una interfaz responsiva, mientras el sistema está bajo altas cargas de procesamiento en el servidor, mejorando así la experiencia del usuario y la eficiencia del sistema.

Desventajas de la arquitectura cliente-servidor:

* Centro único de fallos: Un problema potencial con esta arquitectura es que la caída del servidor puede detener el sistema completo, haciendo inaccesible el uso al cliente. Esto puede ser mitigado implementando medidas de redundancia, como servidores de backup y réplicas.  
* Dependencia a la red: Otra dificultad con la arquitectura cliente-servidor es la dependencia con la comunicación en red, que puede afectar el tiempo de respuesta y la responsividad. Esto puede ser mitigado optimizando los protocolos de comunicación e implementando mecanismos de caché, que implicaría a su vez un teorema CAP en la persistencia.   
* Complejidad: Implementar una arquitectura cliente-servidor puede introducir complejidad adicional al sistema, requiriendo un diseño cuidadoso y un buen manejo de los protocolos de comunicación, concurrencia y consistencia de datos.  
* Desafíos de escalabilidad: Distribuir la carga entre múltiples servidores requiere de técnicas de balanceo de cargas y un diseño complejo del sistema a nivel de infraestructura. Sin embargo, esto puede proveer beneficios como la tolerancia al fallo y mayor disponibilidad.  
* Funcionalidad offline limitada: Típicamente requiere de una conexión a la red, limitando la funcionalidad en escenarios de baja conectividad o completamente offline. Esto puede ser mitigado a través de distintas técnicas como el caché local o mecanismos de sincronización de datos fuera de línea.

## **El Cliente**

En la Web, el navegador tiene el rol del cliente, y se encarga de comunicarse con el servidor. Las interacciones de los usuarios con la aplicación inician en el cliente, y el producto que será ejecutado en el cliente se le conoce como Frontend.

El desarrollo frontend es aquel que se encarga de los aspectos funcionales y de la usabilidad. En el ámbito frontend se incluye la UX (experiencia de usuario) y la UI (relativo a las interfaces). En tal sentido, la especialidad se encarga de las interacciones directas.

Los lenguajes soportados por el navegador son: HTML, CSS, JavaScript. El soporte para WebGL y WASM varía de acuerdo a los navegadores, así como las versiones de los lenguajes.

Las tecnologías más frecuentes en el frontend pueden listarse: Next.js, React.js, Vue.js, Angular, Canvas, JQuert, Three.js, etc.

## **El Servidor**

Existen distintos tipos de servidores a tomar en cuenta, según la tecnología que los compone y su comportamiento: Servidores Web (NGINX, Apache, IIS), Servidores de Caché, Servidores DNS, Servidor Proxy, Servidor de E-mail, Load Balancers, Servidor Ingress, Servidor API Gateway. Los protocolos habituales para la comunicación de estos servidores incluyen HTTP, TLS, SSH, FTP, SMTP, POP3, IMAP, TCP, UDP, ICMP.

Sobre los protocolos antes mencionados, la Web como mencionamos anteriormente trabaja con el protocolo HTTP. Recomiendo leer el RFC 9110 para saber cómo comunicarse a través de HTTP. 

Si al frontend se lo grafica “del lado del cliente”, el backend se explica con la referencia “del lado del servidor”. En desarrollo backend se trabaja en la creación y mantenimiento de infraestructuras, en la gestión de entornos de alojamiento, en soluciones a eventuales errores y fallas, en aspectos relacionados a la seguridad de las plataformas, en pruebas de control de calidad, y en la actualización de documentos.

El propósito general en este terreno es que una serie de operaciones ocurran en segundo plano, siendo invisibles para el usuario final. Por ejemplo, que al tocar el antes mencionado botón para comprar en un e-commerce, se establezcan conexiones con bases de datos y servidores.

El desarrollo de interfaces o capas que sirvan de comunicación entre el cliente y el servidor se les conoce como API o Application Programming Interface.

## **API**

Las API son mecanismos que permiten a dos componentes de software comunicarse entre sí mediante un conjunto de definiciones y protocolos. Por ejemplo, el sistema de software del instituto de meteorología contiene datos meteorológicos diarios. La aplicación meteorológica de su teléfono “habla” con este sistema a través de las API y le muestra las actualizaciones meteorológicas diarias en su teléfono.

¿Cómo funcionan las API?

La arquitectura de las API suele explicarse en términos de cliente y servidor. La aplicación que envía la solicitud se llama cliente, y la que envía la respuesta se llama servidor. En el ejemplo del tiempo, la base de datos meteorológicos del instituto es el servidor y la aplicación móvil es el cliente. Las API son el intermediario entre la aplicación móvil y la base de datos meteorológicos del instituto.

Dejo algunos ejemplos de protocolos API.

API de SOAP:

Estas API utilizan el protocolo simple de acceso a objetos. El cliente y el servidor intercambian mensajes mediante XML. Se trata de una API menos flexible que era más popular en el pasado.

API de RPC:

Estas API se denominan llamadas a procedimientos remotos. El cliente completa una función (o procedimiento) en el servidor, y el servidor devuelve el resultado al cliente.

API de WebSocket:

La API de WebSocket es otro desarrollo moderno de la API web que utiliza objetos JSON para transmitir datos. La API de WebSocket admite la comunicación bidireccional entre las aplicaciones cliente y el servidor. El servidor puede enviar mensajes de devolución de llamada a los clientes conectados, por lo que es más eficiente que la API de REST.

API de REST:

Estas son las API más populares y flexibles que se encuentran en la web actualmente. El cliente envía las solicitudes al servidor como datos. El servidor utiliza esta entrada del cliente para iniciar funciones internas y devuelve los datos de salida al cliente. Veamos las API de REST con más detalle a continuación.

REST significa transferencia de estado representacional. REST define un conjunto de funciones como GET, PUT, DELETE, etc. que los clientes pueden utilizar para acceder a los datos del servidor. Los clientes y los servidores intercambian datos mediante HTTP.

La principal característica de la API de REST es que no tiene estado. La ausencia de estado significa que los servidores no guardan los datos del cliente entre las solicitudes. Las solicitudes de los clientes al servidor son similares a las URL que se escriben en el navegador para visitar un sitio web. La respuesta del servidor son datos simples, sin la típica representación gráfica de una página web.

¿Qué es una API web?

Una API web o API de servicios web es una interfaz de procesamiento de aplicaciones entre un servidor web y un navegador web. Todos los servicios web son API, pero no todas las API son servicios web. La API de REST es un tipo especial de API web que utiliza el estilo arquitectónico estándar explicado anteriormente.

Los diferentes términos relacionados con las API, como API de Java o API de servicios, existen porque históricamente las API se crearon antes que la World Wide Web. Las API web modernas son API de REST y los términos pueden utilizarse indistintamente.

¿Qué son las integraciones de las API?

Las integraciones de las API son componentes de software que actualizan automáticamente los datos entre los clientes y los servidores. Algunos ejemplos de integraciones de las API son la sincronización automática de datos en la nube desde la galería de imágenes de su teléfono o la sincronización automática de la hora y la fecha en su laptop cuando viaja a otra zona horaria. Las empresas también pueden utilizarlas para automatizar de manera eficiente muchas funciones del sistema.

## **Especificación de APIs**

Luego de comprender la amplitud de desarrollo correspondiente a una API incluso siguiendo un protocolo, es necesario conocer qué estándares seguir para la documentación y especificación de las APIs. Esto con el fin de que las personas comprendan cómo funcionan nuestras APIs, generar código para el cliente, crear tests, aplicar estándares de diseño y mucho más.

La especificación OpenAPI provee un estándar para describir las APIs HTTP, agnóstico a lenguajes de programación. Comúnmente usado para APIs REST.

La especificación AsyncAPI es una herramienta open-source para crear y mantener arquitecturas orientadas a eventos. Es el actual estándar en la industria para APIs asíncronas.

### **Referencias**

- *World Wide Web*, Mozilla Development Network \- [https\://developer.mozilla.org/es/docs/Glossary/World\_Wide\_Web](https://developer.mozilla.org/es/docs/Glossary/World_Wide_Web)

- *Qué es Internet*, Arimetrics \- [https\://www\.arimetrics.com/glosario-digital/internet](https://www.arimetrics.com/glosario-digital/internet)

- *How applications coexist over TCP and UDP?*, Geeks4Geeks \- [https\://www\.geeksforgeeks.org/how-applications-coexist-over-tcp-and-udp/](https://www.geeksforgeeks.org/how-applications-coexist-over-tcp-and-udp/)

- *Qué es el desarrollo web*, Coderhouse \- [https\://www\.coderhouse.com/ve/blog/que-es-el-desarrollo-web](https://www.coderhouse.com/ve/blog/que-es-el-desarrollo-web)

- *System Design: What is Client-Server Architecture?*, Wahidyan Kresna Fridayoka en Medium \- [https\://medium.com/ayokoding/system-design-what-is-client-server-architecture-5031746005e4](https://medium.com/ayokoding/system-design-what-is-client-server-architecture-5031746005e4)

- *HTTP Semantics*, RFC 9110 \- [https\://www\.rfc-editor.org/rfc/rfc9110](https://www.rfc-editor.org/rfc/rfc9110)

- *URI Design and Ownership*, RFC 8820 \- [https\://www\.rfc-editor.org/rfc/rfc8820](https://www.rfc-editor.org/rfc/rfc8820)

- *¿Qué es una interfaz de programación de aplicaciones (API)?*, Amazon Web Services \- [https\://aws.amazon.com/es/what-is/api/](https://aws.amazon.com/es/what-is/api/)

- *OpenAPI Specification 3.1.0*, OpenAPI \- [https\://spec.openapis.org/oas/latest.html](https://spec.openapis.org/oas/latest.html)

- *AsyncAPI Initiative for event-driven apis*, AsyncAPI \- [https\://www\.asyncapi.com/docs](https://www.asyncapi.com/docs)
