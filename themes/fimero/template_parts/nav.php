<header>

    <?php
    $site_title = get_bloginfo('name');
    $site_url = network_site_url('/')
    ?>
    <div>
        <?php wp_nav_menu(array('theme_location' => "my-custom-menu")); ?>
    </div>
    <div>
        <a href="<?php echo $site_url ?>" class="logo">
            <h3>
                <?php echo $site_title; ?>
            </h3>
        </a>


    </div>


    <?= get_search_form(); ?>

</header>