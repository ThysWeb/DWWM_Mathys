<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */
$get_blog_layout = get_theme_mod( 'blog_layout', 'list' );
if ('grid' === $get_blog_layout):
	$meta_extra_class = ' blog-grid-meta';
endif;

$getalignment = get_theme_mod( 'article_alignment', 'left' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'minimalblog-standard-post' ); ?>>
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
					<?php
					$titletag = get_theme_mod( 'article_heading_tag', 'h2' );;
					?>
					<a href="<?php the_permalink(); ?>"><<?php echo esc_attr( $titletag ); ?>><?php the_title(); ?></<?php echo esc_attr( $titletag ); ?>></a>
				</div>
				<div class="blog-meta<?php echo esc_attr($meta_extra_class);?>">
					<ul>
						<li class="author-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><span class="post-author-image"><?php echo get_avatar( get_the_author_meta('ID'), 30); ?></span> <?php echo esc_html( get_the_author() ); ?></a></li>
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
				<div class="readmore">
					<?php
					$get_read_more_text = get_theme_mod( 'readmore_text', __( 'Read More', 'minimalblog' ) );
					?>
					<a href="<?php the_permalink(); ?>"><?php echo esc_html( $get_read_more_text ); ?></a>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
