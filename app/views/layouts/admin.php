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
$user = Auth::user();
?>
<header class="header-admin">
    <div class="header-admin__wrapper">
        <div class="header-admin-item header-admin-item__logo <?php if ($route === '/' or strpos($route, 'categories')) echo 'active'; ?>">
            <a href="/" class="link">
                <img src="/public/storage/images/logo.png"
                     alt="logo" width="140" height="40"
                     class="header-logo">
            </a>
            <a data-toggle="menu">
                <img src="/public/storage/images/menu.svg" alt="menu" width="30" height="20">
            </a>
        </div>
        <div class="header-item__links">
            <div class="header-item">
                <a href="/admin"
                   class="link <?php if (strpos($route, 'admin')) echo 'active'; ?>">
                    Админка
                </a>
            </div>
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