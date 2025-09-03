<footer class="rodape">
        <div class="container-rodape">
            <div class="coluna-logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/logo-fundo-banco.svg" alt="Logo IDS.Design">
            <address class="contato-meios">
                    <a href="i.d.s.designgrafico@gmail.com"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/email.svg" alt=""> i.d.s.designgrafico@gmail.com</a>
                    <a href="tel:+5544998476783"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/whats.svg" alt="">+55 44 99847-6783</a>
            </address>
            </div>
            <div class="habilidades">
                <div class="coluna-habilidade">
                    <h4 class="titulo-coluna">Front-end</h4>
                    <ul>
                        <li>HTML5</li>
                        <li>CSS3</li>
                        <li>JavaScript (ES6)</li>
                        <li>React.js</li>
                        <li>Next.js</li>
                    </ul>
                </div>

                <div class="coluna-habilidade">
                    <h4 class="titulo-coluna">Ferramentas</h4>
                    <ul>
                        <li>Figma</li>
                        <li>Pacote Adobe</li>
                        <li>Git</li>
                        <li>GitHub</li>
                        <li>VS Code</li>
                        <li>Wordpress</li>
                    </ul>
                </div>
            </div>

            <div class="coluna-subscribe">
            <h4 class="titulo-coluna">Subscribe</h4>
            <p class="texto-subscribe">
                Receba atualizações sobre novos projetos, estudos de caso e reflexões sobre front-end e design.
            </p>
            <form class="form-subscribe">
                <input type="email" placeholder="Entre com seu e-mail">
                <button type="submit">Enviar</button>
            </form>
            </div>
        </div>

        <div class="rodape-inferior">
            <p class="copyright">
            © <?php echo date('Y');?> <?php bloginfo('name'); ?>. Todos os direitos reservados.
            </p>
            <div class="redes-sociais">
            <a href="https://www.linkedin.com/in/ismael-douglas-silva/"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/linkedin-branco.svg" alt="LinkedIn"></a>
            <a href="https://www.behance.net/ismaeldouglas"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/behance-branco.svg" alt="Behance"></a>
            <a href="https://github.com/idsdesigner/"><img src="<?php echo get_stylesheet_directory_uri(); ?>./assets/images/icones redes sociais/github-branco.svg" alt="GitHub"></a>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>