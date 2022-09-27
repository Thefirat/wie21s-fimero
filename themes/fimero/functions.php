<?php

function wpb_custom_new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
    register_nav_menu('my-footer-menu', __('My Footer Menu'));

}

add_action('init', 'wpb_custom_new_menu');



function add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'add_woocommerce_support');
