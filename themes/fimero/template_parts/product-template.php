<?php /* Template Name: Product */ ?>

<div class="product-template-box">

    <?php
    $image = get_field('product_image');

    ?>
    <div class="product-template">

        <?php
        if ($image) {
            echo wp_get_attachment_image($image['id'], 'medium');
        }

        ?>

        <div class="product-template-container">
            <small><?= get_field('product_text_1'); ?></small>
            <h1><?= get_field('product_text_2'); ?></h1>
            <h4><?= get_field('product_text_3'); ?></h4>
            <p><?= get_field('product_text_4'); ?></p>
            <p><?= get_field('product_text_5'); ?></p>
            <p><?= get_field('product_text_6'); ?></p>
        </div>
    </div>

</div>