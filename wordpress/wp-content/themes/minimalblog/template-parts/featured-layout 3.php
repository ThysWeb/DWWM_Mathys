<?php
/**
 * minimalblog Featured Layout One
 *
 * @package minimalblog
 */
$get_featured_categories = get_theme_mod( 'featured_categories' );
$featured_categories = '';
if ( ! empty( $get_featured_categories ) ) {
	$featured_categories = implode( ',', $get_featured_categories );
}

$getpostcount = get_theme_mod( 'featured_post_per_page', 2 );
$get_read_more_text = get_theme_mod( 'featured_read_more_text', __( 'Read More', 'minimalblog' ) );
$featured_slider_item = get_theme_mod( 'featured_slider_item', 2 );
$featured_slider_image_size = 'minimalblog-blog-thumb';
$extra_featured_class = ' featured_two_column';
if (1 === $featured_slider_item) {
	$featured_slider_image_size = 'minimalblog-featured-slider-large';
	$extra_featured_class = ' featured_single_column';
}
?>
<div class="featured-area<?php echo esc_attr($extra_featured_class);?>">
	<div class="container">
		<div class="featured-main-slider owl-carousel">
			<?php
				$f_loop_args = array(
					'post_type' => array( 'post' ),
					'posts_per_page'    => $getpostcount,
					'cat' => $featured_categories,
					'ignore_sticky_posts' => 1,
				);
				if (is_page_template('frontpage.php' , 'frontgrid.php')) {
					unset($f_loop_args['cat']);
				}
				$featuredblocks = new WP_Query($f_loop_args);
				while ( $featuredblocks->have_posts() ) :
					$featuredblocks->the_post();
					$nothumbclass = ( has_post_thumbnail() ? '' : ' nothumb' );
					?>
					<div class="featured-slider-item">
						<div class="blog-single-featured-block">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>">
									<div class="post-thumnail">
										<?php the_post_thumbnail( $featured_slider_image_size ); ?>						
									</div>
								</a>
							<?php endif; ?>
							<div class="post-description<?php echo esc_attr( $nothumbclass ); ?> text-<?php echo esc_attr( get_theme_mod( 'featured_align', 'left' ) ); ?>">
								<div class="post-description-inner">
									<div class="category-links mb-3 mt-0">
										<?php
										$categories_list = get_the_category_list( esc_html__( ', ', 'minimalblog' ) );
										if ( $categories_list ) {
											/* translators: 1: list of categories. */
											printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'minimalblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
										}
										?>
									</div>
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<div class="blog-meta">
									<ul>
										<li class="author-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><span class="post-author-image"><?php echo get_avatar( get_the_author_meta('ID'), 30); ?></span> <?php echo esc_html( get_the_author() ); ?></a></li>
										<li><span class="fa fa-calendar-o"></span> <?php minimalblog_posted_on(); ?></li>
									</ul>
								</div>
									<a href="<?php the_permalink(); ?>" class="btn button-border btn-warning"><?php echo esc_html( $get_read_more_text ); ?> </a>
								</div>
							</div>
						</div>
					</div>
					<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>
