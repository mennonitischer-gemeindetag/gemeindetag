<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gemeindetag
 * @since 0.0.1
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="post-content">

		<header class="post-header">
		<?php

		if ( is_single() ) {
			the_title( '<h1 class="post-title">', '</h1>' );
		} else {
			the_title( '<h2 class="post-title">', '</h2>' );
		}

		if ( 'post' === get_post_type() ) {
			echo '<div class="post-meta">';
			if ( is_single() ) {
				?>
					<span class="date"><?php the_date(); ?></span>
					<?php

			} else {
				?>
				<span class="date"><?php the_date(); ?></span>
				<?php
			};
			echo '</div><!-- .post-meta -->';
		};
		?>
	</header><!-- .entry-header -->
		<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gemeindetag' ),
					get_the_title()
				)
			);

			wp_link_pages(
				[
					'before'      => '<div class="page-links">Pages:',
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				]
			);
			?>
	</div>

</article>
