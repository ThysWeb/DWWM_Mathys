<?php
/**
 * Template Name: Front Page
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<?php
	get_template_part( 'template-parts/featured', 'layout' );
	get_template_part( 'template-parts/promobox' );
	$get_blog_layout = get_theme_mod( 'blog_layout', 'list' );
	$container_fulid = get_theme_mod( 'container_full_width', false );
	if ($get_blog_layout === 'grid') {
		if ($container_fulid === true) {
			$container_class = 'container-fluid';	
		}else{
			$container_class = 'container';
		}
	}elseif($get_blog_layout === 'list'){
		$container_class = 'container';
	}
	// var_dump($container_class);
	/**
		 * Blog Page Sidebar Control
		 */
	$getblogsidebar = get_theme_mod( 'blog_page_sidebar', 'right' );
	$blogsidebar = 'col-md-5 col-lg-4 order-1';
	$blogcontent = 'col-md-7 col-lg-8 order-0';
	$sidebarshow = true;
	if ( $getblogsidebar === 'right' ) {
		$blogsidebar = 'col-md-5 col-lg-4 order-1';
		$blogcontent = 'col-md-7 col-lg-8 order-0';
		$sidebarshow = true;
	} elseif ( $getblogsidebar === 'left' ) {
		$blogsidebar = 'col-md-5 col-lg-4 order-0';
		$blogcontent = 'col-md-7 col-lg-8 order-1';
		$sidebarshow = true;
	} elseif ( $getblogsidebar === 'no' ) {
		$blogsidebar = 'sidebar-hide';
		$blogcontent = 'col-md-12';
		$sidebarshow = false;
	} else {
		$blogsidebar = 'col-md-5 col-lg-4 order-1';
		$blogcontent = 'col-md-7 col-lg-8 order-0';
	}
	?>
		<div class="blog-post-section">
			<div class="<?php echo esc_attr( $container_class ); ?>">
				<div class="row wrapper-content">
					<div class="<?php echo esc_attr( $blogcontent ); ?>">
						<?php
						if ( have_posts() ) :
							if ( 'grid' == $get_blog_layout ) {
									echo '<div class="row masonaryactive">';
							}
							global $paged;
							if ( get_query_var( 'paged' ) ) {
								$paged = get_query_var( 'paged' );
							} elseif ( get_query_var( 'page' ) ) {
								$paged = get_query_var( 'page' );
							} else {
								$paged = 1;
							}
							$args = array(
								// Choose ^ 'any' or from below, since 'any' cannot be in an array
								'post_type' => array(
									'post',
								),
								// Pagination Parameters
								'posts_per_page' => get_option( 'posts_per_page' ),
								'paged' => $paged,
							);
							$query = new WP_Query( $args );
							/* Start the Loop */
							while ( $query->have_posts() ) :
								$query->the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								$grid_column = get_theme_mod( 'grid_column', 'col-sm-6' );
								if ( $grid_column === 'col-sm-6' ) {
									$grid_column = 'col-lg-6 col-md-12';
								} elseif ( $grid_column === 'col-sm-4' ) {
									$grid_column = 'col-sm-12 col-md-6 col-lg-4';
								} elseif ( $grid_column === 'col-sm-3' ) {
									$grid_column = 'col-sm-12 col-md-6 col-lg-3';
								}
								if ( 'grid' == $get_blog_layout ) {
									echo '<div class="' . $grid_column . ' blog-grid-layout">';
								}
								get_template_part( 'template-parts/content', get_post_type() );
								if ( 'grid' == $get_blog_layout ) {
									echo '</div>';
								}
							endwhile;
							if ( 'grid' == $get_blog_layout ) {
									echo '</div>';
							}
								echo '<div class="Page frontpage navigation example">';
								echo paginate_links(
									array(
										'total' => $query->max_num_pages,
										'type'  => 'list',
										'current' => max( 1, $paged ),
									)
								);
								echo '</div>';
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>
					<?php if ( $sidebarshow === true ) : ?>
						<div class="<?php echo esc_attr( $blogsidebar ); ?>">
							<?php get_sidebar(); ?>
						</div>
						<?php
					endif;
					wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div>
<?php
get_footer();
