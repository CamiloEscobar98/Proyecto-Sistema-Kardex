<?php

return [
    'title' => 'Product Categories',
    'form-titles' => [
        'create' => 'Create Product Categories',
        'show' => 'View Product Category Information',
        'edit' => 'Update Product Category Information'
    ],
    'attributes' => [
        'name' => 'Product Category Name',
    ],
    'seeders' => [
        'title' => '### CREATING PRODUCT CATEGORIES ###',
        'ask' => 'How many Product Categories do you want to create for the development environment?',
        'saved' => '[:current] Creating product category: :name',
        'end' => '### PRODUCT CATEGORIES CREATED ###',
    ],
    'messages' => [
        'error-saved' => 'Error while registering the product category :name',
        'error-updated' => 'Error while updating the product category :name',
        'error-deleted' => 'Error while deleting the product category :name',

        'confirm_delete' => 'Are you sure to delete the product category?',
        'saved' => 'The product category :name has been successfully saved.',
        'updated' => 'The product category :name has been successfully updated.',
        'password_updated' => 'The product category password :name has been successfully updated.',
        'deleted' => 'The product category :name has been successfully deleted.',
    ]
];
