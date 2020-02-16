<?php
/**
 * WP Theme constants and setup functions
 *
 * @package Gemeindetag
 */

// Useful global constants.
define( 'GEMEINDETAG_VERSION', '0.1.0' );
define( 'GEMEINDETAG_TEMPLATE_URL', get_template_directory_uri() );
define( 'GEMEINDETAG_PATH', get_template_directory() . '/' );
define( 'GEMEINDETAG_INC', GEMEINDETAG_PATH . 'includes/' );

require_once GEMEINDETAG_INC . 'core.php';
require_once GEMEINDETAG_INC . 'overrides.php';
require_once GEMEINDETAG_INC . 'template-tags.php';
require_once GEMEINDETAG_INC . 'utility.php';
require_once GEMEINDETAG_INC . 'blocks.php';

// Run the setup functions.
Gemeindetag\Core\setup();
Gemeindetag\Blocks\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for the the new wp_body_open() function that was added in 5.2
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
