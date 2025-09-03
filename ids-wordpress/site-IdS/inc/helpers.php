<?php
// Helpers globais para facilitar uso de meta fields

function get_field($key, $page_id = 0) {
    $id = $page_id !== 0 ? $page_id : get_the_ID();
    return get_post_meta($id, $key, true);
}

function the_field($key, $page_id = 0) {
    echo get_field($key, $page_id);
}
