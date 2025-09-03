<?php
// Adiciona metaboxes personalizados para a página inicial
function cmb2_fields_home() {

    $cmb = new_cmb2_box( array(
        'id'            => 'home_box',
        'title'         => __('Home'),
        'object_types'  => array( 'page' ), // Tipo de página
        'show_on'      => array( 'key' => 'page-template', 'value' => 'page-home.php' ), // Exibir apenas no template page-home.php
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Mostrar nomes dos campos
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Titulo'),
        'desc'       => __( 'Titulo apresentação da página Hero' ),
        'id'         => 'h1_hero',
        'type'       => 'text',
        'attributes'  => array(
            'required'    => true,
            'maxlength'   => 160,
            'style'       => 'width: 100%;',
            'placeholder' => 'Titulo dá página (máximo 160 caracteres)',
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Parágrafo'),
        'desc'       => __( 'Parágrafo apresentação da página Hero' ),
        'id'         => 'paragrafo_hero',
        'type'       => 'text',
        'attributes'  => array(
            'required'    => true,
            'maxlength'   => 160,
            'style'       => 'width: 100%;',
            'placeholder' => 'Titulo dá página (máximo 160 caracteres)',
        ),
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Subtítulo'),
        'desc'       => __( 'Subtitulo apresentação da página Hero' ),
        'id'         => 'subtitulo_hero',
        'type'       => 'text',
        'attributes'  => array(
            'required'    => true,
            'maxlength'   => 160,
            'style'       => 'width: 100%;',
            'placeholder' => 'Titulo dá página (máximo 160 caracteres)',
        ),
    ) );

    $cmb->add_field( array(
	'name' => __( 'Meus Projetos URL', 'cmb2' ),
	'id'   => 'meus_projetos_url',
	'type' => 'text_url',
	// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Links suportados
    ) );

    $cmb->add_field( array(
	'name' => __( 'Blog', 'cmb2' ),
	'id'   => 'blog_url',
	'type' => 'text_url',
	// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Links suportados
    ) );

    $cmb->add_field( array(
	'name'    => 'Imagem 1 - Fundo Animado',
	'desc'    => 'Imagem 1 - Fundo Animado (Tamanho recomendado: 1920x1080px)',
	'id'      => 'img_1_image',
	'type'    => 'file',
	// Optional:
	'options' => array(
		'url' => false, // Esconder o campo URL
	),
	'text'    => array(
		'add_upload_file_text' => 'Add Arquivo' // Botão de upload
	),
	// query_args are passed to wp.media's library query.
	'query_args' => array(
		 'type' => array(
		 	'image/gif',
		 	'image/jpeg',
		 	'image/png',
		 	'image/svg',
		 ),
	),
	'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );

    $cmb->add_field( array(
	'name'    => 'Imagem 2 - Fundo Animado',
	'desc'    => 'Imagem 2 - Fundo Animado (Tamanho recomendado: 1920x1080px)',
	'id'      => 'img_2_image',
	'type'    => 'file',
	// Optional:
	'options' => array(
		'url' => false, // Esconder o campo URL
	),
	'text'    => array(
		'add_upload_file_text' => 'Add Arquivo' // Botão de upload
	),
	// query_args are passed to wp.media's library query.
	'query_args' => array(
		'type' => 'application/pdf', // Make library only display PDFs.
		// Or only allow gif, jpg, or png images
		// 'type' => array(
		// 	'image/gif',
		// 	'image/jpeg',
		// 	'image/png',
		// 	'image/svg',
		// ),
	),
	'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Sobre mim'),
        'desc'       => __( 'Titulo sobre mim' ),
        'id'         => 'sobre_mim_titulo',
        'type'       => 'text',
        'attributes'  => array(
            'required'    => true,
            'maxlength'   => 160,
            'style'       => 'width: 100%;',
            'placeholder' => 'Titulo sobre mim (máximo 160 caracteres)',
        ),
    ) );

    $cmb->add_field( array(
    'name' => 'Texto sobre mim',
    'desc' => 'Escreva seu texto com formatações (negrito, itálico, etc.)',
    'id'   => 'sobre_mim_texto',
    'type' => 'wysiwyg',
    'options' => array(
        'textarea_rows' => 10,
        'media_buttons' => false, // se quiser ocultar botão de adicionar mídia
    ),
    ) );

}
// Hook para executar a função
add_action( 'cmb2_admin_init', 'cmb2_fields_home' );

?>