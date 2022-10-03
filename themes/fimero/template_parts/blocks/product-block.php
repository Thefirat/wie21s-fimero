<div class="product-block-box">

    <?php $image = get_field('product_image'); ?>

    <div class="product-block">

        <?php
        if ($image) {
            echo wp_get_attachment_image($image['id'], 'medium');
        }

        ?>

        <div class="product-block-container">
            <small class="p-product-block"><?= get_field('product_text_1'); ?></small>
            <h1 class="h1-product-block"><?= get_field('product_text_2'); ?></h1>
            <h4 class="h4-product-block"><?= get_field('product_text_3'); ?></h4>
            <div class="p-block-product">
                <p><?= get_field('product_text_4'); ?></p>
                <p><?= get_field('product_text_5'); ?></p>
                <p><?= get_field('product_text_6'); ?></p>
            </div>

            <div class="link-btn-box">
                <?php $link = get_field('link');

                if ($link) : ?>
                    <div class="btn-product"><a class="link-button" href="<?php echo esc_url($link); ?>">LÄS MER</a></div>
                <?php endif; ?>
            </div>

        </div>

    </div>

</div>