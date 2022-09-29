<?php $the_query = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => 1,
));
?>



<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


        <?php
        global $post;
        $product = new WC_Product($post->ID); ?>
        <div>
            <?= the_post_thumbnail('medium'); ?>
        </div>
        <div>

            <?= $product->name ?>
            <br>
            <?= $product->price ?>
            <?= $product->description ?>
        </div>


    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php __('No News'); ?> </p>
<?php endif; ?>