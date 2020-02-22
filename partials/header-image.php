<?php
/**
 * The partial for displaying the image header.
 *
 * @package Gemeindetag
 */

if ( has_post_thumbnail() ) {
	?>
	<div class="site-image-header">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php
};
