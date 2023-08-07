<?php

return [
    'title' => 'Kardex Movements',
    'form-titles' => [
        'create' => 'Register Kardex Movement',
        'show' => 'View Kardex Movement Information',
        'edit' => 'Update Kardex Movement Information'
    ],
    'attributes' => [
        'product_id' => 'Kardex Movement',
        'kardex_movement_type' => 'Movement Type',
        'affected_units' => 'Affected Units',
        'stock_before' => 'Quantity Before Kardex Movement',
        'stock_after' => 'Quantity After Kardex Movement',
        'movement_at' => 'Movement Date'
    ],
    'enum_data' => [
        'entry' => 'Entry',
        'output' => 'Output',
        'prepend-values' => [
            'single' => '---Select Kardex Movement Type',
            'multiple' => '---Select Kardex Movement Types'
        ],
    ],
    'messages' => [
        'error-saved' => 'Error while registering Kardex movement',
        'error-updated' => 'Error while updating Kardex movement',
        'error-deleted' => 'Error while deleting Kardex movement',

        'confirm_delete' => 'Are you sure you want to delete the Kardex movement?',
        'saved' => 'Kardex movement registered successfully',
        'updated' => 'Kardex movement updated successfully',
        'deleted' => 'Kardex movement deleted successfully',
    ]
];
