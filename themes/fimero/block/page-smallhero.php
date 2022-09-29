<?php /* Template Name: Smallhero */ ?>

<?php get_header(); ?>

<div>
    <h2><?= get_field('page_title') ?></h2>

    <div>
        <p><?= get_field('page_text'); ?></p>
    </div>

    <?= the_content(); ?>

</div>

<?php get_footer(); ?>