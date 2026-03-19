<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('menus');
    register_nav_menu('header', 'Menu Principal');
});

function montheme_init() {
    register_post_type('bien', [
        'label' => 'Bien',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-admin-home',
        'show_in_rest' => true,
    ]);
}





add_action('init', 'montheme_init');
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        [],
        '5.3.2'
    );

    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.2',
        true
    );
});

add_filter('nav_menu_css_class', function ($classes){
    $classes[] = 'nav-item';
    return $classes;
});

add_filter('nav_menu_link_attributes', function ($atts){
    $atts['class'] = 'nav-link';
    return $atts;
});

?>
