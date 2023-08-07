<?php

return [
    'title' => 'Kardex Movements',
    'form-titles' => [
        'create' => 'Registrar Movimiento Kardex',
        'show' => 'Visualizar Informacion de Movimiento Kardex',
        'edit' => 'Actualizar Información de Movimiento Kardex'
    ],
    'attributes' => [
        'product_id' => 'Movimiento Kardex',
        'kardex_movement_type' => 'Tipo de Movimiento',
        'affected_units' => 'Unidades Afectadas',
        'stock_before' => 'Cantidad Antes de Movimiento Kardex',
        'stock_after' => 'Cantidad Después de Movimiento Kardex',
        'movement_at' => 'Fecha de Movimiento'
    ],
    'enum_data' => [
        'entry' => 'Entrada',
        'output' => 'Salida',
        'prepend-values' => [
            'single' => '---Seleccionar Tipo de Movimiento Kardex',
            'multiple' => '---Seleccionars Tipos de Movimientos Kardex'
        ],
    ],
    'messages' => [
        'error-saved' => 'Error al registrar el movimiento Kardex',
        'error-updated' => 'Error al actualizar el movimiento Kardex',
        'error-deleted' => 'Error al eliminar el movimiento Kardex',

        'confirm_delete' => '¿Está seguro de eliminar el movimiento Kardex?',
        'saved' => 'Se ha registrado correctamente el movimiento Kardex',
        'updated' => 'Se ha actualizado correctamente el movimiento Kardex',
        'deleted' => 'Se ha eliminado correctamente el movimiento Kardex',
    ]
];
