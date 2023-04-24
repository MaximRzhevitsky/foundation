<?php
/**
 * max-foundation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package max-foundation
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function max_foundation_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on max-foundation, use a find and replace
		* to change 'max-foundation' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'max-foundation', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'header_menu' => esc_html__( 'header_menu', 'max-foundation' ),
			'footer_menu'=> esc_html__('footer_menu','max_foundation')
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
			'max_foundation_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'max_foundation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function max_foundation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'max_foundation_content_width', 640 );
}
add_action( 'after_setup_theme', 'max_foundation_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function max_foundation_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'max-foundation' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'max-foundation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'max_foundation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function max_foundation_scripts() {
	wp_enqueue_style( 'max-foundation-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-icomoon', get_template_directory_uri().'/assets/fonts/icomoon/style.css', array(), _S_VERSION );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css', array(), _S_VERSION );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri().'/assets/css/jquery-ui.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-owl-theme-default', get_template_directory_uri().'/assets/css/owl.theme.default.min.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-bootstrap-datepicker', get_template_directory_uri().'/assets/css/bootstrap-datepicker.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-flaticon', get_template_directory_uri().'/assets/fonts/flaticon/font/flaticon.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-aos', get_template_directory_uri().'/assets/css/aos.css', array(), _S_VERSION );
    wp_enqueue_style( 'max-foundation-main', get_template_directory_uri().'/assets/css/style.css', array(), _S_VERSION );

	wp_style_add_data( 'max-foundation-style', 'rtl', 'replace' );

	wp_enqueue_script( 'max-foundation-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
//	wp_deregister_script('jquery');
    wp_enqueue_script( 'max-foundation-jquery-3.3.1', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-bootstrap.min.js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-jquery-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-jquery-animateNumber', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'max-foundation-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'max_foundation_scripts' );


/**
 * Add class to menu link.
 */
function max_foundation_add_link_atts($atts){
	$atts['class']="nav-link";
	return $atts;
}

/**
 * Redux option.
 */
require get_template_directory() . '/inc/sample/sample-config.php';


/**
* TGM script.
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/tgm_register.php';


/**
 * Register a custom post type called "leader_ship".
 *
 * @see get_post_type_labels() for label keys.
 */
function leader_ships_init() {
	$labels = array(
		'name'                  => _x( 'leader_ships', 'Post type general name', 'max-foundation' ),
		'singular_name'         => _x( 'leader_ship', 'Post type singular name', 'max-foundation' ),
		'menu_name'             => _x( 'leader_ships', 'Admin Menu text', 'max-foundation' ),
		'name_admin_bar'        => _x( 'leader_ship', 'Add New on Toolbar', 'max-foundation' ),
		'add_new'               => __( 'Add New', 'max-foundation' ),
		'add_new_item'          => __( 'Add New Book', 'max-foundation' ),
		'new_item'              => __( 'New leader_ship', 'max-foundation' ),
		'edit_item'             => __( 'Edit leader_ship', 'max-foundation' ),
		'view_item'             => __( 'View leader_ship', 'max-foundation' ),
		'all_items'             => __( 'All leader_ships', 'max-foundation' ),
		'search_items'          => __( 'Search leader_ships', 'max-foundation' ),
		'parent_item_colon'     => __( 'Parent leader_ships:', 'max-foundation' ),
		'not_found'             => __( 'No leader_ships found.', 'max-foundation' ),
		'not_found_in_trash'    => __( 'No leader_ships found in Trash.', 'max-foundation' ),
		'featured_image'        => _x( 'leader_ship Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into leader_ship', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'leader_ship' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
	);

	register_post_type( 'leader_ships', $args );
}

add_action( 'init', 'leader_ships_init' );



/**
 * Register a custom post type called "testimonials".
 *
 * @see get_post_type_labels() for label keys.
 */
function testimonials_init() {
	$labels = array(
		'name'                  => _x( 'testimonials', 'Post type general name', 'max-foundation' ),
		'singular_name'         => _x( 'testimonial', 'Post type singular name', 'max-foundation' ),
		'menu_name'             => _x( 'testimonials', 'Admin Menu text', 'max-foundation' ),
		'name_admin_bar'        => _x( 'testimonial', 'Add New on Toolbar', 'max-foundation' ),
		'add_new'               => __( 'Add New', 'max-foundation' ),
		'add_new_item'          => __( 'Add New testimonial', 'max-foundation' ),
		'new_item'              => __( 'New testimonial', 'max-foundation' ),
		'edit_item'             => __( 'Edit testimonial', 'max-foundation' ),
		'view_item'             => __( 'View testimonial', 'max-foundation' ),
		'all_items'             => __( 'All testimonials', 'max-foundation' ),
		'search_items'          => __( 'Search testimonials', 'max-foundation' ),
		'parent_item_colon'     => __( 'Parent testimonials:', 'max-foundation' ),
		'not_found'             => __( 'No testimonials found.', 'max-foundation' ),
		'not_found_in_trash'    => __( 'No testimonials found in Trash.', 'max-foundation' ),
		'featured_image'        => _x( 'testimonial Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into testimonial', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
	);

	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'testimonials_init' );

/**
 * Register custom comments.
 */
 require get_template_directory() . '/inc/custom_comments.php';