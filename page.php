<?php
/**
 * The main template file
 *
 * @package Gemeindetag
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="page-<?php the_ID(); ?>" <?php post_class( 'site-content' ); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>

<?php
get_footer();
