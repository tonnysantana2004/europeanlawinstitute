<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

?>

<header <?php echo get_block_wrapper_attributes(); ?>>
	
	<div class="eli-container">
		<img src="" alt="">
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
