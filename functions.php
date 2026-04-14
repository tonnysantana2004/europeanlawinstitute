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

register_post_meta(
	'attachment',
	'_eli_inline_svg',
	array(
		'show_in_rest' => true,
		'single'       => true,
		'type'         => 'string',
	)
);

// Add SVG inline support.
add_filter(
	'wp_prepare_attachment_for_js',
	function ( $response ) {

		// Is an svg.
		if ( 'image/svg+xml' !== $response['mime'] ) {
			return $response;
		}

		$current_svg = get_post_meta( $response['id'], '_eli_inline_svg', true );

		// The inline svg has not been stored yet.
		if ( ! is_string( $current_svg ) || empty( $current_svg ) ) {

			// Set the inline svg custom field.
			$svg_url     = get_attached_file( $response['id'] );
			$svg_content = file_get_contents( $svg_url ); // phpcs:ignore

			// Todo: implement an SVG sanitizer.
			update_post_meta( $response['id'], '_eli_inline_svg', $svg_content );
		}

		return $response;
	},
	10
);

// TODO: Remove once the development is finished.
remove_action( 'wp_footer', 'the_block_template_skip_link' );

// Add blocks.
require 'blocks/blocks.php';
