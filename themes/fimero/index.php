<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
    get_template_part('entry');
  endwhile;
endif;
?>

werrwerew
<?php
get_footer();
