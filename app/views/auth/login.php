<div class="auth__wrapper">
    <form action="/api/login" method="post" class="auth-form">
        <div class="auth-form__title">
            <div class="title">ВХОД</div>
        </div>
        <div class="message">
            <?php if(isset($message) and $message!=''):?>
                <?php echo $message;?>
            <?php endif;?>
        </div>
        <div class="auth-form__body">
            <div class="form-item">
                <label for="name" class="form-item__label">Логин:</label>
                <input type="text" id="name" name="name" class="form-item__input" placeholder="Логин" maxlength="255" required>
            </div>
            <div class="form-item">
                <label for="password" class="form-item__label">Пароль:</label>
                <input type="password" id="password" name="password" class="form-item__input" placeholder="Пароль" minlength="6" maxlength="255" required>
            </div>
            <div class="form-item">
                <button class="btn form-item__submit" type="submit">
                    Войти
                </button>
            </div>
        </div>
    </form>
</div>
