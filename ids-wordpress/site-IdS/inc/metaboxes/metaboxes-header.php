<?php
// Adiciona metaboxes personalizados para a página inicial
function cmb2_fields_header() {

    $cmb->add_field( array(
	'name'    => 'LOGO do site',
	'desc'    => 'logo do site (tamanho recomendado 200x50px)',
	'id'      => 'logo_site_header',
	'type'    => 'file',
	// Optional:
	'options' => array(
		'url' => false, // Hide the text input for the url
	),
	'text'    => array(
		'add_upload_file_text' => 'Add arquivo' // Change upload button text. Default: "Add or Upload File"
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
	'preview_size' => 'large', // Image size to use when previewing in the admin.
    ) );
}