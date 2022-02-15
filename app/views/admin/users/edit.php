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
    <?php foreach ($users as $user): ?>
        <div class="lk__wrapper">
            <form action="/api/user/update" method="post">
                <div class="auth-form__title">
                    <div class="title">Изменить личных данных <?php echo $user->name ?></div>
                </div>
                <div class="form-item">
                    <label for="name" class="form-item__label">Логин:</label>
                    <input type="text" name="id" value="<?php echo $user->id; ?>" readonly hidden>
                    <input type="text" id="name" name="name"
                           value="<?php echo $user->name ?>"
                           class="form-item__input" placeholder="Логин" maxlength="255"
                           required>
                </div>
                <div class="form-item">
                    <label for="last_name" class="form-item__label">Фамилия:</label>
                    <input type="text" id="last_name" name="last_name"
                           value="<?php echo $user->last_name ?>"
                           class="form-item__input" placeholder="Фамилия"
                           maxlength="255">
                </div>
                <div class="form-item">
                    <label for="first_name" class="form-item__label">Имя:</label>
                    <input type="text" id="first_name" name="first_name"
                           value="<?php echo $user->first_name ?>"
                           class="form-item__input" placeholder="Имя"
                           maxlength="255">
                </div>
                <div class="form-item">
                    <label for="role" class="form-item__label">Роль:</label>
                    <select class="form-item__select form-item__size" name="role" id="role">
                        <option value="2" <?php if (2 === $user->role) echo 'selected'; ?>>Пользователь</option>
                        <option value="1" <?php if (1 === $user->role) echo 'selected'; ?>>Администратор</option>
                    </select>
                </div>
                <div class="form-item">
                    <label for="city" class="form-item__label">Город:</label>
                    <select class="form-item__select form-item__size" name="city" id="city">
                        <?php foreach ($cities as $city): ?>
                            <option value="<?php echo $city->id; ?>"
                                <?php if ($city->id === $user->city_id) echo 'selected'; ?>>
                                <?php echo $city->name; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-item">
                    <label for="address" class="form-item__label">Адрес:</label>
                    <input type="text" id="address" name="address"
                           value="<?php echo $user->address ?>"
                           class="form-item__input" placeholder="Адрес"
                           maxlength="255">
                </div>
                <div class="form-item">
                    <button class="btn form-item__submit" type="submit">
                        Сохранить изменения
                    </button>
                </div>
            </form>
            <form action="/api/user/changePassword" method="post">
                <div class="auth-form__title">
                    <div class="title">Изменить пароль <?php echo $user->name ?></div>
                </div>
                <div class="form-item">
                    <label for="password" class="form-item__label">Пароль:</label>
                    <input type="text" name="id" value="<?php echo $user->id; ?>" readonly hidden>
                    <input type="password" id="password" name="password"
                           class="form-item__input" placeholder="Пароль" minlength="6" maxlength="255" required>
                </div>
                <div class="form-item">
                    <button class="btn form-item__submit" type="submit">
                        Изменить пароль
                    </button>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>