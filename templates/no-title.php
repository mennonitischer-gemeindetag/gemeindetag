<?php
/**
 * Template Name: Title in Editor
 * The main template file
 *
 * @package Gemeindetag
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div id="page-<?php the_ID(); ?>" <?php post_class( 'site-content' ); ?>>
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>

<?php
get_footer();
