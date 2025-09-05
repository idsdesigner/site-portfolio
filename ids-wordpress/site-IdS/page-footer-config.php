<?php
/**
 * Template Name: Configurações do Footer
 * Página para configurar footer via admin
 */

get_header(); ?>

<div class="admin-config-page">
    <div class="container">
        <h1>⚙️ Configurações do Footer</h1>
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

<?php get_footer();