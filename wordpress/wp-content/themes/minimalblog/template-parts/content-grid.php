<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */
$getalignment = get_theme_mod( 'article_alignment', 'left' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'minimalblog-standard-post grid-template' ); ?>>
	<div class="row text-<?php echo esc_attr( $getalignment ); ?>">
		<div class="col-md-12">
		<?php get_template_part( 'template-parts/post-header/header', 'standard' ); ?>
		</div>
		<div class="col-md-12">
			<div class="minimalblog-entry-content">
				<div class="category-links">
					<?php
					$categories_list = get_the_category_list( esc_html__( ', ', 'minimalblog' ) );
					if ( $categories_list ) {
						/* translators: 1: list of categories. */
						printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'minimalblog' ) . '</span>', $categories_list ); // WPCS: XSS OK.
					}
					?>
				</div>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				</div>
				<div class="blog-meta">
					<ul>
						<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><span class="fa fa-user-o"></span> <?php echo esc_html( get_the_author() ); ?></a></li>
						<li><span class="fa fa-calendar-o"></span> <?php minimalblog_posted_on(); ?></li>
						<li><span class="fa fa-comment-o"></span> <?php minimalblog_comment_popuplink(); ?></li>
					</ul>
				</div>
				<div class="minimalblog-excerpt">
					<?php
						$getexerpt = get_theme_mod( 'excerpt_length', 200 );
						echo esc_html( minimalblog_get_excerpt( $getexerpt ) );
					?>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
