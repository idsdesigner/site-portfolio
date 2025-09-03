<?php
// Campos personalizados para Artes usando CMB2
function ids_add_artes_metaboxes() {

    $cmb = new_cmb2_box(array(
        'id'           => 'artes_metabox',
        'title'        => 'Detalhes do artes',
        'object_types' => array('artes'),
        'context'      => 'normal',
        'priority'     => 'high',
    ));

    // Imagem mockup
    $cmb->add_field( array(
	'name'    => 'Arte',
	'desc'    => 'Arte design gráfico',
	'id'      => 'artes_image_capa',
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
		// ),
	),
	'preview_size' => 'medium', // Image size to use when previewing in the admin.
    ) );

    $cmb->add_field( array(
	'name'    => 'texto alternalito da img',
	'desc'    => 'Descreva a sua imagem',
	'id'      => 'alt_img',
	'type'    => 'text_medium'
    ) );
}
add_action('cmb2_admin_init', 'ids_add_artes_metaboxes');
?>