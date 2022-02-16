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
            <form action="/api/categories/delete" method="post">
                <div class="form-item">
                    <div class="title mr-1">Удаление категорию <?php echo $category->name; ?></div>
                    <input type="text" name="id" value="<?php echo $category->id; ?>" readonly hidden>
                    <button class="btn form-item__submit" type="submit">
                        Удалить
                    </button>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<script>
    const forms = document.querySelectorAll('form')
    forms.forEach(function (form){
        form.addEventListener('submit',function (e){
            e.preventDefault()
            if(confirm('Вы действительно хотите удалить категорию?')) form.submit()
        })
    })
</script>