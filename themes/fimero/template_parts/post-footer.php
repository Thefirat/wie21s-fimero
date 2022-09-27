<footer>

    <?php
    $site_title = get_bloginfo('name');
    $site_url = network_site_url('/')
    ?>

    <small class="footer-text-color">Information private policy term agreement afiliation<?= date("Y"); ?>. All rights reserved </small>
    <div>
        <div>
            <h3>NAVIGATE</h3>
            <?php wp_nav_menu(array('theme_location' => "my-footer-menu")); ?>
        </div>
        <div>
            <h4>INFORMATION</h4>
            <?php wp_nav_menu(array('theme_location' => "my-second-footer-menu")); ?>
        </div>


        <div>
            <a href="<?php echo $site_url ?>" class="logo">
                <h3 class="logo-h3">
                    <?php echo $site_title; ?>
                </h3>
            </a>
        </div>
    </div>
</footer>