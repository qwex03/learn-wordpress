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

add_action('init', function () {
    register_post_type('bien', [
        'label' => 'Bien',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-admin-home',
        'show_in_rest' => true,
    ]);

    register_post_meta('bien', 'prix', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ]);

    register_post_meta('bien', 'surface', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'string',
    ]);

    register_post_meta('bien', 'nombre_pieces', [
        'show_in_rest' => true,
        'single' => true,
        'type' => 'integer',
    ]);
});

function montheme_add_bien_meta_box() {
    add_meta_box(
        'montheme_bien_details',
        'Informations du bien',
        'montheme_render_bien_meta_box',
        'bien',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'montheme_add_bien_meta_box');

function montheme_render_bien_meta_box($post) {
    $prix = get_post_meta($post->ID, 'prix', true);
    $surface = get_post_meta($post->ID, 'surface', true);
    $nombre_pieces = get_post_meta($post->ID, 'nombre_pieces', true);

    ?>
    <p>
        <label for="montheme_prix">Prix :</label>
        <input type="text" id="montheme_prix" name="montheme_prix" value="<?php echo esc_attr($prix); ?>" />
    </p>
    <p>
        <label for="montheme_surface">Surface (m²) :</label>
        <input type="text" id="montheme_surface" name="montheme_surface" value="<?php echo esc_attr($surface); ?>" />
    </p>
    <p>
        <label for="montheme_nombre_pieces">Nombre de pièces :</label>
        <input type="number" id="montheme_nombre_pieces" name="montheme_nombre_pieces" value="<?php echo esc_attr($nombre_pieces); ?>" />
    </p>
    <?php
}

function montheme_save_bien_meta_box($post_id) {
    if (array_key_exists('montheme_prix', $_POST)) {
        update_post_meta(
            $post_id,
            'prix',
            sanitize_text_field($_POST['montheme_prix'])
        );
    }
    if (array_key_exists('montheme_surface', $_POST)) {
        update_post_meta(
            $post_id,
            'surface',
            sanitize_text_field($_POST['montheme_surface'])
        );
    }
    if (array_key_exists('montheme_nombre_pieces', $_POST)) {
        update_post_meta(
            $post_id,
            'nombre_pieces',
            intval($_POST['montheme_nombre_pieces'])
        );
    }
}

add_action('save_post', 'montheme_save_bien_meta_box');


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
