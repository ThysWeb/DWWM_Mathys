<?php
/**
 * Template Name: Front Grid
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
	?>
		<div class="blog-post-section">
			<div class="container">
				<div class="row wrapper-content">
					<div class="col-md-12">
						<?php
						if ( have_posts() ) :
							echo '<div class="row masonaryactive">';
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
								'posts_per_page' => 6,
								'paged' => $paged,
							);
							$query = new WP_Query( $args );
							/* Start the Loop */
							while ( $query->have_posts() ) :
								$query->the_post();
								$grid_column = 'col-sm-12 col-md-6';
								echo '<div class="' . $grid_column . ' blog-grid-layout">';
								get_template_part( 'template-parts/content', 'grid' );
								echo '</div>';
							endwhile;
							echo '</div>';
							echo '<div class="Page d-flex justify-content-center frontpage navigation example">';
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
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div>
<?php
get_footer();
