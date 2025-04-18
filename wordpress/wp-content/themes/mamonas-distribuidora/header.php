<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right');
    bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <nav>
            <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'menu_class' => 'menu-principal'
            ]);
            ?>
        </nav>
    </header>