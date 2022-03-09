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

use App\Core\Auth;

$route = $_SERVER['REQUEST_URI'];
$user = Auth::user();
?>
<div class="admin__container">
    <header class="header">
        <div class="header-admin__wrapper">
            <div class="header-admin-item__logo">
                <a href="/">
                    <img src="/public/storage/images/logo.png"
                         alt="logo" width="140" height="40"
                         class="header-logo">
                </a>
                <a data-toggle="menu" class="menu">
                    <img data-toggle="menu" src="/public/storage/images/svg/menu.svg" alt="menu" width="30" height="20">
                </a>
            </div>
            <div class="header-admin-item__links">
                <div class="header-admin-item <?php if ($route=== '/admin') echo 'active'; ?>">
                    <a href="/admin"
                       class="full link <?php if ($route=== '/admin') echo 'active'; ?>">
                        <img src="/public/storage/images/svg/main.svg" class="mr-1" alt="Админка" width="30" height="20">
                        <span class="text-item">Главная</span>
                    </a>
                </div>
                <div class="header-admin-item <?php if (strpos($route, 'admin/posts')) echo 'active'; ?>">
                    <a href="/admin/posts/create"
                       class="full link <?php if (strpos($route, 'admin/posts')) echo 'active'; ?>">
                        <img src="/public/storage/images/svg/post.svg" class="mr-1" alt="Объявления" width="30" height="20">
                        <span class="text-item">Объявления</span>
                    </a>
                </div>
                <div class="header-admin-item <?php if (strpos($route, 'admin/cities')) echo 'active'; ?>">
                    <a href="/admin/cities/create"
                       class="full link <?php if (strpos($route, 'admin/cities')) echo 'active'; ?>">
                        <img src="/public/storage/images/svg/city.svg" class="mr-1" alt="Города" width="30" height="20">
                        <span class="text-item">Города</span>
                    </a>
                </div>
                <div class="header-admin-item <?php if (strpos($route, 'admin/categories')) echo 'active'; ?>">
                    <a href="/admin/categories/create"
                       class="full link <?php if (strpos($route, 'admin/categories')) echo 'active'; ?>">
                        <img src="/public/storage/images/svg/category.svg" class="mr-1" alt="Города" width="30" height="20">
                        <span class="text-item">Категории</span>
                    </a>
                </div>
                <div class="header-admin-item <?php if (strpos($route, 'admin/users')) echo 'active'; ?>">
                    <a href="/admin/users/create"
                       class="full link <?php if (strpos($route, 'admin/users')) echo 'active'; ?>">
                        <img src="/public/storage/images/svg/user.svg" class="mr-1" alt="Пользователи" width="30" height="20">
                        <span class="text-item">Пользователи</span>
                    </a>
                </div>
                <div class="header-admin-item <?php if (strpos($route, 'lk')) echo 'active'; ?>">
                    <a href="/lk"
                       class="full link <?php if (strpos($route, 'lk')) echo 'active'; ?>">
                        <img src="/public/storage/images/svg/lk.svg" class="mr-1" alt="Личный кабинет" width="30" height="20">
                        <span class="text-item">Личный кабинет</span>
                    </a>
                </div>
                <div class="header-admin-item">
                    <form action="/api/logout" class="full" method="post">
                        <button type="submit" class="full link">
                            <img src="/public/storage/images/svg/exit.svg" class="mr-1" alt="Выйти" width="30" height="20">
                            <span class="text-item">Выйти</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <script src="/public/js/modal.js"></script>
    <?php echo $content; ?>
</div>
<script>
    if(window.screen.width<1000) {
        toggleMenu()
        const header = document.querySelector('.header')
        const wrapper = header.querySelector('.header-admin__wrapper')
        const menu = header.querySelector('.menu')
        menu.style.display='none'
        wrapper.style.minWidth='50px'
    }

    function toggleMenu() {
        const header = document.querySelector('.header')
        const wrapper = header.querySelector('.header-admin__wrapper')
        const logo = header.querySelector('.header-logo')
        const texts = header.querySelectorAll('.text-item')
        const links = header.querySelectorAll('.full')
        const alt =logo.getAttribute('alt')
        if (alt === 'logo') {
            wrapper.style.minWidth='80px'
            logo.setAttribute('alt', 'mini-logo')
            logo.src = '/public/storage/images/logo-mini.png'
            logo.width = '36'
            texts.forEach(function (el) {
                el.style.display = 'none'
            })
            links.forEach(function (el) {
                el.style.justifyContent='center'
            })
        } else if (alt === 'mini-logo') {
            wrapper.style.minWidth='205px'
            logo.setAttribute('alt', 'logo')
            logo.src = '/public/storage/images/logo.png'
            logo.width = '140'
            texts.forEach(function (el) {
                el.style.display = 'inline-block'
            })
            links.forEach(function (el) {
                el.style.justifyContent='start'
            })
        }
    }

    document.addEventListener('click', function (e) {
        if (e.target.dataset.toggle === 'menu') {
            toggleMenu();
        }
    })
</script>
</body>
</html>