<?php
/**
 * The main template file
 *
 * @package Gemeindetag
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'partials/header', 'image' ); ?>
	<div id="page-<?php the_ID(); ?>" <?php post_class( 'site-content' ); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<?php the_content(); ?>
		<?php

		$children = wp_list_pages(
			[
				'child_of' => $post->ID,
				'echo'     => '0',
				'title_li' => '',
			]
		);

		if ( $children ) {
			?>
			<ul>
				<?php echo wp_kses_post( $children ); ?>
			</ul>
		<?php }; ?>
	</div>
<?php endwhile; ?>

<?php
get_footer();
