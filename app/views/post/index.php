<div class="workspace__container">
    <?php use Models\Post;
    if (!empty($posts) and count($posts) !== 0): ?>
        <?php $p = new Post();
        foreach ($posts as $post): ?>
            <div class="container post__wrapper">
                <div class="post-logo">
                    <a href="/post<?php echo $post->id; ?>">
                        <img src="<?php echo $post->image; ?>"
                             alt="<?php echo $post->title; ?>"
                             class="post-logo__image">
                    </a>
                    <div class="post-user">
                        <p>
                            <?php echo $post->user->last_name . ' ' . $post->user->first_name; ?>
                        </p>
                        <p>
                            <?php echo "Просмотрено ".$post->views ." раз"; ?>
                        </p>
                        <p>
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
                        <p class="title"><?php echo $p->getStatus($post->status); ?></p>
                    </div>
                    <p class="post-info__description"><?php echo $post->description; ?></p>
                </div>
            </div>
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
