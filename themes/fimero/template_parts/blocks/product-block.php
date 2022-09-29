<div>

    <?php
    $image = get_field('product_image');

    ?>
    <div>

        <?php
        if ($image) {
            echo wp_get_attachment_image($image['id'], 'medium');
        }

        ?>
    </div>
    <div>

        <p><?= get_field('product_text_1'); ?></p>
        <h1><?= get_field('product_text_2'); ?></h1>
        <h3><?= get_field('product_text_3'); ?></h3>
        <p><?= get_field('product_text_4'); ?></p>
        <p><?= get_field('product_text_5'); ?></p>
        <p><?= get_field('product_text_6'); ?></p>
    </div>

</div>