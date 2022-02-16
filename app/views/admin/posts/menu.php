<?php
$route = $_SERVER['REQUEST_URI'];
?>
<div class="header-admin">
    <div class="header__wrapper">
        <div class="header-item__links">
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