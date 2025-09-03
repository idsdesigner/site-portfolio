    <article class="meu-projeto">
        <!-- Imagem do projeto -->
        <div class="mockup-projeto">
            <img src="<?php the_field('projeto_image_capa'); ?>" alt="Preview do projeto">
        </div>

        <!-- Conteúdo -->
        <div class="conteudo-projeto">
            <!-- Ferramentas e Tecnologias -->
            <?php 
            $tecnologias = get_post_meta(get_the_ID(), 'projeto_tecnologias', true);
            if ($tecnologias && !empty($tecnologias)) : ?>
                <div class="ferramentas-tecnologias">
                    <span class="ferramentas-tecnologias-label">Ferramentas e Tecnologias</span>
                    <div class="projetos-tecnologias">
                        <?php foreach ($tecnologias as $tech) : ?>
                            <?php if (!empty($tech['icone'])) : ?>
                                <img src="<?php echo esc_url($tech['icone']); ?>" 
                                     alt="<?php echo esc_attr($tech['nome']); ?>"
                                     title="<?php echo esc_attr($tech['nome']); ?>">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Título -->
            <h3 class="titulo-projeto"><?php the_title(); ?></h3>

            <!-- Descrição -->
            <div class="descricao-projeto">
                <?php the_content(); ?>
            </div>

            <!-- Links -->
            <div class="projetos-links">
                <?php 
                $behance_url = get_post_meta(get_the_ID(), 'projeto_behance', true);
                $github_url = get_post_meta(get_the_ID(), 'projeto_github', true);
                ?>
                
                <?php if ($behance_url) : ?>
                    <a href="<?php echo esc_url($behance_url); ?>" target="_blank" rel="noopener noreferrer">Behance</a>
                <?php endif; ?>
                
                <?php if ($github_url) : ?>
                    <a href="<?php echo esc_url($github_url); ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
                <?php endif; ?>
            </div>
        </div>
    </article>