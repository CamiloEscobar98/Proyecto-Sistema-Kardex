<?php

return [
    'title' => 'Products',
    'attributes' => [
        'product_category_id' => 'Product Category',
        'name' => 'Product Name',
        'description' => 'Product Info',
        'price' => 'Product Price',
        'stock' => 'Product Stock',
    ],
    'seeders' => [
        'title' => '### CREATING PRODUCTS ###',
        'ask' => 'How many Products do you want to create for the development environment?',
        'saved' => '[:current] Creating product: :name',
        'end' => '### PRODUCTS CREATED ###',
    ],
    'messages' => [
        'error-saved' => 'Error while registering the product :name',
        'error-updated' => 'Error while updating the product :name',
        'error-deleted' => 'Error while deleting the product :name',

        'confirm_delete' => 'Are you sure to delete the product?',
        'saved' => 'The product :name has been successfully saved.',
        'updated' => 'The product :name has been successfully updated.',
        'deleted' => 'The product :name has been successfully deleted.',
    ]
];
