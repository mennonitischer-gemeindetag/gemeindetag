<?php
/**
 * Core setup, site hooks and filters.
 *
 * @package Gemeindetag\Core
 */

namespace Gemeindetag\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'i18n' ) );
	add_action( 'after_setup_theme', $n( 'theme_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
	add_action( 'wp_head', $n( 'js_detection' ), 0 );
	add_action( 'wp_head', $n( 'add_manifest' ), 10 );

	add_filter( 'script_loader_tag', $n( 'script_loader_tag' ), 10, 2 );
}

/**
 * Makes Theme available for translation.
 *
 * Translations can be added to the /languages directory.
 * If you're building a theme based on "gemeindetag", change the
 * filename of '/languages/Gemeindetag.pot' to the name of your project.
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( 'gemeindetag', GEMEINDETAG_PATH . '/languages' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
		)
	);
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support(
		'html5',
		[
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	add_theme_support(
		'post-formats',
		[
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		]
	);
	add_theme_support( 'custom-logo', [ 'flex-width' => true ] );
	add_theme_support(
		'custom-header',
		[
			'video'          => true,
			'height'         => '500',
			'width'          => '1200',
			'flex-height'    => true,
			'flex-width'     => true,
			'uploads'        => true,
			'random-default' => false,
			'header-text'    => false,
		]
	);
	add_theme_support( 'customize-selective-refresh-widgets' );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'gemeindetag' ),
			'legal'   => esc_html__( 'Legal Menu', 'gemeindetag' ),
		)
	);

	register_sidebar(
		[
			'name'          => __( 'Footer Left', 'gemeindetag' ),
			'id'            => 'footer-widgets-left',
			'description'   => __( 'Add widgets here to appear in your footer.', 'gemeindetag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => __( 'Footer Right', 'gemeindetag' ),
			'id'            => 'footer-widgets-right',
			'description'   => __( 'Add widgets here to appear in your footer.', 'gemeindetag' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => 'Allgemein',
				'slug'  => 'allgemein',
				'color' => '#97b226',
			],
			[
				'name'  => 'News',
				'slug'  => 'news',
				'color' => '#c4407d',
			],
			[
				'name'  => 'Workshops / Ausflüge',
				'slug'  => 'workshops-ausfluege',
				'color' => '#41a62a',
			],
			[
				'name'  => 'Hellblau',
				'slug'  => 'light-blue',
				'color' => '#1FA0D5',
			],
			[
				'name'  => 'Blau',
				'slug'  => 'blue',
				'color' => '#435994',
			],
			[
				'name'  => 'Dunkelblau',
				'slug'  => 'dark-blue',
				'color' => '#23284C',
			],
			[
				'name'  => 'Dunkelgrün',
				'slug'  => 'dark-green',
				'color' => '#314D2D',
			],
			[
				'name'  => 'Orange',
				'slug'  => 'orange',
				'color' => '#de7930',
			],
			[
				'name'  => 'Pink',
				'slug'  => 'pink',
				'color' => '#C62F7C',
			],
			[
				'name'  => 'Rot',
				'slug'  => 'red',
				'color' => '#B7473C',
			],
			[
				'name'  => 'Gelb',
				'slug'  => 'yellow',
				'color' => '#BA9F3B',
			],
			[
				'name'  => 'Lila',
				'slug'  => 'purple',
				'color' => '#672C65',
			],
		]
	);

	register_meta(
		'post',
		'accentColor',
		[
			'type'         => 'string',
			'single'       => true,
			'show_in_rest' => true,
		]
	);
}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {

	wp_enqueue_script(
		'frontend',
		GEMEINDETAG_TEMPLATE_URL . '/dist/js/frontend.js',
		[],
		GEMEINDETAG_VERSION,
		true
	);

	wp_enqueue_style( 'dashicons' );

	if ( is_page_template( 'templates/page-styleguide.php' ) ) {
		wp_enqueue_script(
			'styleguide',
			GEMEINDETAG_TEMPLATE_URL . '/dist/js/styleguide.js',
			[],
			GEMEINDETAG_VERSION,
			true
		);
	}

}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {

	wp_enqueue_style(
		'styles',
		GEMEINDETAG_TEMPLATE_URL . '/dist/css/style.css',
		[],
		GEMEINDETAG_VERSION
	);

	global $post;

	$accent_color = get_post_meta( get_the_ID(), 'accentColor', true );

	$custom_css = '';
	if ( isset( $accent_color ) && ! ( '' === $accent_color ) ) {
		$custom_css = "
			.site-content {
				--c-accent: {$accent_color};
			}";
	}
	wp_add_inline_style( 'styles', $custom_css );

	if ( is_page_template( 'templates/page-styleguide.php' ) ) {
		wp_enqueue_style(
			'styleguide',
			GEMEINDETAG_TEMPLATE_URL . '/dist/css/styleguide-style.css',
			[],
			GEMEINDETAG_VERSION
		);
	}
}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @return void
 */
function js_detection() {

	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

/**
 * Add async/defer attributes to enqueued scripts that have the specified script_execution flag.
 *
 * @link https://core.trac.wordpress.org/ticket/12009
 * @param string $tag    The script tag.
 * @param string $handle The script handle.
 * @return string
 */
function script_loader_tag( $tag, $handle ) {
	$script_execution = wp_scripts()->get_data( $handle, 'script_execution' );

	if ( ! $script_execution ) {
		return $tag;
	}

	if ( 'async' !== $script_execution && 'defer' !== $script_execution ) {
		return $tag;
	}

	// Abort adding async/defer for scripts that have this script as a dependency. _doing_it_wrong()?
	foreach ( wp_scripts()->registered as $script ) {
		if ( in_array( $handle, $script->deps, true ) ) {
			return $tag;
		}
	}

	// Add the attribute if it hasn't already been added.
	if ( ! preg_match( ":\s$script_execution(=|>|\s):", $tag ) ) {
		$tag = preg_replace( ':(?=></script>):', " $script_execution", $tag, 1 );
	}

	return $tag;
}

/**
 * Appends a link tag used to add a manifest.json to the head
 *
 * @return void
 */
function add_manifest() {
	echo "<link rel='manifest' href='" . esc_url( GEMEINDETAG_TEMPLATE_URL . '/manifest.json' ) . "' />";
}
