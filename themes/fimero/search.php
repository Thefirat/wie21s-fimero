<?php
get_header();
?>



Här visas sök resultaten
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <?php get_template_part('template_parts/post-block'); ?>
<?php
    endwhile;
endif;
?>
</div>

<?php
get_footer();
