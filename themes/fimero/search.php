<?php
get_header();
?>

<?= get_search_form(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <?php the_title(); ?>
        <?php the_permalink(); ?>
<?php
    endwhile;
endif;
?>
</div>

<?php
get_footer();
