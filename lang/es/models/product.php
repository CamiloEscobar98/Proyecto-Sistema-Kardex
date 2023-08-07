<?php

return [
    'title' => 'Productos',
    'form-titles' => [
        'create' => 'Registrar Producto',
        'show' => 'Visualizar Informacion de Producto',
        'edit' => 'Actualizar Información de Producto'
    ],
    'attributes' => [
        'product_category_id' => 'Categoría de Producto',
        'name' => 'Nombre de Producto',
        'description' => 'Descripción de Producto',
        'price' => 'Precio de Producto',
        'stock' => 'Cantidad Actual de Producto',
    ],
    'prepend-values' => [
        'single' => '---Seleccionar Producto',
        'multiple' => '---Seleccionars Productos'
    ],
    'seeders' => [
        'title' => '### REGISTRANDO PRODUCTOS ###',
        'ask' => '¿Cuántos Productos desea crear para el ambiente de desarrollo?',
        'saved' => '[:current] Creando producto: :name',
        'end' => '### PRODUCTOS REGISTRADOS ###',
    ],
    'messages' => [
        'error-saved' => 'Error al registrar el producto :name',
        'error-updated' => 'Error al actualizar el producto :name',
        'error-deleted' => 'Error al eliminar el producto :name',

        'confirm_delete' => '¿Está seguro de eliminar el producto?',
        'saved' => 'Se ha registrado correctamente el producto :name',
        'updated' => 'Se ha actualizado correctamente el producto :name',
        'deleted' => 'Se ha eliminado correctamente el producto :name',
    ]
];
