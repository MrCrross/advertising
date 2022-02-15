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
        <form action="/api/user/create" method="post">
            <div class="auth-form__title">
                <div class="title">Добавление пользователя</div>
            </div>
            <div class="auth-form__body">
                <div class="form-item">
                    <label for="name" class="form-item__label">Логин:</label>
                    <input type="text" id="name" name="name" class="form-item__input" placeholder="Логин"
                           maxlength="255" required>
                </div>
                <div class="form-item">
                    <label for="password" class="form-item__label">Пароль:</label>
                    <input type="password" id="password" name="password" class="form-item__input" placeholder="Пароль"
                           minlength="6" maxlength="255" required>
                </div>
                <div class="form-item">
                    <label for="last_name" class="form-item__label">Фамилия:</label>
                    <input type="text" id="last_name" name="last_name" class="form-item__input" placeholder="Фамилия"
                           maxlength="255">
                </div>
                <div class="form-item">
                    <label for="first_name" class="form-item__label">Имя:</label>
                    <input type="text" id="first_name" name="first_name" class="form-item__input" placeholder="Имя"
                           maxlength="255">
                </div>
                <div class="form-item">
                    <label for="role" class="form-item__label">Роль:</label>
                    <select class="form-item__select form-item__size" name="role" id="role">
                        <option value="2">Пользователь</option>
                        <option value="1">Администратор</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="city" class="form-item__label">Город:</label>
                    <select class="form-item__select form-item__size" name="city" id="city" required>
                        <?php if (!empty($cities)): ?>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-item">
                    <label for="address" class="form-item__label">Адрес:</label>
                    <input type="text" id="address" name="address" class="form-item__input" placeholder="Адрес"
                           maxlength="255" required>
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