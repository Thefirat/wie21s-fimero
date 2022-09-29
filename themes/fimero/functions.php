<?php

function wpb_custom_new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
    register_nav_menu('my-footer-menu', __('My Footer Menu'));
    register_nav_menu('my-second-footer-menu', __('My Second Footer Menu'));
}

add_action('init', 'wpb_custom_new_menu');



function add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'add_woocommerce_support');



//** abc funktion för att visa single product i startsidan */
add_action('acf/init', 'single_product_function');
function single_product_function()
{

    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'productblock',
            'title'             => __('productblock'),
            'description'       => __('A custom product block.'),
            'render_template'   => 'template_parts/blocks/product-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-tools',
            'keywords'          => array('productblock'),
        ));

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'headingblock',
            'title'             => __('headingblock'),
            'description'       => __('A custom heading block.'),
            'render_template'   => 'template_parts/blocks/heading-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-tools',
            'keywords'          => array('headingblock'),
        ));
    }
}






//** tar bort showing result of products */
add_action('after_setup_theme', 'my_remove_product_result_count', 99);
function my_remove_product_result_count()
{
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}
//** tar bort showing result of products */