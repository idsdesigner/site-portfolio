<article class="project-card card-projeto-home card-arte-portfolio">
    <div class="project-image">
        <div class="mockup-projeto">
            <img src="<?php the_field('projeto_image_capa'); ?>" alt="Preview do projeto">
        </div>
    </div>
    
    <div class="project-content">
        <h3 class="project-tittle"><?php the_title(); ?></h3>
        <p class="project-description"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
        
        <a href="<?php the_permalink(); ?>" class="project-link">
            Ver Projeto
            <svg class="icone-flecha" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</article>