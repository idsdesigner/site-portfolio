<?php
// Template Name: Contato
?>


<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- Seção de Contato -->
    
    <section class="contact-section" id="contato">
        <!-- Fundo animado -->
        <div class="hero-bg">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/projetos/cinza.png" class="bg bg-cinza" alt="" aria-hidden="true">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/projetos/laranja.png" class="bg bg-laranja" alt="" aria-hidden="true">
        </div>
        <div class="container">
            <header class="section-header">
                <p>Agora que que conhece um pouco</p>
                <h2 class="section-title"><?php the_title(); ?></h2>
            </header>

            <div class="contact-content">
                <!-- Lado Esquerdo - Formulário -->
                <div class="contact-form-wrapper">
                    <form class="contact-form" id="contactForm" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" novalidate>

                    <!-- Campo oculto para WordPress identificar a ação -->
                    <input type="hidden" name="action" value="enviar_form_contato">
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
                        <div class="form-status" id="formStatus" role="status" aria-live="polite">
                            
                        </div>

                        <?php if (isset($_GET['status'])): ?>
                        <div class="form-status">
                                <?php if ($_GET['status'] === 'sucesso'): ?>
                                    <p class="success">Mensagem enviada com sucesso!</p>
                                <?php else: ?>
                                    <p class="error">Erro ao enviar a mensagem. Tente novamente.</p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </form>
                </div>
            </div>
        </div>
</section>
<?php endwhile; else: endif; ?>
<!-- Rodapé -->
<?php get_footer(); ?>
    