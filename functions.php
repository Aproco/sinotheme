<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
		require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_setup() {
		load_theme_textdomain( 'html5reset', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'html5reset_setup' );

	// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_scripts_styles() {
		global $wp_styles;

		// Load Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		// Load Stylesheets
//		wp_enqueue_style( 'html5reset-reset', get_template_directory_uri() . '/reset.css' );
//		wp_enqueue_style( 'html5reset-style', get_stylesheet_uri() );

		// Load IE Stylesheet.
//		wp_enqueue_style( 'html5reset-ie', get_template_directory_uri() . '/css/ie.css', array( 'html5reset-style' ), '20130213' );
//		$wp_styles->add_data( 'html5reset-ie', 'conditional', 'lt IE 9' );

		// Modernizr
		// This is an un-minified, complete version of Modernizr. Before you move to production, you should generate a custom build that only has the detects you need.
		// wp_enqueue_script( 'html5reset-modernizr', get_template_directory_uri() . '/_/js/modernizr-2.6.2.dev.js' );

	}
	add_action( 'wp_enqueue_scripts', 'html5reset_scripts_styles' );

	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function html5reset_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

//		 Add the site name.
		$title .= get_bloginfo( 'name' );

//		 Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

//		 Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'html5reset' ), max( $paged, $page ) );

		return $title;
	}
	add_filter( 'wp_title', 'html5reset_wp_title', 10, 2 );




//OLD STUFF BELOW


	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Clean up the <head>, if you so desire.
	//	function removeHeadLinks() {
	//    	remove_action('wp_head', 'rsd_link');
	//    	remove_action('wp_head', 'wlwmanifest_link');
	//    }
	//    add_action('init', 'removeHeadLinks');

	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'html5reset' ) );

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function html5reset_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'html5reset' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'html5reset_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

/* --------------------------------------------------------------------
Enqueue scripts 
-------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'ourtheme_load_js_files' );
 
// Register javascript files
function ourtheme_load_js_files() {

wp_register_script( 'isotope', get_stylesheet_directory_uri().'/_/js/isotope.min.js', array('jquery'), '3.5.1', true );

wp_enqueue_script('isotope');
}

/* --------------------------------------------------------------------
Enable post thumbnails
-------------------------------------------------------------------- */
add_theme_support( 'post-thumbnails' );

/* --------------------------------------------------------------------
Enable Wordpress menus
-------------------------------------------------------------------- */
add_theme_support( 'menus' );

register_nav_menus( array(
    'mobilemenu' => __( 'Mobile menu' ),
) );
    
/* --------------------------------------------------------------------
Add additional image or thumbnail sizes
-------------------------------------------------------------------- */
add_image_size( 'block-image', 800, 575, true );
add_image_size( 'services-image', 660, 500, true );
add_image_size( 'team-image', 600, 550, true );
add_image_size( 'team-image-alt', 600, 600, true );


/* --------------------------------------------------------------------
Add customised excerpt lengths using <?php echo get_excerpt(75); ?>
(where 75 represents the char length of the excerpt)
-------------------------------------------------------------------- */
// Custom excerpt lengths
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}
//Custom title lengths
function title_setter($tcount){
  $tpermalink = get_permalink($post->ID);
  $stitle = get_the_title();
  $stitle = strip_tags($stitle);
  $stitle = substr($stitle, 0, $tcount);
  $stitle = $stitle.'...';
  return $stitle;
}


/* --------------------------------------------------------------------
Limit search to posts
-------------------------------------------------------------------- */
if (!is_admin()) {
	function wpb_search_filter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}
	add_filter('pre_get_posts','wpb_search_filter');
}


/* --------------------------------------------------------------------
Offset main query for News page
-------------------------------------------------------------------- */
function sino_offset_main_query ( $query ) {
	if ( $query->is_home() && $query->is_main_query() && !$query->is_paged() && !is_admin() ) {
		$query->set( 'offset', '2' );
   }
}
add_action( 'pre_get_posts', 'sino_offset_main_query' );


/* --------------------------------------------------------------------
Turn off full screen mode by defult in Gutenberg
-------------------------------------------------------------------- */
if (is_admin()) { 
	function jba_disable_editor_fullscreen_by_default() {
	    $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
	    wp_add_inline_script( 'wp-blocks', $script );
	}
	add_action( 'enqueue_block_editor_assets', 'jba_disable_editor_fullscreen_by_default' );
}


/* --------------------------------------------------------------------
Custom Gravity Forms error messaging
-------------------------------------------------------------------- */
add_filter( 'gform_validation_message_2', function ( $message, $form ) {
    if ( gf_upgrade()->get_submissions_block() ) {
        return $message;
    }
 
    $message = "<div class='validation_error'><p>Please enter a valid email address.</p></div>";
 
    return $message;
}, 10, 2 );

/* --------------------------------------------------------------------
Create a custom options pages for ACF
-------------------------------------------------------------------- */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Site options',
		'menu_title'	=> 'Site options',
		'menu_slug' 	=> 'global-site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/* --------------------------------------------------------------------
Save ACF data to a custom folder
-------------------------------------------------------------------- */
//Save point
add_filter('acf/settings/save_json', 'acf_json_save_point');
function acf_json_save_point( $path ) {
  // update path
  $path = get_stylesheet_directory() . '/data-acf';  
    
  // return
  return $path;
}
//Load point
add_filter('acf/settings/load_json', 'acf_json_load_point');
function acf_json_load_point( $paths ) {
  // remove original path (optional)
  unset($paths[0]);
    
  // append path
  $paths[] = get_stylesheet_directory() . '/data-acf';
    
  // return
  return $paths;  
}

/* --------------------------------------------------------------------
Custom ACF blocks
-------------------------------------------------------------------- */
require_once dirname( __FILE__ ) . '/_/inc/register-acf-blocks.php';

function wpse_12405_edit_attachment_name( $fields, $post ) {
    $fields['post_name'] = array(
        'label' => __( 'Slug' ),
        'value' => $post->post_name,
    );

    return $fields;
}

add_filter( 'attachment_fields_to_edit', 'wpse_12405_edit_attachment_name', 10, 2 );

function wpse_12405_save_attachment_name( $attachment, $POST_data ) {
    if ( ! empty( $POST_data['post_name'] ) )
        $attachment['post_name'] = $POST_data['post_name'];

    return $attachment;
}

add_filter( 'attachment_fields_to_save', 'wpse_12405_save_attachment_name', 10, 2);

?>