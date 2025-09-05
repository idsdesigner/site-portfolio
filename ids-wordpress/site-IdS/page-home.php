<?php
// Template Name: Home
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="hero">
            <!-- Fundo animado -->
            <div class="hero-bg">
                <img src="<?php the_field('img_1_image'); ?>" class="bg bg-cinza" loading="lazy" alt="" aria-hidden="true">
                <img src="<?php the_field('img_2_image'); ?>" class="bg bg-laranja" loading="lazy" alt="" aria-hidden="true">
            </div>
            <span class="txt-degrade ola">Olá</span>
            <h1 class="animate-element fade-up"><?php the_field('h1_hero'); ?></h1>
            <p><?php the_field('paragrafo_hero'); ?><br> <span class="txt-degrade txt-hero-destaque"><?php the_field('subtitulo_hero'); ?></span> </p>
            <div class="btns">
                <a href="<?php the_field('meus_projetos_url'); ?>" class="btn primary flex">Meus Projetos</a>
                <a href="<?php the_field('blog_url') ?>" class="btn-contorno outline flex">Conheça meu blog</a>
            </div>

            <div class="hashtags fade-left">
                <div class="marquee">
                    <span>#HTML5</span>
                    <span>#CSS3</span>
                    <span>#JavaScript</span>
                    <span>#DesignResponsivo</span>
                    <span>#WordPress</span>
                    <span>#FerramentasEcosistema</span>
                    <span>#DesigneUX/UI</span>
                    <span>#MotionDesign</span>
                    <span>#SoftSkills</span>

                    <!-- Duplicado para o loop funcionar sem pular -->
                    <span>#HTML5</span>
                    <span>#CSS3</span>
                    <span>#JavaScript</span>
                    <span>#DesignResponsivo</span>
                    <span>#WordPress</span>
                    <span>#FerramentasEcosistema</span>
                    <span>#DesigneUX/UI</span>
                    <span>#MotionDesign</span>
                    <span>#SoftSkills</span>
                </div>
            </div>

            
    </section>

    <!-- Seção de Projetos -->
        <section class="portfolio-section" id="projetos">
            <div class="container">
                <!-- Primeira-grid projects-web-->
                <div class="portfolio-category">
                    <div class="projetos-header">
                        <h2 class="category-title">Projetos Web</h2>
                        <a href="<?php the_field('meus_projetos_url'); ?>">Ver todos</a>
                    </div>
                    <div class="projetcts-grid projects-web">
                            <?php
                            $projetos_home = ids_get_projetos_home(3);
                            if ($projetos_home->have_posts()) :
                                while ($projetos_home->have_posts()) : $projetos_home->the_post();
                                    get_template_part('template-parts/card-projeto-home');
                                endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <p>Nenhum projeto encontrado.</p>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
                <!-- Segunda parte: Design Gráfico -->
            <div class="projects-motion">
                <div class="container">
                    <?php
                    $todas_artes = ids_get_arte();
                    if ($todas_artes->have_posts()) :
                        while ($todas_artes->have_posts()) : $todas_artes->the_post();
                            get_template_part('template-parts/card-arte-portfolio');
                        endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <div class="no-arts">
                            <p>Nenhuma arte encontrado no momento.</p>
                            <p>Novas artes serão adicionadas em breve!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Seção Sobre Mim -->
        <section class="about-section" id="sobre">
            <div class="container">
                    <h2 class="category-title"><?php the_field('sobre_mim_titulo'); ?></h2>
                    <div class="about-content">
                        <div class="about-text">
                            <?php the_field('sobre_mim_texto');
                            if ( ! empty( $sobre_mim ) ) {
                                echo '<div class="about-paragraph">';
                                echo wp_kses_post( wpautop( $sobre_mim ) ); 
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
            </div>
        </section>

        <!-- Seção de Contato -->
        
        <section class="contact-section" id="contato">
            <!-- Fundo animado -->
            <div class="hero-bg">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/projetos/cinza.png" class="bg bg-cinza" alt="" aria-hidden="true">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/projetos/laranja.png" loading="lazy" class="bg bg-laranja" alt="" aria-hidden="true">
            </div>
            <div class="container">
                <header class="section-header">
                    <p>Agora que que conhece um pouco</p>
                    <h2 class="section-title">Entre em Contato</h2>
                </header>

                <div class="contact-content">
                    <!-- Lado Esquerdo - Formulário -->
                    <div class="contact-form-wrapper">
                        <form class="contact-form" id="contactForm" action="#" method="POST" novalidate>
                            <!-- Campo Nome -->
                            <div class="form-group">
                                <label for="name" class="form-label">Nome</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="form-input" 
                                    required 
                                    autocomplete="name"
                                >
                                <span class="form-error" id="nameError" role="alert"></span>
                            </div>

                            <!-- Campo E-mail -->
                            <div class="form-group">
                                <label for="email" class="form-label">E-mail</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-input" 
                                    required 
                                    autocomplete="email"
                                    placeholder="seu@email.com"
                                >
                                <span class="form-error" id="emailError" role="alert"></span>
                            </div>

                            <!-- Campo Assunto -->
                            <div class="form-group">
                                <label for="subject" class="form-label">Assunto</label>
                                <textarea 
                                    id="subject" 
                                    name="subject" 
                                    class="form-textarea" 
                                    rows="5" 
                                    required
                                    placeholder="Descreva brevemente o motivo do seu contato..."
                                ></textarea>
                                <span class="form-error" id="subjectError" role="alert"></span>
                            </div>

                            <!-- Botão Enviar -->
                            <div class="form-submit">
                                <button type="submit" class="submit-btn" id="submitBtn">
                                    <span class="btn-text">Enviar</span>
                                </button>
                            </div>

                            <!-- Mensagem de Status -->
                            <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php endwhile; else: endif; ?>
    <!-- Rodapé -->
     <?php get_footer(); ?>