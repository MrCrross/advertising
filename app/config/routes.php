<?php

return [
    // Главная страница
    '' => [
        'controller' => 'MainController',
        'action' => 'index'
    ],
    // личный кабинет
    'lk'=>[
        'controller' => 'MainController',
        'action' => 'lk'
    ],
    // Вывод определенной категории на главной странице
    'categories/category\d{1,}' => [
        'controller' => 'MainController',
        'action' => 'view'
    ],
    // Страница Входа
    'login' => [
        'controller' => 'AuthController',
        'action' => 'login'
    ],
    // Страница регистрации
    'registration' => [
        'controller' => 'AuthController',
        'action' => 'registration'
    ],
    // Страница объявления
    'post\d{1,}' => [
        'controller' => 'PostController',
        'action' => 'view'
    ],
    // Вывод постов пользователя
    'posts'=>[
        'controller'=>'PostController',
        'action'=>'index'
    ],
    // Страница Добавление поста пользователем
    'posts/create'=>[
        'controller'=>'PostController',
        'action'=>'create'
    ],
    // Страница редактирования поста пользователем
    'posts/edit'=>[
        'controller'=>'PostController',
        'action'=>'edit'
    ],
    // Обработка входа
    'api/login' => [
        'controller' => 'AuthController',
        'action' => 'auth'
    ],
    // Обработка регистрации
    'api/registration' => [
        'controller' => 'AuthController',
        'action' => 'reg'
    ],
    // Выход
    'api/logout' => [
        'controller' => 'AuthController',
        'action' => 'logout'
    ],
    // Изменить данные пользователя
    'api/user/update' => [
        'controller' => 'UserController',
        'action' => 'update'
    ],
    // Изменить пароль пользователя
    'api/user/changePassword' => [
        'controller' => 'UserController',
        'action' => 'changePassword'
    ],
    // Добавление поста пользователем
    'api/posts/create'=>[
        'controller'=>'PostController',
        'action'=>'insert'
    ],
    // Обновление поста пользователем
    'api/posts/update'=>[
        'controller'=>'PostController',
        'action'=>'update'
    ],
    // Удаление поста пользователем
    'api/posts/delete'=>[
        'controller'=>'PostController',
        'action'=>'delete'
    ],
    //Миграции
    'admin/migrate/fresh' => [
        'controller' => 'MigrateController',
        'action' => 'fresh'
    ],
    'admin/migrate/freshAndSeed' => [
        'controller' => 'MigrateController',
        'action' => 'freshAndSeed'
    ],
    'admin/migrate' => [
        'controller' => 'MigrateController',
        'action' => 'migrate'
    ],
    'admin/migrateAndSeed' => [
        'controller' => 'MigrateController',
        'action' => 'migrate'
    ],
];