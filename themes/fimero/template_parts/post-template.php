<div>
    <div>
        <a href="http://localhost:8888/wp-grupp?p=<?= get_the_id(); ?>">

    </div>
    <div>
        <?= the_post_thumbnail('medium'); ?>

        <h3><?= the_title(); ?></h3>
        <b><?= the_date(); ?></b>
        <p><?= the_content(); ?></p>
    </div>

    </a>
</div>