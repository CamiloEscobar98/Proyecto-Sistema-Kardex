# Prueba Técnica "Hulk Store" de Triko

El objetivo de esta prueba técnica es desarrollar una solución orientada a objetos con las mejores prácticas de la industria para la creación de un sistema Kardex que controle los productos de la tienda "Hulk Store", especializada en artículos basados en superhéroes de Marvel y DC comics.

## Fase I del Proyecto

Se requiere desarrollar un sistema Kardex que permita:

- Controlar el inventario y registrar nuevos productos.
- Seguimiento de la disponibilidad de los productos.
- Actualización de las cantidades en el inventario por ventas.
- Permite a los vendedores realizar cambios en las cantidades de los productos mediante las interfaces correspondientes.

El sistema debe permitir consultas por diferentes filtros y generar un reporte diario del estado actual del Kardex. Se debe impedir realizar movimientos con productos sin stock.

## Aclaraciones importantes:

- Se puede utilizar cualquier estructura de datos adecuada o una base de datos en memoria.
- No se requiere trabajar bajo una arquitectura de código previa, se busca la mejor opción con patrones de diseño y buenas prácticas.
- No hay restricciones de tiempo para la entrega.
- La prueba debe realizarse en PHP con el framework Laravel.
- Se espera una interfaz básica si es posible, pero en caso contrario, se aceptará la presentación en Postman.
- Es necesario entregar pruebas unitarias como parte del desarrollo.

¡Esperamos ver tus habilidades en el desarrollo de sistemas, conocimiento en PHP Laravel y capacidad para implementar soluciones eficientes con patrones de diseño y buenas prácticas!


## Soporte Técnico

La aplicación se ha desarrollado en la última versión de Laravel. Además, cuenta con un despliegue en local bastante sencillo, por lo que no es necesario realizar algún tipo de dump de la base de datos; simplemente hay que seguir los siguientes pasos:

1. Clonar el proyecto y ejecutar el comando ``` cp .env.example .env ```
2. Ejecutar el comando ``` composer install ```
3. Ejecutar el comando ``` npm install ```
4. Asegurarse de la conexión de la base de datos en el archivo .env
5. Ejecutar el comando ``` php artisan migrate:fresh --seed ```
6. Esto mostrará en consola de manera dinámica el proceso de semilla de la base de datos.
7. Todos los usuarios registrados tienen una contraseña predeterminada "password", lo que facilita su acceso.
8. Ejecutar el comando ``` npm run build ```
9. Ingresar en la aplicación.

## Notas

No tuve tiempo de hacer un archivo Seeder para la creación dinámica de Movimientos Kardex, pero estaba planeando implementarlo; de todas formas, se comporta de manera similar a los demás Seeders.

No tuve tiempo para desarrollar los Test Unitarios; sin embargo, trabajé con Tailwind, un framework de CSS bastante bueno y muy flexible para el diseño. Además, logré pulir el código, aunque no es perfecto, considero que tiene buena calidad. Por último, la aplicación implementa las traducciones de Laravel. Si desean probarlo, pueden hacerlo cambiando la variable APP_LOCALE en el archivo .env de "en" a "es" y viceversa, y luego ejecutar el comando ```php artisan config:clear```. En otros proyectos he desarrollado la funcionalidad para guardar el idioma del usuario en una cookie, en una sesión de PHP, como un atributo adicional del usuario, etcétera