<?php
/**
 * SKT Hotel functions and definitions
 *
 * @package SKT Hotel Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'skt_hotel_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_hotel_lite_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-hotel-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-logo', array(
		'height'      => 112,
		'width'       => 214,
		'flex-height' => true,
	) );	
	
	register_nav_menus( array(
		'primary' => esc_attr__( 'Primary Menu', 'skt-hotel-lite' ),
		'footermenu' => esc_attr__( 'Footer Menu', 'skt-hotel-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_hotel_lite_setup
add_action( 'after_setup_theme', 'skt_hotel_lite_setup' );


function skt_hotel_lite_widgets_init() {	
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Blog Sidebar', 'skt-hotel-lite' ),
		'description'   => esc_attr__( 'Appears on blog page sidebar', 'skt-hotel-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-hotel-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-hotel-lite' ),
		'id'            => 'fc-1',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-hotel-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-hotel-lite' ),
		'id'            => 'fc-2',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-hotel-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-hotel-lite' ),
		'id'            => 'fc-3',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
		
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-hotel-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-hotel-lite' ),
		'id'            => 'fc-4',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );		
	
}
add_action( 'widgets_init', 'skt_hotel_lite_widgets_init' );


function skt_hotel_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto_condensed = _x('on','roboto_condensed:on or off','skt-hotel-lite');
		$roboto = _x('on','roboto:on or off','skt-hotel-lite');		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/		
		
		if('off' !== $roboto_condensed || 'off' !== $roboto){
			$font_family = array();
			
			if('off' !== $roboto_condensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}			
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function skt_hotel_lite_scripts() {
	wp_enqueue_style('skt-hotel-lite-font', skt_hotel_lite_font_url(), array());
	wp_enqueue_style( 'skt-hotel-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt-hotel-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'skt-hotel-lite-nivoslider-style', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'skt-hotel-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'skt-hotel-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'skt-hotel-lite-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'skt-hotel-lite-custom_js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'skt-hotel-lite-font-awesome-style', get_template_directory_uri()."/css/font-awesome.css" );
	wp_enqueue_style( 'skt-hotel-lite-animation-style', get_template_directory_uri()."/css/animation.css" );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_hotel_lite_scripts' );

define('SKT_URL','https://www.sktthemes.org','skt-hotel-lite');
define('SKT_THEME_URL','https://www.sktthemes.org/themes','skt-hotel-lite');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt_hotel_doc/','skt-hotel-lite');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/hotel-wordpress-theme/','skt-hotel-lite');
define('SKT_PRO_FONT_AWESOME_URL','http://fortawesome.github.io/Font-Awesome/icons/','skt-hotel-lite');
define('SKT_LIVE_DEMO_URL','http://sktthemesdemo.net/hotel/','skt-hotel-lite');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// get slug by id
function skt_hotel_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

if ( ! function_exists( 'skt_hotel_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_hotel_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';