<?php

if ( ! function_exists( 'protalks_core_add_woocommerce_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function protalks_core_add_woocommerce_options() {
		$qode_framework = qode_framework_get_framework_root();

		$list_item_layouts = apply_filters( 'protalks_core_filter_product_list_layouts', array() );
		$options_map       = protalks_core_get_variations_options_map( $list_item_layouts );

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PROTALKS_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'woocommerce',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'WooCommerce', 'protalks-core' ),
				'description' => esc_html__( 'Global WooCommerce Options', 'protalks-core' ),
				'layout'      => 'tabbed',
			)
		);

		if ( $page ) {

			$global_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-global',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Global', 'protalks-core' ),
					'description' => esc_html__( 'Settings related to WooCommerce', 'protalks-core' ),
				)
			);

			$global_tab->add_field_element(
				array(
					'field_type'    => 'yesno',
					'default_value' => 'no',
					'name'          => 'qodef_woo_enable_percent_sign_value',
					'title'         => esc_html__( 'Enable Percent Sign', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'protalks-core' ),
				)
			);

			$global_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_upsell_cross_sell_columns',
					'title'       => esc_html__( 'Number of Upsell/Cross-sell Columns', 'protalks-core' ),
					'description' => esc_html__( 'Set a number of columns for upsell and cross-sell products. This option applies to product single and cart pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'columns_number' ),
				)
			);

			$list_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-list',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Product List', 'protalks-core' ),
					'description' => esc_html__( 'Settings related to product list', 'protalks-core' ),
				)
			);

			if ( $options_map['visibility'] ) {
				$list_tab->add_field_element(
					array(
						'field_type'    => 'select',
						'name'          => 'qodef_product_list_item_layout',
						'title'         => esc_html__( 'Item Layout', 'protalks-core' ),
						'description'   => esc_html__( 'Choose layout for list item on shop lists', 'protalks-core' ),
						'options'       => $list_item_layouts,
						'default_value' => $options_map['default_value'],
					)
				);
			}

			$list_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_product_list_columns',
					'title'       => esc_html__( 'Number of Columns', 'protalks-core' ),
					'description' => esc_html__( 'Choose number of columns for product list on shop pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'columns_number' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_product_list_columns_space',
					'title'       => esc_html__( 'Items Horizontal Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Choose horizontal space between items for product list on shop pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$woo_product_list_columns_space_row = $list_tab->add_row_element(
				array(
					'name'       => 'qodef_woo_product_list_columns_space_row',
					'dependency' => array(
						'show' => array(
							'qodef_woo_product_list_columns_space' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$woo_product_list_columns_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_space_custom',
					'title'       => esc_html__( 'Custom Horizontal Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_columns_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_space_custom_1512',
					'title'       => esc_html__( 'Custom Horizontal Spacing - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_columns_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_space_custom_1200',
					'title'       => esc_html__( 'Custom Horizontal Spacing - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_columns_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_space_custom_880',
					'title'       => esc_html__( 'Custom Horizontal Spacing - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_product_list_columns_vertical_space',
					'title'       => esc_html__( 'Items Vertical Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Choose vertical space between items for product list on shop pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$woo_product_list_columns_vertical_space_row = $list_tab->add_row_element(
				array(
					'name'       => 'qodef_woo_product_list_columns_vertical_space_row',
					'dependency' => array(
						'show' => array(
							'qodef_woo_product_list_columns_vertical_space' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$woo_product_list_columns_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_vertical_space_custom',
					'title'       => esc_html__( 'Custom Vertical Spacing', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_columns_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_vertical_space_custom_1512',
					'title'       => esc_html__( 'Custom Vertical Spacing - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_columns_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_vertical_space_custom_1200',
					'title'       => esc_html__( 'Custom Vertical Spacing - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_columns_vertical_space_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_columns_vertical_space_custom_880',
					'title'       => esc_html__( 'Custom Vertical Spacing - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_products_per_page',
					'title'       => esc_html__( 'Products per Page', 'protalks-core' ),
					'description' => esc_html__( 'Set number of products on shop pages. Default value is 12', 'protalks-core' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_product_list_title_tag',
					'title'       => esc_html__( 'Title Tag', 'protalks-core' ),
					'description' => esc_html__( 'Choose title tag for product list item on shop pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'title_tag' ),
				)
			);

			$list_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_woo_product_list_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for shop pages', 'protalks-core' ),
					'default_value' => 'no-sidebar',
					'options'       => protalks_core_get_select_type_options_pool( 'sidebar_layouts', false ),
				)
			);

			$custom_sidebars = protalks_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$list_tab->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_woo_product_list_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'protalks-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on shop pages', 'protalks-core' ),
						'options'     => $custom_sidebars,
					)
				);
			}

			$list_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_product_list_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'items_space' ),
				)
			);

			$woo_product_list_sidebar_grid_gutter_row = $list_tab->add_row_element(
				array(
					'name'       => 'qodef_woo_product_list_sidebar_grid_gutter_row',
					'dependency' => array(
						'show' => array(
							'qodef_woo_product_list_sidebar_grid_gutter' => array(
								'values'        => 'custom',
								'default_value' => '',
							),
						),
					),
				)
			);

			$woo_product_list_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_sidebar_grid_gutter_custom',
					'title'       => esc_html__( 'Custom Grid Gutter', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_sidebar_grid_gutter_custom_1512',
					'title'       => esc_html__( 'Custom Grid Gutter - 1512', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1512px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_sidebar_grid_gutter_custom_1200',
					'title'       => esc_html__( 'Custom Grid Gutter - 1200', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 1200px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			$woo_product_list_sidebar_grid_gutter_row->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_woo_product_list_sidebar_grid_gutter_custom_880',
					'title'       => esc_html__( 'Custom Grid Gutter - 880', 'protalks-core' ),
					'description' => esc_html__( 'Enter grid gutter size in pixels for screen size below 880px', 'protalks-core' ),
					'args'        => array(
						'col_width' => 3,
					),
				)
			);

			// Hook to include additional options after section module options.
			do_action( 'protalks_core_action_after_woo_product_list_options_map', $list_tab );

			$single_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-single',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Product Single', 'protalks-core' ),
					'description' => esc_html__( 'Settings related to product single', 'protalks-core' ),
				)
			);

			$single_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_single_enable_page_title',
					'title'       => esc_html__( 'Enable Page Title', 'protalks-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page title on single product page', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'no_yes' ),
				)
			);

			$single_tab->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_woo_single_title_tag',
					'title'         => esc_html__( 'Title Tag', 'protalks-core' ),
					'description'   => esc_html__( 'Choose title tag for product on single product page', 'protalks-core' ),
					'options'       => protalks_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h3',
				)
			);

			$media_section = $single_tab->add_section_element(
				array(
					'name'  => 'qodef_woo_single_media_section',
					'title' => esc_html__( 'Media', 'protalks-core' ),
				)
			);

			$media_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_woo_single_media_layout',
					'title'         => esc_html__( 'Media Layout', 'protalks-core' ),
					'description'   => esc_html__( 'Choose media display layout on single product pages', 'protalks-core' ),
					'options'       => array(
						'slider'  => esc_html__( 'Slider', 'protalks-core' ),
						'gallery' => esc_html__( 'Gallery', 'protalks-core' ),
						'combo'   => esc_html__( 'Combo', 'protalks-core' ),
					),
					'default_value' => 'combo',
				)
			);

			$media_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_woo_single_image_behavior',
					'title'         => esc_html__( 'Image Behavior', 'protalks-core' ),
					'description'   => esc_html__( 'Choose an interaction behavior type for gallery images', 'protalks-core' ),
					'options'       => array(
						''                     => esc_html__( 'None', 'protalks-core' ),
						'clickable-thumbnails' => esc_html__( 'Clickable Thumbnails', 'protalks-core' ),
						'photo-swipe'          => esc_html__( 'Photo Swipe', 'protalks-core' ),
						'magnific-popup'       => esc_html__( 'Magnific Popup', 'protalks-core' ),
					),
					'default_value' => 'magnific-popup',
					'dependency'    => array(
						'show' => array(
							'qodef_woo_single_media_layout' => array(
								'values'        => array( 'gallery', 'combo' ),
								'default_value' => 'combo',
							),
						),
					),
				)
			);

			$media_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_woo_single_enable_image_zoom',
					'title'         => esc_html__( 'Enable Zoom Magnifier', 'protalks-core' ),
					'description'   => esc_html__( 'Enabling this option will show magnifier image on hover on single product page', 'protalks-core' ),
					'default_value' => 'yes',
					'dependency'    => array(
						'show' => array(
							'qodef_woo_single_media_layout' => array(
								'values'        => array( 'gallery', 'combo' ),
								'default_value' => 'combo',
							),
						),
					),
				)
			);

			$media_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_woo_single_thumb_images_position',
					'title'         => esc_html__( 'Set Thumbnail Images Position', 'protalks-core' ),
					'description'   => esc_html__( 'Choose position of the thumbnail images on single product page relative to featured image', 'protalks-core' ),
					'options'       => array(
						'below' => esc_html__( 'Below', 'protalks-core' ),
						'left'  => esc_html__( 'Left', 'protalks-core' ),
					),
					'default_value' => 'below',
					'dependency'    => array(
						'show' => array(
							'qodef_woo_single_media_layout' => array(
								'values'        => array( 'gallery', 'combo' ),
								'default_value' => 'combo',
							),
						),
					),
				)
			);

			$media_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_single_thumbnail_images_columns',
					'title'       => esc_html__( 'Number of Thumbnail Image Columns', 'protalks-core' ),
					'description' => esc_html__( 'Set a number of columns for thumbnail images on single product pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'columns_number' ),
					'dependency'  => array(
						'show' => array(
							'qodef_woo_single_media_layout' => array(
								'values'        => array( 'gallery', 'combo' ),
								'default_value' => 'combo',
							),
						),
					),
				)
			);

			$single_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_woo_single_related_product_list_columns',
					'title'       => esc_html__( 'Number of Related Product Columns', 'protalks-core' ),
					'description' => esc_html__( 'Set a number of columns for related products on single product pages', 'protalks-core' ),
					'options'     => protalks_core_get_select_type_options_pool( 'columns_number' ),
				)
			);

			// Hook to include additional options after section module options.
			do_action( 'protalks_core_action_after_woo_product_single_options_map', $single_tab );

			// Hook to include additional options after module options.
			do_action( 'protalks_core_action_after_woo_options_map', $page );
		}
	}

	add_action( 'protalks_core_action_default_options_init', 'protalks_core_add_woocommerce_options', protalks_core_get_admin_options_map_position( 'woocommerce' ) );
}
