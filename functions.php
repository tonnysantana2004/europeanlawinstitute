<?php
/**
 * Add the theme functions.
 *
 * @package ELI
 */

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style(
			'eli-style-css',
			get_stylesheet_directory_uri() . '/build/css/style.css',
			array(),
			filemtime( __DIR__ . '/build/css/style.css' )
		);
	}
);

add_action(
	'init',
	function () {
		register_block_type( __DIR__ . '/build/blocks/template-parts/header' );
	}
);
