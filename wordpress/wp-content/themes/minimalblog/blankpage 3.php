<?php
/**
 * Template Name: Full Width without Banner
 *
 * @package minimalblog
 */
get_header();
?>
<div id="primary" class="content-area pt-0 pb-0">
	 <main id="main" class="site-main">
		 <?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'minimalblog-standard-page' ); ?>>
					<?php the_content(); ?>
				</article>
				<?php
		 	endwhile; wp_reset_postdata(); // End of the loop.
			?>
	 </main><!-- #main -->
 </div><!-- #primary -->
<?php
get_footer(); ?>
