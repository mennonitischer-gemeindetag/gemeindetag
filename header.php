<?php
/**
 * The template for displaying the header.
 *
 * @package Gemeindetag
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="theme-color" content="#d23226" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<a href="#content" class="screen-reader-text is-focusable"><?php esc_html_e( 'Skip to Content', 'blackstone-main' ); ?></a>
		<a href="#footer" class="screen-reader-text is-focusable"><?php esc_html_e( 'Skip to Footer', 'blackstone-main' ); ?></a>

		<?php get_template_part( 'partials/header', 'global' ); ?>

		<div id="content" class="site-content" role="main">
