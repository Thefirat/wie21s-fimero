<?php

/** css */
function custom_styles()
{
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'custom_styles');
/** css */

/** google fonts */
function add_google_fonts()
{
    wp_enqueue_style(' add_google_fonts ', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat:wght@100;400&display=swap', false);
}
add_action('wp_enqueue_scripts', 'add_google_fonts');
/** google fonts */

/** function för att skapa meny */
function wpb_custom_new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
    register_nav_menu('my-footer-menu', __('My Footer Menu'));
    register_nav_menu('my-second-footer-menu', __('My Second Footer Menu'));
}

add_action('init', 'wpb_custom_new_menu');
/** Lägger till single product woocommerce */


/** Lägger till single product woocommerce */
function add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'add_woocommerce_support');
/** Lägger till single product woocommerce */



//** abc funktion för att visa alla blocks */
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

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'categoryblock',
            'title'             => __('categoryblock'),
            'description'       => __('A custom category block.'),
            'render_template'   => 'template_parts/blocks/category-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-tools',
            'keywords'          => array('categoryblock'),
        ));

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'product-block-one',
            'title'             => __('product-block-one'),
            'description'       => __('A custom products block.'),
            'render_template'   => 'template_parts/blocks/product-block-one.php',
            'category'          => 'formatting',
            'icon'              => 'admin-tools',
            'keywords'          => array('product-block-one'),
        ));

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'product-block-two',
            'title'             => __('product-block-two'),
            'description'       => __('A custom products block.'),
            'render_template'   => 'template_parts/blocks/product-block-two.php',
            'category'          => 'formatting',
            'icon'              => 'admin-tools',
            'keywords'          => array('product-block-two'),
        ));
    }
}

//** abc funktion för att visa alla blocks */



//** tar bort showing result of products */
add_action('after_setup_theme', 'my_remove_product_result_count', 99);
function my_remove_product_result_count()
{
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}
//** tar bort showing result of products */




/* Enskild Kategorisida Start */
add_action('woocommerce_after_shop_loop', 'your_function_name');

function your_function_name()
{

    $queried_object = get_queried_object();
    $post_id = $queried_object->taxonomy . '_' . $queried_object->term_id;

    echo '<h1 class="books-info">';
    echo get_field('heading', $post_id);
    echo '</h1>';
    echo '<p>';
    echo get_field('text', $post_id);
    echo '</p>';

    $terms = get_field('categories', $post_id);
    if ($terms) {
        foreach ($terms as $term) {
            echo '<h2>';
            echo esc_html($term->name);
            echo '</h2>';
            echo '<p>';
            echo esc_html($term->description);
            echo '</p>';
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            echo "<img src='{$image}' alt='' width='260' height='365' />";
        }
    }
}
                  
/* Enskild Kategorisida End */