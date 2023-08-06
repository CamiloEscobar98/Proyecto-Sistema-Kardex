<?php

return [
    'title' => 'Categoría de Producto',
    'form-titles' => [
        'create' => 'Registrar Categorías de Productos',
        'show' => 'Visualizar Informacion de Categoría de Producto',
        'edit' => 'Actualizar Información de Categoría de Producto'
    ],
    'attributes' => [
        'name' => 'Nombre de Categoría de Producto',
    ],
    'prepend-values' => [
        'single' => '---Seleccionar categoria de Producto',
        'multiple' => '---Seleccionar categorias de Productos'
    ],
    'seeders' => [
        'title' => '### REGISTRANDO CATEGORÍAS DE PRODUCTO ###',
        'ask' => '¿Cuántos Categorías de Producto desea crear para el ambiente de desarrollo?',
        'saved' => '[:current] Creando categoría de producto: :name',
        'end' => '### CATEGORÍAS DE PRODUCTO REGISTRADOS ###',
    ],
    'messages' => [
        'error-saved' => 'Error al registrar la categoría de producto :name',
        'error-updated' => 'Error al actualizar la categoría de producto :name',
        'error-deleted' => 'Error al eliminar la categoría de producto :name',

        'confirm_delete' => '¿Está seguro de eliminar la categoría de producto?',
        'saved' => 'Se ha registrado correctamente la categoría de producto :name',
        'updated' => 'Se ha actualizado correctamente la categoría de producto :name',
        'password_updated' => 'Se ha actualizado correctamente la contraseña de la categoría de producto :name',
        'deleted' => 'Se ha eliminado correctamente la categoría de producto :name',
    ]
];
