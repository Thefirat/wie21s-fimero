<?php
get_header();
?>

<?php
$page_for_posts = get_option('page_for_posts');
?>



<div class="posts">
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
  ?>
      <?= get_template_part('template_parts/post-template'); ?>
  <?php
    endwhile;
  endif;
  ?>
</div>

<?php
get_footer();
