<?php
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menu('header', 'Menu Principal');
    register_nav_menu('footer', 'Menu Footer');
    add_theme_support('post-thumbnails');
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

add_filter('nav_menu_css_class', function ($classes){
    $classes[] = 'nav-item';
    return $classes;
});

add_filter('nav_menu_link_attributes', function ($atts, $item){
    $classes = ['nav-link'];

    if (
        in_array('current-menu-item', $item->classes, true) ||
        in_array('current_page_item', $item->classes, true) ||
        in_array('current-menu-ancestor', $item->classes, true)
    ) {
        $classes[] = 'active';
        $atts['aria-current'] = 'page';
    }

    $atts['class'] = implode(' ', $classes);
    return $atts;
}, 10, 2);

?>
