<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gemeindetag
 * @since 1.0.0
 * @version 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="post-content">

		<header class="post-header">
		<?php

		if ( is_single() ) {
			the_title( '<h1 class="post-title">', '</h1>' );
		} else {
			the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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
	</header>
		<?php
		if ( is_single() ) {
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'gemeindetag' ),
					get_the_title()
				)
			);

			?>
			<a class="back-to-archive button" href="<?php echo esc_html( get_post_type_archive_link( get_post_type() ) ); ?>">Zur Übersicht</a>
			<?php
		} else {
			the_excerpt();
			?>
			<a class="read-more button" href="<?php the_permalink(); ?>">Weiter Lesen</a>
			<?php
		}
		?>
	</div>
</article>
