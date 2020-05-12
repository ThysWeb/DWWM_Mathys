<?php
/**
 * Enqueue scripts and styles.
 */
function minimalblog_scripts() {
	$body_font = esc_html( get_theme_mod( 'minimalblog_body_fonts' ) );
	if ( $body_font ) {
		wp_enqueue_style( 'minimalblog-body-fonts', '//fonts.googleapis.com/css?family=' . $body_font );
	} else {
		wp_enqueue_style( 'minimalblog-source-body', '//fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900' );
	}
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_style( 'minimalblog-style', get_stylesheet_uri() );
	wp_enqueue_style( 'menu', get_template_directory_uri() . '/css/menu.css' );
	wp_enqueue_style( 'minimalblog-block-style', get_theme_file_uri( '/css/blocks.css' ), null, '1.1' );
	wp_enqueue_style( 'minimalblog-responsive', get_template_directory_uri() . '/css/responsive.css' );
	// Fonts
	$body_font_size = esc_html( get_theme_mod( 'minimalblog_body_fonts_size' ) );
	$body_font_weight = esc_html( get_theme_mod( 'minimalblog_body_fonts_weight' ) );
	$body_font_line_height = esc_html( get_theme_mod( 'minimalblog_body_fonts_line_height' ) );
	$body_font_pieces = '0';
	if ( $body_font ) {
		$body_font_pieces = explode( ':', $body_font );
	}
	// Output all the style
	$getprimarycolor = get_theme_mod( 'base_color' );
	$primarycolor = ( ! empty( $getprimarycolor ) ? $getprimarycolor : '#f16334' );
	$marginbottom = '50px';
	$paddingbototm = '20px';
	$contentarea_padding = '50px';
	$minimalblog_single_mb = '20px';
	$menucolor = get_theme_mod( 'menu_color_main', '#000000' );
	$menucolorhover = get_theme_mod( 'menu_color_hover', '#f16334' );
	if ( is_page_template( 'blankpage.php' ) || is_page_template( 'fullwidth.php' ) ) {
		$marginbottom = 0;
		$paddingbototm = 0;
		$contentarea_padding = 0;
		$minimalblog_single_mb = 0;
	}
	$banner_height = get_theme_mod( 'banner_height', 250 );

	$data = '
	@media only screen and (min-width: 768px) {
		#cssmenu>ul>li>a, #cssmenu>ul>li>a:after, #cssmenu>ul>li.current-menu-item>a:after, #cssmenu>ul>li.current_page_item>a:after{
	    	color: ' . $menucolor . ' !important;
		}
		#cssmenu>ul>li>a:hover, #cssmenu>ul>li>a:hover:after, #cssmenu>ul>li.current-menu-item>a:hover:after, #cssmenu>ul>li.current_page_item>a:hover:after, #cssmenu ul ul li a:hover{
	    	color: ' . $menucolorhover . ' !important;
		}
	}

	 #cssmenu ul li.has-sub:hover > a:after{
		background-color: ' . $menucolorhover . ' !important;
	}

	.page-banner-area{
		height: '.$banner_height.'px;
		min-height: '.$banner_height.'px;
	}

	.minimalblog-credit {
	    position: absolute !important;
	    left: 50% !important;
	    visibility: visible !important;
	    width: 15px !important;
	    height: 15px !important;
	    opacity: 1 !important;
	    z-index: 1 !important;
	    top: calc(50% - 9.5px);
	}
	.minimalblog-credit span {
	    font-size: 0;
	}
	.minimalblog-credit a, .minimalblog-credit a:hover {
	    color: #f16334 ;
	    cursor: pointer ;
	    opacity: 1 ;
	}
	body.border_and_box_shadow_hide .footer-area.section-padding, body.border_and_box_shadow_hide footer#colophon, body.border_and_box_shadow_hide .widget, body.border_and_box_shadow_hide .blog-post-section article, body.border_and_box_shadow_hide .archive-page-section article, body.border_and_box_shadow_hide .menu-area, body.border_and_box_shadow_hide .site-topbar-area {
	    border: 0 !important;
	    box-shadow: none !important;
	}
	.readmore a,.btn.btn-warning, input[type="submit"], button[type="submit"], span.edit-link a, .comment-form button.btn.btn-primary, .banner-button a, table#wp-calendar #today, ul.pagination li .page-numbers, .woocommerce ul.products li.product .button, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce span.onsale, .header-three .social-link-top a, .header-three-search .search-popup>div, .mini-shopping-cart-inner #minicarcount, .category-links a, .popular-post-content a:hover, .tagcloud a, .minimalblog-standard-post__social-share a, span.tags-links a{
		background-color: ' . esc_attr( $primarycolor ) . ';
	}
	.static_icon a, .site-info a, .scrooltotop a, #cssmenu.light ul li a:hover, .social-link-top a:hover, .footer-menu ul li a:hover, #cssmenu.light ul li a:hover:after, a:hover, a:focus, a:active, .post-title a:hover h2, .post-title a:hover h4, #cssmenu.light li.current_page_item a, li.current_page_item a, .author-social-link a, .post-title a:hover *, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .tagcloud a:hover, .minimalblog-credit a, .minimalblog-credit a:hover, .woocommerce ul.products li.product .woocommerce-loop-product__title:hover, table#wp-calendar a, .blog-single-featured-block a h3:hover, .widget li a:hover, .mini-shopping-cart-inner a, .blog-meta ul li span.fa{
		color: ' . esc_attr( $primarycolor ) . ';
	}
	input[type="submit"], button[type="submit"], .title-parent, blockquote{
		border-color: ' . esc_attr( $primarycolor ) . ';
	}
	body, button, input, select, textarea { 
		font-family: ' . $body_font_pieces[0] . '; 
		font-size: ' . $body_font_size . 'px;
		font-weight: ' . $body_font_weight . ';
		line-height: ' . $body_font_line_height . 'px;
	}
	';
	$stickyheader = get_theme_mod( 'sticky_header', false );
	if ( true === $stickyheader ) {
		$data .= '
			.menu-area.sticky-menu {
			    background: #fff;
			    position: fixed;
			    width: 100%;
			    left: 0;
			    top: 0;
			    z-index: 55;
			    transition: .6s;
			}
			.site.boxlayout .menu-area.sticky-menu {
				width: 1200px;
			    left: calc(50% - 600px);
			}
		';
	}
	wp_add_inline_style( 'minimalblog-style', $data );
	wp_enqueue_script( 'stellarnav', get_template_directory_uri() . '/js/stellarnav.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'masonry-pkgd', get_template_directory_uri() . '/js/masonry.pkgd.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'minimalblog-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'minimalblog-active', get_template_directory_uri() . '/js/active.js', array( 'jquery' ), '1.0', true );
	$category_slider_item = get_theme_mod( 'category_slider_item', 3 );
	$mainslideritem = get_theme_mod( 'featured_slider_item', 2 );
	$mainauto_play = get_theme_mod( 'featured_slider_auto_play', false );
	$subauto_play = get_theme_mod( 'category_slider_auto_play', false );
	$main_slider_auto_play_true = 'false';
	$sub_slider_auto_play_true = 'false';
	if ( $mainauto_play == true ) {
		$main_slider_auto_play_true = 'true';
	}
	if ( $subauto_play == true ) {
		$sub_slider_auto_play_true = 'true';
	}
	$customscript = '
	(function($) {
    "use strict";
	$(\'.active-subfeatured-slider\').owlCarousel({
        items: ' . $category_slider_item . ',
        nav: true,
        autoplay: ' . $sub_slider_auto_play_true . ',
        navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        dots: false,
        slideBy: 1,
       	autoHeight: true,
        responsive : {
                0 : {
                    items: 1,
                },
                // breakpoint from 480 up
                480 : {
                   items: 1,
                   margin: 15
                },
                // breakpoint from 768 up
                768 : {
                   items: 1,
                },
                992 : {
                   items: ' . $category_slider_item . ',
                }
            }
    });
    $(\'.featured-main-slider\').owlCarousel({
        items: ' . $mainslideritem . ',
        nav: true,
        autoplay: ' . $main_slider_auto_play_true . ',
        navText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"],
        smartSpeed: 1000,
        margin: 30,
        rewind: true,
        slideBy: 1,
        autoHeight: true,
        dots: false,
       	animateOut: "fadeOut",
       	animateIn: "fadeIn",
        responsive : {
                0 : {
                    items: 1,
                },
                // breakpoint from 480 up
                480 : {
                   items: 1,
                   margin: 15
                },
                // breakpoint from 768 up
                768 : {
                   items: 1,
                },
                991 : {
                   items: ' . $mainslideritem . ',
                }
            }
    });
    })(jQuery);
	';
	wp_add_inline_script( 'minimalblog-active', $customscript, 'after' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'minimalblog_scripts' );

add_action('admin_enqueue_scripts','minimalblog_admin_scripts');
function minimalblog_admin_scripts()
    {
       wp_enqueue_script('minimalblog-admin-script', get_template_directory_uri() . '/inc/admin/admin.js', array('jquery'));
       wp_enqueue_style('minimalblog-admin-style', get_template_directory_uri() . '/inc/admin/style.css');
    }