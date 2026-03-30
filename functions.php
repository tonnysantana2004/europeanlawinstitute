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
		register_block_type( __DIR__ . '/build/template-parts/header' );
	}
);


add_action(
	'after_setup_theme',
	function () {
		$defaults = array(
			'height'               => 100,
			'width'                => 400,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true,
		);
		add_theme_support( 'custom-logo', $defaults );

		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary Menu', 'my-theme' ),
				'footer-menu'  => __( 'Footer Menu', 'my-theme' ),
			)
		);
	}
);
