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

	if (is_page('aquifer'))
		wp_enqueue_script( 'aquifer_sort', get_template_directory_uri() . '/public/js/aquifer-sort.js', array('jquery'), '20170316', true );

	if (is_page('query-testing')) {

		wp_enqueue_script( 'aquifer_paged_query', get_template_directory_uri() . '/public/js/aquifer-paged-query.js', array('jquery'), '20170605', true);
		wp_localize_script( 'aquifer_paged_query', 'js_ajax', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'action' => 'aquifer_archive_query_retrieve'
		));
	}

	// UCF Header bar
	wp_enqueue_script( 'cahweb-starter-ucfhb-script', '//universityheader.ucf.edu/bar/js/university-header.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cah_starter_scripts' );


function cah_add_custom_editor_styles() {

	add_editor_style( '/public/css/editor-general.css' );

	global $pagenow;
	if ( 'post.php' === $pagenow && isset( $_GET['post'] ) && 'article' === get_post_type( $_GET['post'] ) ) {

		add_editor_style( '/public/css/editor-article.css' );
	}

}
add_action( 'admin_init', 'cah_add_custom_editor_styles' );


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

/**
 * Returns the permalink to a post's featured image.
 */
function get_featured_image_url($post_id) {

	if (kdmfi_has_featured_image("author-image", $post_id) && !has_post_thumbnail($post_id))
		$thumb_url = kdmfi_get_featured_image_src("author-image", "large", $post_id);

	elseif (has_post_thumbnail() && !is_front_page())
		$thumb_url = get_the_post_thumbnail_url($post_id);

	else {

		$uploads_dir = wp_upload_dir();

		$thumb_url = $uploads_dir['baseurl'] . "/2017/03/";

		if (in_category("aquifer") || is_page("aquifer"))
			$thumb_url .= "Aquifer-og-splash-full.png";
		else
			$thumb_url .= "TFR-og-splash-full.png";
		}

	return $thumb_url;
}

/**
 * Add Open Graph meta tags to the post header, so FB and other Social Media crawlers can
 * access the proper images and content when generating their share links.
 */
function add_open_graph_tags() {

	echo "\n<!-- Open Graph Tags -->\n";

	global $post;

	$post_id = $post->ID;

	// Create array of Open Graph data, with the keys as the part of the property attribute
	// that follows "og:", and the value as the content.
	$og_meta = array(
		"url" => get_permalink($post_id),
		"type" => get_post_type($post_id),
		"title" => get_the_title($post_id),
		"description" => get_the_excerpt($post_id),
		"image" => get_featured_image_url($post_id),
		"site_name" => get_bloginfo('name'),
		"locale" => get_locale()
	);

	// Same thing as above, but for Twitter meta, which has a few platform-specific options.
	$twitter_meta = array(
		"card" => "summary",
		"site" => "@TheFLReview",
		"image:src" => $og_meta[ 'image' ]
	);

	// Build the actual Open Graph tags.
	foreach ($og_meta as $key => $value) {

			echo "<meta property=\"og:" . $key . "\" content=\"" . $value . "\" />\n";
	}

	// Ditto for Twitter.
	foreach ($twitter_meta as $key => $value) {

			echo "<meta property=\"twitter:" . $key . "\" content=\"" . $value . "\" />\n";
	}

	echo "<!-- end Open Graph Tags -->\n\n";
}

add_action( 'wp_head', 'add_open_graph_tags' );


