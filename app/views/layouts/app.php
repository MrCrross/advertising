<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/public/storage/images/logo-mini.png" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/modal.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>OBBITO - сервис объявлений от Обито Учихи</title>
</head>
<body>
<?php

use Core\Auth;

$route = $_SERVER['REQUEST_URI'];
$auth = Auth::check();
$role = 2;
if($auth) {
    $user = Auth::user();
    $role = $user->role;
}
?>
<header class="header">
    <div class="header__wrapper">
        <div class="header-item header-item__logo">
            <a href="/"
               class="link <?php if ($route === '/' or strpos($route, 'categories')) echo 'active'; ?>">
                <img src="/public/storage/images/logo.png"
                     alt="logo" width="140" height="40"
                     class="header-logo">
            </a>
        </div>
        <div class="header-item__links">
            <?php if (!$auth): ?>
                <div class="header-item">
                    <a href="/registration"
                       class="link <?php if ($route === '/registration') echo 'active'; ?>">
                        Регистрация
                    </a>
                </div>
                <div class="header-item">
                    <a href="/login"
                       class="link <?php if ($route === '/login') echo 'active'; ?>">
                        Войти
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($auth): ?>
                <?php if ($role === 2): ?>
                    <div class="header-item">
                        <a href="/posts"
                           class="link <?php if (strpos($route, 'posts')) echo 'active'; ?>">
                            Объявления
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($role === 1): ?>
                    <div class="header-item">
                        <a href="/admin"
                           class="link <?php if (strpos($route, 'admin')) echo 'active'; ?>">
                            Админка
                        </a>
                    </div>
                <?php endif; ?>
                <div class="header-item">
                    <div class="dropdown link <?php if (strpos($route, 'lk')) echo 'active'; ?>">
                        <?php echo $user->name; ?>
                        <div class="dropdown-content">
                            <a href="/lk" class="link">Личный кабинет</a>
                            <form action="/api/logout" method="post">
                                <button type="submit" class="link">Выйти</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</header>
<script src="/public/js/modal.js"></script>
<?php echo $content; ?>
<script>
    const dropdown = document.querySelectorAll('.dropdown')
    dropdown.forEach(function (value) {
        value.addEventListener('click', function (e) {
            e.target.querySelector('.dropdown-content').classList.toggle('block');
        })
    })
</script>
</body>
</html>