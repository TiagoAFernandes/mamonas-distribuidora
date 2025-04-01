<?php

require_once("functions/custom-registers.php");

function meu_tema_recursos()
{
    add_theme_support('title-tag'); // Suporte para título dinâmico
    register_nav_menus([
        'main-menu' => __('Menu Principal', 'meu-tema')
    ]);
}
add_action('after_setup_theme', 'meu_tema_recursos');

function meu_tema_scripts()
{
    // CSS Local
    // wp_enqueue_style('theme-fonts', get_template_directory_uri() . '/src/fonts/stylesheet.css', [], null);
    wp_enqueue_style('theme-reset', get_template_directory_uri() . '/src/css/reset.css', [], null);
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/src/css/style.css', [], null);

    // Bibliotecas Externas
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', [], '6.1.1');
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', [], '1.8.1');
    wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', [], '1.8.1');

    // JS Externo
    wp_enqueue_script('jquery');
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['jquery'], '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'meu_tema_scripts');


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
