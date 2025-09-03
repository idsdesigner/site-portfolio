<?php
// =======================
// Formulário de Contato
// =======================
add_action('admin_post_enviar_form_contato', 'ids_enviar_form_contato');
add_action('admin_post_nopriv_enviar_form_contato', 'ids_enviar_form_contato');

function ids_enviar_form_contato() {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome    = sanitize_text_field($_POST['name']);
        $email   = sanitize_email($_POST['email']);
        $assunto = sanitize_textarea_field($_POST['subject']);

        $to      = "contato@seudominio.com"; // troque pelo e-mail que vai criar na HostGator
        $subject = "Novo contato do site";
        $body    = "Nome: $nome\nEmail: $email\nMensagem: $assunto";
        $headers = [
            "Reply-To: $email",
            "Content-Type: text/plain; charset=UTF-8"
        ];

        if (wp_mail($to, $subject, $body, $headers)) {
            wp_redirect(home_url('/contato/?status=sucesso'));
        } else {
            wp_redirect(home_url('/contato/?status=erro'));
        }
        exit;
    }
}
