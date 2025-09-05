<?php
/**
 * Configurações Globais do Tema
 * Options Page para Header, Footer e configurações gerais
 */

// Só executa se CMB2 existir
if (class_exists('CMB2')) {

    // Registrar a página de opções
    add_action('cmb2_admin_init', 'ids_register_theme_options_metabox');
    function ids_register_theme_options_metabox() {

        /**
         * Página principal de configurações
         */
        $cmb_options = new_cmb2_box([
            'id'           => 'ids_theme_options',
            'title'        => 'Configurações do Tema IDS',
            'object_types' => ['options-page'],
            'option_key'   => 'ids_theme_options',
            'menu_title'   => 'Config. Tema',
            'parent_slug'  => 'themes.php', // Vai aparecer em Aparência
        ]);

        /**
         * SEÇÃO: LOGO
         */
        $cmb_options->add_field([
            'name' => 'Logo e Identidade',
            'desc' => 'Configure o logo do site',
            'type' => 'title',
            'id'   => 'logo_title'
        ]);

        $cmb_options->add_field([
            'name'    => 'Logo do Site',
            'desc'    => 'Logo principal (recomendado: SVG ou PNG 200x50px)',
            'id'      => 'site_logo',
            'type'    => 'file',
            'options' => [
                'url' => false,
            ],
            'text' => [
                'add_upload_file_text' => 'Adicionar Logo'
            ],
            'query_args' => [
                'type' => [
                    'image/svg+xml',
                    'image/png',
                    'image/jpeg'
                ]
            ],
            'preview_size' => 'medium',
        ]);

        /**
         * SEÇÃO: REDES SOCIAIS
         */
        $cmb_options->add_field([
            'name' => 'Redes Sociais',
            'desc' => 'Links para suas redes sociais',
            'type' => 'title',
            'id'   => 'social_title'
        ]);

        $cmb_options->add_field([
            'name' => 'LinkedIn',
            'desc' => 'URL completa do LinkedIn',
            'id'   => 'social_linkedin',
            'type' => 'text_url',
        ]);

        $cmb_options->add_field([
            'name' => 'Behance',
            'desc' => 'URL completa do Behance',
            'id'   => 'social_behance',
            'type' => 'text_url',
        ]);

        $cmb_options->add_field([
            'name' => 'GitHub',
            'desc' => 'URL completa do GitHub',
            'id'   => 'social_github',
            'type' => 'text_url',
        ]);

        /**
         * SEÇÃO: HEADER
         */
        $cmb_options->add_field([
            'name' => 'Configurações do Header',
            'desc' => 'Personalize o cabeçalho',
            'type' => 'title',
            'id'   => 'header_title'
        ]);

        $cmb_options->add_field([
            'name' => 'Exibir Redes Sociais no Header',
            'desc' => 'Mostrar ícones das redes sociais no cabeçalho',
            'id'   => 'header_show_socials',
            'type' => 'checkbox',
        ]);

        /**
         * SEÇÃO: ANALYTICS
         */
        $cmb_options->add_field([
            'name' => 'Google Analytics',
            'desc' => 'Configurações de tracking',
            'type' => 'title',
            'id'   => 'analytics_title'
        ]);

        $cmb_options->add_field([
            'name' => 'Google Analytics ID',
            'desc' => 'ID do Google Analytics (ex: G-XXXXXXXXXX)',
            'id'   => 'google_analytics',
            'type' => 'text',
        ]);
    }
}

/**
 * Função helper para buscar opções do tema
 * SEMPRE verifica se existe antes de usar
 */
function ids_get_option($key, $default = false) {
    if (!function_exists('get_option')) {
        return $default;
    }
    
    $options = get_option('ids_theme_options', []);

    if (!is_array($options)) {
        return $default;
    }

    return array_key_exists($key, $options) ? $options[$key] : $default;
}

/**
 * Função helper para redes sociais
 */
function ids_get_social_links() {
    $networks = ['linkedin', 'behance', 'github'];
    $links = [];
    
    foreach ($networks as $network) {
        $url = ids_get_option("social_{$network}");
        if (!empty($url)) {
            $links[$network] = $url;
        }
    }
    
    return $links;
}

// Log para debug
if (function_exists('error_log')) {
    error_log('options-page.php carregado - ids_get_option definida');
}