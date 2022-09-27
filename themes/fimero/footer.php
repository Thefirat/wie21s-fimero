<?php wp_footer(); ?>

<?php wp_nav_menu(array('theme_location' => "my-footer-menu")); ?>

<div class="wrapper">

    <?= get_template_part('template_parts/post-footer'); ?>

</div>



</body>



</html>