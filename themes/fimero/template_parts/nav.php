<header>

    <?php
    $site_title = get_bloginfo('name');
    $site_url = network_site_url('/');
    $search =  network_site_url('/?s');
    $cart =  network_site_url('/cart');
    $login = network_site_url('/my-account');



    ?>
    <div class="header-box">
        <div>
            <?php wp_nav_menu(array('theme_location' => "my-custom-menu")); ?>

        </div>
        <div>
            <a href="<?php echo $site_url ?>" class="logo">
                <h3 class="h3-nav">
                    <?php echo $site_title; ?>
                </h3>
            </a>
        </div>

        <div class="login-pos">
            <a href="<?php echo $login ?>" class="admin">
                Logga in
            </a>
        </div>

        <div>
            <a href="<?php echo $search ?>" class="logo">
                <img src="<?php echo get_template_directory_uri() . '/uploads/Search.png'; ?>" />
            </a>
            <a href="<?php echo $cart ?>" class="logo">
                <img src="<?php echo get_template_directory_uri() . '/uploads/Cart.png'; ?>" />
            </a>
        </div>

    </div>


</header>