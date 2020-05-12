<?php
/**
 * Template Name: Contact Page
 *
 * @package minimalblog
 */
get_header();?>
<div id="primary" class="content-area contact-page-wrapper">
	 <main id="main" class="site-main">
		 <div class="container">
			 <div class="row justify-content-center">
				 <div class="col-md-6 col-lg-5">
					<div class="contact-form-wrapper">
						<h4><?php echo wp_kses_post(get_theme_mod( 'form_title', __('GET A CALL BACK', 'minimalblog') )); ?></h4>
						<?php
						$contactform = get_theme_mod( 'contact_form' );
						echo do_shortcode( $contactform );
						?>
					</div>
				 </div>
				 <div class="col-md-6 col-lg-5">
				 	<div class="address-details-block">
				 		<h4><?php echo wp_kses_post(get_theme_mod( 'address_title', __('GET IN TOUCH', 'minimalblog') )); ?></h4>
				 		<?php 
				 		$phone_number = get_theme_mod('phone_number');
				 		$email_address = get_theme_mod('email_address');
				 		$location = get_theme_mod('location');
				 		if (!empty($phone_number)) :
				 		?>
				 		<div class="single-address">
				 			<div class="address-icon">
				 				<i class="fa fa-phone"></i>
				 			</div>
				 			<div class="address-details">
				 				<?php echo wp_kses_post($phone_number); ?>
				 			</div>
				 		</div>
					 	<?php
					 	endif;
					 	if (!empty($email_address)) :
					 	 ?>
				 		<div class="single-address">
				 			<div class="address-icon">
				 				<i class="fa fa-envelope"></i>
				 			</div>
				 			<div class="address-details">
				 				<?php echo wp_kses_post($email_address); ?>
				 			</div>
				 		</div>
					 	<?php
					 	endif;
					 	if (!empty($location)) :
					 	?>
				 		<div class="single-address">
				 			<div class="address-icon">
				 				<i class="fa fa-street-view"></i>
				 			</div>
				 			<div class="address-details">
				 				<?php echo wp_kses_post(get_theme_mod('location')); ?>
				 			</div>
				 		</div>
				 		<?php endif; ?>
				 	</div>
				 </div>
			 </div>
		 </div>
	 </main><!-- #main -->
 </div><!-- #primary -->
 	  <div class="container-full">
			<div id="gmap" class="contactform"></div>
	 </div>
<?php get_footer();?>