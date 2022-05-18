<?php

$route = $_SERVER['REQUEST_URI']; ?>
<div class="container__fluid">
    <form action="/" method="post">
        <div class="category__container">
            <p class="title">Фильтры:</p>
            <div class="filter-list">
                <p class="title-2">Категории:</p>
                <?php if (!empty($categories) and count($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <div class="filter-list__item">
                            <input  value="<?php echo $category->id;?>"
                            <?php if(in_array($category->id,$check_categories) or $check_categories===[]){ echo "checked='checked'";}?>
                                    class="form-item__input" name="category[]" type="checkbox" >
                            <span><?php echo $category->name; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <p class="title-2">Стоимость:</p>
                <div class="filter-list__item">
                    <span style="margin: 0 15px 0 5px">от</span>
                    <input class="form-item__input" style="max-width: 120px;"
                           type="number" name="min_price" min="<?php echo $min_price; ?>" max="<?php echo $max_price; ?>" value="<?php echo $priceStart; ?>">
                    <span style="margin: 0 12px 0 5px">до</span>
                    <input class="form-item__input" style="max-width: 120px; margin-top: 5px"
                           type="number" name="max_price" min="<?php echo $min_price; ?>" max="<?php echo $max_price; ?>" value="<?php echo $priceEnd; ?>">
                </div>
                <p class="title-2">Поиск:</p>
                <div class="filter-list__item">
                    <input class="form-item__input" type="search" name="search" value="<?php echo $search; ?>" placeholder="Поиск">
                </div>
                <div class="filter-list__item" style="text-align: center">
                    <button class="btn btn-my form-item__submit" type="submit">Применить</button>
                </div>
            </div>
        </div>
    </form>
    <div class="workspace__container">
        <?php if (!empty($posts) and count($posts) !== 0): ?>
            <?php foreach ($posts as $post): ?>
                <div class="container post__wrapper">
                    <div class="post-logo">
                        <a href="/post<?php echo $post->id; ?>">
                            <img src="<?php echo $post->image; ?>" alt="" class="post-logo__image">
                        </a>
                        <div class="post-user">
                            <p class="post-user__name">
                                <?php echo $post->user->last_name . ' ' . $post->user->first_name; ?>
                            </p>
                            <p class="post-user__date">
                                <?php echo $post->created_at; ?>
                            </p>
                            <button class="btn btn-my post-user__phone"
                                    onclick="alertPhone(<?php echo $post->user->phone; ?>)">
                                <?php echo mb_substr($post->user->phone, 0, 3) . '. . . . . . .'; ?>
                            </button>
                        </div>
                    </div>
                    <div class="post-info">
                        <div class="post-info__title">
                            <span class="title"><?php echo $post->title; ?></span>
                            <span class="title">
                                <span class="post-info__price"><?php echo $post->price; ?></span> руб.
                            </span>
                        </div>
                        <div class="post-info__title">
                            <p class="title"><?php echo $post->category->name; ?></p>
                        </div>
                        <p class="post-info__description"><?php echo $post->description; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="container_fluid">
                <div class="flex-center">
                    Объявлений пока нет. Извините за предоставленные не удобства.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>