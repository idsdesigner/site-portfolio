<?php
// Registro do Custom Post Type Artes
function ids_register_cpt_artes() {
    $labels = array(
        'name'               => 'Artes',
        'singular_name'      => 'Artes',
        'menu_name'          => 'Artes',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Nova artes',
        'edit_item'          => 'Editar Artes',
        'new_item'           => 'Nova Artes',
        'view_item'          => 'Ver Artes',
        'all_items'          => 'Todas as artes',
        'search_items'       => 'Buscar Artes',
        'not_found'          => 'Nenhuma arte encontrada',
        'not_found_in_trash' => 'Nenhuma arte encontrada na lixeira',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'rewrite'            => array('slug' => 'artes'),
        'show_in_rest'       => true,
        'menu_position'      => 20,
    );
    
    register_post_type('artes', $args);
}
add_action('init', 'ids_register_cpt_artes');

// Função helper para buscar arte
function ids_get_arte($limit = -1, $orderby = 'date', $order = 'DESC') {
    $args = array(
        'post_type'      => 'artes',
        'posts_per_page' => $limit,
        'orderby'        => $orderby,
        'order'          => $order
    );
    
    return new WP_Query($args);
}