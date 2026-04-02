<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/style.css'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class('page-container'); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header">
        <div class="container site-header-inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-brand">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
                <span class="site-brand-name"><?php bloginfo('name'); ?></span>
            </a>

            <nav class="site-navigation" aria-label="Navigation principale">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header',
                    'container'      => false,
                    'menu_class'     => 'site-nav',
                    'depth'          => 2
                ));
                ?>
            </nav>
        </div>
    </header>

    <main class="site-main">
