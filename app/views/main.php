<?php $route = $_SERVER['REQUEST_URI']; ?>
<div class="container__fluid">
    <div class="category__container">
        <p class="title">Категории:</p>
        <ul class="category-list">
            <li class="category-list__item">
                <a href="/" class="link <?php if ($route === '/') echo 'active'; ?>">1. Все категории</a>
            </li>
            <?php if (!empty($categories) and count($categories)): ?>
                <?php foreach ($categories as $key => $category): ?>
                    <li class="category-list__item">
                        <a href="/categories/category<?php echo $category->id; ?>"
                           class="link
                                   <?php if ($route === '/categories/category' . $category->id) echo 'active'; ?>">
                            <?php echo strval($key + 2) . '. ' . $category->name; ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
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
                                    onclick="alert('<?php echo $post->user->phone; ?>')">
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