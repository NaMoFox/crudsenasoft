<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'proveedor' => [
        'title' => 'Proveedor',

        'actions' => [
            'index' => 'Proveedor',
            'create' => 'New Proveedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'tienda' => [
        'title' => 'Tienda',

        'actions' => [
            'index' => 'Tienda',
            'create' => 'New Tienda',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'proveedor' => [
        'title' => 'Proveedor',

        'actions' => [
            'index' => 'Proveedor',
            'create' => 'New Proveedor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'tienda' => [
        'title' => 'Tienda',

        'actions' => [
            'index' => 'Tienda',
            'create' => 'New Tienda',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'tienda' => [
        'title' => 'Tienda',

        'actions' => [
            'index' => 'Tienda',
            'create' => 'New Tienda',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'producto' => [
        'title' => 'Producto',

        'actions' => [
            'index' => 'Producto',
            'create' => 'New Producto',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];