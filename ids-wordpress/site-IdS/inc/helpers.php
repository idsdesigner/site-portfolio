<?php
// Helpers globais para facilitar uso de meta fields

function get_field($key, $page_id = 0) {
    $id = $page_id !== 0 ? $page_id : get_the_ID();
    return get_post_meta($id, $key, true);
}

function the_field($key, $page_id = 0) {
    echo get_field($key, $page_id);
}

// ✅ Query otimizada com cache
function ids_get_projetos_optimized($limit = -1, $orderby = 'date', $order = 'DESC') {
    $cache_key = 'ids_projetos_' . md5($limit . $orderby . $order);
    $projetos = wp_cache_get($cache_key, 'ids_projetos');
    
    if (false === $projetos) {
        $args = [
            'post_type'      => 'projetos',
            'posts_per_page' => $limit,
            'orderby'        => $orderby,
            'order'          => $order,
            'post_status'    => 'publish',
            'meta_query'     => [
                'key'     => 'projeto_image_capa',
                'compare' => 'EXISTS'
            ]
        ];
        
        $projetos = new WP_Query($args);
        wp_cache_set($cache_key, $projetos, 'ids_projetos', HOUR_IN_SECONDS);
    }
    
    return $projetos;
}