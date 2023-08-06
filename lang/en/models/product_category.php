<?php

return [
    'title' => 'Product Categories',
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
        'saved' => 'The product category <b>:name</b> has been successfully saved.',
        'updated' => 'The product category <b>:name</b> has been successfully updated.',
        'password_updated' => 'The product category password <b>:name</b> has been successfully updated.',
        'deleted' => 'The product category <b>:name</b> has been successfully deleted.',
    ]
];
