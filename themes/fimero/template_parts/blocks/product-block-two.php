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
                    <p class="p-top"><?= get_field('product_text_1'); ?></p>
                    <h1 class="title-h1"></h1><?= get_field('product_text_2'); ?></h1>
                    <div class="prodcut-info-paddning">
                        <p class="p-text-block"><?= get_field('product_text_3'); ?></p>
                        <p class="p-text-block"><?= get_field('product_text_4'); ?></p>
                        <p class="p-text-block"><?= get_field('product_text_5'); ?></p>
                        <p class="p-text-block"><?= get_field('product_text_6'); ?></p>
                    </div>
                </div>

                <div class="link-btn-box">
                    <?php $link = get_field('link');

                    if ($link) : ?>
                        <div class="link-products">
                            <a class="link-btn" href="<?php echo esc_url($link); ?>">LÄS MER</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>

</div>