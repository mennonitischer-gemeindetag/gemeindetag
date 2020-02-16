<?php
/**
 * The partial for displaying the global header.
 *
 * @package Gemeindetag
 */

?>
<header id="masthead" class="site-header" role="header" aria-label="Site Header">
	<div class="wrap">
	<div class="site-branding">

		<div class="logo">
			<?php the_custom_logo(); ?>
		</div>
		<?php
			$blog_info   = get_bloginfo( 'name' );
			$description = get_bloginfo( 'description', 'display' );
		?>
		<?php if ( ! empty( $blog_info ) ) { ?>
			<div class="title">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="site-description">
					<?php echo esc_attr( $description ); ?>
				</p>
			</div>
		<?php }; ?>

	</div>

	<?php if ( has_nav_menu( 'primary' ) ) { ?>
		<div class="navigation-top">
		<button
			class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"
		>
			<span class="screen-reader-text is-focusable">Menu</span>
		</button>
			<?php
				wp_nav_menu(
					[
						'theme_location' => 'primary',
						'menu_id'        => 'primary-navigation',
						'container'      => false,
					]
				);
			?>
		</div>
	<?php } ?>
	</div>
</header>
