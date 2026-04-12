<?php
/**
 * Theme main functionalities.
 *
 * @package European Law Institute
 */

define( 'ELI_PATH_DIR', get_stylesheet_directory() );
define( 'ELI_PATH_URL', get_stylesheet_directory_uri() );

add_action(
	'enqueue_block_assets',
	function () {
		wp_enqueue_style(
			'eli-styles',
			ELI_PATH_URL . '/style.css',
			array(),
			filemtime( ELI_PATH_DIR . '/style.css' )
		);
	}
);

/**
 * Add svg and webp upload support for the website.
 */
add_filter(
	'upload_mimes',
	function ( $mimes ) {
		$mimes['svg']  = 'image/svg+xml';
		$mimes['webp'] = 'image/webp';
		return $mimes;
	}
);

// TODO: Remove once the development is finished.
remove_action( 'wp_footer', 'the_block_template_skip_link' );

// Add blocks.
require 'blocks/blocks.php';
