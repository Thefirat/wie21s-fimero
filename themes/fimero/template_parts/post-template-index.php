<div>

    <div class="post-card">
        <?= the_post_thumbnail('medium'); ?>
        <div class="container">
            <h3 class="h3-posts"><b><?= the_title(); ?></b></h3>
            <p class="p-posts"><?= the_content(); ?></p>
            <a class="a-posts" href="http://localhost:8888/wp-grupp/wordpress?p=<?= get_the_id(); ?>">LÄS MER</a>
        </div>
    </div>

</div>