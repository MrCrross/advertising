<div class="workspace__container">
    <form action="/api/posts/create" class="form-post-create"
          method="post" enctype="multipart/form-data">
        <div class="container-fluid flex-center">
            <div class="message">
                <?php use App\Core\Auth;
                if (isset($message) and $message != ''): ?>
                    <?php echo $message; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="container post__wrapper">
            <div class="form-post__logo">
                <img src="/public/storage/images/template.jpg"
                     alt="Главное изображение"
                     width="258"
                     height="258"
                     id="mainImage"
                     class="post-logo__image">
                <div class="form-post__panels">
                    <?php if(Auth::user()->role===1) :?>
                    <select class="form-item__select" name="user" required>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user->id; ?>" <?php if(Auth::user()->id === $user->id) echo "selected";?>>
                                <?php echo $user->name.' ('.$user->last_name.' '.$user->first_name.')'; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php endif; ?>
                    <label for="image" class="form-item__file_label mt-1 mb-1">
                        <input type="file" name="image" id="image"
                               class="form-item__file"
                               accept=".jpg,.jpeg,.png" required>
                        <div>Выберите файл</div>
                    </label>
                    <label for="images" class="form-item__file_label">
                        <input type="file" name="images[]" id="images"
                               class="form-item__file"
                               multiple="multiple" accept=".jpg,.jpeg,.png">
                        <div>Выберите файл или файлы</div>
                    </label>
                    <input type="submit"
                           value="Отправить"
                           class="btn mt-1">
                </div>
            </div>
            <div class="post-info">
                <div class="post-info__title">
                    <input class="form-item__input"
                           type="text" name="title" placeholder="Заголовок" required>
                    <div>
                        <input class="form-item__input"
                               type="number" name="price" min="0"
                               placeholder="Стоимость" required> руб.
                    </div>
                </div>
                <div class="post-info__title">
                    <select class="form-item__select" name="category" id="category" required>
                        <optgroup label="Категория">
                            <?php foreach ($categories as $key => $category): ?>
                                <option value="<?php echo $category->id; ?>">
                                    <?php echo $category->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                </div>
                <textarea class="form-item__textarea mt-1"
                          name="description"
                          placeholder="Описание" rows="10" required></textarea>
            </div>
        </div>
        <div class="container">
            <div class="post-images">
            </div>

        </div>
    </form>
</div>
<script src="/public/js/posts.js"></script>