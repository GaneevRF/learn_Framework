<?php

return [

    // Main Routes
    'index' => [
        'uri' => '/',
        'controller' => 'MainController:index',
        'method' => 'GET'
    ],
    'login' => [
        'uri' => '/login',
        'controller' => 'MainController:login',
        'method' => 'GET'
    ],
    'registration' => [
        'uri' => '/register',
        'controller' => 'MainController:register',
        'method' => 'GET'
    ],
    '404Page' => [
        'uri' => '/404Page',
        'controller' => 'Page404Controller:index',
        'method' => 'GET'
    ],


    // Admin Routes
    'admin' => [
        'uri' => '/admin',
        'controller' =>  'AdminController:index',
        'method' => 'GET',
        'group' => 'admin'
    ],


    // Post Routes
    'posts-all' => [
        'uri' => '/posts',
        'controller' =>  'UserController:index',
        'method' => 'GET',
    ],
    'posts-info' => [
        'uri' => '/post/(id:int)',
        'controller' =>  'UserController:info',
        'method' => 'GET',
    ],
    'posts-add' => [
        'uri' => '/post/add',
        'controller' =>  'UserController:add',
        'method' => 'POST',
    ],
    'posts-edit' => [
        'uri' => '/post/(id:int)',
        'controller' =>  'UserController:edit',
        'method' => 'POST',
    ],
    'posts-delete' => [
        'uri' => '/post/(id:int)',
        'controller' =>  'UserController:delete',
        'method' => 'POST',
    ],

    // User Routes
    'users-all' => [
        'uri' => '/users',
        'controller' =>  'UserController:index',
        'method' => 'GET',
    ],
    'users-info' => [
        'uri' => '/user/(id:int)',
        'controller' =>  'UserController:info',
        'method' => 'GET',
    ],
    'users-add' => [
        'uri' => '/user/add',
        'controller' =>  'UserController:add',
        'method' => 'POST',
    ],
    'users-edit' => [
        'uri' => '/user/(id:int)',
        'controller' =>  'UserController:edit',
        'method' => 'POST',
    ],
    'users-delete' => [
        'uri' => '/user/(id:int)',
        'controller' =>  'UserController:delete',
        'method' => 'POST',
    ],



];