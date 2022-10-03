<?php /* Template Name: Stores */ ?>

<?php
get_header();
?>

<div class="stores-page">
    <div class="stores-page-container">

<?php
wp_reset_postdata();
$args = array(  
    'post_type' => 'store',
    'post_status' => 'publish',
);
$loop = new WP_Query($args);
    while ( $loop->have_posts() ) : $loop->the_post();
    
    get_template_part('template_parts/stores');
   
    endwhile;
?>
    </div>
</div>






<?php
get_footer();