<?php
function meu_tema_enqueue() {
    // CSS principal
    wp_enqueue_style(
        'meu-tema-style',
        get_template_directory_uri() . '/style.css',
        [],
        false,
        'all'
    );

    // JS principal
    wp_enqueue_script(
        'meu-tema-js',
        get_template_directory_uri() . '/assets/js/script.js',
        [],
        false,
        true
    );
}
add_action('wp_enqueue_scripts', 'meu_tema_enqueue');

function meu_tema_fonts() {
    // Preconnect (opcional, mas recomendado)
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

    // Google Fonts
    wp_enqueue_style(
        'meu-tema-fonts',
        'https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
        [],
        null
    );
}
add_action('wp_enqueue_scripts', 'meu_tema_fonts');

function enqueue_scroll_animations() {
    wp_enqueue_script('scroll-animations', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true);
    wp_enqueue_style('animations-css', get_template_directory_uri() . '/assets/css/animations.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'enqueue_scroll_animations');