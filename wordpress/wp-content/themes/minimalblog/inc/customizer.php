<?php
/**
 * minimalblog Theme Customizer
 *
 * @package minimalblog
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function minimalblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'minimalblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'minimalblog_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'minimalblog_customize_register' );
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function minimalblog_customize_partial_blogname() {
	 bloginfo( 'name' );
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function minimalblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function minimalblog_customize_preview_js() {
	wp_enqueue_script( 'minimalblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'minimalblog_customize_preview_js' );
// Customize function.
if ( ! function_exists( 'minimalblog_customize_name_panel_section' ) ) {
	add_action( 'customize_register', 'minimalblog_customize_name_panel_section' );
	/**
	 *
	 * minimalblog customize name panel section
	 */
	function minimalblog_customize_name_panel_section( $wp_customize ) {
		/**
		 * Multiple select customize control class.
		 */
		class minimalblog_Customize_Control_Multiple_Select extends WP_Customize_Control {
				/**
				 * The type of customize control being rendered.
				 */
			public $type = 'multiple-select';
				/**
				 * Displays the multiple select on the customize screen.
				 */
			public function render_content() {
				if ( empty( $this->choices ) ) {
					return;
				}
				?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<?php
				$i = 0;
				foreach ( $this->choices as $value => $label ) {
					$i++;
					$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : selected( 0, 0, true );
					echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
				}
				?>
				</select>
			</label>
				<?php
			}
		}
		$wp_customize->add_panel(
			'minimalblog',
			array(
				'priority'       => 50,
				'title'          => __( 'Minimalblog Settings', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_section(
			'topbar_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Topbar Section', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'topbar_section_on_off',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => false,
			)
		);
		$wp_customize->add_control(
			'topbar_section_on_off',
			array(
				'label'       => __( 'Topbar Section On//Off', 'minimalblog' ),
				'section'     => 'topbar_section',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_section(
			'header_layout_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Header Layout', 'minimalblog' ),
				'description'    => __( 'Customize Blog Page', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'header_layout',
			array(
				'default' => 'one',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_radio',
			)
		);
		$wp_customize->add_control(
			'header_layout',
			array(
				'label'       => __( 'Header Layout', 'minimalblog' ),
				'section'     => 'header_layout_section',
				'type'        => 'radio',
				'choices'  => array(
					'one'  => __( 'Header Layout One', 'minimalblog' ),
					'two' => __( 'Header Layout Two', 'minimalblog' ),
					'three' => __( 'Header Layout Three', 'minimalblog' ),
					'four' => __( 'Header Layout Four', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_section(
			'sticky_header_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Sticky Header', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'sticky_header',
			array(
				'default' => false,
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			'sticky_header',
			array(
				'label'       => __( 'Sticky Header On//Off', 'minimalblog' ),
				'section'     => 'sticky_header_section',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_section(
			'sticky_sidebar_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Sticky sidebar', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'sticky_sidebar',
			array(
				'default' => false,
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			'sticky_sidebar',
			array(
				'label'       => __( 'Sticky sidebar On//Off', 'minimalblog' ),
				'section'     => 'sticky_sidebar_section',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_section(
			'banner_customize',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Banner Settings', 'minimalblog' ),
				'description'	 => __('Here all options will work only banner section.', 'minimalblog'),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'banner_height',
			array(
				'default' => 250,
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_number_absint',
			)
		);
		$wp_customize->add_control(
			'banner_height',
			array(
				'label'       => __( 'Banner Height', 'minimalblog' ),
				'section'     => 'banner_customize',
				'type'        => 'number',
			)
		);
		$wp_customize->add_section(
			'social_links',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Social Links', 'minimalblog' ),
				'description'    => __( 'Social Links. to disable social Icon keep that fields empty.', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'facebook',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'facebook',
			array(
				'label'       => __( 'Facebook Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'twitter',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'twitter',
			array(
				'label'       => __( 'twitter Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'pinterest',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'pinterest',
			array(
				'label'       => __( 'pinterest Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'youtube',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'youtube',
			array(
				'label'       => __( 'youtube Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'googleplus',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'googleplus',
			array(
				'label'       => __( 'Google plus Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'linkedin',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'linkedin',
			array(
				'label'       => __( 'linkedin Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'instagram',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'instagram',
			array(
				'label'       => __( 'Instagram Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'github',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'github',
			array(
				'label'       => __( 'github Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'stumbleupon',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'stumbleupon',
			array(
				'label'       => __( 'stumbleupon Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'tumblr',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'tumblr',
			array(
				'label'       => __( 'tumblr Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'wordpress',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'wordpress',
			array(
				'label'       => __( 'wordpress Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'weixin',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'weixin',
			array(
				'label'       => __( 'weixin Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'snapchat',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'snapchat',
			array(
				'label'       => __( 'snapchat Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'qq',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'qq',
			array(
				'label'       => __( 'QQ Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_setting(
			'reddit',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'esc_url_raw',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'reddit',
			array(
				'label'       => __( 'reddit Link', 'minimalblog' ),
				'section'     => 'social_links',
				'type'        => 'url',
			)
		);
		$wp_customize->add_section(
			'featured_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Featured Section', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'featured_section_on_off',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => false,
			)
		);
		$wp_customize->add_control(
			'featured_section_on_off',
			array(
				'label'       => __( 'Featured Section On//Off', 'minimalblog' ),
				'section'     => 'featured_section',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_setting(
			'featured_categories',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_category_sanitize',
			)
		);
		$wp_customize->add_control(
			new minimalblog_Customize_Control_Multiple_Select(
				$wp_customize,
				'featured_categories',
				array(
					'label'       => __( 'Featured Category', 'minimalblog' ),
					'section'     => 'featured_section',
					'type'        => 'multiple-select',
					'choices' => minimalblog_get_categories(),
				)
			)
		);
		$wp_customize->add_setting(
			'featured_post_per_page',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_number_absint',
				'default'     => 2,
			)
		);
		$wp_customize->add_control(
			'featured_post_per_page',
			array(
				'label'       => __( 'Post Count', 'minimalblog' ),
				'section'     => 'featured_section',
				'type'        => 'number',
			)
		);
		$wp_customize->add_setting(
			'featured_slider_item',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_number_absint',
				'default'     => 2,
			)
		);
		$wp_customize->add_control(
			'featured_slider_item',
			array(
				'label'       => __( 'Slide to Show', 'minimalblog' ),
				'section'     => 'featured_section',
				'type'        => 'number',
			)
		);
		$wp_customize->add_setting(
			'featured_align',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_select',
				'default'     => 'left',
			)
		);
		$wp_customize->add_control(
			'featured_align',
			array(
				'label'       => __( 'Text Align', 'minimalblog' ),
				'section'     => 'featured_section',
				'type'        => 'select',
				'choices' => array(
					'left' => __( 'Left', 'minimalblog' ),
					'center' => __( 'Center', 'minimalblog' ),
					'right' => __( 'Right', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'featured_slider_auto_play',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => false,
			)
		);
		$wp_customize->add_control(
			'featured_slider_auto_play',
			array(
				'label'       => __( 'Auto Play', 'minimalblog' ),
				'section'     => 'featured_section',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_setting(
			'featured_read_more_text',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'wp_kses_post',
				'default'     => __( 'Read More', 'minimalblog' ),
			)
		);
		$wp_customize->add_control(
			'featured_read_more_text',
			array(
				'label'       => __( 'Read More Text', 'minimalblog' ),
				'section'     => 'featured_section',
				'type'        => 'text',
			)
		);
		$wp_customize->add_section(
			'promo_categories',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Category Slider', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'promo_category_slider',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => false,
			)
		);
		$wp_customize->add_control(
			'promo_category_slider',
			array(
				'label'       => __( 'Category Slider On/Off', 'minimalblog' ),
				'section'     => 'promo_categories',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_setting(
			'choose_promo_categories',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_category_sanitize',
			)
		);
		$wp_customize->add_control(
			new minimalblog_Customize_Control_Multiple_Select(
				$wp_customize,
				'choose_promo_categories',
				array(
					'label'       => __( 'Featured Categories', 'minimalblog' ),
					'section'     => 'promo_categories',
					'type'        => 'multiple-select',
					'choices' => minimalblog_get_categories(),
				)
			)
		);

		$wp_customize->add_setting(
			'category_slider_item',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_number_absint',
				'default'     => 3,
			)
		);
		$wp_customize->add_control(
			'category_slider_item',
			array(
				'label'       => __( 'Slide To Show', 'minimalblog' ),
				'section'     => 'promo_categories',
				'type'        => 'number',
			)
		);
		$wp_customize->add_setting(
			'category_slider_auto_play',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => false,
			)
		);
		$wp_customize->add_control(
			'category_slider_auto_play',
			array(
				'label'       => __( 'Auto Play', 'minimalblog' ),
				'section'     => 'promo_categories',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_section(
			'footer_column_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Footer Column', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'footer_column',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_radio',
				'default'     => 3,
			)
		);
		$wp_customize->add_control(
			'footer_column',
			array(
				'label'       => __( 'Footer Column', 'minimalblog' ),
				'section'     => 'footer_column_section',
				'type'        => 'radio',
				'choices' => array(
					'2' => __( '2 Column', 'minimalblog' ),
					'3' => __( '3 Column', 'minimalblog' ),
					'4' => __( '4 Column', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_section(
			'minimalblog_body_layout_section',
			array(
				'priority'       => 6,
				'panel'          => 'minimalblog',
				'title'          => __( 'Site Body Layout', 'minimalblog' ),
				'description'    => __( 'Customize Site body layout', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'minimalblog_body_layout',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'minimalblog_sanitize_radio',
				'default' => 'fulid',
			)
		);
		$wp_customize->add_control(
			'minimalblog_body_layout',
			array(
				'type' => 'radio',
				'label' => __( 'Body Layout', 'minimalblog' ),
				'section' => 'minimalblog_body_layout_section',
				'choices' => array(
					'box' => __( 'Box Layout', 'minimalblog' ),
					'fulid' => __( 'Fluid Layout', 'minimalblog' ),
				),
			)
		);
		/*Blog Page Settings*/
		$wp_customize->add_section(
			'blog_page_settings',
			array(
				'priority'       => 6,
				'panel'          => 'minimalblog',
				'title'          => __( 'Blog Page Settings', 'minimalblog' ),
				'description'    => __( 'This settings will work on this following page. Post Page, Archive Page, Search Page', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'blog_layout',
			array(
				'default' => 'list',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_radio',
			)
		);
		$wp_customize->add_control(
			'blog_layout',
			array(
				'label'       => __( 'Posts Layout', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'radio',
				'choices'  => array(
					'grid'  => __( 'Grid', 'minimalblog' ),
					'list' => __( 'List', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'grid_column',
			array(
				'default' => 'col-sm-6',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_radio',
			)
		);
		$wp_customize->add_control(
			'grid_column',
			array(
				'label'       => __( 'Grid Column', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'radio',
				'active_callback' => 'minimalblog_blog_grid',
				'choices'  => array(
					'col-sm-3'  => __( '4 Colmun', 'minimalblog' ),
					'col-sm-4' => __( '3 Column', 'minimalblog' ),
					'col-sm-6' => __( '2 Column', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'blog_page_sidebar',
			array(
				'default' => 'right',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_radio',
			)
		);
		$wp_customize->add_control(
			'blog_page_sidebar',
			array(
				'label'       => __( 'Blog Sidebar', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'radio',
				'choices'  => array(
					'left'  => __( 'Left Sidebar', 'minimalblog' ),
					'right' => __( 'Right Sidebar', 'minimalblog' ),
					'no' => __( 'No Sidebar', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'article_heading_tag',
			array(
				'default' => 'h2',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_select',
			)
		);
		$wp_customize->add_control(
			'article_heading_tag',
			array(
				'label'       => __( 'Article Title Tag', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'select',
				'choices'  => array(
					'h1'  => __( 'h1', 'minimalblog' ),
					'h2' => __( 'h2', 'minimalblog' ),
					'h3' => __( 'h3', 'minimalblog' ),
					'h4' => __( 'h4', 'minimalblog' ),
					'h5' => __( 'h5', 'minimalblog' ),
					'h6' => __( 'h6', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'article_alignment',
			array(
				'default' => 'left',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_radio',
			)
		);
		$wp_customize->add_control(
			'article_alignment',
			array(
				'label'       => __( 'Article Alignment', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'radio',
				'choices'  => array(
					'left'  => __( 'Left', 'minimalblog' ),
					'right' => __( 'Right', 'minimalblog' ),
					'center' => __( 'center', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'excerpt_length',
			array(
				'default' => 200,
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'minimalblog_sanitize_number_absint',
			)
		);
		$wp_customize->add_control(
			'excerpt_length',
			array(
				'label'       => __( 'Excerpt Length', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'number',
			)
		);
		$wp_customize->add_setting(
			'readmore_text',
			array(
				'default' => __( 'Read More', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'readmore_text',
			array(
				'label'       => __( 'Read More Text', 'minimalblog' ),
				'section'     => 'blog_page_settings',
				'type'        => 'text',
			)
		);
		/**
		 * Color Options
		 */
		$wp_customize->add_setting(
			'base_color',
			array(
				'default'   => '#f16334',
				'transport' => 'refresh',
				'sanitize_callback'       => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'base_color',
				array(
					'section' => 'colors',
					'label'   => __( 'Primary Color', 'minimalblog' ),
				)
			)
		);
		$wp_customize->add_setting(
			'menu_color_main',
			array(
				'default'   => '#000000',
				'transport' => 'refresh',
				'sanitize_callback'       => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_color_main',
				array(
					'section' => 'colors',
					'label'   => __( 'Menu Color', 'minimalblog' ),
				)
			)
		);
		$wp_customize->add_setting(
			'menu_color_hover',
			array(
				'default'   => '#f16334',
				'transport' => 'refresh',
				'sanitize_callback'       => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'menu_color_hover',
				array(
					'section' => 'colors',
					'label'   => __( 'Menu Hover Color', 'minimalblog' ),
				)
			)
		);
		$font_choices = array(
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',
			'Droid Sans:400,700' => 'Droid Sans',
			'Lato:400,700,400italic,700italic' => 'Lato',
			'Arvo:400,700,400italic,700italic' => 'Arvo',
			'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif',
			'PT Sans:400,700,400italic,700italic' => 'PT Sans',
			'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
			'Arimo:400,700,400italic,700italic' => 'Arimo',
			'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
			'Bitter:400,700,400italic' => 'Bitter',
			'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Roboto:400,400italic,700,700italic' => 'Roboto',
			'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
			'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
			'Roboto Slab:400,700' => 'Roboto Slab',
			'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
			'Rokkitt:400' => 'Rokkitt',
			'Poppins:400,500,600,700,800,900' => 'Poppins',
			'Work+Sans:400,500,600,700,900' => 'Work Sans',
		);
		$wp_customize->add_section(
			'typhograpy',
			array(
				'priority'       => 6,
				'panel'          => 'minimalblog',
				'title'          => __( 'Typhograpy', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'minimalblog_body_fonts',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'minimalblog_sanitize_fonts',
			)
		);
		$wp_customize->add_control(
			'minimalblog_body_fonts',
			array(
				'type' => 'select',
				'label' => __( 'Body Font Family', 'minimalblog' ),
				'section' => 'typhograpy',
				'choices' => $font_choices,
			)
		);
		$wp_customize->add_setting(
			'minimalblog_body_fonts_size',
			array(
				'transport' => 'refresh',
				'default' => 15,
				'sanitize_callback' => 'minimalblog_sanitize_number_absint',
			)
		);
		$wp_customize->add_control(
			'minimalblog_body_fonts_size',
			array(
				'type' => 'number',
				'label' => __( 'Body Font Size', 'minimalblog' ),
				'section' => 'typhograpy',
			)
		);
		$wp_customize->add_setting(
			'minimalblog_body_fonts_weight',
			array(
				'transport' => 'refresh',
				'default' => 400,
				'sanitize_callback' => 'minimalblog_sanitize_number_absint',
			)
		);
		$wp_customize->add_control(
			'minimalblog_body_fonts_weight',
			array(
				'type' => 'select',
				'label' => __( 'Body Font Weight', 'minimalblog' ),
				'section' => 'typhograpy',
				'choices' => array(
					'100' => __( '100', 'minimalblog' ),
					'200' => __( '200', 'minimalblog' ),
					'300' => __( '300', 'minimalblog' ),
					'400' => __( '400', 'minimalblog' ),
					'500' => __( '500', 'minimalblog' ),
					'600' => __( '600', 'minimalblog' ),
					'700' => __( '700', 'minimalblog' ),
					'800' => __( '800', 'minimalblog' ),
					'900' => __( '900', 'minimalblog' ),
					'1100' => __( '1100', 'minimalblog' ),
				),
			)
		);
		$wp_customize->add_setting(
			'minimalblog_body_fonts_line_height',
			array(
				'transport' => 'refresh',
				'default' => 28,
				'sanitize_callback' => 'minimalblog_sanitize_number_absint',
			)
		);
		$wp_customize->add_control(
			'minimalblog_body_fonts_line_height',
			array(
				'type' => 'number',
				'label' => __( 'Body Line Height', 'minimalblog' ),
				'section' => 'typhograpy',
			)
		);
		$wp_customize->add_section(
			'prealoader_section',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Prealoader', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'prealoader_on_off',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => false,
			)
		);
		$wp_customize->add_control(
			'prealoader_on_off',
			array(
				'label'       => __( 'Prealoader ON//OFF', 'minimalblog' ),
				'section'     => 'prealoader_section',
				'type'        => 'checkbox',
			)
		);
		$wp_customize->add_setting(
			'prealoader_image',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_image',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'prealoader_image',
				array(
					'label'      => __( 'Upload Prealoader Image', 'minimalblog' ),
					'section'    => 'prealoader_section',
					'settings'   => 'prealoader_image',
				)
			)
		);
		// footer content
		$wp_customize->add_section(
			'footer_content',
			array(
				'panel'          => 'minimalblog',
				'title'          => __( 'Copyright', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'copyright_text',
			array(
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'wp_kses_post',
			)
		);
		// Control: Name.
		$wp_customize->add_control(
			'copyright_text',
			array(
				'label'       => __( 'Copyright Text', 'minimalblog' ),
				'section'     => 'footer_content',
				'type'        => 'textarea',
			)
		);
		/**
		 * Contact Page Options
		 */
		$wp_customize->add_section(
			'contact_page_options',
			array(
				'priority'       => 1,
				'panel'          => 'minimalblog',
				'title'          => __( 'Contact Page', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'form_title',
			array(
				'default' => __( 'GET A CALL BACK', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'form_title',
			array(
				'label'       => __( 'Form Title', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'contact_form',
			array(
				'default' => __( 'Contact Form', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'contact_form',
			array(
				'label'       => __( 'Contact Form Shortcode', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'address_title',
			array(
				'default' => __( 'GET IN TOUCH', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'address_title',
			array(
				'label'       => __( 'Address Title', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'phone_number',
			array(
				'default' => __( '8801793293791', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'phone_number',
			array(
				'label'       => __( 'Phone Number', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'email_address',
			array(
				'default' => __( 'tfthemecafe@gmail.com', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'email_address',
			array(
				'label'       => __( 'Email Address', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'location',
			array(
				'default' => __( '3214 Spruce Drive <br>
Wexford, PA 15090', 'minimalblog' ),
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			'location',
			array(
				'label'       => __( 'Address', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'map_api_key',
			array(
				'default' => 'AIzaSyCn4uayw359fjMh4P9i2rKKZYHzXaqTRNs',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'esc_html',
			)
		);
		$wp_customize->add_control(
			'map_api_key',
			array(
				'label'       => __( 'Map API Key', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'latitude',
			array(
				'default' => '23.706333',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'esc_html',
			)
		);
		$wp_customize->add_control(
			'latitude',
			array(
				'label'       => __( 'Latitude', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_setting(
			'longitude',
			array(
				'default' => '90.4932206',
				'transport'            => 'refresh', // Options: refresh or postMessage.
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'esc_html',
			)
		);
		$wp_customize->add_control(
			'longitude',
			array(
				'label'       => __( 'Longitude', 'minimalblog' ),
				'section'     => 'contact_page_options',
				'type'        => 'textarea',
			)
		);
		$wp_customize->add_section(
			'footer_credit',
			array(
				'panel'          => 'minimalblog',
				'title'          => __( 'Footer Credit', 'minimalblog' ),
				'capability'     => 'edit_theme_options',
			)
		);
		// Control: Name.
		$wp_customize->add_setting(
			'footer_credit_on_off',
			array(
				'transport'            => 'refresh',
				'capability'           => 'edit_theme_options',
				'sanitize_callback'     => 'minimalblog_sanitize_checkbox',
				'default'     => true,
			)
		);
		$wp_customize->add_control(
			'footer_credit_on_off',
			array(
				'label'       => __( 'Footer Credit ON//OFF', 'minimalblog' ),
				'section'     => 'footer_credit',
				'type'        => 'checkbox',
			)
		);
	}
}
