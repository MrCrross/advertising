<?php
$route = $_SERVER['REQUEST_URI'];
?>
<div class="workspace__container">
    <div class="header-admin">
        <div class="header__wrapper">
            <div class="header-item__links">
                <div class="header-item">
                    Объявления
                </div>
                <div class="header-item">
                    <a href="/" class="link">
                        <?php use App\Core\Auth; echo Auth::user()->name; ?>
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/posts/create"
                       class="link <?php if ($route === '/admin/posts/create') echo 'active'; ?>">
                        Добавить
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/posts/edit"
                       class="link <?php if ($route === '/admin/posts/edit') echo 'active'; ?>">
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-admin">
        <div class="header__wrapper">
            <div class="header-item__links">
                <div class="header-item">
                    Города
                </div>
                <div class="header-item">
                    <a href="/admin/cities/create"
                       class="link <?php if ($route === '/admin/cities/create') echo 'active'; ?>">
                        Добавить
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/cities/edit"
                       class="link <?php if ($route === '/admin/cities/edit') echo 'active'; ?>">
                        Редактировать
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/cities/delete"
                       class="link <?php if ($route === '/admin/cities/delete') echo 'active'; ?>">
                        Удалить
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-admin">
        <div class="header__wrapper">
            <div class="header-item__links">
                <div class="header-item">
                    Категории
                </div>
                <div class="header-item">
                    <a href="/admin/categories/create"
                       class="link <?php if ($route === '/admin/categories/create') echo 'active'; ?>">
                        Добавить
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/categories/edit"
                       class="link <?php if ($route === '/admin/categories/edit') echo 'active'; ?>">
                        Редактировать
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/categories/delete"
                       class="link <?php if ($route === '/admin/categories/delete') echo 'active'; ?>">
                        Удалить
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-admin">
        <div class="header__wrapper">
            <div class="header-item__links">
                <div class="header-item">
                    Пользователи
                </div>
                <div class="header-item">
                    <a href="/admin/users/create"
                       class="link <?php if ($route === '/admin/users/create') echo 'active'; ?>">
                        Добавить
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/users/edit"
                       class="link <?php if ($route === '/admin/users/edit') echo 'active'; ?>">
                        Редактировать
                    </a>
                </div>
                <div class="header-item">
                    <a href="/admin/users/delete"
                       class="link <?php if ($route === '/admin/users/delete') echo 'active'; ?>">
                        Удалять
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>