<?php

if ( ! function_exists( 'protalks_core_add_masonry_gallery_meta_box' ) ) {
	/**
	 * Function that adds fields for masonry gallery
	 */
	function protalks_core_add_masonry_gallery_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'masonry-gallery' ),
				'type'  => 'meta',
				'slug'  => 'masonry-gallery',
				'title' => esc_html__( 'Masonry Gallery Parameters', 'protalks-core' ),
			)
		);

		if ( $page ) {

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_masonry_gallery_item_layout',
					'title'         => esc_html__( 'Item Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Choose default layout for masonry gallery item', 'protalks-core' ),
					'options'       => array(
						'standard' => esc_html__( 'Standard', 'protalks-core' ),
						'inverted' => esc_html__( 'Inverted', 'protalks-core' ),
						'advanced' => esc_html__( 'Advanced', 'protalks-core' ),
					),
					'default_value' => 'standard',
				)
			);

			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_masonry_gallery_item_dimension',
					'title'       => esc_html__( 'Masonry Item Dimension', 'protalks-core' ),
					'description' => esc_html__( 'Choose an item dimension layout "masonry behavior" for masonry gallery list.', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'masonry_image_dimension' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_masonry_gallery_item_title_tag',
					'title'      => esc_html__( 'Title Tag', 'protalks-core' ),
					'options'    => protalks_core_get_select_type_options_pool( 'title_tag' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_masonry_gallery_item_text',
					'title'      => esc_html__( 'Text', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_masonry_gallery_item_expand_image',
					'title'         => esc_html__( 'Expand image over holder', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => 'inverted',
								'default_value' => 'standard',
							),
						),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'image',
					'name'       => 'qodef_masonry_gallery_item_info_image_one',
					'title'      => esc_html__( 'Info image one', 'protalks-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_masonry_gallery_item_layout' => array(
								'values'        => 'advanced',
								'default_value' => 'standard',
							),
						),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_masonry_gallery_item_link',
					'title'      => esc_html__( 'Link', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_masonry_gallery_item_button_label',
					'title'      => esc_html__( 'Button Label', 'protalks-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_masonry_gallery_item_link_target',
					'title'         => esc_html__( 'Target', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'link_target', false ),
					'default_value' => '_blank',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_masonry_gallery_item_button_type',
					'title'         => esc_html__( 'Button Type', 'protalks-core' ),
					'options'       => array(
						'textual'  => esc_html__( 'Textual', 'protalks-core' ),
						'filled'   => esc_html__( 'Filled', 'protalks-core' ),
						'outlined' => esc_html__( 'Outlined', 'protalks-core' ),
					),
					'default_value' => 'textual',
				)
			);

			// Hook to include additional options after module options
			do_action( 'protalks_core_action_after_masonry_gallery_meta_box_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_meta_boxes_init', 'protalks_core_add_masonry_gallery_meta_box' );
}
