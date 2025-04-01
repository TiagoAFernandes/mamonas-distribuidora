<?php

require_once("functions/custom-registers.php");

add_action('wp_head', 'myplugin_ajaxurl');

add_action('after_setup_theme', 'theme_setup');

function theme_setup()
{
    add_action('init', 'add_support_to_pages');
}

function add_support_to_pages()
{
    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'excerpt');
}

function myplugin_ajaxurl()
{

    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
// Enabling featured images on posts
add_theme_support('post-thumbnails');


//Pagination for category.php
function wpse_modify_category_query($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_category()) {
            $query->set('posts_per_page', 9);
        }
    }
}
add_action('pre_get_posts', 'wpse_modify_category_query');
