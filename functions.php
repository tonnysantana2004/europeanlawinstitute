<?php
/**
 * Theme main functionalities
 *
 * @package European Law Institute
 */

define( 'EU_LAW_PATH_DIR', get_stylesheet_directory() );
define( 'EU_LAW_PATH_URL', get_stylesheet_directory_uri() );

add_action(
	'enqueue_block_assets',
	function () {
		wp_enqueue_style(
			'eli-styles',
			EU_LAW_PATH_URL . '/style.css',
			array(),
			filemtime( EU_LAW_PATH_DIR . '/style.css' )
		);
	}
);


function cc_mime_types( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
