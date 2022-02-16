<?php
$route = $_SERVER['REQUEST_URI'];
?>
<div class="header-admin">
    <div class="header__wrapper">
        <div class="header-item__links">
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
                    Удалить
                </a>
            </div>
        </div>
    </div>
</div>