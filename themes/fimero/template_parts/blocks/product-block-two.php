<div class="products-block-box">
    <div>
        <?php $image = get_field('product_img'); ?>

        <div class="product-block-two">


            <?php
            if ($image) {
                echo wp_get_attachment_image($image['id'], 'medium');
            }

            ?>

            <div class="products-block-container">
                <div class="p-block-product">
                    <p><?= get_field('product_text_1'); ?></p>
                    <p><?= get_field('product_text_2'); ?></p>
                    <p><?= get_field('product_text_3'); ?></p>
                    <p><?= get_field('product_text_4'); ?></p>
                    <p><?= get_field('product_text_5'); ?></p>
                </div>

                <div class="link-btn-box">
                    <?php $link = get_field('link');

                    if ($link) : ?>
                        <div class="link-products">
                            <a class="link-button" href="<?php echo esc_url($link); ?>">LÄS MER</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>

</div>