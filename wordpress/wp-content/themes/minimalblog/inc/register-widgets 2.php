<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minimalblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'minimalblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'minimalblog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'minimalblog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'minimalblog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'minimalblog' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Top', 'minimalblog' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'minimalblog' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-parent"><h4 class="widget-title">',
			'after_title'   => '</h4></div>',
		)
	);
}
add_action( 'widgets_init', 'minimalblog_widgets_init' );