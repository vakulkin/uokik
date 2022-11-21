<?php

/**
 * uokik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uokik
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uokik_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on uokik, use a find and replace
		* to change 'uokik' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('uokik', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header' => esc_html__('Header', 'uokik'),
			'footer' => esc_html__('Footer', 'uokik'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'uokik_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'uokik_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uokik_content_width()
{
	$GLOBALS['content_width'] = apply_filters('uokik_content_width', 640);
}
add_action('after_setup_theme', 'uokik_content_width', 0);


function widgets_name_list()
{

	$widgets = array(
		'sidebar-search',
		'sidebar-1',
		'sidebar-2',
		'sidebar-3',
		'sidebar-4',
		'sidebar-5',
	);

	return $widgets;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uokik_widgets_init()
{

	$widgets = widgets_name_list();

	foreach ($widgets as $key => $widget) {
		register_sidebar(
			array(
				'name'          => $widget,
				'id'            => $widget,
				'description'   => esc_html__('Add widgets here.', 'uokik'),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
		);
	}
}
add_action('widgets_init', 'uokik_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function uokik_scripts()
{
	wp_enqueue_style('uokik-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('uokik-style', 'rtl', 'replace');

	wp_enqueue_style('splide_css', get_template_directory_uri() . '/css/splide.min.css', array());
	wp_enqueue_script('splide_js', get_template_directory_uri() . '/js/splide.min.js', array(), false, true);

	wp_enqueue_script('uokik-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('uokik-script', get_template_directory_uri() . '/dist/js/script.js', array('jquery'), _S_VERSION, true);

	wp_localize_script(
		'uokik-script',
		'ajax_obj',
		array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'jsonurl' => get_rest_url(),
			'nonce' => wp_create_nonce('ajax-nonce')
		)
	);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'uokik_scripts');


function footer_logo($wp_customize)
{
	//Settings
	$wp_customize->add_setting('footer_logo'); //Setting for logo uploader

	//Controls
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wcag_logo',
			array(
				'label'      => __('Upload a footer logo', 'uokik'),
				'section'    => 'title_tagline',
				'settings'   => 'footer_logo'
			)
		)
	);
}
add_action('customize_register', 'footer_logo');


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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


if (class_exists('ACF')) {
	require get_template_directory() . '/inc/acf-settings.php';
}

/**
 * Document templates post type
 */
require get_template_directory() . '/inc/document-templates.php';

/**
 * Info tab post type
 */
require get_template_directory() . '/inc/html-blocks.php';

/**
 * Pagination
 */
require get_template_directory() . '/inc/pagination.php';


/**
 * Functions
 */
require get_template_directory() . '/inc/functions.php';
