<?php get_header(); ?>
<div class="single-news-box">

    <?php
    // Start the loop.
    while (have_posts()) : the_post(); ?>
        <p class="p-style-news"><?= get_the_date('F j, Y'); ?></p>
        <h1 class="single-news-title"><?= the_title(); ?></h1>

        <?= the_post_thumbnail('thumbnail'); ?>

        <div class="single-post-content">
            <?= the_content(); ?>
        </div>




    <?php endwhile;
    ?>



</div>
<?php get_footer();
