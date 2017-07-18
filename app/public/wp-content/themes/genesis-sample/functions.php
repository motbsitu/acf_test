<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

// Include Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/output.php' );

// Add WooCommerce support.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );

// Add the required WooCommerce styles and Customizer CSS.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );

// Add the Genesis Connect WooCommerce notice.
include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Genesis Sample' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.3.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'genesis-sample-responsive-menu',
		'genesis_responsive_menu',
		genesis_sample_responsive_menu_settings()
	);

	wp_enqueue_script( 'gs-scripts', get_stylesheet_directory_uri() . '/js/gs-scripts.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

}
//my script file
// add_action ('wp_enqueue_scripts', 'gs_scripts');
// function gs_scripts(){
// 	wp_enqueue_script( 'gs-scripts', get_stylesheet_directory_uri() . '/js/gs-scripts.js', array( 'jquery' ), CHILD_THEME_VERSION, true );
// //1.12.4
// }
// //FONTS ALONE EXAMPLE
// //Enqueue Lato Google font
// add_action( 'wp_enqueue_scripts', 'sp_load_google_fonts' );
// function sp_load_google_fonts() {
// 	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
// }

// Define our responsive menu settings.
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

//Remove the post meta
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );

//Add post meta
add_action( 'genesis_entry_header', 'genesis_post_meta', 13 );



// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

//* Remove the site description
remove_action ( 'genesis_site_description', 'genesis_seo_site_description' );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'genesis-sample' ), 'secondary' => __( 'Footer Menu', 'genesis-sample' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {
	return 90;
}

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

//* Filter the comments
add_filter( 'genesis_title_comments', 'gs_title_comments' );

//* Function to filter the comments
function gs_title_comments() {

	$title = "<h3>Reader Feedback</h3>";
	return $title;

}


//* Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Add the site description conditionally only on home, original location
// add_action( 'genesis_site_description', 'homepage_site_description' );
// function homepage_site_description() {
//
// 	if ( is_home() ) {
// 		genesis_seo_site_description();
// 	}
//
// }

//* Add the site description conditionally only on home in before content
add_action( 'genesis_before_content', 'homepage_site_description' );
function homepage_site_description() {

	if ( is_home() ) {
		genesis_seo_site_description();
	}

}
//* Register a widget area called 'after-post'
genesis_register_sidebar( array(
	'id'            => 'after-post',
	'name'          => __( 'After Post', 'sample' ),
	'description'   => __( 'This is a widget area that can be placed after the post', 'sample' ),
) );

//* Hook after-post widget area after post content
add_action( 'genesis_before_comments', 'after_post_widget' );
	function after_post_widget() {
	if ( is_singular( 'post' ) ) {
		genesis_widget_area( 'after-post', array(
			'before' => '<div class="after-post widget-area">',
			'after' => '</div>',
		) );
	}
}

//* Register after post widget area
genesis_register_sidebar( array(
	'id'            => 'gs-custom-widget',
	'name'          => __( 'GS Custom Widget', 'themename' ),
	'description'   => __( 'This is a custom widget area', 'themename' ),
) );
//add custom widget to header area.
add_action ('genesis_after_header', 'gs_add_widget');

function gs_add_widget(){
	genesis_widget_area('gs-custom-widget', array(
		'before' => '<div class=wrap>
		<div class="gs-widget widget-area">',
		'after' => '</div></div>',
		)
	);
}

//* Customize the footer credits with filter
add_filter( 'genesis_footer_creds_text', 'gs_custom_footer_creds' );
function gs_custom_footer_creds(){

    $creds = '[footer_copyright] JS Mike';
    return $creds;

}

//* Add support for custom header
// add_theme_support( 'genesis-custom-header', array(
//    'width' => 320,
//    'height' => 120
// ));

// add_filter( 'avatar_defaults', 'gs_custom_gravatar' );
// function gs_custom_gravatar ($avatar) {
// 	$custom_avatar = get_stylesheet_directory_uri() . '/images/image.png';
// 	$avatar[$custom_avatar] = "Custom Gravatar";
// 	return $avatar;
// }

//* Add new image sizes for grid loop
add_image_size('grid-thumbnail', 100, 100, TRUE);
