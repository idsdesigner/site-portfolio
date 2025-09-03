<?php
// Registro do Custom Post Type Projetos
function ids_register_cpt_projetos() {
    $labels = array(
        'name'               => 'Projetos',
        'singular_name'      => 'Projeto',
        'menu_name'          => 'Projetos',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Projeto',
        'edit_item'          => 'Editar Projeto',
        'new_item'           => 'Novo Projeto',
        'view_item'          => 'Ver Projeto',
        'all_items'          => 'Todos os Projetos',
        'search_items'       => 'Buscar Projetos',
        'not_found'          => 'Nenhum projeto encontrado',
        'not_found_in_trash' => 'Nenhum projeto encontrado na lixeira',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'rewrite'            => array('slug' => 'projetos'),
        'show_in_rest'       => true,
        'menu_position'      => 20,
    );
    
    register_post_type('projetos', $args);
}
add_action('init', 'ids_register_cpt_projetos');

// Função helper para buscar projetos
function ids_get_projetos($limit = -1, $orderby = 'date', $order = 'DESC') {
    $args = array(
        'post_type'      => 'projetos',
        'posts_per_page' => $limit,
        'orderby'        => $orderby,
        'order'          => $order
    );
    
    return new WP_Query($args);
}

// Função específica para projetos da home
function ids_get_projetos_home($limit = 3) {
    return ids_get_projetos($limit, 'date', 'DESC');
}
?>