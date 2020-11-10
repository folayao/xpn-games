<?php
return [
    'register'        => 'Registrarse',
    'login'           => 'Iniciar sesión',
    'logout'          => 'Cerrar Sesión',
    'videogames'      => 'Videojuegos',
    'comments'        => 'Comentarios',
    'wishlist'        => 'Lista de deseos',
    'shoppingCart'    => 'Carrito de compras',
    'users'           => 'Usuarios',
    'search'          => 'Buscar',
    'searchVideogame' => 'Buscar videjouego',
    'close'           => 'Cerrar',
    'admin'           => 'Administrador',
    'role'            => 'Rol|Roles',
    'submit'          => 'Aceptar',
    'cancel'          => 'Cancelar',
    'delete'          => 'Eliminar',
    'goBack'          => 'Regresar',
    'new'             => 'Nuevo',
    'id'              => 'ID',
    'search'          => 'Busca con autor, nombre, categoria e id',
    
    'admin'           => [
        'videogame' => [
            'create'   => 'Crear videojuego',
            'add'      => 'Añadir videojuego',
            'title'    => 'Ingrese el título',
            'price'    => 'Ingrese el precio',
            'category' => 'Ingrese la categoría',
            'designer' => 'Ingrese el diseñador',
            'pg'       => 'Ingrese el PG',
            'details'  => 'Ingrese los detalles',
            'keyword'  => 'Ingrese palabra clave',
        ],
        'roles'     => [
            'create'            => 'Crear nuevo rol',
            'name'              => 'Nombre del rol',
            // No sé cómo traducir eso de slug xD
            'slug'              => 'Slug',
            'addPermissions'    => 'Añadir permisos',
            'selectRole'        => 'Seleccionar Rol',
            'selectPermissions' => 'Selecionar Permisos',
            'update'            => 'Actualizar rol',
            'table'             => 'Tabla de Roles',
            'permissions'       => 'Permisos',
            'settings'          => 'Ajustes',
            'question'          => '¿Seguro que quiere eliminar ese rol?',
            'delete'            => 'Haga click en "Eliminar" si lo desea borrar.',
        ],
        'users'     => [
            'create'      => 'Crear Usuario Nuevo',
            'permisisons' => 'Permisos de Usuario',
            'question'    => '¿Seguro que quiere eliminar ese usuario?',
            'delete'      => 'Haga click en "Eliminar" si lo desea borrar.',
        ],
    ],
    'user'            => [
        'name'            => 'Nombre Completo',
        'username'        => 'Nombre de usuario',
        'email'           => 'Correo electrónico',
        'password'        => 'Contraseña',
        'confirmPassword' => 'Confirmar contraseña',
        'forgotPassword'  => '¿Olvidaste tu contraseña?',
        'resetPassword'   => 'Restablecer la contraseña',
        'checkPassword'   => 'Por favor confirma tu contraseña',
        'linkPassword'    => 'Enviar link para restablecer contraseña',
        'remember'        => 'Recordarme',
        'verifyEmail'     => 'Verifica tu dirección de correo electrónico',
        'linkSent'        => 'Se ha enviado un nuevo enlace de verificación a su correo electrónico',
        'verificationEmail'    => 'Antes de continuar, por favor revise su correo electrónico para un enlace de verificación.',
        'mailNotReceived'   => 'Si no recibió el correo electrónico',
        'requestNewLink'    => 'haga clic aquí para solicitar otro',
        'accountRegister' => 'Cree su cuenta',


        'settings'            => [
            'info'   => 'Información personal',
            'name' => 'Nombre completo',
            'edit' => 'Edita tu información',
            'payment_info' => 'Metodo de pago',
            'card' => 'Numero de tarjeta',
            'type_card' => 'Tipo de tarjeta',
            'balance' => 'Balance',
            'wishlist' => 'Tus listas de deseos',
        ],

    ],
    'videogame'       => [
        'name'     => 'Nombre',
        'category' => 'Categoría',
        'price'    => 'Precio',
        'designer' => 'Diseñador',
        'pg'       => 'PG',
        'details'  => 'Detalles',
        'info'     => 'Más información',

        'categories' => [
            'action' => 'Acción',
            'adventure' => 'Aventura',
            'simulation' => 'Simulacion',
            'rpg' => 'RPG',
            'fps' => 'FPS',
            'sports' => 'Deportes',
        ]
    ],
    'cart'            => [
        'add'      => 'Añadir al carrito',
        'quantity' => 'Cantidad',
        'totalPrice' => 'Precio total',
        'buy'      => 'Comprar',
    ],
    'wishlist'        => [
        'add'      => 'Agregar a lista de deseos',
        'create'   => 'Crear una lista de deseos',
        'name'     => 'Nombre lista de deseos',
        'show'     => 'Tu lista de deseos',
        'next'     => 'Siguiente',
        'previous' => 'Anterior',
    ],
    'comment'         => [
        'loginRequired' => 'Debes iniciar sesión para comentar',
        'add'           => 'Escribe tu comentario',
        'create'        => 'Añadir comentario',
        'posted'        => 'Tu comentario ha sido publicado exitosamente',
    ],
    'home'            => [
        'title'   => 'Los Mejores Videjuegos de la Vida',
        'welcome' => 'Bienvenido a XPN-Games, donde tus sueños se hacen realidad. Ven, compra un juego, mira una partida.
                        O busca lo que quieras. ¡Disfruta!',
    ],

];
