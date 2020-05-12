<?php
/**
 * minimalblog Popular Post Section
 *
 * @package minimalblog
 */
$get_featured_categories = get_theme_mod( 'choose_promo_categories' );
if ( ! empty( $get_featured_categories ) ) {
	$get_featured_categories = implode( ',', $get_featured_categories );
}
if (is_page_template('frontpage.php' , 'frontgrid.php')) {
	$get_featured_categories = get_categories();
}
if (is_array($get_featured_categories)) :
?>
<div class="minimalblog_popular_post_area">
	<div class="container">
		<div class="active-subfeatured-slider owl-carousel">
			<?php
			foreach ($get_featured_categories as $get_featured_category) :
			?>
				<div class="single-popular-post">
					<?php
					$cat_thumb_id = get_term_meta( $get_featured_category, 'category-image-id', true );
					if (!empty($cat_thumb_id)) {
						echo wp_get_attachment_image( $cat_thumb_id, 'post-thumbnails' );
					}else{
						echo '<div class="no-post-thumbnail"></div>';
					}
					?>
					<div class="popular-post-content">
						<a href="<?php echo get_category_link( $get_featured_category->term_id ); ?>"><?php echo $get_featured_category->name; ?></a>
					</div>
				</div>
			<?php endforeach;
			?>
		</div>
	</div>
</div>
<?php endif; ?>