</main>

    <footer class="rodape">
        <div class="container-rodape">
            <!-- Coluna Logo e Contato -->
            <div class="coluna-logo">
                <img src="<?php echo esc_url(ids_get_footer_logo()); ?>" loading="lazy" alt="Logo IDS.Design">
                <address class="contato-meios">
                    <?php 
                    $email = ids_get_footer_config('footer_email', 'i.d.s.designgrafico@gmail.com');
                    $phone = ids_get_footer_config('footer_phone', '+55 44 99847-6783');
                    ?>
                    <a href="mailto:<?php echo esc_attr($email); ?>">
                        <img src="https://idsdesign.com.br/wp-content/uploads/2025/09/email.svg" loading="lazy" alt=""> 
                        <?php echo esc_html($email); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(str_replace([' ', '-', '(', ')'], '', $phone)); ?>">
                        <img src="https://idsdesign.com.br/wp-content/uploads/2025/09/whats.svg" loading="lazy" alt="">
                        <?php echo esc_html($phone); ?>
                    </a>
                </address>
            </div>

            <!-- Habilidades Dinâmicas -->
            <div class="habilidades">
                <!-- Frontend Skills -->
                <div class="coluna-habilidade">
                    <h4 class="titulo-coluna">Front-end</h4>
                    <ul>
                        <?php 
                        $frontend_skills = ids_get_footer_frontend_skills();
                        foreach ($frontend_skills as $skill): ?>
                            <li><?php echo esc_html($skill); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Tools -->
                <div class="coluna-habilidade">
                    <h4 class="titulo-coluna">Ferramentas</h4>
                    <ul>
                        <?php 
                        $tools = ids_get_footer_tools();
                        foreach ($tools as $tool): ?>
                            <li><?php echo esc_html($tool); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Newsletter Dinâmica -->
            <?php if (ids_should_show_footer_newsletter()): ?>
                <div class="coluna-subscribe">
                    <h4 class="titulo-coluna">
                        <?php echo esc_html(ids_get_footer_config('footer_newsletter_title', 'Subscribe')); ?>
                    </h4>
                    <p class="texto-subscribe">
                        <?php echo esc_html(ids_get_footer_config('footer_newsletter_text', 'Receba atualizações sobre novos projetos, estudos de caso e reflexões sobre front-end e design.')); ?>
                    </p>
                    <form class="form-subscribe">
                        <input type="email" placeholder="Entre com seu e-mail">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>

        <!-- Rodapé Inferior -->
        <div class="rodape-inferior">
            <p class="copyright">
                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
                <?php echo esc_html(ids_get_footer_config('footer_copyright', 'Todos os direitos reservados.')); ?>
            </p>
            <div class="redes-sociais">
                <?php 
                // Redes sociais do footer (pode reutilizar as do header ou ter suas próprias)
                $social_links = ids_get_header_socials();
                $social_icons = [
                    'linkedin' => 'linkedin-branco.svg',
                    'behance' => 'behance-branco.svg',
                    'github' => 'github-branco.svg',
                    'instagram' => 'instagram-branco.svg',
                    'twitter' => 'twitter-branco.svg',
                ];
                
                foreach ($social_links as $network => $url):
                    $icon = isset($social_icons[$network]) ? $social_icons[$network] : $network . '-branco.svg';
                ?>
                    <a href="<?php echo esc_url( is_array($url) ? '' : $url ); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones redes sociais/<?php echo $icon; ?>" 
                             loading="lazy" alt="<?php echo esc_attr(ucfirst($network)); ?>">
                    </a>

                <?php endforeach; ?>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>