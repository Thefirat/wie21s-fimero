<?php
get_header();
?>

<?php if (have_posts()) : ?>

<?php woocommerce_content(); ?>

<?php endif; ?>

<?php

get_footer();
