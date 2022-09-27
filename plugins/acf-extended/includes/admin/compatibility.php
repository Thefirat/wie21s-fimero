<?php

if(!defined('ABSPATH')){
    exit;
}

// check version
if(!acfe_is_acf_6()){
    return;
}

if(!class_exists('acfe_admin_compatibility')):

class acfe_admin_compatibility{
    
    /**
     * construct
     */
    function __construct(){
    
        add_action('admin_menu',                                array($this, 'admin_menu'));
        
        // hooks
        add_action('acfe/load_posts/post_type=acf-field-group', array($this, 'load_posts'));
        add_action('acfe/load_post/post_type=acf-field-group',  array($this, 'load_post'));
        
        // acf load post
        add_action('load-post.php',                             array($this, 'acf_load_post'), 9);
        add_action('load-post-new.php',                         array($this, 'acf_load_post'), 9);
        
        // current screen
        add_action('current_screen',                            array($this, 'current_screen'));
        
    }
    
    
    /**
     * admin_menu
     */
    function admin_menu(){
        
        // get pages
        $updates = get_plugin_page_hookname('acf-settings-updates', 'edit.php?post_type=acf-field-group');
        $tools = get_plugin_page_hookname('acf-tools', 'edit.php?post_type=acf-field-group');
        
        // actions
        add_action("load-{$updates}", array($this, 'load_acf_page'));
        add_action("load-{$tools}", array($this, 'load_acf_page'));
        
    }
    
    
    /**
     * load_acf_page
     */
    function load_acf_page(){
        add_filter('admin_body_class', array($this, 'admin_body_class'));
    }
    
    
    /**
     * load_posts
     */
    function load_posts(){
        add_filter('admin_body_class', array($this, 'admin_body_class'));
    }
    
    
    /**
     * load_post
     */
    function load_post(){
        add_filter('admin_body_class',     array($this, 'admin_body_class'));
        add_action('acf/input/admin_head', array($this, 'admin_head'), 20);
    }
    
    
    /**
     * acf_load_post
     *
     * Rewrite the ACF_Form_Post initialize which remove the submitdiv metabox
     */
    function acf_load_post(){
        
        // remove class action
        acfe_remove_class_action('ACF_Form_Post', 'load-post.php', 'initialize');
        acfe_remove_class_action('ACF_Form_Post', 'load-post-new.php', 'initialize');
        
        // rewrite load post
        // /advanced-custom-fields-pro/includes/forms/form-post.php:48
        
        // globals
        global $typenow;
    
        // restrict specific post types
        $restricted = array('acf-field-group', 'attachment');
        if(in_array($typenow, $restricted)){
            return;
        }
    
        // enqueue scripts
        acf_enqueue_scripts(array(
            'uploader' => true,
        ));
    
        // actions
        add_action('add_meta_boxes', array(acf_get_instance('ACF_Form_Post'), 'add_meta_boxes'), 10, 2);
        
    }
    
    
    /**
     * admin_body_class
     *
     * Adds acf-admin-6 class to body
     */
    function admin_body_class($classes){
        $classes .= ' acf-admin-6';
        return $classes;
    }
    
    
    /**
     * admin_head
     *
     */
    function admin_head(){
        
        // remove forced 1 column on screen_layout options
        acfe_remove_class_action('acf_admin_field_group', 'get_user_option_screen_layout_acf-field-group', 'screen_layout');
    
        // base url
        $default_icon = acf_get_url('assets/images/icons/icon-fields.svg');
    
        // generate default field type missing icon
        ?>
        <style>
            .field-type-icon:before{
                -webkit-mask-image: url(<?php echo $default_icon; ?>);
                mask-image: url(<?php echo $default_icon; ?>);
            }
        </style>
        <?php
        
    }
    
    
    /**
     * current_screen
     *
     * @param $screen
     */
    function current_screen($screen){
        
        // allowed screens
        $allowed = array(
            'edit-acf-field-group-category',
            'edit-acf-field-group',
            'acf-field-group',
            'edit-acfe-dbt',
            'acfe-dbt',
            'edit-acfe-dop',
            'acfe-dop',
            'edit-acfe-template',
            'acfe-template',
            'edit-acfe-form',
            'acfe-form'
        );
        
        // check screen
        if(acfe_maybe_get($screen, 'post_type') === 'acf-field-group' || acf_is_screen($allowed)){
            add_action('admin_head', array($this, 'admin_head_navigation'));
        }
        
    }
    
    
    /**
     * admin_head_navigation
     */
    function admin_head_navigation(){
        
        // base url
        $base_url = acf_get_url('assets/images/');
        
        // pages rules
        $pages = array(
            'categories'    => 'field-type-icons/icon-field-taxonomy.svg',
            'block-types'   => 'icons/icon-fields.svg',
            'forms'         => 'field-type-icons/icon-field-post-object.svg',
            'options-pages' => 'field-type-icons/icon-field-group.svg',
            'settings'      => 'icons/icon-settings.svg',
            'templates'     => 'field-type-icons/icon-field-wysiwyg.svg',
        );
        
        // generate css
        ?>
        <style>
            <?php foreach($pages as $page => $icon): ?>
            .acf-admin-toolbar .acf-header-tab-<?php echo $page; ?> i.acf-icon{
                display: inline-flex;
                -webkit-mask-image: url(<?php echo $base_url . $icon; ?>);
                mask-image: url(<?php echo $base_url . $icon; ?>);
            }
            <?php endforeach; ?>
        </style>
        <?php
        
    }
    
}

new acfe_admin_compatibility();

endif;