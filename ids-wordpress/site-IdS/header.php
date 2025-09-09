<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light">
    <meta name="theme-color" content="#F3F3F5">
    <title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
    
    <!-- SEO -->
    <meta name="description" content="<?php the_field('description_seo') ?: bloginfo('description'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo wp_get_document_title(); ?>" />
    <meta property="og:description" content="<?php the_field('description_seo') ?: bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og_image.png" />

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1MDJ0EDVV9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-1MDJ0EDVV9');
    </script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <?php 
    // Configurações dinâmicas do header
    $header_style   = ids_get_header_config('header_style', 'glassmorphism');
    $header_position= ids_get_header_config('header_position', 'fixed');
    $show_menu      = ids_get_header_config('header_show_menu', true);
    $show_socials   = ids_should_show_header_socials();
    ?>
    
    <header class="nav-home nav-<?php echo $header_style; ?> nav-<?php echo $header_position; ?>" role="banner">
        <div class="header-container">
            
            <!-- Logo Dinâmica -->
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="Voltar à página inicial">
                    <img src="<?php echo esc_url(ids_get_header_logo()); ?>" 
                        loading="lazy" alt="<?php echo esc_attr(ids_get_header_logo_alt()); ?>" 
                         width="auto" 
                         height="50">
                </a>
            </div>

            <?php if ($show_menu): ?>
                <button class="menu-toggle" aria-label="Abrir menu">
                    <span class="hamburger"></span>
                </button>

                <!-- Menu de Navegação -->
                <nav class="nav-menu" role="navigation" aria-label="Menu principal">
                    <?php if (has_nav_menu('menu-principal')): ?>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-principal',
                            'menu_class'     => 'main-navigation',
                            'container'      => false,
                        ));
                        ?>
                    <?php else: ?>
                        <?php 
                        $custom_menu = ids_get_header_custom_menu();
                        if (!empty($custom_menu)): ?>
                            <ul class="main-navigation custom-menu">
                                <?php foreach ($custom_menu as $item): ?>
                                    <?php if (!empty($item['titulo']) && !empty($item['url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($item['url']); ?>">
                                                <?php echo esc_html($item['titulo']); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>

            <!-- Redes Sociais Dinâmicas -->
            <?php if ($show_socials): ?>
                <div class="socials" role="complementary" aria-label="Redes sociais">
                    <?php 
                    $social_links = ids_get_header_socials();
                    foreach ($social_links as $network => $data): ?>
                        <a href="<?php echo esc_url($data['url']); ?>" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           aria-label="<?php echo esc_attr(ucfirst($network)); ?>">
                            <img loading="lazy" 
                                 src="<?php echo esc_url($data['icon']); ?>" 
                                 alt="<?php echo esc_attr(ucfirst($network)); ?>"
                                 width="24"
                                 height="24">
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <main id="main" class="site-main" role="main">
