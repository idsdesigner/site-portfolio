<?php
/**
 * Metaboxes para Header e Footer
 * Sistema completo de customização
 */

// ================================
// PÁGINA DE CONFIGURAÇÕES HEADER
// ================================
function ids_add_header_config_metaboxes() {
    $cmb = new_cmb2_box(array(
        'id'            => 'header_config_box',
        'title'         => 'Configurações do Header',
        'object_types'  => array('page'),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-header-config.php'),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    // === LOGO ===
    $cmb->add_field(array(
        'name' => '🎨 Logo e Identidade',
        'type' => 'title',
        'id'   => 'logo_section'
    ));

    $cmb->add_field(array(
        'name'    => 'Logo Principal',
        'desc'    => 'Logo do site (recomendado: SVG 200x50px)',
        'id'      => 'header_logo',
        'type'    => 'file',
        'options' => array('url' => false),
        'text'    => array('add_upload_file_text' => 'Adicionar Logo'),
        'query_args' => array(
            'type' => array('image/svg+xml', 'image/png', 'image/jpeg', 'image/svg')
        ),
        'preview_size' => 'medium',
    ));

    $cmb->add_field(array(
        'name' => 'Texto Alt da Logo',
        'desc' => 'Texto alternativo para acessibilidade',
        'id'   => 'header_logo_alt',
        'type' => 'text',
        'default' => get_bloginfo('name'),
    ));

    // === NAVEGAÇÃO ===
    $cmb->add_field(array(
        'name' => '🧭 Navegação',
        'type' => 'title',
        'id'   => 'nav_section'
    ));

    $cmb->add_field(array(
        'name' => 'Exibir Menu de Navegação',
        'desc' => 'Mostrar/ocultar menu principal',
        'id'   => 'header_show_menu',
        'type' => 'checkbox',
        'default' => true,
    ));

    // Menu customizado (alternativa ao menu nativo)
    $menu_group = $cmb->add_field(array(
        'id'          => 'header_custom_menu',
        'type'        => 'group',
        'description' => 'Menu customizado (se não usar o menu nativo do WordPress)',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => 'Item {#}',
            'add_button'    => 'Adicionar Item',
            'remove_button' => 'Remover Item',
            'sortable'      => true,
        ),
    ));

    $cmb->add_group_field($menu_group, array(
        'name' => 'Título do Link',
        'id'   => 'titulo',
        'type' => 'text',
    ));

    $cmb->add_group_field($menu_group, array(
        'name' => 'URL',
        'id'   => 'url',
        'type' => 'text_url',
    ));

    // === REDES SOCIAIS ===
    $cmb->add_field(array(
        'name' => '📱 Redes Sociais',
        'type' => 'title',
        'id'   => 'social_section'
    ));

    $cmb->add_field(array(
        'name' => 'Exibir Redes Sociais',
        'desc' => 'Mostrar ícones das redes sociais no header',
        'id'   => 'header_show_socials',
        'type' => 'checkbox',
        'default' => true,
    ));

    $socials = ['linkedin', 'behance', 'github', 'instagram', 'twitter', 'youtube'];
    foreach ($socials as $social) {
        $cmb->add_field(array(
            'name' => ucfirst($social) . ' - URL',
            'desc' => "URL completa do {$social}",
            'id'   => "header_social_{$social}",
            'type' => 'text_url',
        ));
        
        // NOVO: Campo para ícone
        $cmb->add_field(array(
            'name' => ucfirst($social) . ' - Ícone',
            'desc' => "Ícone SVG do {$social}",
            'id'   => "header_social_{$social}_icon",
            'type' => 'file',
            'options' => array(
                'url' => false, // Esconde URL, mostra apenas botão
            ),
            'text' => array(
                'add_upload_file_text' => 'Adicionar Ícone'
            ),
            'query_args' => array(
                'type' => array(
                    'image/svg+xml',
                ),
            ),
        ));
    }

    // === ESTILO ===
    $cmb->add_field(array(
        'name' => '🎨 Estilo do Header',
        'type' => 'title',
        'id'   => 'style_section'
    ));

    $cmb->add_field(array(
        'name'    => 'Estilo do Header',
        'id'      => 'header_style',
        'type'    => 'select',
        'options' => array(
            'glassmorphism' => 'Glassmorphism (Padrão)',
            'solid'         => 'Sólido',
            'transparent'   => 'Transparente',
        ),
        'default' => 'glassmorphism',
    ));

    $cmb->add_field(array(
        'name'    => 'Posição',
        'id'      => 'header_position',
        'type'    => 'select',
        'options' => array(
            'fixed'    => 'Fixo (Padrão)',
            'relative' => 'Relativo',
            'sticky'   => 'Sticky',
        ),
        'default' => 'fixed',
    ));
}
add_action('cmb2_admin_init', 'ids_add_header_config_metaboxes');

// ================================
// PÁGINA DE CONFIGURAÇÕES FOOTER
// ================================
function ids_add_footer_config_metaboxes() {
    $cmb = new_cmb2_box(array(
        'id'            => 'footer_config_box',
        'title'         => 'Configurações do Footer',
        'object_types'  => array('page'),
        'show_on'      => array('key' => 'page-template', 'value' => 'page-footer-config.php'),
        'context'       => 'normal',
        'priority'      => 'high',
    ));

    // === INFORMAÇÕES DE CONTATO ===
    $cmb->add_field(array(
        'name' => '📞 Contato',
        'type' => 'title',
        'id'   => 'contact_section'
    ));

    $cmb->add_field(array(
        'name'    => 'Logo do Footer',
        'desc'    => 'Logo para o rodapé (pode ser diferente do header)',
        'id'      => 'footer_logo',
        'type'    => 'file',
        'options' => array('url' => false),
        'preview_size' => 'medium',
    ));

    $cmb->add_field(array(
        'name' => 'E-mail',
        'id'   => 'footer_email',
        'type' => 'text_email',
        'default' => 'i.d.s.designgrafico@gmail.com',
    ));

    $cmb->add_field(array(
        'name' => 'Telefone/WhatsApp',
        'id'   => 'footer_phone',
        'type' => 'text',
        'default' => '+55 44 99847-6783',
    ));

    // === HABILIDADES ===
    $cmb->add_field(array(
        'name' => '💻 Habilidades',
        'type' => 'title',
        'id'   => 'skills_section'
    ));

    // Frontend
    $frontend_group = $cmb->add_field(array(
        'id'          => 'footer_frontend_skills',
        'type'        => 'group',
        'description' => 'Habilidades Frontend',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => 'Skill {#}',
            'add_button'    => 'Adicionar Skill',
            'remove_button' => 'Remover',
        ),
    ));

    $cmb->add_group_field($frontend_group, array(
        'name' => 'Tecnologia',
        'id'   => 'skill',
        'type' => 'text',
    ));

    // Ferramentas
    $tools_group = $cmb->add_field(array(
        'id'          => 'footer_tools',
        'type'        => 'group',
        'description' => 'Ferramentas',
        'repeatable'  => true,
        'options'     => array(
            'group_title'   => 'Ferramenta {#}',
            'add_button'    => 'Adicionar Ferramenta',
            'remove_button' => 'Remover',
        ),
    ));

    $cmb->add_group_field($tools_group, array(
        'name' => 'Ferramenta',
        'id'   => 'tool',
        'type' => 'text',
    ));

    // === NEWSLETTER ===
    $cmb->add_field(array(
        'name' => '📧 Newsletter',
        'type' => 'title',
        'id'   => 'newsletter_section'
    ));

    $cmb->add_field(array(
        'name' => 'Exibir Newsletter',
        'desc' => 'Mostrar seção de inscrição',
        'id'   => 'footer_show_newsletter',
        'type' => 'checkbox',
        'default' => true,
    ));

    $cmb->add_field(array(
        'name' => 'Título da Newsletter',
        'id'   => 'footer_newsletter_title',
        'type' => 'text',
        'default' => 'Subscribe',
    ));

    $cmb->add_field(array(
        'name' => 'Texto da Newsletter',
        'id'   => 'footer_newsletter_text',
        'type' => 'textarea',
        'default' => 'Receba atualizações sobre novos projetos, estudos de caso e reflexões sobre front-end e design.',
    ));

    // === COPYRIGHT ===
    $cmb->add_field(array(
        'name' => '©️ Copyright',
        'type' => 'title',
        'id'   => 'copyright_section'
    ));

    $cmb->add_field(array(
        'name' => 'Texto do Copyright',
        'id'   => 'footer_copyright',
        'type' => 'text',
        'default' => 'Todos os direitos reservados.',
    ));
}
add_action('cmb2_admin_init', 'ids_add_footer_config_metaboxes');