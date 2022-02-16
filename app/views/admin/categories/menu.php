<?php
$route = $_SERVER['REQUEST_URI'];
?>
<div class="header-admin">
    <div class="header__wrapper">
        <div class="header-item__links">
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