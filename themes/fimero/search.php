<?php
get_header();
?>
<div class="search-page-box">
    <div class="search-form">
        <?= get_search_form(); ?>
    </div>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <div class="search-resultat-info">
                <?php the_title(); ?>
                <?php the_permalink(); ?>
                <br>
                <br>
                <a class="see-result-btn" href="http://localhost:8888/wp-grupp?p=<?= get_the_id(); ?>">
                    TITTA PÅ KOLLEKTIONEN
                </a>

            </div>

            <hr class="hr-with">


    <?php
        endwhile;
    endif;
    ?>
</div>
</div>
<?php
get_footer();
