<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package minimalblog
 */
get_header();
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
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row wrapper-content">
					<div class="<?php echo esc_attr( $blogcontent ); ?>">
						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'single' );
							endwhile;
							?>
							<div class="d-flex next-prev-link mb-5">
								<div class="col-md-6 align-self-center text-left prev-post">
									<h4><?php echo get_previous_post_link(); ?></h4>
								</div>
								<div class="col-md-6 align-self-center text-right next-post">
									<h4><?php echo get_next_post_link(); ?></h4>
								</div>
							</div>
							<div class="post-author">
								<div class="author-image">
									<?php
									echo get_avatar( get_the_author_meta( 'ID' ), 96, '', '', null );
									?>
								</div>
								<div class="author-about">
									<h4><?php echo get_the_author_meta( 'nickname' ); ?></h4>
									<p><?php echo get_the_author_meta( 'description' ); ?></p>
									<p class="author-social"><?php minimalblog_author_social_link(); ?></p>
								</div>
							</div>
							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
								endif;
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
						?>
					</div>
					<?php if ( $sidebarshow === true ) : ?>
						<div class="<?php echo esc_attr( $blogsidebar ); ?>">
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
