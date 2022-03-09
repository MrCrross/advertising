<?php

return [
    'guest'=>[
        '',
        'categories/category\d{1,}',
        'login',
        'registration',
        'post\d{1,}',
        'api/login',
        'api/registration',
        'admin/migrate/freshAndSeed',
        'admin/migrateAndSeed'
    ],
    'user'=>[
        '',
        'lk',
        'categories/category\d{1,}',
        'post\d{1,}',
        'api/logout',
        'posts',
        'posts/create',
        'posts/edit',
        'api/user/update',
        'api/user/changePassword',
        'api/posts/create',
        'api/posts/update',
        'api/posts/delete',
    ],
    'admin'=>[
        '',
        'lk',
        'categories/category\d{1,}',
        'post\d{1,}',
        'admin',
        'admin/posts/create',
        'admin/posts/edit',
        'admin/cities/create',
        'admin/cities/edit',
        'admin/cities/delete',
        'admin/categories/create',
        'admin/categories/edit',
        'admin/categories/delete',
        'admin/users/create',
        'admin/users/edit',
        'admin/users/delete',
        'api/posts/create',
        'api/posts/update',
        'api/posts/delete',
        'api/cities/create',
        'api/cities/update',
        'api/cities/delete',
        'api/categories/create',
        'api/categories/update',
        'api/categories/delete',
        'api/user/create',
        'api/user/update',
        'api/user/changePassword',
        'api/user/delete',
        'api/logout',
        'api/user/update',
        'api/user/changePassword',
        'admin/migrate/fresh',
        'admin/migrate/freshAndSeed',
        'admin/migrate',
        'admin/migrateAndSeed'
    ]
];