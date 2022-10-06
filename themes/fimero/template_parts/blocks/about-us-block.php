<div class="">
    <?php $image = get_field('about_us_image'); ?>

    <div class="about-us-box">

        <h1 class="about-us-title"><?= get_field('about_us_title'); ?></h1>


        <?php
        if ($image) {
            echo wp_get_attachment_image($image['id'], 'medium');
        }

        ?>
        <div class="about-us-position">
            <p class="about-us-p"><?= get_field('about_us_text_1'); ?></p>
            <p class="about-us-p"><?= get_field('about_us_text_2'); ?></p>
            <p class="about-us-p"><?= get_field('about_us_text_3'); ?></p>

        </div>

    </div>


</div>