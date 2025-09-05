<?php
// Carrega helpers globais
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/helpers-config.php';

// Carrega configurações básicas
require_once get_template_directory() . '/inc/setup.php';

// CPTs
require get_template_directory() . '/inc/cpt-projetos.php';
require get_template_directory() . '/inc/cpt-artes.php';

// Metaboxes apenas para páginas específicas
require get_template_directory() . '/inc/metaboxes/metaboxes-projetos.php';
require get_template_directory() . '/inc/metaboxes/metaboxes-artes.php';
require get_template_directory() . '/inc/metaboxes/metaboxes-page-home.php';
require get_template_directory() . '/inc/metaboxes/metaboxes-header-footer.php';

// Scripts e estilos
require_once get_template_directory() . '/inc/enqueue.php';

// Formulário
require_once get_template_directory() . '/inc/forms.php';

// REMOVER: options-page.php completamente
// Usar custom fields nas páginas específicas como faz na home