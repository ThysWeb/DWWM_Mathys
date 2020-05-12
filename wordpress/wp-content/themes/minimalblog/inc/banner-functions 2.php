<?php
/**
 * Minimalblog Breadcrumbs
 */
if (!function_exists('minimalblog_bredcrumbs')) {
	function minimalblog_bredcrumbs(){
		if(function_exists('bcn_display') && !is_front_page()) :
		?>
		<nav>
            <div class="breadcrumb">
                <?php bcn_display();?>
            </div>
        </nav>
		<?php
		endif;
	}
}

/**
 * Minimalblog Page title
 */

if (!function_exists('minimalblog_banner_title_control')) {
	function minimalblog_banner_title_control(){
		echo '<div class="title-breadcrumb-inner">';
		$page_main_title = single_post_title('', false);
		if (is_search()) :
			$page_main_title = sprintf( esc_html__( 'Search Results for: %s', 'minimalblog' ), '<span>' . get_search_query() . '</span>' );
		elseif (is_home()) :
			$page_main_title = get_theme_mod( 'blog_header_custom_title', __( 'Build Blog For Free', 'minimalblog' ));
		endif;
		if (is_author()) :
			wp_kses_post(minimalblog_author_vcard());
		elseif (is_page('support-forum')):
			?>
			<h1 class="page-title"><?php single_post_title( '');?></h1>
			<?php
		elseif (is_tag()) :
			?>
			<h1 class="page-title"><?php single_tag_title();?></h1>
			<?php
		elseif (is_category()) :
			?>
			<h1 class="page-title"><?php single_cat_title();?></h1>
			<?php
		elseif (class_exists('woocommerce') && is_product_category()) :
			?>
				<h1 class="page-title"><?php single_cat_title('');?></h1>
			<?php
		elseif (class_exists('woocommerce') && is_product_tag()) :
			?>
			<h1 class="page-title"><?php single_tag_title();?></h1>
			<?php
		elseif(class_exists('woocommerce') && is_shop()):
			?>
			<h1 class="page-title"><?php woocommerce_page_title();?></h1>
			<?php
		elseif(class_exists('woocommerce') && is_product()):
			?>
			<h1 class="page-title"><?php single_post_title();?></h1>
			<?php
		elseif (is_page()):
			?>
			<h1 class="page-title"><?php single_post_title(''); ?></h1>
			<?php
		elseif (is_archive()) :
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		else :
			?>
	        <h1 class="entry-title"><?php echo $page_main_title; ?></h1>
	       <?php 
   		endif;
    echo '</div>';
	}
}

/**
 * Default Banner
 * Customize From customizer API
 */
if (!function_exists('minimalblog_default_page_banner')) {
	function minimalblog_default_page_banner(){
		global $post;
		$header_image = get_header_image();
		$no_header_image_class = '';
		if (is_page() && has_post_thumbnail($post->ID)) {
			$header_image = get_the_post_thumbnail_url( $post->ID, 'minimalblog-page-header-image' );
		}
		if (empty($header_image)) {
			$no_header_image_class = ' no-header-image';
		}
		?>
		 <div class="page-banner-area<?php echo esc_attr($no_header_image_class);?>" style="background-image: url(<?php echo esc_url( $header_image );?>);">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12 text-center">
		                <div class="page-banner-text">
							<?php
							minimalblog_banner_title_control();
							minimalblog_bredcrumbs();
							?>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<?php
	}
}
