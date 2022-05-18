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
    // Админка
    'admin'=>[
        'controller' => 'AdminController',
        'action' => 'index'
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
    // Страница Добавление постов администратором
    'admin/posts/create'=>[
        'controller'=>'AdminController',
        'action'=>'createPost'
    ],
    // Страница редактирования постов администратором
    'admin/posts/edit'=>[
        'controller'=>'AdminController',
        'action'=>'editPost'
    ],
    // Страница Добавление города администратором
    'admin/cities/create'=>[
        'controller'=>'AdminController',
        'action'=>'createCity'
    ],
    // Страница редактирования города администратором
    'admin/cities/edit'=>[
        'controller'=>'AdminController',
        'action'=>'editCity'
    ],
    // Страница удаление города администратором
    'admin/cities/delete'=>[
        'controller'=>'AdminController',
        'action'=>'deleteCity'
    ],
    // Страница Добавление Категории администратором
    'admin/categories/create'=>[
        'controller'=>'AdminController',
        'action'=>'createCategory'
    ],
    // Страница редактирования Категории администратором
    'admin/categories/edit'=>[
        'controller'=>'AdminController',
        'action'=>'editCategory'
    ],
    // Страница удаление Категории администратором
    'admin/categories/delete'=>[
        'controller'=>'AdminController',
        'action'=>'deleteCategory'
    ],
    // Страница Добавление пользователя администратором
    'admin/users/create'=>[
        'controller'=>'AdminController',
        'action'=>'createUser'
    ],
    // Страница редактирования пользователей администратором
    'admin/users/edit'=>[
        'controller'=>'AdminController',
        'action'=>'editUser'
    ],
    // Страница удаление пользователей администратором
    'admin/users/delete'=>[
        'controller'=>'AdminController',
        'action'=>'deleteUser'
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
    // Добавление пользователя администратором
    'api/user/create' => [
        'controller' => 'UserController',
        'action' => 'create'
    ],
    // Изменить данные пользователя
    'api/user/update' => [
        'controller' => 'UserController',
        'action' => 'update'
    ],
    // Удаление пользователя администратором
    'api/user/delete' => [
        'controller' => 'UserController',
        'action' => 'delete'
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
    // Обработка Добавление города
    'api/cities/create'=>[
        'controller'=>'CityController',
        'action'=>'insert'
    ],
    // Обработка Изменение города
    'api/cities/update'=>[
        'controller'=>'CityController',
        'action'=>'update'
    ],
    // Обработка Удаление города
    'api/cities/delete'=>[
        'controller'=>'CityController',
        'action'=>'delete'
    ],
    // Обработка Добавление Категории
    'api/categories/create'=>[
        'controller'=>'CategoryController',
        'action'=>'insert'
    ],
    // Обработка Изменение Категории
    'api/categories/update'=>[
        'controller'=>'CategoryController',
        'action'=>'update'
    ],
    // Обработка Удаление Категории
    'api/categories/delete'=>[
        'controller'=>'CategoryController',
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