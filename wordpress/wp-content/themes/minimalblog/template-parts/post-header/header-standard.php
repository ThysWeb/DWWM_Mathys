<?php
/**
 * Template part for display audio header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minimalblog
 */
$single_post_class = ( is_single() ? ' mb-5 single-post-header' : '' );

?>
<div class="minimalblog-standard-post__thumbnail post-header<?php echo esc_attr($single_post_class);?>">
	
	<?php
	if (is_single()) {
		 the_post_thumbnail( 'minimalblog-thubnail-medium' );
	}else{
		?>
			<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'minimalblog-standard-post-thumbnial' ); ?></a>
		<?php
	}
	?>
</div>
