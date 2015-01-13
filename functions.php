<?php
/**
 * magicstudio functions and definitions
 *
 * @package magicstudio
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'magicstudio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function magicstudio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on magicstudio, use a find and replace
	 * to change 'magicstudio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'magicstudio', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'magicstudio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'magicstudio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // magicstudio_setup
add_action( 'after_setup_theme', 'magicstudio_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function magicstudio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'magicstudio' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'magicstudio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function magicstudio_scripts() {
	wp_enqueue_style( 'magicstudio-animsition', get_template_directory_uri() . '/css/animsition.min.css' );
	wp_enqueue_style( 'magicstudio-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'magicstudio-style', get_template_directory_uri() . '/style.min.css' );

	wp_enqueue_script( 'magicstudio-vendor', get_template_directory_uri() . '/js/scripts.min.js', array(), '20120206', true );
	wp_enqueue_script( 'magicstudio-custom', get_template_directory_uri() . '/js/main.min.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magicstudio_scripts' );

add_action( 'init', 'magicstudio_posttypes' );
function magicstudio_posttypes() {
	register_post_type( 'magicstudio_services', array(
		'labels' => array(
			'name' => __( 'Services' ),
			'singular_name' => __( 'Service' ),
			'search_items' => __( 'Search Services' ),
			'all_items' => __( 'All Services' ),
			'edit_item' => __( 'Edit Service' ),
			'update_item' => __( 'Update Service' ),
			'add_new_item' => __( 'New Service' ),
			'menu_name' => __( 'Services' ),
		),
		'supports' => array(
			'title',
			'custom-fields',
			'thumbnail'
		),
		'rewrite' => array(
			'slug' => 'services',
			'with_front' => false,
		),
		'public' => true,
		'has_archive' => false,
        'show_in_nav_menus' => true,
	) );
}

add_action( 'init', 'magicstudio_taxonomies' );
function magicstudio_taxonomies() {
	register_taxonomy( 'service-types', array( 'magicstudio_services' ), array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Service Types', 'taxonomy general name' ),
			'singular_name' => _x( 'Service Type', 'taxonomy singular name' ),
			'search_items' => __( 'Search Service Types' ),
			'all_items' => __( 'All Service Types' ),
			'edit_item' => __( 'Edit Service Type' ),
			'update_item' => __( 'Update Service Type' ),
			'add_new_item' => __( 'New Service Type' ),
			'menu_name' => __( 'Service Types' ),
		),
		'rewrite' => array(
			'slug' => 'service-types',
			'with_front' => false,
			'hierarchical' => true,
		),
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
	));
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
