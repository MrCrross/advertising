<?php
$route = $_SERVER['REQUEST_URI'];
?>
<div class="header-admin">
    <div class="header__wrapper">
        <div class="header-item__links">
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