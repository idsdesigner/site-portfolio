<?php
/**
 * Helpers para Configurações do Header e Footer
 */

// ================================
// HELPERS PARA HEADER
// ================================

/**
 * Busca configurações do header
 */
function ids_get_header_config($key, $default = '') {
    static $header_page_id = null;
    
    if ($header_page_id === null) {
        $header_page_id = ids_get_config_page_id('page-header-config.php');
    }
    
    if (!$header_page_id) {
        return $default;
    }
    
    $value = get_post_meta($header_page_id, $key, true);
    return !empty($value) ? $value : $default;
}

/**
 * Busca configurações do footer
 */
function ids_get_footer_config($key, $default = '') {
    static $footer_page_id = null;
    
    if ($footer_page_id === null) {
        $footer_page_id = ids_get_config_page_id('page-footer-config.php');
    }
    
    if (!$footer_page_id) {
        return $default;
    }
    
    $value = get_post_meta($footer_page_id, $key, true);
    return !empty($value) ? $value : $default;
}

/**
 * Encontra o ID da página de configuração
 */
function ids_get_config_page_id($template) {
    static $cache = [];
    
    if (isset($cache[$template])) {
        return $cache[$template];
    }
    
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
        'number' => 1,
    ));
    
    $cache[$template] = !empty($pages) ? $pages[0]->ID : false;
    return $cache[$template];
}

// ================================
// HELPERS ESPECÍFICOS
// ================================

/**
 * Logo do header
 */
function ids_get_header_logo() {
    $logo = ids_get_header_config('header_logo');
    if (!empty($logo) && is_array($logo)) {
        return $logo['url'];
    }
    
    // Fallback para logo padrão
    return get_template_directory_uri() . '/assets/images/logo-oficial.svg';
}

/**
 * Alt text da logo
 */
function ids_get_header_logo_alt() {
    $alt = ids_get_header_config('header_logo_alt');
    return !empty($alt) ? $alt : get_bloginfo('name');
}

/**
 * Redes sociais do header
 */
function ids_get_header_socials() {
    $socials = ['linkedin', 'behance', 'github', 'instagram', 'twitter', 'youtube'];
    $links = [];
    
    foreach ($socials as $social) {
        $url = ids_get_header_config("header_social_{$social}");
        if (!empty($url)) {
            $links[$social] = $url;
        }
    }
    
    // Fallbacks se não houver configuração
    if (empty($links)) {
        $links = [
            'behance' => 'https://www.behance.net/ismaeldouglas',
            'linkedin' => 'https://www.linkedin.com/in/ismael-douglas-silva/',
            'github' => 'https://github.com/idsdesigner/',
        ];
    }
    
    return $links;
}

/**
 * Menu customizado do header
 */
function ids_get_header_custom_menu() {
    $menu = ids_get_header_config('header_custom_menu');
    
    if (empty($menu) || !is_array($menu)) {
        // Menu padrão fallback
        return [
            ['titulo' => 'Home', 'url' => home_url('/')],
            ['titulo' => 'Projetos', 'url' => home_url('/projetos')],
            ['titulo' => 'Sobre', 'url' => home_url('/sobre')],
            ['titulo' => 'Contato', 'url' => home_url('/contato')],
        ];
    }
    
    return $menu;
}

/**
 * Skills frontend do footer
 */
function ids_get_footer_frontend_skills() {
    $skills = ids_get_footer_config('footer_frontend_skills');
    
    if (empty($skills) || !is_array($skills)) {
        return ['HTML5', 'CSS3', 'JavaScript (ES6)', 'React.js', 'Next.js'];
    }
    
    return array_column($skills, 'skill');
}

/**
 * Ferramentas do footer
 */
function ids_get_footer_tools() {
    $tools = ids_get_footer_config('footer_tools');
    
    if (empty($tools) || !is_array($tools)) {
        return ['Figma', 'Pacote Adobe', 'Git', 'GitHub', 'VS Code', 'WordPress'];
    }
    
    return array_column($tools, 'tool');
}

/**
 * Logo do footer
 */
function ids_get_footer_logo() {
    $logo = ids_get_footer_config('footer_logo');
    if (!empty($logo) && is_array($logo)) {
        return $logo['url'];
    }
    
    // Fallback
    return get_stylesheet_directory_uri() . '/assets/images/logo-fundo-banco.svg';
}

/**
 * Verifica se deve exibir redes sociais no header
 */
function ids_should_show_header_socials() {
    return (bool) ids_get_header_config('header_show_socials', true);
}

/**
 * Verifica se deve exibir newsletter no footer
 */
function ids_should_show_footer_newsletter() {
    return (bool) ids_get_footer_config('footer_show_newsletter', true);
}