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
			<ul>
				<li>Home</li>
				<li>About</li>
				<li>Services</li>
				<li>Contact</li>
			</ul>
		</nav>
		<a href="" class="eli-btn eli-btn-primary">Contact-us</a>
	</div>

</header>
