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
    <?php foreach ($categories as $category): ?>
        <div class="container__fluid flex-center">
            <form action="/api/categories/update" method="post">
                <div class="auth-form__title">
                    <div class="title">Изменение категории <?php echo $category->name; ?></div>
                </div>
                <div class="auth-form__body">
                    <div class="form-item">
                        <label for="name" class="form-item__label">Название:</label>
                        <input type="text" name="id" value="<?php echo $category->id; ?>" readonly hidden>
                        <input type="text" id="name" name="name"
                               value="<?php echo $category->name; ?>"
                               class="form-item__input" placeholder="Название" maxlength="255" required>
                    </div>
                    <div class="form-item">
                        <button class="btn form-item__submit" type="submit">
                            Изменить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>