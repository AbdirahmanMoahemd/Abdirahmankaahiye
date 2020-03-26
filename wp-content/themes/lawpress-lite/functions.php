<?php
/**
 * LawPress Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LawPress_Lite
 */

if ( ! function_exists( 'lplite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lplite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on LawPress Lite, use a find and replace
		 * to change 'lawpress-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lawpress-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lawpress-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lplite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lplite_setup' );

/**
 * Remove unused customizer sections
 */
function lplite_remove_customizer_sections( $wp_customize ) {
	$wp_customize->remove_control('header_image');
}
add_action( 'customize_register', 'lplite_remove_customizer_sections');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lplite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'lplite_content_width', 640 );
}
add_action( 'after_setup_theme', 'lplite_content_width', 0 );

define( 'MY_TGMPA_PATH', get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php' );
include_once MY_TGMPA_PATH;

add_image_size( 'lawpress-thumbnail', 500, 500, true );

function lplite_register_required_plugins() {	
	$plugins = array(
		array(
			'name'      => esc_html__( 'LawPress', 'lawpress-lite' ),
			'slug'      => 'lawpress',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Advanced Custom Fields', 'lawpress-lite' ),
			'slug'      => 'advanced-custom-fields',
			'required'  => false,
		),
		array(
			'name'      => esc_html__( 'Contact Form 7', 'lawpress-lite' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
	);

	$config = array(
			'id'           => 'lawpress-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
	tgmpa( $plugins, $config );
}
add_action('tgmpa_register', 'lplite_register_required_plugins');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lplite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lawpress-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lawpress-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 1', 'lawpress-lite' ),
		'id'            => 'footer-widgets-1',
		'description'   => esc_html__( 'Add widgets here.', 'lawpress-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 2', 'lawpress-lite' ),
		'id'            => 'footer-widgets-2',
		'description'   => esc_html__( 'Add widgets here.', 'lawpress-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 3', 'lawpress-lite' ),
		'id'            => 'footer-widgets-3',
		'description'   => esc_html__( 'Add widgets here.', 'lawpress-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// footer
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets 4', 'lawpress-lite' ),
		'id'            => 'footer-widgets-4',
		'description'   => esc_html__( 'Add widgets here.', 'lawpress-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'lplite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lplite_scripts() {
	$version = '1.0.10';

	wp_enqueue_style( 'lplite-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lplite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $version, true );

	wp_enqueue_script( 'lplite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), $version, true );

	wp_enqueue_script( 'lplite-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $version, true );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-grid.css', array(), $version);

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/all.min.css', array(), $version);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lplite_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

