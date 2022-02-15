<div class="workspace__container">
    <div class="container-fluid flex-center">
        <div class="message">
            <?php use Core\Auth;
            $address = 'posts/create';
            if(Auth::user()->role ===1) $address = 'admin/posts/create';
            if (isset($message) and $message != ''): ?>
                <?php echo $message; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php if (count($posts) != 0): ?>
        <?php foreach ($posts as $post): ?>
            <form action="/api/posts/update" class="form-post-create"
                  method="post" enctype="multipart/form-data">
                <input type="number" name="id" value="<?php echo $post->id; ?>" readonly hidden>
                <div class="container post__wrapper">
                    <div class="form-post__logo">
                        <img src="<?php echo $post->image; ?>"
                             alt="Главное изображение"
                             width="258"
                             height="258"
                             data-toggle="modal"
                             data-title="<?php echo $post->title; ?>"
                             id="mainImage"
                             class="post-logo__image">
                        <div class="form-post__panels">
                            <?php if (Auth::user()->role === 1) : ?>
                                <select class="form-item__select" name="user" required>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?php echo $user->id; ?>" <?php if ($user->id === $post->user_id) echo 'selected'; ?>>
                                            <?php echo $user->name . ' (' . $user->last_name . ' ' . $user->first_name . ')'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                            <label for="image" class="form-item__file_label mt-1 mb-1">
                                <input type="file" name="image" id="image"
                                       class="form-item__file"
                                       accept=".jpg,.jpeg,.png">
                                <div>Выберите файл</div>
                            </label>
                            <label for="images" class="form-item__file_label">
                                <input type="file" name="images[]" id="images"
                                       class="form-item__file"
                                       multiple="multiple" accept=".jpg,.jpeg,.png">
                                <div>Выберите файл или файлы</div>
                            </label>
                            <div>
                                <input type="submit"
                                       value="Изменить"
                                       class="btn mt-1">
                                <input value="Удалить"
                                       type="button"
                                       id="formDelete"
                                       data-id="<?php echo $post->id; ?>"
                                       class="btn btn-my mt-1">
                            </div>

                        </div>
                    </div>
                    <div class="post-info">
                        <div class="post-info__title">
                            <input class="form-item__input"
                                   type="text" name="title"
                                   value="<?php echo $post->title; ?>"
                                   placeholder="Заголовок" required>
                            <div>
                                <input class="form-item__input"
                                       type="number" name="price" min="0"
                                       value="<?php echo $post->price; ?>"
                                       placeholder="Стоимость" required> руб.
                            </div>
                        </div>
                        <div class="post-info__title">
                            <select class="form-item__select" name="category" id="category" required>
                                <optgroup label="Категория">
                                    <?php foreach ($categories as $key => $category): ?>
                                        <option value="<?php echo $category->id; ?>" <?php if ($category->id === $post->category_id) echo 'selected'; ?>>
                                            <?php echo $category->name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                            <select class="form-item__select" name="status" required>
                                <option value="1" <?php if ($post->status === 1) echo 'selected'; ?>>Выставлено</option>
                                <option value="2" <?php if ($post->status === 2) echo 'selected'; ?>>Продано</option>
                            </select>
                        </div>
                        <textarea class="form-item__textarea mt-1"
                                  name="description"
                                  placeholder="Описание" rows="10" required><?php echo $post->description; ?></textarea>
                    </div>
                </div>
                <div class="container">
                    <div class="post-images">
                        <?php foreach ($post->images as $image): ?>
                            <img class="thumb"
                                 src="<?php echo $image->image; ?>"
                                 title="<?php echo $post->title; ?>" data-toggle="modal"
                                 data-title="<?php echo $post->title; ?>"/>
                        <?php endforeach; ?>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="container_fluid">
            <div class="flex-center">
                <div class="message">
                    <div class="title mb-2">У Вас нет объявлений</div>
                    <a href="/posts/create" class="btn">Добавить</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script src="/public/js/posts.js"></script>