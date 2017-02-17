<?php
/**
 * cah-starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cah-starter
 *
 * !!! DO NOT PUT CUSTOM POST TYPES HERE !!!
 *     Make a plugin for them, plenty of examples on the github
 *	   https://github.com/cahweb
 *
 * If you need to add custom functionality, put your functions in the bottom
 * section of this file
 */

if ( ! function_exists( 'cah_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cah_starter_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cah-starter, use a find and replace
	 * to change 'cah-starter' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cah-starter', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'cah-starter' ),
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
	add_theme_support( 'custom-background', apply_filters( 'cah_starter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'cah_starter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cah_starter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cah_starter_content_width', 640 );
}
add_action( 'after_setup_theme', 'cah_starter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cah_starter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cah-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cah-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cah_starter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cah_starter_scripts() {
	wp_enqueue_style( 'cah-starter-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cah-starter-navigation', get_template_directory_uri() . '/public/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'cah-starter-skip-link-focus-fix', get_template_directory_uri() . '/public/js/skip-link-focus-fix.js', array(), '20151215', true );

	// UCF Header bar
	wp_enqueue_script( 'cahweb-starter-ucfhb-script', '//universityheader.ucf.edu/bar/js/university-header.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cah_starter_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/*******
 * General custom functions
 * If you need to add a function put it here, and please comment it so
 * The next guy knows what the hell is going on.
 * Because chances are he'll also be an intern with 
 * very little PHP experience at first. Help the little guys out.
 ****/

/** 
 * Little function to display logo in markup and to keep the code relatively clean
 * The default style (in the css) will make it overlay the header image/slideshow 
 */
$default_logo_location = get_stylesheet_directory_uri() . '/public/images/logo.png';
function display_logo( $logo_location ) {
	echo '<img class="site-logo" src="' . $logo_location . '">';
}

/**
 * Display copyright info for footer
 */
function display_footer_info() {
	echo get_bloginfo() . '&nbsp; | &nbsp;' . 'College of Arts and Humanities';
	echo '<br>';
	// This should be changed to have site info stored in a plugin and pulled dynamically here
	echo 'Phone: 407-823-xxxx' . '&nbsp; | &nbsp;' . get_bloginfo('admin_email');
	echo '<br><br>';
	echo 'Copyright &copy; ' . date("Y") . ' University of Central Florida';
}

/**
 * Get post by slug
 * I'm using this to display three small posts on the homepage as part of the 3 col layout
 */
function get_post_by_slug($slug) {
	$args=array(
		'name'           => $slug,
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 1
	);

	$returned_posts = get_posts( $args );
	if( $returned_posts ) {
		echo '<h2>' . $returned_posts[0] -> post_title . '</h2>';
		echo '<p>' . $returned_posts[0] -> post_content . '</p>';
	}
}