<div class="workspace__container">
    <div class="header-item__links mb-2 mt-1 border-black">
        <div class="header-item">
            <a href="/"
               class="link">
                <?php use Core\Auth;

                echo Auth::user()->name; ?>
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/posts/create"
               class="link">
                Объявления - Добавить
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/posts/edit"
               class="link">
                Объявления - Редактировать
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/posts/edit"
               class="link">
                Объявления - Удалять
            </a>
        </div>
    </div>
    <div class="header-item__links mb-2 mt-1 border-black">
        <div class="header-item">
            <a href="/admin/cities/create"
               class="link">
                Города - Добавить
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/cities/edit"
               class="link">
                Города - Редактировать
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/cities/delete"
               class="link">
                Города - Удалить
            </a>
        </div>
    </div>
    <div class="header-item__links mb-2 mt-1 border-black">
        <div class="header-item">
            <a href="/admin/users/create"
               class="link">
                Пользователи - Добавить
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/users/edit"
               class="link">
                Пользователи - Редактировать
            </a>
        </div>
        <div class="header-item">
            <a href="/admin/users/delete"
               class="link">
                Пользователи - Удалять
            </a>
        </div>
    </div>
</div>