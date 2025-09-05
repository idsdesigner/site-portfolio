<?php
/**
 * Template Name: Configurações do Header
 * Página para configurar header via admin
 */

get_header(); ?>

<div class="admin-config-page">
    <div class="container">
        <h1>⚙️ Configurações do Header</h1>
        <p>Esta página é apenas para configuração via admin. Não será exibida no front-end.</p>
        
        <div class="config-info">
            <h2>Como usar:</h2>
            <ol>
                <li>Configure os campos abaixo</li>
                <li>Clique em "Atualizar"</li>
                <li>As alterações aparecerão automaticamente em todas as páginas</li>
            </ol>
        </div>
        
        <?php if (current_user_can('edit_pages')): ?>
            <div class="admin-notice">
                ✅ Você tem permissão para editar estas configurações.
            </div>
        <?php else: ?>
            <div class="admin-notice error">
                ❌ Você não tem permissão para editar estas configurações.
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.admin-config-page {
    padding: 2rem 0;
    min-height: 60vh;
}
.config-info {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 8px;
    margin: 2rem 0;
}
.admin-notice {
    padding: 1rem;
    border-radius: 4px;
    margin: 1rem 0;
}
.admin-notice.error {
    background: #fee;
    color: #c33;
    border: 1px solid #fcc;
}
.admin-notice:not(.error) {
    background: #efe;
    color: #363;
    border: 1px solid #cfc;
}
</style>

<?php get_footer();