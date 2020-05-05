<?php
/**
 * minimalblog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minimalblog
 */
if ( ! function_exists( 'minimalblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function minimalblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on minimalblog, use a find and replace
		 * to change 'minimalblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'minimalblog', get_template_directory() . '/languages' );
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
		add_image_size( 'minimalblog-blog-thumb', 600, 800, true );
		add_image_size( 'minimalblog-popular-post', 270, 215, true );
		add_image_size( 'minimalblog-slider-image', 238, 238, true );
		add_image_size( 'minimalblog-small-thumb', 100, 100, true );
		add_image_size( 'minimalblog-standard-post-thumbnial', 750, 400, true );
		add_image_size( 'minimalblog-featured-slider-large', 1200, 600, true );
		add_image_size( 'minimalblog-page-header-image', 1920, 600, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'minimalblog' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'minimalblog' ),
			)
		);
		add_theme_support( 'woocommerce' );
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
			)
		);
		// Set up the WordPress core custom background feature.
		$custom_bg_args = apply_filters(
				'minimalblog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			);
		add_theme_support( 'custom-background', $custom_bg_args );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_editor_style( 'css/bootstrap.css' );
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
		$GLOBALS['content_width'] = apply_filters( 'minimalblog_content_width', 640 );
	}
endif;
add_action( 'after_setup_theme', 'minimalblog_setup' );
/**
 * Jetpack
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register widgets
 */
require get_template_directory() . '/inc/register-widgets.php';
/**
 * Enqueue scripts
 */
require get_template_directory() . '/inc/enqueue-scripts.php';
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
 * minimalblog Comment Template.
 */
require get_template_directory() . '/inc/minimalblog-comment-template.php';
/**
 * minimalblog Sanitize Function.
 */
require get_template_directory() . '/inc/sanitize-function.php';
/**
 * Checkout Fields
 */
require get_template_directory() . '/inc/checkout-fields.php';
/**
 * Recent Post Widget
 */
require get_template_directory() . '/inc/recent-post.php';
/**
 * Google Map
 */
require get_template_directory() . '/inc/gmap.php';
/**
 * Page Banner
 */
require get_template_directory() . '/inc/banner-functions.php';

/**
 * TGM plugin Activation
 */
require get_template_directory() . '/inc/tgm/required-plugin.php';

/**
 * Upgrade to Pro links
 */
require_once get_template_directory() . '/minimalblog-pro/class-customize.php';
require_once get_template_directory() . '/inc/toolbox/minimlablog-details.php';

/**
 * minimalblog WooCommerce Mini cart counter
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'minimalblog_refresh_mini_cart_count' );
function minimalblog_refresh_mini_cart_count( $fragments ) {
	ob_start();
	?>
	<div id="minicarcount">
		<?php echo WC()->cart->get_cart_contents_count(); ?>
	</div>
	<?php
		$fragments['#minicarcount'] = ob_get_clean();
	return $fragments;
}
/**
 * Page hader Show Hide Condition
 */
function minimalblog_page_header_show_hide(){
	$show_title_on_banner = get_theme_mod( 'show_title_on_banner', false );
	$banner_condition_check = get_theme_mod( 'banner_hide_show', false );
	if ( is_page_template( 'blankpage.php', 'fullwidth.php', 'frontgrid.php' ) ) {
		return false;
	} else {
		if (true === $banner_condition_check) {
			if (true === $show_title_on_banner) {
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
}
/**
 * Check if not page template
 */
function minimalblog_not_page_template(){
	if ( is_page_template( 'contact.php' ) || is_page_template('fullwidth.php') || is_page_template( 'blankpage.php' ) ) {
		return false;
	}
	return true;
}





