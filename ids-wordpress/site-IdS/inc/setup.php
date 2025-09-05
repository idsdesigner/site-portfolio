<?php
// Funções para limpar o <head>
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Habilitar funcionalidades do tema
function ids_theme_setup() {
    // Suporte a menus
    add_theme_support('menus');
    
    // Suporte a imagens destacadas
    add_theme_support('post-thumbnails');
    
    // Suporte ao título dinâmico
    add_theme_support('title-tag');
    
    // Registrar menus COM NOMES CORRETOS
    register_nav_menus(array(
        'menu-principal' => 'Menu Principal Header',
        'menu-footer'    => 'Menu Footer',
    ));
}
add_action('after_setup_theme', 'ids_theme_setup');

// DEBUG: Verificar se os menus foram registrados
function ids_debug_menus() {
    if (current_user_can('manage_options')) {
        $locations = get_theme_support('menus');
        $registered = get_registered_nav_menus();
        
        error_log('=== DEBUG MENUS ===');
        error_log('Theme support menus: ' . print_r($locations, true));
        error_log('Registered menus: ' . print_r($registered, true));
    }
}
add_action('wp_footer', 'ids_debug_menus');

function permitir_svg_uploads($mimes) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'permitir_svg_uploads');

// Preload de imagens críticas
function preload_critical_images() {
    if (is_front_page()) {
        $img1 = get_field('img_1_image');
        $img2 = get_field('img_2_image');
        
        if ($img1) {
            echo '<link rel="preload" as="image" href="' . esc_url($img1) . '">';
        }
        if ($img2) {
            echo '<link rel="preload" as="image" href="' . esc_url($img2) . '">';
        }
    }
}
add_action('wp_head', 'preload_critical_images');