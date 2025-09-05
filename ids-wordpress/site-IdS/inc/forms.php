<?php
// =======================
// Formulário de Contato
// =======================
add_action('admin_post_enviar_form_contato', 'ids_enviar_form_contato');
add_action('admin_post_nopriv_enviar_form_contato', 'ids_enviar_form_contato');

// ✅ Validação robusta
function ids_enviar_form_contato() {
    // Verificar nonce de segurança
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        wp_die('Erro de segurança');
    }
    
    // Validação completa
    $nome = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $assunto = isset($_POST['subject']) ? sanitize_textarea_field($_POST['subject']) : '';
    
    // Validar campos obrigatórios
    if (empty($nome) || empty($email) || empty($assunto)) {
        wp_redirect(add_query_arg('status', 'campos_obrigatorios', wp_get_referer()));
        exit;
    }
    
    // Validar formato do email
    if (!is_email($email)) {
        wp_redirect(add_query_arg('status', 'email_invalido', wp_get_referer()));
        exit;
    }
}
