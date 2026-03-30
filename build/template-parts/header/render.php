<?php
/**
 * Main Header component
 *
 * @package European Law Institute
 */

$eli_logo_url = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' );

?>

<header <?= get_block_wrapper_attributes() // phpcs:ignore ?>>
	
	<div class="eli-container">
		<img src="<?php echo esc_attr( $eli_logo_url ); ?>" class="eli-logo">
		<nav class="eli-nav">

				<?php

				// TODO: optimize this query.
				$eli_menu_items = wp_get_nav_menu_items( 5 );

				echo '<ul>';

				foreach ( $eli_menu_items as $eli_item ) {
					echo '<li>';

					echo esc_html( $eli_item->title );

					echo '</li>';
				}

				echo '</ul>';
				?>

		</nav>
		<a href="" class="eli-btn eli-btn-primary">Contact-us</a>
	</div>

</header>
