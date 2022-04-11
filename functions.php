<?php
/**
 * WP Theme constants and setup functions
 *
 * @package GemeindetagTheme
 */

// Useful global constants.
define( 'GEMEINDETAG_THEME_VERSION', '1.0.0' );
define( 'GEMEINDETAG_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'GEMEINDETAG_THEME_PATH', get_template_directory() . '/' );
define( 'GEMEINDETAG_THEME_DIST_PATH', GEMEINDETAG_THEME_PATH . 'dist/' );
define( 'GEMEINDETAG_THEME_DIST_URL', GEMEINDETAG_THEME_TEMPLATE_URL . '/dist/' );
define( 'GEMEINDETAG_THEME_INC', GEMEINDETAG_THEME_PATH . 'includes/' );
define( 'GEMEINDETAG_THEME_BLOCK_DIR', GEMEINDETAG_THEME_INC . 'blocks/' );


if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), GEMEINDETAG_THEME_DIST_URL, GEMEINDETAG_THEME_DIST_PATH );
}


require_once GEMEINDETAG_THEME_INC . 'core.php';
require_once GEMEINDETAG_THEME_INC . 'overrides.php';
require_once GEMEINDETAG_THEME_INC . 'template-tags.php';
require_once GEMEINDETAG_THEME_INC . 'utility.php';
require_once GEMEINDETAG_THEME_INC . 'blocks.php';

// Run the setup functions.
GemeindetagTheme\Core\setup();
GemeindetagTheme\Blocks\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for the the new wp_body_open() function that was added in 5.2
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
