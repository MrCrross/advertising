<div class="workspace__container">
    <?php require_once 'menu.php'; ?>
    <div class="container-fluid flex-center">
        <div class="message">
            <?php
            if (isset($message) and $message != ''): ?>
                <?php echo $message; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container__fluid flex-center">
        <form action="/api/categories/create" method="post">
            <div class="auth-form__title">
                <div class="title">Добавление категории</div>
            </div>
            <div class="auth-form__body">
                <div class="form-item">
                    <label for="name" class="form-item__label">Название:</label>
                    <input type="text" id="name" name="name" class="form-item__input" placeholder="Название" maxlength="255" required>
                </div>
                <div class="form-item">
                    <button class="btn form-item__submit" type="submit">
                        Добавить
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>