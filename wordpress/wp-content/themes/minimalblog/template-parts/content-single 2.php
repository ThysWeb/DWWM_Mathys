<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */
$background_color = get_theme_mod('background_color', '#ffffff');

$extra_class = ' p-0';
if ('ffffff' != $background_color) {
	$extra_class = ' p-3 border-radius-10';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content no-shadow<?php echo esc_attr($extra_class);?>">
		<div class="category-links mt-0">
			<?php
			$categories_list = get_the_category_list( esc_html__( ', ', 'minimalblog' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'minimalblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			?>
		</div>
		<div class="post-title single-post-title">
			<?php
			$get_blog_layout = get_theme_mod( 'blog_layout', 'list' );
			?>
			<h2 class="mb-0"><?php the_title(); ?></h2>
		</div>
		<div class="blog-meta single-post-meta">
			<ul class="mt-1">
				<li class="author-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><span class="post-author-image"><?php echo get_avatar( get_the_author_meta('ID'), 30); ?></span> <?php echo esc_html( get_the_author() ); ?></a></li>
				<li><span class="fa fa-calendar-o"></span> <?php minimalblog_posted_on(); ?></li>
				<li><span class="fa fa-comment-o"></span> <?php minimalblog_comment_popuplink(); ?></li>
				
			</ul>
		</div>
		<?php
		get_template_part( 'template-parts/post-header/header', 'standard' );
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'minimalblog' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'minimalblog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	<?php /**
	<div class="d-flex text-center pb-5 pt-5 justify-content-center minimalblog-share-wrapper">
		<div class="minimalblog-post-share pb-5 col-md-12 align-self-center">
			<?php 
			if (function_exists('minimalblog_social_share')) {
				minimalblog_social_share(); 
			}
			?>
		</div>
		<div class="minimalblog-post-tags col-md-12 align-self-center">
			<?php minimalblog_post_tag(); ?>
		</div>
	</div>
	*/ ?>
</article><!-- #post-<?php the_ID(); ?> -->
