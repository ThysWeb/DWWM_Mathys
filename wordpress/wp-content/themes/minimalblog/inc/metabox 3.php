<?php
if ( function_exists( 'acf_add_local_field_group' ) ) :
	acf_add_local_field_group(
		array(
			'key' => 'group_5d8b6c5a59c1c',
			'title' => 'Audio',
			'fields' => array(
				array(
					'key' => 'field_5d8b6c6a88bf0',
					'label' => 'Audio Link',
					'name' => 'audio_link',
					'type' => 'oembed',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'width' => 780,
					'height' => 200,
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'audio',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		)
	);
	acf_add_local_field_group(
		array(
			'key' => 'group_5d89bcdfd873e',
			'title' => 'Gallery',
			'fields' => array(
				array(
					'key' => 'field_5d89bcf3a30f2',
					'label' => 'Gallery Images',
					'name' => 'gallery_images',
					'type' => 'gallery',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'insert' => 'append',
					'library' => 'all',
					'min' => '',
					'max' => '',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'gallery',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		)
	);
	acf_add_local_field_group(
		array(
			'key' => 'group_5d89bd3cf3be5',
			'title' => 'Video',
			'fields' => array(
				array(
					'key' => 'field_5d89bd776ced2',
					'label' => 'Video link',
					'name' => 'video_link',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'width' => 750,
					'height' => 450,
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'video',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		)
	);
endif;
