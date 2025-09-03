<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?php wp_title('-'); ?></title>
    <!-- SEO -->
    <meta name="description" content="<?php the_field('description_seo') ?: bloginfo('description'); ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo wp_get_document_title(); ?>" />
    <meta property="og:description" content="<?php the_field('description_seo') ?: bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og_image.png" />

    
    <!-- WordPress Head -->
    <?php wp_head(); ?>
    <!-- Fecha WordPress Head -->
</head>
<body>
    <!-- Header site -->
    <header class="nav-home">
            <div class="logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/logo-oficial.svg" alt="IDS.DESIGN" height="32" />
            </div>

            <button class="menu-toggle" aria-label="Abrir menu">
                <span class="hamburger"></span>
            </button>

            <nav class="nav-menu">
                <?php
                    $args = array(
                        'menu' => 'principal',
                        'container' => false
                    );
                    wp_nav_menu( $args );
                ?>
            </nav>
            <div class="socials">
                <a href="https://www.behance.net/ismaeldouglas"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/behance.svg" alt="Behance"></a>
                <a href="https://www.linkedin.com/in/ismael-douglas-silva/"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/linkedin.svg" alt="LinkedIn"></a>
                <a href="https://github.com/idsdesigner/"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/github.svg" alt="GitHub"></a>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/Blog-icon.svg" alt="Blog"></a>
            </div>
        </header>