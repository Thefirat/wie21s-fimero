<?php

get_header();
?>

<div class="about-us-box">

   <?= the_title(); ?>

   <?= the_post_thumbnail('large'); ?>

   <?= the_content(); ?>

</div>
<div class="category-position">




   <?php $cat_ids = get_field('selected_categories');
   if (is_array($cat_ids)) {
      foreach ($cat_ids as $cat_id) {

         $cat = get_term_by('id', $cat_id, 'product_cat');
         $catlink = get_term_link($cat_id, 'product_cat');


         // get the thumbnail id using the queried category term_id
         $thumbnail_id = get_term_meta($cat_id, 'thumbnail_id', true);

         // get the image URL
         $image = wp_get_attachment_url($thumbnail_id);

         // print the IMG HTML
         echo '<div class="cat_info_pos">';
         echo "<img src='{$image}' alt='' width='762' height='365' />";
         echo '<br>';
         echo '<div class="cat_name">';
         echo $cat->name;
         echo '</div>';
         echo '<div class="cat_desc">';
         echo $cat->description;
         echo $cat->price;
         echo '</div>';
         echo '<div class="cat_a">';
         echo '<a class="cat-a" href="' . $catlink . '">VISA KOLLEKTION</a>';
         echo '</div>';
         echo '</div>';
      }
   } ?>

   <?php
   get_footer();
   ?>