<?php
// Template Name: Projetos
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="hero">
        <!-- Fundo animado -->
        <div class="hero-bg">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/projetos/cinza.png" class="bg bg-cinza" loading="lazy" alt="" aria-hidden="true">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/projetos/laranja.png" class="bg bg-laranja" loading="lazy" alt="" aria-hidden="true">
        </div>
            <section class="meu-projeto-container">
                <?php
                $todos_projetos = ids_get_projetos();
                if ($todos_projetos->have_posts()) :
                    while ($todos_projetos->have_posts()) : $todos_projetos->the_post();
                        get_template_part('template-parts/card-projeto-portfolio');
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div class="no-projects">
                        <p>Nenhum projeto encontrado no momento.</p>
                        <p>Novos projetos serão adicionados em breve!</p>
                    </div>
                <?php endif; ?>
            </section>
        
    </section>
<section class="portfolio-section" id="projetos">
           <!-- Segunda parte: Design Gráfico -->
        <div class="projects-motion">
            <div class="container">
                <div class="motion-item">
                            <img src="./assets/images/projetos/wave.png" loading="lazy" alt="Projeto Motion 1">
                </div>
                <div class="motion-item">
                            <img src="./assets/images/projetos/projeto-design-fynes-sweet.png" loading="lazy" alt="Projeto Motion 2">
                </div>
                <div class="motion-item">
                            <img src="./assets/images/projetos/projeto-design-debora-spa.png" loading="lazy" alt="Projeto Motion 3">
                </div>
                <div class="motion-item">
                            <img src="./assets/images/projetos/projeto-design-leibe.png" loading="lazy" alt="Projeto Motion 4">
                </div>
                <div class="motion-item">
                            <img src="./assets/images/projetos/projeto-design-my-skin.png" loading="lazy" alt="Projeto Motion 5">
                </div>
                <div class="motion-item">
                            <img src="./assets/images/projetos/projeto-design-bak.png" loading="lazy" alt="Projeto Motion 6">
                </div>
            </div>
        </div>
    </section>
<?php endwhile; else: endif; ?>
<!-- Rodapé -->
<?php get_footer(); ?>
    