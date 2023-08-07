<?php

return [
    'welcome' => [
        'title' => '¡Bienvenido a la aplicación implementando un Sistema Kardex!',
        'introduction' => 'El objetivo de esta prueba técnica es desarrollar una solución orientada a objetos con las 
        mejores prácticas de la industria para la creación de un sistema Kardex que controle los productos de la tienda 
        "Hulk Store", especializada en artículos basados en superhéroes de Marvel y DC comics.',
        'requirements' => [
            'title' => 'Requerimientos de la Aplicación',
            'text' => "
            Se requiere desarrollar un sistema Kardex que permita:<br>
            1. Controlar el inventario y registrar nuevos productos.<br>
            2. Seguimiento de la disponibilidad de los productos.<br>
            3, Actualización de las cantidades en el inventario por ventas.<br>
            4. Permite a los vendedores realizar cambios en las cantidades de los productos mediante las interfaces correspondientes.<br>
            <br>
            El sistema debe permitir consultas por diferentes filtros y generar un reporte diario del estado actual del Kardex. Se debe impedir realizar movimientos con productos sin stock.",
        ],
        'rules' => [
            'title' => 'Reglas Importantes',
            'text' => '
            Se puede utilizar cualquier estructura de datos adecuada o una base de datos en memoria.<br>
                1. No se requiere trabajar bajo una arquitectura de código previa, se busca la mejor opción con patrones de diseño y buenas prácticas.<br>
                2. No hay restricciones de tiempo para la entrega.<br>
                3. La prueba debe realizarse en PHP con el framework Laravel.<br>
                4. Se espera una interfaz básica si es posible, pero en caso contrario, se aceptará la presentación en Postman.<br>
                5. Es necesario entregar pruebas unitarias como parte del desarrollo.
            '
        ]

    ]
];
