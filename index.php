<?php
/**
 * The main template file
 *
 * @package Gemeindetag
 */

get_header(); ?>
	<div id="page-<?php the_ID(); ?>" <?php post_class( 'site-content' ); ?>>
		<?php if ( ! is_single() ) { ?>
			<header class="page-header">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
		<?php } ?>
		<?php

		if ( have_posts() ) {

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'partials/post/content', get_post_format() );

			endwhile;

		} else {

			get_template_part( 'partials/post/content', 'none' );

		};
		?>
	</div>
<?php
get_footer();
