<?php
// Carrega helpers globais
require_once get_template_directory() . '/inc/helpers.php';

// Carrega todas as configs
require_once get_template_directory() . '/inc/setup.php';

// CPTs
require get_template_directory() . '/inc/cpt-projetos.php';
require get_template_directory() . '/inc/cpt-artes.php';

// Metaboxes
require get_template_directory() . '/inc/metaboxes/metaboxes-projetos.php';
require get_template_directory() . '/inc/metaboxes/metaboxes-artes.php';

// Carrega todos os metaboxes da pasta inc/metaboxes
foreach ( glob( get_template_directory() . '/inc/metaboxes/*.php' ) as $file ) {
    require_once $file;
}

// Carregar scripts e estilos
require_once get_template_directory() . '/inc/enqueue.php';

// Formulário
require_once get_template_directory() . '/inc/forms.php';