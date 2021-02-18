<?php

/*Mémo :
   On doit déclarer toutes les "routes" à AltoRouter, afin qu'il puisse nous donner LA "route" correspondante à l'URL courante
   On appelle cela "mapper" les routes
   1. méthode HTTP : GET ou POST (pour résumer)
   2. La route : la portion d'URL après le basePath
   3. Target/Cible : informations contenant
        - le nom de la méthode à utiliser pour répondre à cette route
        - le nom du controller contenant la méthode
   4. Le nom de la route : pour identifier la route, on va suivre une convention
        - "NomDuController-NomDeLaMéthode"
        - ainsi pour la route /, méthode "home" du MainController => "main-home"
*/

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController'
    ],
    'main_home'
);

$router->map(
    'GET',
    '/gestion',
    [
        'method' => 'gestion',
        'controller' => '\App\Controllers\MainController'
    ],
    'main_gestion'
);

/* Routes pour la page se connecter */

$router->map(
    'GET',
    '/login',
    [
        'method' => 'login',
        'controller' => '\App\Controllers\UserController'
    ],
    'user_login'
);

$router->map(
    'POST',
    '/login',
    [
        'method' => 'loginPost',
        'controller' => '\App\Controllers\UserController'
    ],
    'user_login_post'
);

$router->map(
    'GET',
    '/newUser',
    [
        'method' => 'newUser',
        'controller' => '\App\Controllers\UserController'
    ],
    'new_user'
);

$router->map(
    'POST',
    '/newUser',
    [
        'method' => 'newUserPost',
        'controller' => '\App\Controllers\UserController'
    ],
    'new_user_post'
);

/* Routes pour la page contact */

$router->map(
    'GET',
    '/contact',
    [
        'method' => 'contact',
        'controller' => '\App\Controllers\MainController'
    ],
    'main_contact'
);

$router->map(
    'POST',
    '/contact',
    [
        'method' => 'contactPost',
        'controller' => '\App\Controllers\MainController'
    ],
    'main_contact_post'
);

/* Routes pour les pages photos */

$router->map(
    'GET',
    '/pictures/[a:category]',
    [
        'method' => 'pictures',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'pictures'
);

$router->map(
    'GET',
    '/pictures/[a:category]',
    [
        'method' => 'picturesList',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'pictures_list'
);

$router->map(
    'GET',
    '/picturesForm/[a:category]',
    [
        'method' => 'picturesListForm',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'pictures_list_form'
);

$router->map(
    'GET',
    '/insert_picture',
    [
        'method' => 'insertPicture',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'insert_picture'
);

$router->map(
    'POST',
    '/insert_picture',
    [
        'method' => 'insertPicturePost',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'insert_picture_post'
);

$router->map(
    'GET',
    '/update_picture/[i:id]',
    [
        'method' => 'updatePicture',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'update_picture'
);

$router->map(
    'POST',
    '/update_picture/[i:id]',
    [
        'method' => 'updatePicturePost',
        'controller' => '\App\Controllers\PicturesController'
    ],
    'update_picture_post'
);

/* Routes pour les articles */

$router->map(
    'GET',
    '/biographie',
    [
        'method' => 'biographie',
        'controller' => '\App\Controllers\ArticleController'
    ],
    'article_biographie'
);

/* Routes pour les catégories */

$router->map(
    'GET',
    '/insert_category',
    [
        'method' => 'insertCategory',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'insert_category'
);

$router->map(
    'POST',
    '/insert_category',
    [
        'method' => 'insertCategoryPost',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'insert_category_post'
);

$router->map(
    'GET',
    '/update_category/[a:category]',
    [
        'method' => 'updateCategory',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'update_category'
);

$router->map(
    'POST',
    '/update_category/[a:category]',
    [
        'method' => 'updateCategoryPost',
        'controller' => '\App\Controllers\CategoryController'
    ],
    'update_category_post'
);

?>
