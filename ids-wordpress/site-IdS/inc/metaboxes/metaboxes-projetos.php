<?php
// Campos personalizados para Projetos usando CMB2
function ids_add_projeto_metaboxes() {

    $cmb = new_cmb2_box(array(
        'id'           => 'projeto_metabox',
        'title'        => 'Detalhes do Projeto',
        'object_types' => array('projetos'),
        'context'      => 'normal',
        'priority'     => 'high',
    ));

    // Imagem mockup
    $cmb->add_field( array(
	'name'    => 'Capa projeto',
	'desc'    => 'Mockup do projeto web.',
	'id'      => 'projeto_image_capa',
	'type'    => 'file',

	'options' => array(
		'url' => false, // Hide the text input for the url
	),
	'text'    => array(
		'add_upload_file_text' => 'Add arquivo' // Change upload button text. Default: "Add or Upload File"
	),
	// query_args are passed to wp.media's library query.
	'query_args' => array(
		'type' => 'application/png', // Make library only display PDFs.
		// Or only allow gif, jpg, or png images
		// 'type' => array(
		// 	'image/gif',
		// 	'image/jpeg',
		// 	'image/png',
        //  'image/svg+xml',
        //  'image/svg',
        //  'image/webp',
		// ),
	),
	'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );

    // URL do Behance
    $cmb->add_field(array(
        'name' => 'URL do Behance',
        'desc' => 'Link para o projeto no Behance',
        'id'   => 'projeto_behance',
        'type' => 'text_url',
    ));

    // URL do GitHub
    $cmb->add_field(array(
        'name' => 'URL do GitHub',
        'desc' => 'Link para o repositório no GitHub',
        'id'   => 'projeto_github',
        'type' => 'text_url',
    ));

    // Tecnologias - Grupo repetível para ícones
    $tech_group = $cmb->add_field(array(
        'id'          => 'projeto_tecnologias',
        'type'        => 'group',
        'description' => 'Adicione as tecnologias utilizadas no projeto',
        'repeatable'  => true,
        'options'     => array(
            'group_title'       => 'Tecnologia {#}',
            'add_button'        => 'Adicionar Tecnologia',
            'remove_button'     => 'Remover Tecnologia',
            'sortable'          => true,
        ),
    ));

    // Nome da tecnologia
    $cmb->add_group_field($tech_group, array(
        'name' => 'Nome da Tecnologia',
        'id'   => 'nome',
        'type' => 'text',
        'desc' => 'Ex: HTML, CSS, JavaScript, Figma, etc.',
    ));

    // Ícone da tecnologia
    $cmb->add_group_field($tech_group, array(
        'name' => 'Ícone da Tecnologia',
        'id'   => 'icone',
        'type' => 'file',
        'text' => array(
            'add_upload_file_text' => 'Adicionar Ícone'
        ),
        'desc' => 'Upload do ícone SVG ou PNG da tecnologia',
    ));

    // Status do projeto (opcional)
    $cmb->add_field(array(
        'name'    => 'Status do Projeto',
        'id'      => 'projeto_status',
        'type'    => 'select',
        'desc'    => 'Status atual do desenvolvimento',
        'options' => array(
            'concluido'       => 'Concluído',
            'desenvolvimento' => 'Em Desenvolvimento',
            'pausado'         => 'Pausado',
        ),
        'default' => 'concluido',
    ));

    // Destaque na home (opcional)
    $cmb->add_field(array(
        'name' => 'Destacar na Home',
        'desc' => 'Marque para priorizar este projeto na página inicial',
        'id'   => 'projeto_destaque',
        'type' => 'checkbox',
    ));
}
add_action('cmb2_admin_init', 'ids_add_projeto_metaboxes');
?>