add_action( 'wp_ajax_aquifer_archive_query_retrieve', 'aquifer_archive_query_retrieve' );
add_action( 'wp_ajax_nopriv_aquifer_archive_query_retrieve', 'aquifer_archive_query_retrieve' );
function aquifer_archive_query_retrieve() {

	global $wp_query;

	$resp_HTML = '';

	$type = ( isset($_REQUEST['type'] ) && !empty( $_REQUEST['type'] ) ) ? $_REQUEST['type'] : 'post';
	$display_categories = ( isset($_REQUEST['categories'] ) && !empty( $_REQUEST['categories'] ) ) ? json_decode( $_REQUEST['categories'] ) : NULL;
	$per_page = ( isset( $_REQUEST['per_page'] ) && !empty($_REQUEST['per_page'] ) ) ? $_REQUEST['per_page'] : 10; // Defaults to 10
	$genre = ( isset( $_REQUEST['genre'] ) && !empty( $_REQUEST['genre'] ) ) ? 'aquifer+' . $_REQUEST['genre'] : 'aquifer';
	$paged = ( isset( $_REQUEST['page'] ) && !empty( $_REQUEST['page'] ) ) ? $_REQUEST['page'] : 1;

	$args = array(
		'post_type'         => $type,
		'post_status'       => 'publish',
		'category_name'     => $genre,
		'posts_per_page'    => $per_page,
	);

	if ( !empty( $paged ) )
		$args['paged'] = $paged;

	query_posts($args);

	if ( have_posts() ) {
		while ( have_posts() ) {

			the_post();

			$id = get_the_ID();
			$title = get_the_title();
			$excerpt = get_the_excerpt();
			$permalink = get_the_permalink();
			$pub_date = get_the_date();
			$author = get_post_meta( $id, 'authors', true );
			$categories = get_the_category();

			$categories_to_show = array();

			if (!empty( $display_categories ) && !empty( $categories ) ) {
				foreach ($categories as $cat) {

					if ( in_array( $cat->name, $display_categories) )
						array_push( $categories_to_show, $cat->name);
				} // End foreach
			}// End if

			// All killer, no filler.
			if ($title == 'Coming Soon!')
				continue;

			if (kdmfi_has_featured_image( 'author-image', $id) && !has_post_thumbnail() )
				$thumbnail = kdmfi_get_featured_image_src( 'author-image', 'small', $id );

			else if ( has_post_thumbnail() )
				$thumbnail = get_the_post_thumbnail_url( $id );

			else
				$thumbnail = get_stylesheet_directory_uri() . '/public/images/empty.png';

			$resp_HTML .= '<div class="article-row">';
			$resp_HTML .= '<a href="' . $permalink . '">';
			$resp_HTML .= '<div class="article-thumb" style="background-image: url(' . $thumbnail . ');"></div>';
			$resp_HTML .= '<div class="article-text">';
			$resp_HTML .= '<h4>' . $title . '</h4>';
			$resp_HTML .= '<p><em>By ' . $author . '</em></p>';
			$resp_HTML .= '<p>' . substr( $excerpt, 0, 125 ) . '</p>';

			if ( !empty($categories_to_show ) ) {
				$cat_out = '';
				foreach ( $categories_to_show as $cat_name ) {

					$cat_out .= $cat_name . '<span style="float: right;">Published: ' . $pub_date . '</span>';

					if ( next( $categories_to_show ) !== false )
						$cat_out .= ', ';
				} // End foreach

				$resp_HTML .= '<p style="margin-top: 10px; font-size: 12px;"><em>' . $cat_out . '</em></p>';
			} // End if

			$resp_HTML .= '</div>'; // End .article-text
			$resp_HTML .= '</a>';
			$resp_HTML .= '</div>'; // End .article-row
		} // End while

		wp_reset_postdata();

		$resp_HTML .= '<div id="nav-button-row" class="flex-container">';

		if ( get_previous_posts_link() ) {

			$resp_HTML .= '<div id="prev-button" class="flex-item-nav">';
			$resp_HTML .= get_previous_posts_link( '« Prev' );
			$resp_HTML .= '</div>';

		} else {

			$resp_HTML .= '<div id="prev-button" class="flex-item-nav disabled"><p>« Prev</p></div>';
		} // End if

		$page_links = paginate_links( array(
			'mid_size' 	=> 2,
			'prev_next' => false,
			'type' 		=> 'array'
		) );

		if ( !empty( $page_links ) ) {

			$resp_HTML .= '<div id="pages" class="flex-item-nav">';

			foreach ( $page_links as $link ) {

				$resp_HTML .= $link;
			} // End foreach

			$resp_HTML .='</div>';
		} // End if

		if ( get_next_posts_link() ) {

			$resp_HTML .= '<div id="next-button" class="flex-item-nav">';
			$resp_HTML .= get_next_posts_link( 'Next »' );
			$resp_HTML .= '</div>';

		} else {

			$resp_HTML .= '<div id="next-button" class="flex-item-nav disabled"><p>Next »</p></div>';
		} // End if

	} else {

		$resp_HTML .= '<div class="article-row">';
		$resp_HTML .= '<h4>Sorry!</h4>';
		$resp_HTML .= '<p>No posts were found that matched these criteria.</p>';
		$resp_HTML .= '</div>';
	} // End if

	wp_reset_query();

	echo $resp_HTML;

	wp_die();
} // End aquifer_archive_query_retrieve
