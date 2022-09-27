<?php $the_query = new WP_Query(array(
    'posts_per_page' => 4,
));
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <a href="http://localhost:8888/wp-grupp?p=<?= get_the_id(); ?>">

            <?= the_title(); ?>
            <?= the_date(); ?>
            <?= the_excerpt(); ?>

        </a>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
<?php endif; ?>