<?php
function minimalblog_sanitize_checkbox( $checked ) {
		// returns true if checkbox is checked
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function minimalblog_sanitize_radio( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function minimalblog_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
function minimalblog_get_categories() {
	$terms_array = array();
	$categories = get_terms(
		array(
			'taxonomy' => 'category',
		)
	);
	foreach ( $categories as $category ) {
		$terms_array[ $category->term_id ] = $category->name;
	}
	return $terms_array;
}
function minimalblog_category_sanitize( $input ) {
	$valid = minimalblog_get_categories();
	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return array();
		}
	}
	return $input;
}
function minimalblog_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}
function minimalblog_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
	);
	// Return an array with file extension and mime_type.
	$file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
	return ( $file['ext'] ? $image : $setting->default );
}
/**
 * Check blog layout condition. 
 */
function minimalblog_blog_grid() {
	if ( 'grid' === get_theme_mod( 'blog_layout' ) ) {
		return true;
	}
	return false;
}


// Sanitizes Fonts
function minimalblog_sanitize_fonts( $input ) {
	$valid = array(
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
		'Poppins:400,500,600,700,800,900' => 'Poppins',
		'Work+Sans:400,500,600,700,900' => 'Work Sans',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


/**
 * minimalblog_is_woocommerce_exist
 */

if (!function_exists('minimalblog_is_woocommerce_exists')) {
	function minimalblog_is_woocommerce_exists(){
		if (class_exists('woocommerce') && is_woocommerce()) {
			return true;
		}
		return false;
	}
}

/**
 * Active call back for banner settings
 */
function minimalblog_banner_show_hide(){
	$banner_condition_check = get_theme_mod( 'banner_hide_show', true );
	if (true === $banner_condition_check) {
		return true;
	}
	return false;
}

/**
 * Show Title One Banner
 */ 
if (!function_exists('minimalblog_show_title_on_banner')) {
	function minimalblog_show_title_on_banner(){
		$show_title_on_banner = get_theme_mod( 'show_title_on_banner', false );
		if (true === $show_title_on_banner ) {
			return true;
		}
		return false;
	}
}
/**
 * minimalblog is default page
 */
if (!function_exists('minimalblog_is_default_page')) {
	function minimalblog_is_default_page(){
		if (is_home() || is_archive() || is_404() || is_author() || is_category() || minimalblog_is_woocommerce_exists() || is_search() || is_tag() ) {
			return true;
		}
		return false;
	}
}