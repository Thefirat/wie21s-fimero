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

/** featured image */
add_theme_support('post-thumbnails');
/** featured image */

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
    echo '<div class="parent-book">';
    echo '<h1 class="books-info">';
    echo get_field('heading', $post_id);
    echo '</h1>';
    echo '<p class="books-conten">';
    echo get_field('text', $post_id);
    echo '</p>';
    echo '</div>';




    $terms = get_field('categories', $post_id);
    if ($terms) { ?>
        <div class="parent-term">
        <?php
        foreach ($terms as $term) {
            echo '<div class="term-name">';
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            echo "<img src='{$image}' alt='' width='260' height='365' />";
            echo '<h2 class="name-h">';
            echo esc_html($term->name);
            echo '</h2>';
            echo '<p>';
            echo esc_html($term->description);
            echo '</p>';


            echo '</div>';
        }
    }
        ?></div>
    <?php
}

/* Enskild Kategorisida End */
/* a new plus minus product*/
add_action('woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign');

function ts_quantity_plus_sign()
{
    echo '<button type="button" class="plus" >+</button>';
}

add_action('woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign');
function ts_quantity_minus_sign()
{
    echo '<button type="button" class="minus" >-</button>';
}

add_action('wp_footer', 'ts_quantity_plus_minus');

function ts_quantity_plus_minus()
{
    // To run this on the single product page
    if (!is_product()) return;
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {

                $('form.cart').on('click', 'button.plus, button.minus', function() {

                    // Get current quantity values
                    var qty = $(this).closest('form.cart').find('.qty');
                    var val = parseFloat(qty.val());
                    var max = parseFloat(qty.attr('max'));
                    var min = parseFloat(qty.attr('min'));
                    var step = parseFloat(qty.attr('step'));

                    // Change the value if plus or minus
                    if ($(this).is('.plus')) {
                        if (max && (max <= val)) {
                            qty.val(max);
                        } else {
                            qty.val(val + step);
                        }
                    } else {
                        if (min && (min >= val)) {
                            qty.val(min);
                        } else if (val > 1) {
                            qty.val(val - step);
                        }
                    }

                });

            });
        </script>
    <?php
}
/* End plus minus product*/

/* make 2 related product*/
function woo_related_products_limit()
{
    global $product;

    $args['posts_per_page'] = 2;
    return $args;
}
add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 2;

    return $args;
}
/* End 2 related product*/
add_action('woocommerce_after_shop_loop_item', 'woo_show_excerpt_shop_page', 5);
function woo_show_excerpt_shop_page()
{
    global $product;
    echo $product->post->post_excerpt;
}



// Remove the Product SKU from Product Single Page
add_filter('wc_product_sku_enabled', 'woocustomizer_remove_product_sku');

function woocustomizer_remove_product_sku($sku)
{

    if (!is_admin() && is_product()) {
        return false;
    }
    return $sku;
}

//end//


/* Custom Post Type Start */
// Register Custom Post Type
function custom_post_type()
{

    $labels = array(
        'name'                  => _x('Stores', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Store', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Stores', 'text_domain'),
        'name_admin_bar'        => __('Stores', 'text_domain'),
        'archives'              => __('Item Archives', 'text_domain'),
        'attributes'            => __('Item Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent Item:', 'text_domain'),
        'all_items'             => __('All Items', 'text_domain'),
        'add_new_item'          => __('Add New Item', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Item', 'text_domain'),
        'edit_item'             => __('Edit Item', 'text_domain'),
        'update_item'           => __('Update Item', 'text_domain'),
        'view_item'             => __('View Item', 'text_domain'),
        'view_items'            => __('View Items', 'text_domain'),
        'search_items'          => __('Search Item', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list'            => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Store', 'text_domain'),
        'description'           => __('Post Type Description', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'taxonomies'            => array('category', 'post_tag'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('Store', $args);
}
add_action('init', 'custom_post_type', 0);
/* Custom Post Type End */


/*remove Sale*/
add_filter('woocommerce_sale_flash', 'lw_hide_sale_flash');
function lw_hide_sale_flash()
{
    return false;
}
/*end sale remove*/

/* to put the price under description*/
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 9);
//add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 11 );
/* end to put the price under description*/

/* move category up*/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 1);
/*end move category up*/







                        /* Fri Frakt Start */

add_action('woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice');

function bbloomer_free_shipping_cart_notice()
{

    $min_amount = 1000; //change this to your free shipping threshold

    $current = WC()->cart->subtotal;

    if ($current < $min_amount) {
        $added_text = 'Get free shipping if you order ' . wc_price($min_amount - $current) . ' more!';
        $return_to = wc_get_page_permalink('shop');
        $notice = sprintf('<a href="%s" class="button wc-forward">%s</a> %s', esc_url($return_to), 'Continue Shopping', $added_text);
        wc_print_notice($notice, 'notice');
    }
}

                                /*Fri Frakt End */