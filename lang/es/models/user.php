<?php

return [
    'title' => 'Usuarios',
    'attributes' => [
        'name' => 'Nombre completo',
        'email' => 'Correo electrónico',
        'password' => 'Contraseña',
        'new_password' => 'Nueva contraseña',
        'current_password' => 'Contraseña Actual',
        'password_confirmation' => 'Confirmar Contraseña',
    ],
    'seeders' => [
        'title' => '### REGISTRANDO USUARIOS ###',
        'ask' => '¿Cuántos Usuarios desea crear para el ambiente de desarrollo?',
        'saved' => '[:current] Creando usuario: :name',
        'end' => '### USUARIOS REGISTRADOS ###',
    ],
    'messages' => [
        'error-saved' => 'Error al registrar el usuario :name',
        'error-updated' => 'Error al actualizar el usuario :name',
        'error-deleted' => 'Error al eliminar el usuario :name',

        'confirm_delete' => '¿Está seguro de eliminar el usuario?',
        'saved' => 'Se ha registrado correctamente el usuario <b>:name</b>',
        'updated' => 'Se ha actualizado correctamente el usuario <b>:name</b>',
        'password_updated' => 'Se ha actualizado correctamente la contraseña del usuario <b>:name</b>',
        'deleted' => 'Se ha eliminado correctamente el usuario <b>:name</b>',
    ]
];