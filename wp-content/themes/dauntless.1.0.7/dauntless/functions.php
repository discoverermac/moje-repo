<?php
/**
 * Dauntless functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dauntless
 */

if ( ! function_exists( 'dauntless_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dauntless_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Dauntless, use a find and replace
	 * to change 'dauntless' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dauntless', get_template_directory() . '/languages' );

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
                 add_image_size('dauntless-large-thumb', 1500, 300, true);
                 add_image_size('dauntless-small-thumb', 500, 200, true);  
//                 add_image_size('dauntless-single-nav-thumb', 750, 200, true); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dauntless' ),
                                   'social' => esc_html__( 'Social', 'dauntless' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dauntless_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // dauntless_setup
add_action( 'after_setup_theme', 'dauntless_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dauntless_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dauntless_content_width', 1000 );
}
add_action( 'after_setup_theme', 'dauntless_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dauntless_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dauntless' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dauntless_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dauntless_scripts() {

    wp_enqueue_style('dauntless-foundation-style', get_template_directory_uri() . '/css/foundation.min.css');

    wp_enqueue_style('dauntless-google-fonts', '//fonts.googleapis.com/css?family=Nunito:400,300,700|Lora:400,400italic,700,700italic');    
    
    wp_enqueue_style('dauntless-font-awesome-style',  get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');

    wp_enqueue_style('dauntless-cssmenu-styles', get_template_directory_uri() . '/cssmenu/styles.css');
    
    //Checking whether a page is being displayed and switching the sidebar to the left
    if (is_page()) {
        wp_enqueue_style('dauntless-sidebar-position-styles', get_template_directory_uri() . '/sidebar-position/sidebar-left.css');
    }
    
    wp_enqueue_style('dauntless-style', get_stylesheet_uri());

    wp_enqueue_script('dauntless-navigation', get_template_directory_uri() . '/cssmenu/script.js', array('jquery'), '20151125', true);

    wp_enqueue_script('dauntless-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151126', true);

    wp_enqueue_script('dauntless-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    
    wp_enqueue_script('dauntless-equalizer-js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array(), '20151126', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action( 'wp_enqueue_scripts', 'dauntless_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

