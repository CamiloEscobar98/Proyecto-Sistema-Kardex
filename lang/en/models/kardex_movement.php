<?php

return [
    'title' => 'Movimientos Kardex',
    'attributes' => [
        'product_id' => 'Producto',
        'kardex_movement_type_id' => 'Tipo de Movimiento Kardex',
        'affected_units' => 'Unidades Afectadas',
        'stock_before' => 'Existencias Antes',
        'stock_after' => 'Existencias Después',
        'movement_at' => 'Fecha de Movimiento',
    ],
    'messages' => [
        'error-saved' => 'Error al registrar el movimiento kardex :name',
        'error-updated' => 'Error al actualizar el movimiento kardex :name',
        'error-deleted' => 'Error al eliminar el movimiento kardex :name',

        'confirm_delete' => '¿Está seguro de eliminar el movimiento kardex?',
        'saved' => 'Se ha registrado correctamente el movimiento kardex :name',
        'updated' => 'Se ha actualizado correctamente el movimiento kardex :name',
        'deleted' => 'Se ha eliminado correctamente el movimiento kardex :name',
    ]
];
